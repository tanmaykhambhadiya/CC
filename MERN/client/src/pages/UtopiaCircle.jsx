import BookingForm from '../components/BookingForm';
import Reveal from '../components/Reveal';

export default function UtopiaCircle() {
  return (
    <div className="py-12 px-6 page-enter">
      <div className="max-w-[1400px] mx-auto">
        <Reveal animation="scale-in" duration={800}>
        <div className="relative h-[300px] md:h-[400px] rounded-2xl overflow-hidden mb-12">
          <img src="/img/p-2.jpeg" alt="Utopia Circle" className="w-full h-full object-cover" />
          <div className="absolute inset-0 bg-gradient-to-t from-background/90 to-transparent" />
          <div className="absolute bottom-8 left-8">
            <h1 className="font-heading font-black text-4xl md:text-5xl mb-2">Utopia Circle</h1>
            <p className="text-muted text-lg">📍 Travis Scott Concert - Delhi</p>
          </div>
        </div>
        </Reveal>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
          <Reveal animation="fade-left">
          <div>
            <h2 className="font-heading font-bold text-2xl mb-6 text-primary">What's Included</h2>
            <ul className="space-y-4">
              {['4-star hotel & villa stays for group', 'Airport Pick-up & Drop-off', 'Cab transfers throughout the trip', 'Private Concierge support via WhatsApp', 'Complimentary breakfast', 'Early access to merch drops with lucrative discounts'].map((f, i) => (
                <li key={i} className="flex items-start gap-3">
                  <span className="text-primary text-xl">⚡️</span>
                  <span className="text-lg">{f}</span>
                </li>
              ))}
            </ul>
            <div className="mt-8 p-6 bg-concert-card border border-concert-border rounded-2xl">
              <p className="text-muted mb-2">Starting from</p>
              <p className="font-heading font-black text-4xl text-primary">₹9,999 <span className="text-lg text-muted font-normal">per head</span></p>
              <p className="text-muted text-sm mt-2">⚡️ For group of 3+ ragers</p>
            </div>
          </div>
          </Reveal>
          <Reveal animation="fade-right" delay={2}>
          <div>
            <h2 className="font-heading font-bold text-2xl mb-6 text-primary">Book Your Experience</h2>
            <BookingForm packageType="utopia-circle" packageName="Utopia Circle" minGroup={3} />
          </div>
          </Reveal>
        </div>
      </div>
    </div>
  );
}
