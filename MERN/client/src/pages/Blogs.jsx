import { Link } from 'react-router-dom';

const allBlogs = [
  { id: 1, img: '/img/b-1.png', title: 'How to Plan Your Epic Travis Scott Concert Trip in Delhi', desc: 'Your zero-stress guide to the ultimate concert experience' },
  { id: 2, img: '/img/b-2.jpg', title: "5 Tips Before Going to a Concert (So You Don't Regret It Later)", desc: 'Avoid common concert pitfalls with these practical tips to ensure a stress-free, epic experience' },
  { id: 3, img: '/img/b-3.jpg', title: "We Asked 5 People: What's Your Top Concert Red Flag?", desc: 'With whom do you agree the most?' },
  { id: 4, img: '/img/b-4.jpg', title: 'The Ultimate Concert Packing List', desc: "Don't forget these essentials for the best concert experience" },
  { id: 5, img: '/img/b5.jpg', title: 'Why Group Concert Trips Hit Different', desc: 'The magic of experiencing live music with your crew' },
  { id: 6, img: '/img/b6.jpg', title: 'Concert Circle: How It All Started', desc: 'The story behind building the ultimate concert experience platform' },
];

export default function Blogs() {
  return (
    <div className="py-12 px-6">
      <div className="max-w-[1400px] mx-auto">
        <h1 className="text-center font-heading font-black text-4xl mb-4">
          <span className="text-foreground">Concert Circle </span>
          <span className="text-primary">Blogs</span>
        </h1>
        <p className="text-center text-muted text-lg mb-12">News, Hacks and Wildest Concert Stories</p>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {allBlogs.map((blog) => (
            <div key={blog.id} className="bg-concert-card border border-concert-border rounded-2xl overflow-hidden hover:-translate-y-1 transition-transform">
              <div className="h-48 bg-cover bg-center" style={{ backgroundImage: `url(${blog.img})` }} />
              <div className="p-6">
                <h3 className="font-heading font-bold text-lg mb-2">{blog.title}</h3>
                <p className="text-muted text-sm mb-4">{blog.desc}</p>
                <Link to={`/blog/${blog.id}`} className="text-primary font-semibold hover:underline">Read More →</Link>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
