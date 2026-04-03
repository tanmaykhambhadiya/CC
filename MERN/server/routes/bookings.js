const express = require('express');
const router = express.Router();
const Booking = require('../models/Booking');
const { sendEmail } = require('../utils/email');

// POST /api/bookings - Create a new booking
router.post('/', async (req, res) => {
  try {
    const {
      firstName, lastName, email, phone, sourceDestination,
      groupSize, stayDuration, tripType, packageType,
      travelType, cityPlaces, additionalRequirements, discountCode,
    } = req.body;

    // Validate required fields
    if (!firstName || !lastName || !email || !phone || !sourceDestination || !groupSize || !stayDuration || !tripType || !packageType) {
      return res.status(400).json({ success: false, message: 'All required fields must be filled' });
    }

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      return res.status(400).json({ success: false, message: 'Invalid email format' });
    }

    // Validate package-specific group size
    const validPackages = ['fly-to-the-rage', 'utopia-circle', 'astro-deluxe-drop'];
    if (!validPackages.includes(packageType)) {
      return res.status(400).json({ success: false, message: 'Invalid package selected' });
    }
    if (packageType === 'fly-to-the-rage' && groupSize > 1) {
      return res.status(400).json({ success: false, message: 'Ride to the Rage package is for solo travelers only' });
    }
    if (packageType === 'utopia-circle' && groupSize < 3) {
      return res.status(400).json({ success: false, message: 'Utopia Circle package requires a group of 3 or more' });
    }
    if (stayDuration < 1) {
      return res.status(400).json({ success: false, message: 'Stay duration must be at least 1 night' });
    }

    const booking = await Booking.create({
      firstName, lastName, email, phone, sourceDestination,
      groupSize: Number(groupSize), stayDuration: Number(stayDuration),
      tripType, packageType, travelType, cityPlaces, additionalRequirements, discountCode,
    });

    // Send confirmation emails
    const packageNames = {
      'fly-to-the-rage': 'Ride to the Rage (₹7,499/head)',
      'utopia-circle': 'Utopia Circle (₹9,999/head)',
      'astro-deluxe-drop': 'Astro Deluxe Drop (₹19,999/head)',
    };

    await sendEmail({
      to: email,
      subject: '🎶 Booking Confirmed - Concert Circle',
      text: `Hey ${firstName}!\n\nYour ${packageNames[packageType]} booking is confirmed!\n\nDetails:\n- Package: ${packageNames[packageType]}\n- Group Size: ${groupSize}\n- Stay: ${stayDuration} night(s)\n- From: ${sourceDestination}\n\nWe'll be in touch within 24 hours with next steps.\n\nLess stress. More vibe. All in a Circle. 🔥\n\nConcert Circle Team`,
    });

    await sendEmail({
      to: 'bookings@concertcircle.com',
      subject: `New Booking - ${firstName} ${lastName} - ${packageType}`,
      text: `New booking received:\n\nName: ${firstName} ${lastName}\nEmail: ${email}\nPhone: ${phone}\nPackage: ${packageType}\nGroup Size: ${groupSize}\nStay: ${stayDuration} nights\nFrom: ${sourceDestination}\nTravel: ${travelType}\nCity Places: ${cityPlaces}\nAdditional: ${additionalRequirements}\nDiscount Code: ${discountCode}`,
    });

    res.status(201).json({ success: true, message: 'Booking created successfully', booking });
  } catch (err) {
    console.error('Booking error:', err);
    res.status(500).json({ success: false, message: 'Server error' });
  }
});

module.exports = router;
