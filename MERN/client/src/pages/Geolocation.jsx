export default function Geolocation() {
  return (
    <div className="py-12 px-6">
      <div className="max-w-[1400px] mx-auto">
        <h1 className="text-center font-heading font-black text-4xl mb-4">
          <span className="text-foreground">Find Concerts </span>
          <span className="text-primary">Near You</span>
        </h1>
        <p className="text-center text-muted text-lg mb-12">Discover events happening in your city</p>

        {/* Current Events */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
          {[
            { city: 'Delhi', event: 'Travis Scott Live', date: 'Coming Soon', img: '/img/p-1.jpeg', active: true },
            { city: 'Mumbai', event: 'Coming Soon', date: 'TBA', img: '/img/p-2.jpeg', active: false },
            { city: 'Bangalore', event: 'Coming Soon', date: 'TBA', img: '/img/p-3.jpeg', active: false },
          ].map((item, i) => (
            <div key={i} className={`bg-concert-card border rounded-2xl overflow-hidden ${item.active ? 'border-primary' : 'border-concert-border opacity-60'}`}>
              <div className="h-48 bg-cover bg-center" style={{ backgroundImage: `url(${item.img})` }} />
              <div className="p-6">
                <div className="flex items-center justify-between mb-2">
                  <h3 className="font-heading font-bold text-xl">📍 {item.city}</h3>
                  {item.active && <span className="bg-success text-white text-xs font-bold px-3 py-1 rounded-full">LIVE</span>}
                </div>
                <p className="text-muted mb-2">{item.event}</p>
                <p className="text-primary font-semibold">{item.date}</p>
              </div>
            </div>
          ))}
        </div>

        {/* Notify Me */}
        <div className="bg-concert-card border border-concert-border rounded-2xl p-10 text-center">
          <h2 className="font-heading font-bold text-2xl mb-4">Want to Know When Events Come to Your City?</h2>
          <p className="text-muted text-lg mb-6">Join our community and be the first to know about new concerts!</p>
          <a href="https://chat.whatsapp.com/GkdJgdvoqxm0fvZgJ7ZPa0" target="_blank" rel="noopener noreferrer"
            className="inline-block px-8 py-4 bg-primary rounded-full font-bold text-white hover:bg-primary/80 transition-all">
            Join WhatsApp Community
          </a>
        </div>
      </div>
    </div>
  );
}
