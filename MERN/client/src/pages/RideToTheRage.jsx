import BookingForm from '../components/BookingForm';

export default function RideToTheRage() {
  return (
    <div className="py-12 px-6">
      <div className="max-w-[1400px] mx-auto">
        {/* Hero */}
        <div className="relative h-[300px] md:h-[400px] rounded-2xl overflow-hidden mb-12">
          <img src="/img/p-1.jpeg" alt="Ride to the Rage" className="w-full h-full object-cover" />
          <div className="absolute inset-0 bg-gradient-to-t from-background/90 to-transparent" />
          <div className="absolute bottom-8 left-8">
            <h1 className="font-heading font-black text-4xl md:text-5xl mb-2">Ride to the Rage</h1>
            <p className="text-muted text-lg">📍 Travis Scott Concert - Delhi</p>
          </div>
        </div>

        {/* Details */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
          <div>
            <h2 className="font-heading font-bold text-2xl mb-6 text-primary">What's Included</h2>
            <ul className="space-y-4">
              {['3-Star Hotel & Home stays', 'Airport Pick up & drop', 'Complimentary Breakfast', 'Experience Manager Assistance'].map((f, i) => (
                <li key={i} className="flex items-start gap-3">
                  <span className="text-primary text-xl">✅</span>
                  <span className="text-lg">{f}</span>
                </li>
              ))}
            </ul>
            <div className="mt-8 p-6 bg-concert-card border border-concert-border rounded-2xl">
              <p className="text-muted mb-2">Starting from</p>
              <p className="font-heading font-black text-4xl text-primary">₹7,499 <span className="text-lg text-muted font-normal">per head</span></p>
              <p className="text-muted text-sm mt-2">✅ For solo or budget fans</p>
            </div>
          </div>
          <div>
            <h2 className="font-heading font-bold text-2xl mb-6 text-primary">Book Your Experience</h2>
            <BookingForm packageType="fly-to-the-rage" packageName="Ride to the Rage" minGroup={1} maxGroup={1} />
          </div>
        </div>
      </div>
    </div>
  );
}
