import { useState, useEffect, useRef, useCallback } from 'react';
import { useSearchParams } from 'react-router-dom';
import { db } from '../lib/firebase';
import { ref, push, update, remove, onValue, off, get, query, limitToLast } from 'firebase/database';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import Reveal from '../components/Reveal';

/* ── Persistent IDs ── */
const getOrSet = (key, gen) => {
  let v = localStorage.getItem(key);
  if (!v) { v = gen(); localStorage.setItem(key, v); }
  return v;
};
const deviceId = getOrSet('deviceId', () => Math.random().toString(36).slice(2, 10) + '-' + Date.now());
const myUserId = getOrSet('userId', () => deviceId + '-' + Math.random().toString(36).slice(2, 10));

/* ── Helpers ── */
const geocodeCache = new Map();

async function geocodeCity(city) {
  const key = city.toLowerCase().trim();
  if (geocodeCache.has(key)) return geocodeCache.get(key);
  await new Promise(r => setTimeout(r, 1000));
  const res = await fetch(
    `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(city)}&format=json&limit=1&countrycodes=in&addressdetails=1`,
    { headers: { 'User-Agent': 'Concert Circle Journey Tracker' } }
  );
  if (!res.ok) throw new Error(`HTTP ${res.status}`);
  const data = await res.json();
  if (!data.length) throw new Error('Location not found');
  const result = { lat: parseFloat(data[0].lat), lng: parseFloat(data[0].lon), name: data[0].display_name };
  geocodeCache.set(key, result);
  return result;
}

async function fetchSuggestions(q) {
  if (!q || q.length < 2) return [];
  const res = await fetch(
    `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(q)}&format=json&limit=5&countrycodes=in&addressdetails=1`,
    { headers: { 'User-Agent': 'Concert Circle Journey Tracker' } }
  );
  if (!res.ok) return [];
  return (await res.json()).map(i => ({ name: i.display_name, lat: parseFloat(i.lat), lng: parseFloat(i.lon) }));
}

function haversineETA(lat1, lon1, lat2, lon2) {
  const R = 6371, toRad = d => d * Math.PI / 180;
  const dLat = toRad(lat2 - lat1), dLon = toRad(lon2 - lon1);
  const a = Math.sin(dLat / 2) ** 2 + Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) * Math.sin(dLon / 2) ** 2;
  const dist = R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  const mins = Math.round((dist / 40) * 60);
  return mins < 60 ? `${mins} min` : `${Math.floor(mins / 60)}h ${mins % 60}m`;
}

function generateUsername(name) {
  const s = name.trim().replace(/[^a-zA-Z0-9]/g, '').substring(0, 10).toLowerCase();
  return `CC-${s}-${Math.floor(Math.random() * 100).toString().padStart(2, '0')}`;
}

function validateDestination(v) {
  if (!v.trim()) return false;
  if (v.includes(',')) {
    const parts = v.split(',').map(s => s.trim());
    // Only treat as coordinates if exactly 2 parts that are both numeric
    if (parts.length === 2 && parts.every(p => /^-?\d+(\.\d+)?$/.test(p))) {
      const [lat, lng] = parts.map(Number);
      return lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180;
    }
  }
  return v.trim().length >= 2;
}

/* ── Notification component ── */
function Notification({ msg, type, onDone }) {
  useEffect(() => { const t = setTimeout(onDone, 4000); return () => clearTimeout(t); }, [onDone]);
  const bg = type === 'success' ? 'bg-success' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
  return (
    <div className={`fixed top-4 right-4 z-[1000] px-5 py-3 rounded-xl text-white font-semibold ${bg} animate-[fadeInRight_0.3s_ease]`}>
      {msg}
    </div>
  );
}

/* ══════════════════════════════════════════════ MAIN ══════════════════════════════════════════════ */
export default function Geolocation() {
  const [searchParams] = useSearchParams();
  const mapRef = useRef(null);
  const mapInstance = useRef(null);
  const destMarkerRef = useRef(null);
  const userMarkersRef = useRef({});
  const userPathsRef = useRef({});
  const watchIdRef = useRef(null);
  const lastUpdateRef = useRef(0);
  const destCoordsRef = useRef(null);

  const [journeyId, setJourneyId] = useState(null);
  const [journeyActive, setJourneyActive] = useState(false);
  const [journeyTitle, setJourneyTitle] = useState('');
  const [shareUrl, setShareUrl] = useState('');
  const [participants, setParticipants] = useState([]);
  const [showJoinModal, setShowJoinModal] = useState(false);
  const [joinJourneyId, setJoinJourneyId] = useState(null);
  const [joinJourneyData, setJoinJourneyData] = useState(null);
  const [showLocationNotice, setShowLocationNotice] = useState(false);
  const [notification, setNotification] = useState(null);
  const [creating, setCreating] = useState(false);
  const [suggestions, setSuggestions] = useState([]);
  const [selectedCoords, setSelectedCoords] = useState(null);

  /* form state */
  const [destination, setDestination] = useState('');
  const [jName, setJName] = useState('');
  const [uName, setUName] = useState('');
  const [joinName, setJoinName] = useState('');
  const [errors, setErrors] = useState({});

  const notify = useCallback((msg, type = 'info') => setNotification({ msg, type, key: Date.now() }), []);

  /* ── Init map ── */
  useEffect(() => {
    if (mapRef.current && !mapInstance.current) {
      mapInstance.current = L.map(mapRef.current, { center: [20.5937, 78.9629], zoom: 5, zoomControl: true });
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(mapInstance.current);
    }
    return () => {
      if (mapInstance.current) { mapInstance.current.remove(); mapInstance.current = null; }
    };
  }, []);

  /* ── Check join param ── */
  useEffect(() => {
    const joinParam = searchParams.get('join');
    if (joinParam && !journeyActive) {
      (async () => {
        try {
          const snap = await get(ref(db, `journeys/${joinParam}`));
          const data = snap.val();
          if (!data || data.status !== 'active') { notify('Journey not found or no longer active.', 'error'); return; }
          setJoinJourneyId(joinParam);
          setJoinJourneyData(data);
          setShowJoinModal(true);
        } catch { notify('Failed to load journey.', 'error'); }
      })();
    }
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [searchParams]);

  /* ── Check location permission ── */
  useEffect(() => {
    if (navigator.permissions) {
      navigator.permissions.query({ name: 'geolocation' }).then(r => {
        if (r.state === 'denied') setShowLocationNotice(true);
      }).catch(() => {});
    }
  }, []);

  /* ── Suggestion debounce ── */
  useEffect(() => {
    if (destination.includes(',') || destination.length < 2) { setSuggestions([]); return; }
    const t = setTimeout(async () => { setSuggestions(await fetchSuggestions(destination)); }, 400);
    return () => clearTimeout(t);
  }, [destination]);

  /* ── Firebase listeners ── */
  useEffect(() => {
    if (!journeyId) return;
    const pRef = ref(db, `journeys/${journeyId}/participants`);
    const pathsRef = ref(db, `journeys/${journeyId}/paths`);

    const unsub1 = onValue(pRef, snap => {
      const data = snap.val() || {};
      const list = Object.values(data);
      setParticipants(list);
      updateMapMarkers(data);
    });

    const unsub2 = onValue(pathsRef, snap => {
      const data = snap.val() || {};
      Object.entries(data).forEach(([uid, path]) => updateUserPath(uid, path));
    });

    return () => { off(pRef); off(pathsRef); };
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [journeyId]);

  /* ── Map helpers ── */
  function updateMapMarkers(participantsObj) {
    const m = mapInstance.current;
    if (!m) return;
    Object.values(userMarkersRef.current).forEach(mk => m.removeLayer(mk));
    userMarkersRef.current = {};

    Object.entries(participantsObj).forEach(([uid, p]) => {
      if (!p.lat || !p.lng) return;
      const mk = L.marker([p.lat, p.lng], {
        icon: L.divIcon({
          className: '',
          html: `<div style="background:hsl(280,85%,65%);color:#fff;border-radius:50%;width:30px;height:30px;display:flex;align-items:center;justify-content:center;font-weight:bold;font-size:12px;border:2px solid #fff;box-shadow:0 2px 4px rgba(0,0,0,.3)">${(p.userName || 'U')[0].toUpperCase()}</div>`,
          iconSize: [30, 30], iconAnchor: [15, 15]
        })
      }).addTo(m);
      mk.bindPopup(`<div style="text-align:center"><strong>${p.userName || 'Anonymous'}</strong><br><small>Updated: ${new Date(p.timestamp).toLocaleString()}</small><br><small>Accuracy: ±${Math.round(p.accuracy || 0)}m</small></div>`);
      userMarkersRef.current[uid] = mk;
    });

    const all = [...Object.values(userMarkersRef.current)];
    if (destMarkerRef.current) all.push(destMarkerRef.current);
    if (all.length) { try { m.fitBounds(L.featureGroup(all).getBounds().pad(0.1)); } catch {} }
  }

  function updateUserPath(uid, pathData) {
    const m = mapInstance.current;
    if (!m || !pathData) return;
    if (userPathsRef.current[uid]) m.removeLayer(userPathsRef.current[uid]);
    const pts = Object.values(pathData).sort((a, b) => a.timestamp - b.timestamp).map(p => [p.lat, p.lng]);
    if (pts.length > 1) {
      userPathsRef.current[uid] = L.polyline(pts, {
        color: '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0'), weight: 3, opacity: 0.7
      }).addTo(m);
    }
  }

  function placeDestinationMarker(coords, title) {
    const m = mapInstance.current;
    if (!m) return;
    if (destMarkerRef.current) m.removeLayer(destMarkerRef.current);
    destMarkerRef.current = L.marker([coords.lat, coords.lng], {
      icon: L.divIcon({
        className: '',
        html: `<div style="background:hsl(0,62.8%,60%);color:#fff;border-radius:50%;width:40px;height:40px;display:flex;align-items:center;justify-content:center;font-weight:bold;border:2px solid #fff;box-shadow:0 2px 8px rgba(0,0,0,.3)">🎯</div>`,
        iconSize: [40, 40], iconAnchor: [20, 20]
      })
    }).addTo(m);
    destMarkerRef.current.bindPopup(`<div style="text-align:center"><strong>${title}</strong><br><small>${coords.name}</small></div>`);
    m.setView([coords.lat, coords.lng], 10);
  }

  /* ── Location sharing ── */
  function startLocationSharing(jId, coords, name) {
    if (!navigator.geolocation) { notify('Geolocation not supported.', 'error'); return; }
    watchIdRef.current = navigator.geolocation.watchPosition(
      pos => {
        const now = Date.now();
        if (now - lastUpdateRef.current < 5000) return;
        lastUpdateRef.current = now;
        const loc = { lat: pos.coords.latitude, lng: pos.coords.longitude, timestamp: now, accuracy: pos.coords.accuracy, userId: myUserId, userName: name };
        update(ref(db, `journeys/${jId}/participants/${myUserId}`), loc);
        push(ref(db, `journeys/${jId}/paths/${myUserId}`), { lat: loc.lat, lng: loc.lng, timestamp: now });
        if (coords) {
          const eta = haversineETA(loc.lat, loc.lng, coords.lat, coords.lng);
          update(ref(db, `journeys/${jId}/participants/${myUserId}`), { eta });
        }
      },
      err => {
        const msgs = { 1: 'Please allow location access.', 2: 'Location unavailable.', 3: 'Location request timed out.' };
        notify(msgs[err.code] || 'Location error.', 'error');
      },
      { enableHighAccuracy: true, timeout: 30000, maximumAge: 10000 }
    );
  }

  /* ── Create Journey ── */
  async function handleCreate() {
    const errs = {};
    if (!selectedCoords && !validateDestination(destination)) errs.destination = 'Enter a valid city or lat,lng';
    if (jName.trim().length < 3 || jName.trim().length > 50) errs.jName = 'Journey name must be 3-50 characters';
    if (uName.trim().length < 2 || uName.trim().length > 20) errs.uName = 'Name must be 2-20 characters';
    setErrors(errs);
    if (Object.keys(errs).length) return;

    setCreating(true);
    try {
      let coords = selectedCoords;
      if (!coords) {
        if (destination.includes(',')) {
          const [lat, lng] = destination.split(',').map(n => parseFloat(n.trim()));
          coords = { lat, lng, name: `${lat}, ${lng}` };
        } else {
          coords = await geocodeCity(destination);
        }
      }
      destCoordsRef.current = coords;
      const genName = generateUsername(uName);

      const journeyData = { name: jName.trim(), destination: coords, createdBy: myUserId, createdAt: Date.now(), status: 'active' };
      const newRef = await push(ref(db, 'journeys'), journeyData);
      const jId = newRef.key;

      setJourneyId(jId);
      setJourneyActive(true);
      setJourneyTitle(jName.trim());
      const link = `${window.location.origin}${window.location.pathname}?join=${jId}`;
      setShareUrl(link);

      placeDestinationMarker(coords, jName.trim());
      startLocationSharing(jId, coords, genName);
      notify('Journey created! Share the link with friends.', 'success');
    } catch (e) {
      notify('Failed: ' + e.message, 'error');
    } finally {
      setCreating(false);
    }
  }

  /* ── Join Journey ── */
  async function handleJoin() {
    if (joinName.trim().length < 2) { setErrors(e => ({ ...e, joinName: 'Name must be 2-20 characters' })); return; }
    try {
      const coords = joinJourneyData.destination;
      destCoordsRef.current = coords;
      const genName = generateUsername(joinName);

      setJourneyId(joinJourneyId);
      setJourneyActive(true);
      setJourneyTitle(joinJourneyData.name);
      const link = `${window.location.origin}${window.location.pathname}?join=${joinJourneyId}`;
      setShareUrl(link);
      setShowJoinModal(false);

      placeDestinationMarker(coords, joinJourneyData.name);
      startLocationSharing(joinJourneyId, coords, genName);
      notify(`Joined journey: ${joinJourneyData.name}`, 'success');
    } catch { notify('Failed to join journey.', 'error'); }
  }

  /* ── End Journey ── */
  async function handleEnd() {
    if (!journeyId) return;
    try {
      if (watchIdRef.current !== null) { navigator.geolocation.clearWatch(watchIdRef.current); watchIdRef.current = null; }
      await update(ref(db, `journeys/${journeyId}`), { status: 'ended', endedAt: Date.now() });
      await remove(ref(db, `journeys/${journeyId}/participants/${myUserId}`));

      setJourneyActive(false);
      setJourneyId(null);
      setJourneyTitle('');
      setShareUrl('');
      setParticipants([]);
      destCoordsRef.current = null;

      const m = mapInstance.current;
      if (m) {
        Object.values(userMarkersRef.current).forEach(mk => m.removeLayer(mk));
        Object.values(userPathsRef.current).forEach(p => m.removeLayer(p));
        if (destMarkerRef.current) m.removeLayer(destMarkerRef.current);
        userMarkersRef.current = {};
        userPathsRef.current = {};
        destMarkerRef.current = null;
        m.setView([20.5937, 78.9629], 5);
      }
      notify('Journey ended.', 'success');
    } catch { notify('Failed to end journey.', 'error'); }
  }

  /* ── Share helpers ── */
  function shareWhatsApp() {
    const msg = encodeURIComponent(`Join my journey: ${journeyTitle}\n\nTrack my location in real-time: ${shareUrl}`);
    window.open(`https://wa.me/?text=${msg}`, '_blank');
  }
  function shareSMS() {
    const msg = encodeURIComponent(`Join my journey: ${journeyTitle}\n\nTrack my location: ${shareUrl}`);
    window.open(`sms:?body=${msg}`, '_blank');
  }
  function copyLink() {
    navigator.clipboard.writeText(shareUrl).then(() => notify('Link copied!', 'success')).catch(() => notify('Copy failed.', 'error'));
  }

  /* ══════════════════════════════════ RENDER ══════════════════════════════════ */
  const inputCls = 'w-full px-4 py-3 rounded-xl border-2 border-border bg-background text-foreground placeholder:text-muted focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-body';
  const errCls = 'border-red-500 bg-red-500/10';

  return (
    <div className="py-8 px-4 md:px-6 page-enter">
      <div className="max-w-[1400px] mx-auto">
        {notification && <Notification msg={notification.msg} type={notification.type} key={notification.key} onDone={() => setNotification(null)} />}

        {/* Hero */}
        <Reveal animation="fade-down">
          <section className="text-center mb-10">
            <h1 className="font-heading font-bold text-3xl md:text-5xl mb-3">
              <span className="text-shimmer">Share Your Journey in Real-Time</span>
            </h1>
            <p className="text-muted text-lg max-w-[600px] mx-auto leading-relaxed">Track locations, share experiences, and connect with your circle during concert trips and adventures.</p>
          </section>
        </Reveal>

        {/* Create Journey */}
        <Reveal animation="fade-up">
          <div className="bg-concert-card border border-concert-border rounded-2xl p-6 md:p-8 mb-6 hover-lift">
            <h2 className="font-heading font-bold text-xl text-primary mb-1 flex items-center gap-2">📍 Create a New Journey</h2>
            <p className="text-muted mb-6 text-sm">Start tracking your location and invite friends to follow your journey in real-time.</p>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
              {/* Destination */}
              <div className="relative">
                <label className="block font-semibold mb-1 text-sm">Destination</label>
                <input className={`${inputCls} ${errors.destination ? errCls : ''}`} value={destination}
                  onChange={e => { setDestination(e.target.value); setSelectedCoords(null); }}
                  onBlur={() => setTimeout(() => setSuggestions([]), 200)}
                  placeholder="City name or lat,lng (e.g. Mumbai or 19.076, 72.877)" disabled={journeyActive} />
                {errors.destination && <p className="text-red-400 text-xs mt-1">{errors.destination}</p>}
                <p className="text-muted text-xs mt-1">Enter a city name or latitude,longitude coordinates</p>
                {suggestions.length > 0 && (
                  <div className="absolute z-50 w-full mt-1 bg-concert-card border border-concert-border rounded-xl max-h-48 overflow-y-auto">
                    {suggestions.map((s, i) => (
                      <div key={i} className="px-4 py-2 cursor-pointer hover:bg-primary/20 text-sm border-b border-concert-border last:border-0"
                        onMouseDown={() => { setDestination(s.name); setSelectedCoords(s); setSuggestions([]); }}>
                        {s.name}
                      </div>
                    ))}
                  </div>
                )}
              </div>
              {/* Journey name */}
              <div>
                <label className="block font-semibold mb-1 text-sm">Journey Name</label>
                <input className={`${inputCls} ${errors.jName ? errCls : ''}`} value={jName} onChange={e => setJName(e.target.value)}
                  placeholder="Give your journey a memorable name" maxLength={50} disabled={journeyActive} />
                {errors.jName && <p className="text-red-400 text-xs mt-1">{errors.jName}</p>}
                <p className="text-muted text-xs mt-1">Something like &quot;Weekend Trip to Goa&quot;</p>
              </div>
            </div>

            {/* Your name */}
            <div className="mb-6">
              <label className="block font-semibold mb-1 text-sm">Your Name</label>
              <input className={`${inputCls} ${errors.uName ? errCls : ''}`} value={uName} onChange={e => setUName(e.target.value)}
                placeholder="Enter your name" maxLength={20} disabled={journeyActive} />
              {errors.uName && <p className="text-red-400 text-xs mt-1">{errors.uName}</p>}
              <p className="text-muted text-xs mt-1">Used to create your unique username (e.g. CC-YourName-42)</p>
            </div>

            {!journeyActive ? (
              <button onClick={handleCreate} disabled={creating}
                className="w-full py-3 rounded-xl font-bold text-white bg-gradient-to-r from-accent to-primary hover:from-primary hover:to-accent transition-all hover:-translate-y-0.5 hover:shadow-lg hover:shadow-primary/30 disabled:opacity-60 disabled:cursor-not-allowed btn-animate">
                {creating ? <span className="inline-block w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin" /> : '🚀 Start Journey'}
              </button>
            ) : (
              <button onClick={handleEnd}
                className="w-full py-3 rounded-xl font-bold text-white bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-600 transition-all btn-animate mt-2">
                🛑 End Journey
              </button>
            )}
          </div>
        </Reveal>

        {/* Join Modal */}
        {showJoinModal && (
          <div className="fixed inset-0 z-[100] bg-black/70 flex items-center justify-center modal-overlay" onClick={e => { if (e.target === e.currentTarget) { setShowJoinModal(false); } }}>
            <div className="bg-concert-card border border-concert-border rounded-2xl p-8 max-w-md w-[90%] text-center modal-content">
              <h2 className="font-heading font-bold text-xl text-primary mb-2">Join Journey</h2>
              <p className="text-muted mb-6">Enter your name to join the journey.</p>
              <div className="mb-4 text-left">
                <label className="block font-semibold mb-1 text-sm">Your Name</label>
                <input className={`${inputCls} ${errors.joinName ? errCls : ''}`} value={joinName} onChange={e => setJoinName(e.target.value)}
                  placeholder="Enter your name" maxLength={20} />
                {errors.joinName && <p className="text-red-400 text-xs mt-1">{errors.joinName}</p>}
              </div>
              <div className="flex gap-3">
                <button onClick={handleJoin}
                  className="flex-1 py-3 rounded-xl font-bold text-white bg-gradient-to-r from-accent to-primary hover:from-primary hover:to-accent transition-all btn-animate">
                  Join Now
                </button>
                <button onClick={() => { setShowJoinModal(false); window.history.replaceState({}, '', window.location.pathname); }}
                  className="px-5 py-3 rounded-xl font-semibold text-white bg-border hover:bg-border/80 transition-all">
                  Cancel
                </button>
              </div>
            </div>
          </div>
        )}

        {/* Journey Details */}
        {journeyActive && (
          <Reveal animation="fade-up">
            <div className="bg-concert-card border border-concert-border rounded-2xl p-6 md:p-8 mb-6 hover-lift">
              <h2 className="font-heading font-bold text-xl mb-4 flex items-center gap-2 flex-wrap">
                ✅ Journey Active: <span className="text-primary">{journeyTitle}</span>
                <span className="text-xs bg-success/20 text-success border border-success/30 px-2 py-0.5 rounded-full inline-flex items-center gap-1">
                  <span className="w-1.5 h-1.5 bg-success rounded-full animate-pulse" /> Live
                </span>
              </h2>

              {/* Share */}
              <div className="bg-gradient-to-br from-primary/10 to-accent/10 border border-primary/20 rounded-xl p-5 mb-6">
                <h3 className="font-semibold text-lg mb-2">🔗 Share Your Journey</h3>
                <p className="text-muted text-sm mb-3">Invite friends and family to track your location in real-time:</p>
                <div className="bg-background border border-border rounded-lg p-3 mb-4">
                  <p className="text-muted text-xs mb-1">Share this link:</p>
                  <a href={shareUrl} className="text-primary underline text-sm break-all">{shareUrl}</a>
                </div>
                <div className="flex flex-wrap gap-3">
                  <button onClick={shareWhatsApp} className="flex items-center gap-2 px-4 py-2 rounded-xl font-semibold text-white text-sm bg-gradient-to-r from-[#25D366] to-[#20b358] hover:-translate-y-0.5 hover:shadow-lg transition-all">
                    💬 WhatsApp
                  </button>
                  <button onClick={shareSMS} className="flex items-center gap-2 px-4 py-2 rounded-xl font-semibold text-white text-sm bg-gradient-to-r from-green-500 to-green-600 hover:-translate-y-0.5 hover:shadow-lg transition-all">
                    📱 SMS
                  </button>
                  <button onClick={copyLink} className="flex items-center gap-2 px-4 py-2 rounded-xl font-semibold text-white text-sm bg-border hover:bg-border/80 hover:-translate-y-0.5 transition-all">
                    📋 Copy Link
                  </button>
                </div>
              </div>

              {/* Participants */}
              <h3 className="font-semibold text-lg mb-3 flex items-center gap-2">
                👥 Journey Participants
                <span className="text-xs bg-primary text-white px-2 py-0.5 rounded-full">{participants.length}</span>
              </h3>
              {participants.length === 0 ? (
                <p className="text-muted text-center py-8 text-sm">Waiting for participants to join your journey...</p>
              ) : (
                <div className="space-y-2">
                  {participants.map((p, i) => (
                    <div key={i} className="flex items-center justify-between p-3 bg-background border border-border rounded-xl hover:border-primary/40 hover:translate-x-1 transition-all">
                      <div>
                        <strong className="text-sm">{p.userName || 'Anonymous'}</strong>
                        <div className="text-xs text-muted">
                          Last seen: {p.timestamp ? new Date(p.timestamp).toLocaleTimeString() : 'Unknown'} | ETA: {p.eta || 'Calculating...'}
                        </div>
                      </div>
                      <span className="text-xs bg-success/20 text-success border border-success/30 px-2 py-0.5 rounded-full inline-flex items-center gap-1">
                        <span className="w-1.5 h-1.5 bg-success rounded-full animate-pulse" /> Active
                      </span>
                    </div>
                  ))}
                </div>
              )}
            </div>
          </Reveal>
        )}

        {/* Map */}
        <Reveal animation="fade-up" delay={1}>
          <div className="bg-concert-card border border-concert-border rounded-2xl p-6 md:p-8 mb-6 hover-lift">
            <h3 className="font-heading font-bold text-xl text-primary mb-2 flex items-center gap-2">🗺️ Live Location Map</h3>
            <p className="text-muted text-sm mb-4">Track real-time locations of all journey participants on the interactive map below.</p>
            <div ref={mapRef} className="h-[400px] md:h-[600px] w-full rounded-xl border-2 border-border hover:border-primary transition-all shadow-lg" />
          </div>
        </Reveal>

        {/* Location Notice */}
        {showLocationNotice && (
          <Reveal animation="scale-in">
            <div className="bg-warning/10 border border-warning rounded-2xl p-6 mb-6 flex items-start gap-4">
              <span className="text-warning text-2xl shrink-0 mt-1">⚠️</span>
              <div>
                <h4 className="font-semibold text-warning mb-1">Location Permission Required</h4>
                <p className="text-muted text-sm mb-3">Please allow location access to share your position. Your location is only visible to people with the journey link.</p>
                <button onClick={() => {
                  navigator.geolocation.getCurrentPosition(() => { setShowLocationNotice(false); notify('Location access granted!', 'success'); },
                    () => notify('Location access denied.', 'error'), { enableHighAccuracy: true, timeout: 10000 });
                }} className="px-5 py-2 rounded-xl font-bold text-white bg-gradient-to-r from-accent to-primary hover:-translate-y-0.5 transition-all btn-animate text-sm">
                  Request Location Access
                </button>
              </div>
            </div>
          </Reveal>
        )}

        {/* How It Works */}
        <Reveal animation="fade-up" delay={2}>
          <div className="bg-concert-card border border-concert-border rounded-2xl p-6 md:p-8 hover-lift">
            <h3 className="font-heading font-bold text-xl text-primary mb-6 flex items-center gap-2">ℹ️ How It Works</h3>
            <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
              {[
                { icon: '➕', color: 'primary', title: '1. Create Journey', desc: 'Set your destination and give your journey a memorable name to get started.' },
                { icon: '🔗', color: 'accent', title: '2. Share Link', desc: 'Send the journey link to friends via WhatsApp, SMS, or any messaging app.' },
                { icon: '📍', color: 'primary', title: '3. Track Together', desc: 'Everyone can see real-time locations on the map and track journey progress.' },
              ].map((s, i) => (
                <Reveal key={i} animation="fade-up" delay={i + 3}>
                  <div className="text-center">
                    <div className={`w-12 h-12 bg-${s.color}/20 rounded-full flex items-center justify-center mx-auto mb-3 text-xl`}>{s.icon}</div>
                    <h4 className="font-semibold mb-1">{s.title}</h4>
                    <p className="text-muted text-sm">{s.desc}</p>
                  </div>
                </Reveal>
              ))}
            </div>
          </div>
        </Reveal>
      </div>
    </div>
  );
}
