import { useState } from 'react';
import axios from 'axios';

export default function Upload() {
  const [form, setForm] = useState({ name: '', email: '', phone: '' });
  const [file, setFile] = useState(null);
  const [loading, setLoading] = useState(false);
  const [result, setResult] = useState(null);

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!file) return;
    setLoading(true);
    const formData = new FormData();
    formData.append('name', form.name);
    formData.append('email', form.email);
    formData.append('phone', form.phone);
    formData.append('ticket_photo', file);
    try {
      const res = await axios.post('/api/submissions', formData, { headers: { 'Content-Type': 'multipart/form-data' } });
      setResult(res.data);
    } catch (err) {
      setResult({ success: false, message: err.response?.data?.message || 'Upload failed' });
    }
    setLoading(false);
  };

  const inputClass = "w-full px-4 py-3 bg-background border border-border rounded-xl text-foreground placeholder:text-muted/50 focus:outline-none focus:border-primary";

  if (result?.success) {
    return (
      <div className="py-20 px-6 text-center">
        <div className="max-w-lg mx-auto">
          <h1 className="font-heading font-bold text-3xl text-success mb-4">🎫 Entry Received!</h1>
          <p className="text-muted text-lg mb-4">Your chance to get FREE Travis Scott tickets is locked!</p>
          <p className="text-muted">5 winners will be announced on Sept 25, 2025. Good luck!</p>
        </div>
      </div>
    );
  }

  return (
    <div className="py-12 px-6">
      <div className="max-w-2xl mx-auto">
        <h1 className="font-heading font-black text-4xl text-center mb-4">
          <span className="text-foreground">Win FREE </span>
          <span className="text-primary">Tickets!</span>
        </h1>
        <p className="text-center text-muted text-lg mb-2">Going to Travis Scott Concert?</p>
        <p className="text-center text-muted mb-10">Upload your ticket → Be 1 of 5 fans who get their ticket <strong className="text-foreground">100% refunded!</strong></p>

        <form onSubmit={handleSubmit} className="space-y-4">
          <input name="name" placeholder="Full Name *" value={form.name} onChange={(e) => setForm({ ...form, name: e.target.value })} className={inputClass} required />
          <input name="email" type="email" placeholder="Email *" value={form.email} onChange={(e) => setForm({ ...form, email: e.target.value })} className={inputClass} required />
          <input name="phone" type="tel" placeholder="Phone *" value={form.phone} onChange={(e) => setForm({ ...form, phone: e.target.value })} className={inputClass} required />
          <div className="border-2 border-dashed border-border rounded-xl p-8 text-center hover:border-primary transition-colors">
            <input type="file" accept="image/*" onChange={(e) => setFile(e.target.files[0])} className="hidden" id="fileInput" required />
            <label htmlFor="fileInput" className="cursor-pointer">
              <div className="text-4xl mb-3">📸</div>
              <p className="text-muted">{file ? file.name : 'Click to upload your ticket photo'}</p>
              <p className="text-muted text-sm mt-1">JPG, PNG, GIF (max 5MB)</p>
            </label>
          </div>
          <button type="submit" disabled={loading}
            className="w-full py-4 bg-primary rounded-xl font-bold text-white text-lg hover:bg-primary/80 transition-all disabled:opacity-50">
            {loading ? 'Uploading...' : 'Submit My Entry'}
          </button>
          {result?.message && !result.success && <p className="text-red-500 text-center">{result.message}</p>}
        </form>

        <div className="mt-10 text-center text-muted text-sm">
          <p>5 winners announced Sept 25, 2025</p>
          <p>Terms & conditions apply</p>
        </div>
      </div>
    </div>
  );
}
