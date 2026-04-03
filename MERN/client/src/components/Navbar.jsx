import { Link, useLocation } from 'react-router-dom';

const navItems = [
  { path: '/', label: 'Home', icon: 'M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z M9 22V12h6v10' },
  { path: '/packages', label: 'Packages', icon: 'M13 2L3 14h9l-1 8 10-12h-9l1-8z' },
  { path: '/geolocation', label: 'Geolocation', icon: 'M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7z M12 9a2 2 0 100-4 2 2 0 000 4z' },
  { path: '/store', label: 'Store', icon: 'M3 3h18v18H3z M9 9a2 2 0 100-4 2 2 0 000 4z M21 15l-3.086-3.086a2 2 0 00-2.828 0L6 21' },
  { path: '/about', label: 'About', icon: 'M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2 M12 7a4 4 0 100-8 4 4 0 000 8z' },
];

export default function Navbar() {
  const location = useLocation();

  return (
    <header className="sticky top-0 z-50 py-4 bg-background/90 backdrop-blur-[10px] shadow-md">
      <div className="max-w-[1400px] mx-auto px-6">
        <div className="flex items-center justify-between">
          {/* Logo */}
          <Link to="/" className="flex items-center no-underline">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" className="h-[30px] w-auto mr-1 hover:scale-110 transition-transform">
              <defs>
                <linearGradient id="logoGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                  <stop offset="0%" stopColor="#4ddde0" />
                  <stop offset="50%" stopColor="#d269e6" />
                  <stop offset="100%" stopColor="#ff3131" />
                </linearGradient>
              </defs>
              <g transform="translate(50,50)">
                <circle cx="0" cy="0" r="35" stroke="url(#logoGrad)" strokeWidth="2" fill="none" opacity="0.6">
                  <animate attributeName="r" values="35;40;35" dur="4s" repeatCount="indefinite" />
                </circle>
                <circle cx="0" cy="0" r="25" stroke="url(#logoGrad)" strokeWidth="2" fill="none" opacity="0.8">
                  <animate attributeName="r" values="25;30;25" dur="3s" repeatCount="indefinite" />
                </circle>
                <circle cx="0" cy="0" r="15" stroke="url(#logoGrad)" strokeWidth="2" fill="none" opacity="1">
                  <animate attributeName="r" values="15;20;15" dur="2s" repeatCount="indefinite" />
                </circle>
              </g>
            </svg>
            <span className="font-heading font-black text-2xl tracking-tight flex items-center">
              <span className="text-accent">Concert</span>
              <span className="text-primary ml-1">Circle</span>
            </span>
          </Link>

          {/* Desktop Nav */}
          <nav className="hidden lg:flex items-center gap-2">
            {navItems.map((item) => (
              <Link
                key={item.path}
                to={item.path}
                className={`flex items-center gap-2 px-5 py-3 rounded-xl font-semibold text-lg transition-all
                  ${location.pathname === item.path
                    ? 'text-foreground bg-primary/20 border border-primary'
                    : 'text-muted hover:text-foreground hover:bg-primary/10 hover:-translate-y-0.5'
                  }`}
              >
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path d={item.icon} />
                </svg>
                {item.label}
              </Link>
            ))}
          </nav>
        </div>
      </div>
    </header>
  );
}
