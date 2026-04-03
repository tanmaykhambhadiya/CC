import { useState } from 'react';
import axios from 'axios';

export default function DiscountPopup({ onClose }) {
  const [form, setForm] = useState({ name: '', email: '', phone: '' });
  const [loading, setLoading] = useState(false);
  const [result, setResult] = useState(null);

  const handleSubmit = async () => {
    if (!form.name || !form.email || !form.phone) return;
    setLoading(true);
    try {
      const res = await axios.post('/api/users/discount', form);
      setResult(res.data);
    } catch {
      setResult({ success: false, message: 'Something went wrong' });
    }
    setLoading(false);
  };

  return (
    <>
      <div className="fixed inset-0 bg-black/60 z-50 modal-overlay" onClick={onClose} />
      <div className="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-concert-card border border-concert-border rounded-2xl p-8 w-[90%] max-w-md modal-content">
        <button onClick={onClose} className="absolute top-3 right-3 text-muted hover:text-foreground text-xl">✕</button>

        {result?.success ? (
          <div className="text-center">
            <h2 className="font-heading font-bold text-xl mb-4 text-success">Code Generated!</h2>
            <p className="text-2xl font-bold text-primary mb-4">🎟️ {result.discountCode}</p>
            <p className="text-muted text-sm">Valid for 24 hours • Groups of 3+ • ₹3000 OFF</p>
          </div>
        ) : (
          <>
            <h2 className="font-heading font-bold text-xl mb-2">Save ₹3000 When You Come as a Group!</h2>
            <p className="text-muted text-sm mb-1">Bring 3+ friends and unlock up to ₹3000 OFF your concert package.</p>
            <p className="text-muted text-sm mb-4">Enter your details to grab your code:</p>
            <div className="flex flex-col gap-3 mb-4">
              <input type="text" placeholder="Full Name ✨" value={form.name} onChange={(e) => setForm({ ...form, name: e.target.value })}
                className="w-full px-4 py-3 bg-background border border-border rounded-xl text-foreground placeholder:text-muted/50 focus:outline-none focus:border-primary" />
              <input type="email" placeholder="Email 📧" value={form.email} onChange={(e) => setForm({ ...form, email: e.target.value })}
                className="w-full px-4 py-3 bg-background border border-border rounded-xl text-foreground placeholder:text-muted/50 focus:outline-none focus:border-primary" />
              <input type="tel" placeholder="Phone 📱" value={form.phone} onChange={(e) => setForm({ ...form, phone: e.target.value })}
                className="w-full px-4 py-3 bg-background border border-border rounded-xl text-foreground placeholder:text-muted/50 focus:outline-none focus:border-primary" />
            </div>
            <p className="text-warning text-sm text-center mb-4">Only 20 Codes Available – Don't Miss Out!</p>
            <button onClick={handleSubmit} disabled={loading}
              className="w-full py-3 bg-primary rounded-xl font-bold text-white btn-animate disabled:opacity-50">
              {loading ? 'Generating...' : "I'm In - Send Me The Code"}
            </button>
            {result?.message && <p className="text-red-500 text-sm text-center mt-2">{result.message}</p>}
          </>
        )}
      </div>
    </>
  );
}
