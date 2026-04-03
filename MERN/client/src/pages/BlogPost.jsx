import { useParams, Link } from 'react-router-dom';

const blogData = {
  1: {
    title: 'How to Plan Your Epic Travis Scott Concert Trip in Delhi',
    img: '/img/b-1.png',
    content: [
      "Planning a concert trip doesn't have to be stressful. With Concert Circle, everything from flights to stays to transfers is handled for you.",
      "Step 1: Choose your package — whether you're a solo budget traveler (Ride to the Rage at ₹7,499) or rolling deep with your crew (Utopia Circle at ₹9,999 for groups of 3+), we've got you covered.",
      "Step 2: Pick your travel dates and let us handle the logistics. Airport pickups, hotel check-ins, cab transfers — all sorted.",
      "Step 3: Just show up and rage. Our experience managers and concierge support ensure you focus on the vibes while we handle the rest.",
      "Pro tip: Book as a group of 3+ and save ₹3000 with our group discount codes!",
    ],
  },
  2: {
    title: "5 Tips Before Going to a Concert (So You Don't Regret It Later)",
    img: '/img/b-2.jpg',
    content: [
      "1. Wear comfortable shoes — you'll be standing for hours. Trust us on this one.",
      "2. Stay hydrated — bring a sealed water bottle or buy one at the venue.",
      "3. Arrive early — skip the rush, find your spot, and soak in the pre-show energy.",
      "4. Protect your phone — get a waterproof case or pouch. Concert crowds are unpredictable.",
      "5. Book your stay and transport in advance — or better yet, let Concert Circle handle it all so you can focus on the music.",
    ],
  },
  3: {
    title: "We Asked 5 People: What's Your Top Concert Red Flag?",
    img: '/img/b-3.jpg',
    content: [
      '"When the venue has no water stations." — Priya, 22',
      '"People recording the entire concert instead of enjoying it." — Rahul, 25',
      '"No clear directions to the venue. Got lost for an hour last time." — Ananya, 21',
      '"Overpriced food with zero options for vegetarians." — Dev, 24',
      '"When the sound quality is trash because of poor speaker placement." — Meera, 23',
      "What's YOUR concert red flag? Join our WhatsApp community and share!",
    ],
  },
  4: {
    title: 'The Ultimate Concert Packing List',
    img: '/img/b-4.jpg',
    content: [
      "Going to a concert? Here's everything you need to pack:",
      "Essentials: ID, tickets (digital saved offline), portable charger, cash + UPI ready.",
      "Comfort: Comfortable shoes, light jacket (outdoor venues get cold at night), earplugs for front row.",
      "Capture: Fully charged phone, mini camera if allowed, power bank.",
      "Extras: Sunscreen (for day events), wet wipes, zip-lock bag for valuables.",
      "Or just book a Concert Circle package and we'll give you a curated packing guide specific to your event!",
    ],
  },
  5: {
    title: 'Why Group Concert Trips Hit Different',
    img: '/img/b5.jpg',
    content: [
      "There's something magical about experiencing live music with your closest friends.",
      "The energy multiplies — every bass drop hits harder when you're surrounded by your crew.",
      "Split costs, bigger savings — our Utopia Circle package starts at just ₹9,999/head for groups of 3+.",
      "Create memories that last — from the road trip to the concert to the after-party, group trips create stories you'll tell forever.",
      "Concert Circle makes group bookings effortless with villa stays, group transfers, and dedicated concierge support.",
    ],
  },
  6: {
    title: 'Concert Circle: How It All Started',
    img: '/img/b6.jpg',
    content: [
      "We were tired of juggling 10 different apps just to go to a concert.",
      "Flight bookings on one app, hotel on another, cab bookings, restaurant reservations, ticket purchasing — it was chaos.",
      "So we built Concert Circle — one platform that bundles your entire concert experience into curated packages.",
      "From budget solo trips to luxury group experiences, we handle everything so you can focus on what matters: the music, the vibes, and the memories.",
      "Today, we serve 1K+ concert enthusiasts across 25+ cities with 50+ curated packages. And we're just getting started.",
    ],
  },
};

export default function BlogPost() {
  const { id } = useParams();
  const blog = blogData[id];

  if (!blog) {
    return (
      <div className="py-20 px-6 text-center">
        <h1 className="font-heading font-bold text-3xl mb-4">Blog Not Found</h1>
        <Link to="/blogs" className="text-primary hover:underline">← Back to Blogs</Link>
      </div>
    );
  }

  return (
    <div className="py-12 px-6">
      <div className="max-w-3xl mx-auto">
        <Link to="/blogs" className="text-primary hover:underline mb-6 inline-block">← Back to Blogs</Link>
        <div className="h-[300px] md:h-[400px] rounded-2xl overflow-hidden mb-8">
          <img src={blog.img} alt={blog.title} className="w-full h-full object-cover" />
        </div>
        <h1 className="font-heading font-black text-3xl md:text-4xl mb-8">{blog.title}</h1>
        <div className="space-y-6">
          {blog.content.map((para, i) => (
            <p key={i} className="text-muted text-lg leading-relaxed">{para}</p>
          ))}
        </div>
        <div className="mt-12 p-8 bg-concert-card border border-concert-border rounded-2xl text-center">
          <h3 className="font-heading font-bold text-xl mb-4">Ready for the Concert Experience?</h3>
          <Link to="/packages" className="inline-block px-8 py-3 bg-primary rounded-full font-bold text-white hover:bg-primary/80 transition-all">
            Explore Packages
          </Link>
        </div>
      </div>
    </div>
  );
}
