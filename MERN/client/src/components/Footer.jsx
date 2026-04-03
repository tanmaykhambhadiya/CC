import { Link } from 'react-router-dom';

export default function Footer() {
  return (
    <footer className="bg-concert-card border-t border-concert-border mt-16">
      <div className="max-w-[1400px] mx-auto px-6 py-12">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
          {/* Brand */}
          <div>
            <h3 className="font-heading font-black text-xl mb-4">
              <span className="text-accent">Concert</span><span className="text-primary">Circle</span>
            </h3>
            <p className="text-muted text-sm leading-relaxed">
              Concert going experience made convenient ♥ connected. Your all-in-one concert trip planner.
            </p>
          </div>

          {/* Quick Links */}
          <div>
            <h4 className="font-heading font-bold mb-4 text-foreground">Quick Links</h4>
            <ul className="space-y-2 text-sm">
              {[
                { to: '/', label: 'Home' },
                { to: '/packages', label: 'Packages' },
                { to: '/blogs', label: 'Blogs' },
                { to: '/store', label: 'Store' },
                { to: '/about', label: 'About Us' },
              ].map((link) => (
                <li key={link.to}><Link to={link.to} className="text-muted hover:text-primary transition-colors">{link.label}</Link></li>
              ))}
            </ul>
          </div>

          {/* Packages */}
          <div>
            <h4 className="font-heading font-bold mb-4 text-foreground">Packages</h4>
            <ul className="space-y-2 text-sm">
              {[
                { to: '/ride-to-the-rage', label: 'Ride to the Rage — ₹7,499' },
                { to: '/utopia-circle', label: 'Utopia Circle — ₹9,999' },
                { to: '/astro-deluxe-drop', label: 'Astro Deluxe Drop — ₹12,499' },
              ].map((link) => (
                <li key={link.to}><Link to={link.to} className="text-muted hover:text-primary transition-colors">{link.label}</Link></li>
              ))}
            </ul>
          </div>

          {/* Contact */}
          <div>
            <h4 className="font-heading font-bold mb-4 text-foreground">Contact</h4>
            <ul className="space-y-2 text-sm text-muted">
              <li><a href="mailto:concertcircle6@gmail.com" className="hover:text-primary transition-colors">concertcircle6@gmail.com</a></li>
              <li><a href="tel:+918780363834" className="hover:text-primary transition-colors">+91 87803 63834</a></li>
              <li>
                <a href="https://chat.whatsapp.com/GkdJgdvoqxm0fvZgJ7ZPa0" target="_blank" rel="noopener noreferrer"
                  className="hover:text-primary transition-colors">WhatsApp Community</a>
              </li>
              <li>
                <a href="https://www.instagram.com/concertcircle.in/" target="_blank" rel="noopener noreferrer"
                  className="hover:text-primary transition-colors">Instagram</a>
              </li>
            </ul>
          </div>
        </div>

        <div className="border-t border-concert-border mt-10 pt-6 text-center text-muted text-sm">
          <p>&copy; {new Date().getFullYear()} Concert Circle. All rights reserved.</p>
        </div>
      </div>
    </footer>
  );
}
