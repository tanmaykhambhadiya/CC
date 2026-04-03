const express = require('express');
const router = express.Router();
const TicketPurchase = require('../models/TicketPurchase');
const { sendEmail } = require('../utils/email');

// POST /api/tickets - Create a ticket purchase inquiry
router.post('/', async (req, res) => {
  try {
    const { ticketType, fullName, email, phone, concertPlace, quantity } = req.body;

    if (!ticketType || !fullName || !email || !phone || !concertPlace || !quantity) {
      return res.status(400).json({ success: false, message: 'All fields are required' });
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      return res.status(400).json({ success: false, message: 'Invalid email format' });
    }

    const ticket = await TicketPurchase.create({
      ticketType, fullName, email, phone, concertPlace, quantity: Number(quantity),
    });

    // Send confirmation to user
    await sendEmail({
      to: email,
      subject: '🎫 Your Pass to Travis Scott is Locked In - Concert Circle',
      text: `Hey ${fullName}!\n\nYour ticket inquiry is confirmed!\n\nDetails:\n- Ticket Type: ${ticketType}\n- Quantity: ${quantity}\n- Venue: ${concertPlace}\n\nOur team will contact you within 24 hours with ticket details and pricing.\n\nLess stress. More vibe. All in a Circle. 🔥\n\nConcert Circle Team`,
    });

    // Notify admin
    await sendEmail({
      to: 'purchases@concertcircle.com',
      subject: `New Ticket Inquiry - ${fullName}`,
      text: `New ticket inquiry:\n\nName: ${fullName}\nEmail: ${email}\nPhone: ${phone}\nTicket Type: ${ticketType}\nQuantity: ${quantity}\nVenue: ${concertPlace}`,
    });

    res.status(201).json({ success: true, message: 'Ticket inquiry submitted successfully', ticket });
  } catch (err) {
    console.error('Ticket error:', err);
    res.status(500).json({ success: false, message: 'Server error' });
  }
});

module.exports = router;
