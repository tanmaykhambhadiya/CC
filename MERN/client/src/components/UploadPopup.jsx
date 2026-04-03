import { useState } from 'react';
import axios from 'axios';

export default function UploadPopup({ onClose }) {
  const [form, setForm] = useState({ name: '', email: '', phone: '' });
  const [file, setFile] = useState(null);
  const [loading, setLoading] = useState(false);
  const [result, setResult] = useState(null);

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!form.name || !form.email || !form.phone || !file) return;
    setLoading(true);
    const formData = new FormData();
    formData.append('name', form.name);
    formData.append('email', form.email);
    formData.append('phone', form.phone);
    formData.append('ticket_photo', file);
    try {
      const res = await axios.post('/api/submissions', formData, { headers: { 'Content-Type': 'multipart/form-data' } });
      setResult(res.data);
    } catch {
      setResult({ success: false, message: 'Upload failed' });
    }
    setLoading(false);
  };

  return (
    <>
      <div className="fixed inset-0 bg-black/60 z-50" onClick={onClose} />
      <div className="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-concert-card border border-concert-border rounded-2xl p-8 w-[90%] max-w-md">
        <button onClick={onClose} className="absolute top-3 right-3 text-muted hover:text-foreground text-xl">✕</button>

        {result?.success ? (
          <div className="text-center">
            <h2 className="font-heading font-bold text-xl mb-4 text-success">Submission Received!</h2>
            <p className="text-muted">5 winners announced Sept 25, 2025. Good luck!</p>
          </div>
        ) : (
          <>
            <h2 className="font-heading font-bold text-xl mb-2">Going to Travis Scott Concert?</h2>
            <p className="text-muted text-sm mb-4">Upload your ticket → To be 1 of 5 fans who get their ticket <strong>100% refunded!</strong></p>
            <form onSubmit={handleSubmit} className="flex flex-col gap-3">
              <input type="text" placeholder="Full Name ✨" value={form.name} onChange={(e) => setForm({ ...form, name: e.target.value })}
                className="w-full px-4 py-3 bg-background border border-border rounded-xl text-foreground placeholder:text-muted/50 focus:outline-none focus:border-primary" required />
              <input type="email" placeholder="Email 📧" value={form.email} onChange={(e) => setForm({ ...form, email: e.target.value })}
                className="w-full px-4 py-3 bg-background border border-border rounded-xl text-foreground placeholder:text-muted/50 focus:outline-none focus:border-primary" required />
              <input type="tel" placeholder="Phone 📱" value={form.phone} onChange={(e) => setForm({ ...form, phone: e.target.value })}
                className="w-full px-4 py-3 bg-background border border-border rounded-xl text-foreground placeholder:text-muted/50 focus:outline-none focus:border-primary" required />
              <input type="file" accept="image/*" onChange={(e) => setFile(e.target.files[0])}
                className="text-muted text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-white file:font-semibold" required />
              <button type="submit" disabled={loading}
                className="w-full py-3 bg-primary rounded-xl font-bold text-white hover:bg-primary/80 transition-all disabled:opacity-50 mt-2">
                {loading ? 'Uploading...' : 'Submit Ticket'}
              </button>
              {result?.message && <p className="text-red-500 text-sm text-center">{result.message}</p>}
            </form>
          </>
        )}
      </div>
    </>
  );
}
