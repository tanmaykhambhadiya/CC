import useInView from '../hooks/useInView';

/**
 * Scroll-reveal wrapper. Animates children when scrolled into view.
 * @param {string} animation - fade-up | fade-down | fade-left | fade-right | fade-in | scale-in | slide-up | pop-in
 * @param {number} delay - stagger index (0-7), maps to delay-0 through delay-7
 * @param {number} duration - animation duration in ms (default 700)
 * @param {string} className - extra classes
 */
export default function Reveal({ children, animation = 'fade-up', delay = 0, duration = 700, className = '', as: Tag = 'div', ...props }) {
  const [ref, inView] = useInView();

  return (
    <Tag
      ref={ref}
      className={`reveal ${inView ? `in-view ${animation} delay-${delay}` : ''} ${className}`}
      style={{ animationDuration: `${duration}ms` }}
      {...props}
    >
      {children}
    </Tag>
  );
}
