import { Link, useLocation } from 'react-router-dom';

const navItems = [
  { path: '/', label: 'Home', icon: 'M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z M9 22V12h6v10' },
  { path: '/packages', label: 'Packages', icon: 'M13 2L3 14h9l-1 8 10-12h-9l1-8z' },
  { path: '/geolocation', label: 'Geolocation', icon: 'M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7z' },
  { path: '/store', label: 'Store', icon: 'M3 3h18v18H3z' },
  { path: '/about', label: 'About', icon: 'M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2' },
];

export default function BottomNav() {
  const location = useLocation();

  return (
    <nav className="fixed bottom-0 left-0 right-0 z-50 bg-background/95 backdrop-blur-[10px] border-t border-border lg:hidden">
      <div className="flex items-center justify-around py-2">
        {navItems.map((item) => (
          <Link
            key={item.path}
            to={item.path}
            className={`flex flex-col items-center gap-1 px-3 py-2 rounded-lg text-xs font-semibold transition-all
              ${location.pathname === item.path ? 'text-primary' : 'text-muted hover:text-foreground'}`}
          >
            <svg className="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
              <path d={item.icon} />
            </svg>
            <span>{item.label}</span>
          </Link>
        ))}
      </div>
    </nav>
  );
}
