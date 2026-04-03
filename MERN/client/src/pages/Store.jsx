export default function Store() {
  const products = [
    { id: 1, name: 'Travis Scott x CC Tee', price: '₹1,499', img: '/img/s-1.png', tag: 'Limited Edition' },
    { id: 2, name: 'Concert Circle Hoodie', price: '₹2,499', img: '/img/s-2.png', tag: 'Best Seller' },
    { id: 3, name: 'Astro Cap', price: '₹799', img: '/img/s-3.png', tag: 'New' },
  ];

  return (
    <div className="py-12 px-6">
      <div className="max-w-[1400px] mx-auto">
        <h1 className="text-center font-heading font-black text-4xl mb-4">
          <span className="text-foreground">Concert Circle </span>
          <span className="text-primary">Store</span>
        </h1>
        <p className="text-center text-muted text-lg mb-12">Official merchandise & exclusive drops</p>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {products.map((product) => (
            <div key={product.id} className="bg-concert-card border border-concert-border rounded-2xl overflow-hidden hover:-translate-y-1 transition-transform group">
              <div className="relative h-64 bg-cover bg-center" style={{ backgroundImage: `url(${product.img})` }}>
                <span className="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">{product.tag}</span>
              </div>
              <div className="p-6">
                <h3 className="font-heading font-bold text-lg mb-2">{product.name}</h3>
                <p className="text-primary font-bold text-xl mb-4">{product.price}</p>
                <button className="w-full py-3 bg-primary rounded-xl font-bold text-white hover:bg-primary/80 transition-all">
                  Coming Soon
                </button>
              </div>
            </div>
          ))}
        </div>

        <div className="mt-16 bg-concert-card border border-concert-border rounded-2xl p-10 text-center">
          <h2 className="font-heading font-bold text-2xl mb-4">Want Early Access to Merch Drops?</h2>
          <p className="text-muted mb-6">Book our Utopia Circle or Astro Deluxe packages for exclusive early access to merch!</p>
          <a href="/packages" className="inline-block px-8 py-3 bg-primary rounded-full font-bold text-white hover:bg-primary/80 transition-all">
            View Packages
          </a>
        </div>
      </div>
    </div>
  );
}
