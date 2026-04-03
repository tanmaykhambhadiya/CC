import { useState } from 'react';
import axios from 'axios';

export default function BookingForm({ packageType, packageName, minGroup = 1, maxGroup = 99 }) {
  const [form, setForm] = useState({
    firstName: '', lastName: '', email: '', phone: '',
    sourceDestination: '', groupSize: minGroup, stayDuration: 1,
    tripType: '', travelType: '', cityPlaces: '',
    additionalRequirements: '', discountCode: '',
  });
  const [loading, setLoading] = useState(false);
  const [result, setResult] = useState(null);

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    try {
      const res = await axios.post('/api/bookings', { ...form, packageType });
      setResult(res.data);
    } catch (err) {
      setResult({ success: false, message: err.response?.data?.message || 'Booking failed' });
    }
    setLoading(false);
  };

  if (result?.success) {
    return (
      <div className="text-center py-12">
        <h2 className="font-heading font-bold text-3xl text-success mb-4">🎶 Booking Confirmed!</h2>
        <p className="text-muted text-lg">Your {packageName} booking is confirmed. We'll contact you within 24 hours.</p>
      </div>
    );
  }

  const inputClass = "w-full px-4 py-3 bg-background border border-border rounded-xl text-foreground placeholder:text-muted/50 focus:outline-none focus:border-primary";

  return (
    <form onSubmit={handleSubmit} className="max-w-2xl mx-auto space-y-4">
      <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input name="firstName" placeholder="First Name *" value={form.firstName} onChange={handleChange} className={inputClass} required />
        <input name="lastName" placeholder="Last Name *" value={form.lastName} onChange={handleChange} className={inputClass} required />
      </div>
      <input name="email" type="email" placeholder="Email *" value={form.email} onChange={handleChange} className={inputClass} required />
      <input name="phone" type="tel" placeholder="Phone *" value={form.phone} onChange={handleChange} className={inputClass} required />
      <input name="sourceDestination" placeholder="Traveling from (City) *" value={form.sourceDestination} onChange={handleChange} className={inputClass} required />
      <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label className="text-muted text-sm mb-1 block">Group Size *</label>
          <input name="groupSize" type="number" min={minGroup} max={maxGroup} value={form.groupSize} onChange={handleChange} className={inputClass} required />
        </div>
        <div>
          <label className="text-muted text-sm mb-1 block">Stay Duration (nights) *</label>
          <input name="stayDuration" type="number" min="1" value={form.stayDuration} onChange={handleChange} className={inputClass} required />
        </div>
      </div>
      <select name="tripType" value={form.tripType} onChange={handleChange} className={inputClass} required>
        <option value="">Trip Type *</option>
        <option value="one-way">One Way</option>
        <option value="round-trip">Round Trip</option>
      </select>
      <select name="travelType" value={form.travelType} onChange={handleChange} className={inputClass}>
        <option value="">Travel Mode (optional)</option>
        <option value="flight">Flight</option>
        <option value="train">Train</option>
        <option value="bus">Bus</option>
        <option value="self-drive">Self Drive</option>
      </select>
      <input name="cityPlaces" placeholder="Places you want to visit in city (optional)" value={form.cityPlaces} onChange={handleChange} className={inputClass} />
      <textarea name="additionalRequirements" placeholder="Additional requirements (optional)" value={form.additionalRequirements} onChange={handleChange} className={inputClass + " min-h-[100px]"} />
      <input name="discountCode" placeholder="Discount Code (optional)" value={form.discountCode} onChange={handleChange} className={inputClass} />

      <button type="submit" disabled={loading}
        className="w-full py-4 bg-primary rounded-xl font-bold text-white text-lg hover:bg-primary/80 transition-all disabled:opacity-50">
        {loading ? 'Booking...' : `Book ${packageName}`}
      </button>
      {result?.message && !result.success && <p className="text-red-500 text-center">{result.message}</p>}
    </form>
  );
}
