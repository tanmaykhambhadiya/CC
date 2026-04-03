const express = require('express');
const router = express.Router();
const User = require('../models/User');
const { sendEmail } = require('../utils/email');

// POST /api/users/discount - Generate discount code
router.post('/discount', async (req, res) => {
  try {
    const { name, email, phone } = req.body;

    if (!name || !email || !phone) {
      return res.status(400).json({ success: false, message: 'All fields are required' });
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      return res.status(400).json({ success: false, message: 'Invalid email format' });
    }

    // Generate discount code: CC-Travis-XX-XX
    const namePrefix = name.trim().substring(0, 2).toUpperCase();
    const phoneSuffix = phone.trim().slice(-2);
    const discountCode = `CC-Travis-${namePrefix}-${phoneSuffix}`;

    const user = await User.create({ name, email, phone, discountCode });

    // Send discount email to user
    await sendEmail({
      to: email,
      subject: "Your ₹3000 Drop is LIVE🔥- Concert Circle",
      text: `Yoo!! ${name}\n\nYour circle's about to rage right cause we just unlocked your Concert Experience Package group code.\n\nYour Code:\n\n🎟️ [${discountCode}]\n\nHere's the drip:\n\n✅ Valid for groups of 3+\n✅ Flat ₹3000 OFF Travis Scott Experience Package\n✅ Curated by Concert Circle - we handle everything so you just vibe\n✅ Premium perks included\n\n⚡ 24-HOUR FLASH WINDOW - Code expires tomorrow!\n\n🔗 REDEEM NOW → https://concertcircle.com\n\nLess stress. More vibe. All in a Circle. 🔥\n\nPeace,\nConcert Circle Team`,
    });

    // Notify admin
    await sendEmail({
      to: 'leads@concertcircle.com',
      subject: `New User Entry - ${name}`,
      text: `New user entry:\n\nName: ${name}\nEmail: ${email}\nPhone: ${phone}\nDiscount Code: ${discountCode}`,
    });

    res.status(201).json({ success: true, discountCode, message: 'Discount code generated successfully' });
  } catch (err) {
    console.error('Discount code error:', err);
    res.status(500).json({ success: false, message: 'Server error' });
  }
});

module.exports = router;
