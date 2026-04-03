import { Link } from 'react-router-dom';
import BookingForm from '../components/BookingForm';

export default function TravisDetails() {
  return (
    <div className="py-12 px-6">
      <div className="max-w-[1400px] mx-auto">
        <div className="text-center mb-12">
          <h1 className="font-heading font-black text-4xl md:text-5xl mb-4">
            <span className="text-foreground">Travis Scott </span>
            <span className="text-primary">Delhi Concert</span>
          </h1>
          <p className="text-muted text-lg max-w-2xl mx-auto">
            Choose your experience package and let Concert Circle handle everything — flights, stays, transfers, and vibes.
          </p>
        </div>

        {/* Quick Package Comparison */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
          {[
            { name: 'Ride to the Rage', price: '₹7,499', note: 'Solo / Budget', link: '/ride-to-the-rage', features: ['3-Star Hotel', 'Airport transfers', 'Breakfast', 'Experience Manager'] },
            { name: 'Utopia Circle', price: '₹9,999', note: 'Group of 3+', link: '/utopia-circle', popular: true, features: ['4-Star Hotel/Villa', 'All transfers', 'WhatsApp Concierge', 'Breakfast + Merch access'] },
            { name: 'Astro Deluxe Drop', price: '₹19,999', note: 'Premium', link: '/astro-deluxe-drop', features: ['5-Star Luxury', 'Private transfers', 'Exclusive merch', 'Breakfast + 2 Experiences'] },
          ].map((pkg) => (
            <div key={pkg.name} className={`bg-concert-card border rounded-2xl p-8 text-center relative ${pkg.popular ? 'border-primary scale-105' : 'border-concert-border'}`}>
              {pkg.popular && <span className="absolute -top-3 left-1/2 -translate-x-1/2 bg-primary text-white text-xs font-bold px-4 py-1 rounded-full">MOST POPULAR</span>}
              <h3 className="font-heading font-bold text-xl mb-2">{pkg.name}</h3>
              <p className="text-muted text-sm mb-4">{pkg.note}</p>
              <p className="font-heading font-black text-3xl text-primary mb-6">{pkg.price}<span className="text-sm text-muted font-normal">/head</span></p>
              <ul className="text-left space-y-2 text-sm text-muted mb-6">
                {pkg.features.map((f, i) => <li key={i}>✅ {f}</li>)}
              </ul>
              <Link to={pkg.link} className="block w-full py-3 bg-primary rounded-xl font-bold text-white hover:bg-primary/80 transition-all">Book Now</Link>
            </div>
          ))}
        </div>

        {/* Contact / Booking */}
        <div className="bg-concert-card border border-concert-border rounded-2xl p-10 text-center">
          <h2 className="font-heading font-bold text-3xl mb-4">Need Help Choosing?</h2>
          <p className="text-muted text-lg mb-6">Book a call with our team and we'll help you pick the perfect package.</p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:+911234567890" className="px-8 py-4 bg-primary rounded-full font-bold text-white hover:bg-primary/80 transition-all">Call Us Now</a>
            <a href="https://chat.whatsapp.com/GkdJgdvoqxm0fvZgJ7ZPa0" target="_blank" rel="noopener noreferrer"
              className="px-8 py-4 border border-primary rounded-full font-bold text-primary hover:bg-primary/10 transition-all">
              WhatsApp Us
            </a>
          </div>
        </div>
      </div>
    </div>
  );
}
