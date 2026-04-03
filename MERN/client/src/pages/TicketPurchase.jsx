import { useState } from 'react';
import axios from 'axios';
import Reveal from '../components/Reveal';

export default function TicketPurchase() {
  const [form, setForm] = useState({
    ticketType: '', fullName: '', email: '', phone: '', concertPlace: '', quantity: 1,
  });
  const [loading, setLoading] = useState(false);
  const [result, setResult] = useState(null);

  const handleChange = (e) => setForm({ ...form, [e.target.name]: e.target.value });

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    try {
      const res = await axios.post('/api/tickets', form);
      setResult(res.data);
    } catch (err) {
      setResult({ success: false, message: err.response?.data?.message || 'Submission failed' });
    }
    setLoading(false);
  };

  const inputClass = "w-full px-4 py-3 bg-background border border-border rounded-xl text-foreground placeholder:text-muted/50 focus:outline-none focus:border-primary";

  if (result?.success) {
    return (
      <div className="py-20 px-6 text-center">
        <div className="max-w-lg mx-auto">
          <h1 className="font-heading font-bold text-3xl text-success mb-4">🎫 Your Pass is Locked In!</h1>
          <p className="text-muted text-lg">Our team will contact you within 24 hours with ticket details and pricing.</p>
        </div>
      </div>
    );
  }

  return (
    <div className="py-12 px-6 page-enter">
      <div className="max-w-2xl mx-auto">
        <Reveal animation="fade-down">
        <h1 className="font-heading font-black text-4xl text-center mb-4">
          <span className="text-foreground">Get Your </span>
          <span className="text-shimmer">Tickets</span>
        </h1>
        <p className="text-center text-muted text-lg mb-10">Fill in your details and we'll get back to you within 24 hours</p>
        </Reveal>

        <Reveal animation="fade-up" delay={1}>

        <form onSubmit={handleSubmit} className="space-y-4">
          <select name="ticketType" value={form.ticketType} onChange={handleChange} className={inputClass} required>
            <option value="">Select Ticket Type *</option>
            <option value="general">General Admission</option>
            <option value="vip">VIP</option>
            <option value="premium">Premium</option>
            <option value="backstage">Backstage Pass</option>
          </select>
          <input name="fullName" placeholder="Full Name *" value={form.fullName} onChange={handleChange} className={inputClass} required />
          <input name="email" type="email" placeholder="Email *" value={form.email} onChange={handleChange} className={inputClass} required />
          <input name="phone" type="tel" placeholder="Phone *" value={form.phone} onChange={handleChange} className={inputClass} required />
          <input name="concertPlace" placeholder="Concert Venue / City *" value={form.concertPlace} onChange={handleChange} className={inputClass} required />
          <div>
            <label className="text-muted text-sm mb-1 block">Number of Tickets *</label>
            <input name="quantity" type="number" min="1" value={form.quantity} onChange={handleChange} className={inputClass} required />
          </div>
          <button type="submit" disabled={loading}
            className="w-full py-4 bg-primary rounded-xl font-bold text-white text-lg btn-animate disabled:opacity-50">
            {loading ? 'Submitting...' : 'Get My Tickets'}
          </button>
          {result?.message && !result.success && <p className="text-red-500 text-center">{result.message}</p>}
        </form>
        </Reveal>
      </div>
    </div>
  );
}
