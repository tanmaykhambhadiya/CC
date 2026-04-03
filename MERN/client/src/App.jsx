import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import BottomNav from './components/BottomNav';
import Home from './pages/Home';
import Packages from './pages/Packages';
import RideToTheRage from './pages/RideToTheRage';
import UtopiaCircle from './pages/UtopiaCircle';
import AstroDeluxeDrop from './pages/AstroDeluxeDrop';
import TravisDetails from './pages/TravisDetails';
import TicketPurchase from './pages/TicketPurchase';
import Blogs from './pages/Blogs';
import BlogPost from './pages/BlogPost';
import Store from './pages/Store';
import About from './pages/About';
import Geolocation from './pages/Geolocation';
import Upload from './pages/Upload';

function App() {
  return (
    <Router>
      <div className="min-h-screen pb-20">
        <Navbar />
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/packages" element={<Packages />} />
          <Route path="/ride-to-the-rage" element={<RideToTheRage />} />
          <Route path="/utopia-circle" element={<UtopiaCircle />} />
          <Route path="/astro-deluxe-drop" element={<AstroDeluxeDrop />} />
          <Route path="/travis-details" element={<TravisDetails />} />
          <Route path="/ticket-purchase" element={<TicketPurchase />} />
          <Route path="/blogs" element={<Blogs />} />
          <Route path="/blog/:id" element={<BlogPost />} />
          <Route path="/store" element={<Store />} />
          <Route path="/about" element={<About />} />
          <Route path="/geolocation" element={<Geolocation />} />
          <Route path="/upload" element={<Upload />} />
        </Routes>
        <Footer />
        <BottomNav />
      </div>
    </Router>
  );
}

export default App;
