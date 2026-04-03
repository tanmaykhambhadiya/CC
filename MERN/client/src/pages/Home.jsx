import { useState, useEffect, useCallback } from 'react';
import { Link } from 'react-router-dom';
import Reveal from '../components/Reveal';
import CountUp from '../components/CountUp';
import DiscountPopup from '../components/DiscountPopup';
import UploadPopup from '../components/UploadPopup';

const heroSlides = [
  { img: '/img/h-1.png', title: 'Experience Live Events', highlight: 'Like Never Before', subtitle: 'Stop using 10 different apps for your concert plan — we handle it all in one place.' },
  { img: '/img/h-2.png', title: 'Discover the', highlight: 'Hottest Concerts', subtitle: 'Find epic concert nights that hit harder & last longer' },
  { img: '/img/h-3.png', title: 'Flights & Stay?', highlight: 'Already Locked', subtitle: "Touch down, check in, and time to rage, we've booked everything." },
  { img: '/img/h-4.png', title: 'Cabs & City Vibes?', highlight: 'Sorted', subtitle: "Your rides are ready, and the city's best spots are already scouted." },
  { img: '/img/h-5.jpg', title: 'Find', highlight: 'Your Circle', subtitle: 'Circle up with your tribe, plan concert nights & be part of electrifying community' },
  { img: '/img/h-6.png', title: 'All In One Circle', highlight: '', subtitle: 'Still planning across 10 apps? 50 others aren\'t.' },
];

const packages = [
  {
    id: 'ride-to-the-rage', title: 'Ride to the Rage', img: '/img/p-1.jpeg',
    desc: 'Travis Scott Concert - Delhi', note: 'For solo or budget fans',
    features: ['3-Star Hotel & Home stays', 'Airport Pick up & drop', 'Complimentary Breakfast', 'Experience Manager Assistance'],
    price: '₹7,499 per head', link: '/ride-to-the-rage',
  },
  {
    id: 'utopia-circle', title: 'Utopia Circle', img: '/img/p-2.jpeg',
    desc: 'Travis Scott Concert - Delhi', note: 'For group of 3+ ragers',
    features: ['4-star hotel & villa stays for group', 'Airport Pick-up & Drop-off', 'Cab transfers throughout the trip', 'Private Concierge support via WhatsApp', 'Complimentary breakfast', 'Early access to merch drops with lucrative discounts'],
    price: '₹9,999 per head', link: '/utopia-circle',
  },
  {
    id: 'astro-deluxe', title: 'Astro Deluxe Drop', img: '/img/p-3.jpeg',
    desc: 'Travis Scott Concert - Delhi', note: 'Tailored for the top tier',
    features: ['4.5–5 star luxury hotel or villa stay', 'Private airport pick-up & drop-off', 'Curated Local Experience', 'All cab transfers throughout the stay', 'Exclusive pre-launch Travis Scott merch drops', 'Complimentary breakfast', '+2 Experiences'],
    price: '₹19,999 per head', link: '/astro-deluxe-drop',
  },
];

const stats = [
  { value: 50, suffix: '+', label: 'Curated Packages Ready to Roll' },
  { value: 1, suffix: 'K+', label: 'Fans in Our Circle Community' },
  { value: 25, suffix: '+', label: 'Cities Plugged into the Experience' },
  { value: 98, suffix: '%', label: 'Pre-launch User Interest & Positive Feedback' },
];

const blogs = [
  { id: 1, img: '/img/b-1.png', title: 'How to Plan Your Epic Travis Scott Concert Trip in Delhi', desc: 'Your zero-stress guide to the ultimate concert experience' },
  { id: 2, img: '/img/b-2.jpg', title: "5 Tips Before Going to a Concert (So You Don't Regret It Later)", desc: 'Avoid common concert pitfalls with these practical tips' },
  { id: 3, img: '/img/b-3.jpg', title: "We Asked 5 People: What's Your Top Concert Red Flag?", desc: 'With whom do you agree the most?' },
];

export default function Home() {
  const [currentSlide, setCurrentSlide] = useState(0);
  const [flippedCard, setFlippedCard] = useState(null);
  const [showDiscount, setShowDiscount] = useState(false);
  const [showUpload, setShowUpload] = useState(false);

  const nextSlide = useCallback(() => {
    setCurrentSlide((prev) => (prev + 1) % heroSlides.length);
  }, []);

  useEffect(() => {
    const timer = setInterval(nextSlide, 3000);
    return () => clearInterval(timer);
  }, [nextSlide]);

  useEffect(() => {
    const timer = setTimeout(() => setShowDiscount(true), 5000);
    return () => clearTimeout(timer);
  }, []);

  return (
    <div className="page-enter">
      {/* Hero Carousel */}
      <section className="py-12 px-6">
        <div className="max-w-[1400px] mx-auto">
          <Reveal animation="scale-in" duration={800}>
            <div className="relative w-full h-[500px] md:h-[600px] overflow-hidden rounded-2xl shadow-2xl">
              {heroSlides.map((slide, i) => (
                <div key={i} className={`absolute inset-0 transition-all duration-1000 ease-out ${i === currentSlide ? 'opacity-100 scale-100' : 'opacity-0 scale-105'}`}>
                  <img src={slide.img} alt={slide.title} className="w-full h-full object-cover" loading="lazy" />
                  <div className="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent" />
                  <div className={`absolute bottom-16 left-8 right-8 z-10 transition-all duration-700 ${i === currentSlide ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`}
                    style={{ transitionDelay: i === currentSlide ? '300ms' : '0ms' }}>
                    <h2 className="font-heading font-black text-3xl md:text-5xl leading-tight mb-4">
                      <span className="text-foreground">{slide.title} </span>
                      {slide.highlight && <span className="text-shimmer">{slide.highlight}</span>}
                    </h2>
                    <p className="text-muted text-lg md:text-xl max-w-[700px]">{slide.subtitle}</p>
                    {i === heroSlides.length - 1 && (
                      <a href="#packages" className="inline-block mt-4 px-8 py-3 bg-primary rounded-full font-bold text-white btn-animate">
                        Explore Packages
                      </a>
                    )}
                  </div>
                </div>
              ))}
              {/* Indicators */}
              <div className="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-20">
                {heroSlides.map((_, i) => (
                  <button key={i} onClick={() => setCurrentSlide(i)}
                    className={`h-3 rounded-full transition-all duration-500 ${i === currentSlide ? 'bg-primary w-8' : 'bg-muted/50 w-3'}`} />
                ))}
              </div>
            </div>
          </Reveal>
        </div>
      </section>

      {/* Packages Section */}
      <section id="packages" className="py-12 px-6">
        <div className="max-w-[1400px] mx-auto">
          <Reveal animation="fade-up">
            <h2 className="text-center font-heading font-black text-3xl md:text-4xl mb-12">
              <span className="text-foreground">Your Concert Experience </span>
              <span className="text-shimmer">~ Curated</span>
            </h2>
          </Reveal>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {packages.map((pkg, idx) => (
              <Reveal key={pkg.id} animation="fade-up" delay={idx + 1} duration={600}>
                <div
                  className="group cursor-pointer perspective-[1000px]"
                  onClick={() => setFlippedCard(flippedCard === pkg.id ? null : pkg.id)}
                >
                  <div className={`relative w-full h-[450px] transition-transform duration-700 transform-3d ${flippedCard === pkg.id ? '[transform:rotateY(180deg)]' : ''}`}
                    style={{ transformStyle: 'preserve-3d' }}>
                    {/* Front */}
                    <div className="absolute inset-0 rounded-2xl overflow-hidden bg-concert-card border border-concert-border hover-lift hover-glow backface-hidden"
                      style={{ backfaceVisibility: 'hidden' }}>
                      <div className="h-56 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" style={{ backgroundImage: `url(${pkg.img})` }} />
                      <div className="p-6">
                        <h3 className="font-heading font-bold text-xl mb-2">{pkg.title}</h3>
                        <p className="text-muted mb-2">📍 {pkg.desc}</p>
                        <div className="text-primary font-semibold">✅ {pkg.note}</div>
                        <p className="text-muted text-xs mt-3 opacity-60">Tap to see details →</p>
                      </div>
                    </div>
                    {/* Back */}
                    <div className="absolute inset-0 rounded-2xl overflow-hidden bg-concert-card border border-concert-border p-6 flex flex-col justify-between [transform:rotateY(180deg)]"
                      style={{ backfaceVisibility: 'hidden' }}>
                      <div>
                        <h3 className="font-heading font-bold text-xl mb-3">{pkg.title}</h3>
                        <hr className="border-dashed border-border mb-4" />
                        <ul className="space-y-2 text-sm text-muted">
                          {pkg.features.map((f, i) => <li key={i}>• {f}</li>)}
                        </ul>
                      </div>
                      <div>
                        <p className="text-right text-primary font-bold mb-3">Starting {pkg.price}</p>
                        <div className="flex flex-col gap-3">
                          <Link to={pkg.link} className="block text-center py-3 bg-primary rounded-xl font-bold text-white btn-animate">Book Now</Link>
                          <a href="tel:+911234567890" className="block text-center py-3 border border-primary rounded-xl font-bold text-primary hover:bg-primary/10 transition-all">Call Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </Reveal>
            ))}
          </div>
        </div>
      </section>

      {/* Stats */}
      <section className="py-16 px-6">
        <div className="max-w-[1400px] mx-auto text-center">
          <Reveal animation="fade-up">
            <h2 className="font-heading font-black text-3xl md:text-4xl mb-3">The Hype Is Real. The Numbers Prove It</h2>
            <p className="text-muted text-lg mb-12">Join thousands ready to transform their concert experience with Concert Circle.</p>
          </Reveal>
          <div className="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
            {stats.map((stat, i) => (
              <Reveal key={i} animation="pop-in" delay={i + 1} duration={500}>
                <div className="bg-concert-card border border-concert-border rounded-2xl p-8 hover-lift hover-glow">
                  <div className="text-4xl font-heading font-black text-primary mb-2">
                    <CountUp end={stat.value} suffix={stat.suffix} />
                  </div>
                  <div className="text-muted text-sm">{stat.label}</div>
                </div>
              </Reveal>
            ))}
          </div>
          <Reveal animation="fade-up" delay={5}>
            <Link to="/travis-details" className="inline-block px-10 py-4 bg-primary rounded-full font-bold text-white text-lg btn-animate glow-border">
              Book a Call
            </Link>
            <p className="text-muted mt-4">Ready to plan your next epic concert experience? Let's talk!</p>
          </Reveal>
        </div>
      </section>

      {/* Community */}
      <section className="py-12 px-6">
        <div className="max-w-[1400px] mx-auto">
          <Reveal animation="scale-in" duration={600}>
            <div className="bg-concert-card border border-concert-border rounded-2xl p-10 text-center glow-border">
              <h2 className="font-heading font-bold text-3xl mb-4">Concert Circle Community</h2>
              <p className="text-muted text-lg mb-2">Circle up with your tribe, plan concert nights & be part of electrifying community</p>
              <p className="text-foreground mb-6">Join 1K+ Concert Enthusiasts</p>
              <a href="https://chat.whatsapp.com/GkdJgdvoqxm0fvZgJ7ZPa0" target="_blank" rel="noopener noreferrer"
                className="inline-flex items-center gap-2 px-8 py-4 bg-success rounded-full font-bold text-white text-lg btn-animate">
                🔘 Join Community
              </a>
            </div>
          </Reveal>
        </div>
      </section>

      {/* Blogs */}
      <section className="py-12 px-6">
        <div className="max-w-[1400px] mx-auto">
          <Reveal animation="fade-up">
            <h2 className="text-center font-heading font-bold text-3xl mb-10">Explore Concert Circle Blogs!</h2>
          </Reveal>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {blogs.map((blog, idx) => (
              <Reveal key={blog.id} animation="fade-up" delay={idx + 1} duration={600}>
                <div className="bg-concert-card border border-concert-border rounded-2xl overflow-hidden hover-lift hover-glow">
                  <div className="h-48 bg-cover bg-center transition-transform duration-500 hover:scale-105 overflow-hidden" style={{ backgroundImage: `url(${blog.img})` }} />
                  <div className="p-6">
                    <h3 className="font-heading font-bold text-lg mb-2">{blog.title}</h3>
                    <p className="text-muted text-sm mb-4">{blog.desc}</p>
                    <Link to={`/blog/${blog.id}`} className="text-primary font-semibold hover:underline">Read More</Link>
                  </div>
                </div>
              </Reveal>
            ))}
          </div>
          <Reveal animation="fade-up" delay={4}>
            <div className="text-center mt-8">
              <Link to="/blogs" className="inline-block px-8 py-3 border border-primary rounded-full font-bold text-primary hover:bg-primary/10 transition-all btn-animate">
                News, Hacks and Wildest Concert Stories
              </Link>
            </div>
          </Reveal>
        </div>
      </section>

      {/* Tagline */}
      <section className="py-16 px-6">
        <div className="max-w-[1400px] mx-auto text-center">
          <Reveal animation="scale-in" duration={800}>
            <h2 className="font-heading font-black text-3xl md:text-4xl">
              Concert going experience made
              <br />
              <span className="text-shimmer">convenient</span>
              <span className="text-red-500 mx-2">♥</span>
              <span className="text-shimmer">connected</span>
            </h2>
          </Reveal>
        </div>
      </section>

      {/* Popups */}
      {showDiscount && <DiscountPopup onClose={() => setShowDiscount(false)} />}
      {showUpload && <UploadPopup onClose={() => setShowUpload(false)} />}
    </div>
  );
}
