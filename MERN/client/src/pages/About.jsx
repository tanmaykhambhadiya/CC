import { Link } from 'react-router-dom';
import Reveal from '../components/Reveal';
import CountUp from '../components/CountUp';

export default function About() {
  return (
    <div className="py-12 px-6 page-enter">
      <div className="max-w-4xl mx-auto">
        <Reveal animation="fade-down" duration={600}>
          <h1 className="text-center font-heading font-black text-4xl md:text-5xl mb-8">
            <span className="text-foreground">About </span>
            <span className="text-shimmer">Concert Circle</span>
          </h1>
        </Reveal>

        {/* Mission */}
        <Reveal animation="fade-left">
        <div className="bg-concert-card border border-concert-border rounded-2xl p-10 mb-8 hover-glow">
          <h2 className="font-heading font-bold text-2xl text-primary mb-4">Our Mission</h2>
          <p className="text-muted text-lg leading-relaxed">
            Concert going experience made <span className="text-accent">convenient</span> ♥ <span className="text-accent">connected</span>.
            We exist to eliminate the chaos of planning concert trips. No more juggling 10 apps for flights, hotels, cabs, and tickets.
            Concert Circle bundles everything into one seamless experience.
          </p>
        </div>
        </Reveal>

        {/* What We Do */}
        <Reveal animation="fade-right">
        <div className="bg-concert-card border border-concert-border rounded-2xl p-10 mb-8 hover-glow">
          <h2 className="font-heading font-bold text-2xl text-primary mb-4">What We Do</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            {[
              { icon: '🎵', title: 'Curated Packages', desc: 'Budget to luxury concert experience packages, all-inclusive' },
              { icon: '✈️', title: 'Travel & Stays', desc: 'Flights, hotels, villas — all booked and managed for you' },
              { icon: '🚗', title: 'Transfers', desc: 'Airport pickups, cab transfers, local transport — sorted' },
              { icon: '🎧', title: 'Concierge', desc: 'Dedicated experience managers and WhatsApp support' },
            ].map((item, i) => (
              <div key={i} className="flex gap-4 items-start">
                <span className="text-3xl">{item.icon}</span>
                <div>
                  <h3 className="font-heading font-bold text-lg mb-1">{item.title}</h3>
                  <p className="text-muted text-sm">{item.desc}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
        </Reveal>

        {/* Stats */}
        <div className="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
          {[
            { value: 50, suffix: '+', label: 'Packages' },
            { value: 1, suffix: 'K+', label: 'Community' },
            { value: 25, suffix: '+', label: 'Cities' },
            { value: 98, suffix: '%', label: 'Satisfaction' },
          ].map((stat, i) => (
            <Reveal key={i} animation="pop-in" delay={i + 1} duration={500}>
            <div className="bg-concert-card border border-concert-border rounded-2xl p-6 text-center hover-lift hover-glow">
              <div className="font-heading font-black text-3xl text-primary mb-1"><CountUp end={stat.value} suffix={stat.suffix} /></div>
              <div className="text-muted text-sm">{stat.label}</div>
            </div>
            </Reveal>
          ))}
        </div>

        {/* CTA */}
        <Reveal animation="scale-in">
        <div className="bg-concert-card border border-concert-border rounded-2xl p-10 text-center glow-border">
          <h2 className="font-heading font-bold text-2xl mb-4">Join the Circle</h2>
          <p className="text-muted text-lg mb-6">Be part of the fastest-growing concert community in India.</p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Link to="/packages" className="px-8 py-4 bg-primary rounded-full font-bold text-white btn-animate">
              Explore Packages
            </Link>
            <a href="https://chat.whatsapp.com/GkdJgdvoqxm0fvZgJ7ZPa0" target="_blank" rel="noopener noreferrer"
              className="px-8 py-4 border border-primary rounded-full font-bold text-primary hover:bg-primary/10 transition-all">
              Join Community
            </a>
          </div>
        </div>
        </Reveal>
      </div>
    </div>
  );
}
