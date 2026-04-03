import { Link } from 'react-router-dom';
import Reveal from '../components/Reveal';

const packages = [
  {
    id: 'ride-to-the-rage', title: 'Ride to the Rage', img: '/img/p-1.jpeg',
    desc: 'Travis Scott Concert - Delhi', note: 'For solo or budget fans', emoji: '✅',
    features: ['3-Star Hotel & Home stays', 'Airport Pick up & drop', 'Complimentary Breakfast', 'Experience Manager Assistance'],
    price: '₹7,499 per head', link: '/ride-to-the-rage',
  },
  {
    id: 'utopia-circle', title: 'Utopia Circle', img: '/img/p-2.jpeg',
    desc: 'Travis Scott Concert - Delhi', note: 'For group of 3+ ragers', emoji: '⚡️',
    features: ['4-star hotel & villa stays for group', 'Airport Pick-up & Drop-off', 'Cab transfers throughout the trip', 'Private Concierge support via WhatsApp', 'Complimentary breakfast', 'Early access to merch drops with lucrative discounts'],
    price: '₹9,999 per head', link: '/utopia-circle',
  },
  {
    id: 'astro-deluxe', title: 'Astro Deluxe Drop', img: '/img/p-3.jpeg',
    desc: 'Travis Scott Concert - Delhi', note: 'Tailored for the top tier', emoji: '⭐',
    features: ['4.5–5 star luxury hotel or villa stay', 'Private airport pick-up & drop-off', 'Curated Local Experience', 'All cab transfers throughout the stay', 'Exclusive pre-launch Travis Scott merch drops', 'Complimentary breakfast', '+2 Experiences'],
    price: '₹19,999 per head', link: '/astro-deluxe-drop',
  },
];

export default function Packages() {
  return (
    <div className="py-12 px-6 page-enter">
      <div className="max-w-[1400px] mx-auto">
        <Reveal animation="fade-down">
          <h1 className="text-center font-heading font-black text-4xl mb-4">
            <span className="text-foreground">Concert </span>
            <span className="text-shimmer">Packages</span>
          </h1>
          <p className="text-center text-muted text-lg mb-12">Choose your perfect concert experience package</p>
        </Reveal>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {packages.map((pkg, idx) => (
            <Reveal key={pkg.id} animation="fade-up" delay={idx + 1} duration={600}>
            <div className="bg-concert-card border border-concert-border rounded-2xl overflow-hidden hover-lift hover-glow">
              <div className="h-56 bg-cover bg-center transition-transform duration-500 hover:scale-105 overflow-hidden" style={{ backgroundImage: `url(${pkg.img})` }} />
              <div className="p-6">
                <h3 className="font-heading font-bold text-2xl mb-2">{pkg.title}</h3>
                <p className="text-muted mb-2">📍 {pkg.desc}</p>
                <div className="text-primary font-semibold mb-4">{pkg.emoji} {pkg.note}</div>
                <ul className="space-y-2 text-sm text-muted mb-6">
                  {pkg.features.map((f, i) => <li key={i}>• {f}</li>)}
                </ul>
                <p className="text-right text-primary font-bold text-lg mb-4">Starting {pkg.price}</p>
                <div className="flex flex-col gap-3">
                  <Link to={pkg.link} className="block text-center py-3 bg-primary rounded-xl font-bold text-white btn-animate">Book Now</Link>
                  <a href="tel:+911234567890" className="block text-center py-3 border border-primary rounded-xl font-bold text-primary hover:bg-primary/10 transition-all">Call Now</a>
                </div>
              </div>
            </div>
            </Reveal>
          ))}
        </div>
      </div>
    </div>
  );
}
