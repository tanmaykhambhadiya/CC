const express = require('express');
const router = express.Router();
const multer = require('multer');
const path = require('path');
const Submission = require('../models/Submission');
const { sendEmail } = require('../utils/email');

// Configure multer for file uploads
const storage = multer.diskStorage({
  destination: (req, file, cb) => cb(null, path.join(__dirname, '..', 'uploads')),
  filename: (req, file, cb) => {
    const uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1e9);
    cb(null, uniqueSuffix + path.extname(file.originalname));
  },
});

const fileFilter = (req, file, cb) => {
  const allowed = /jpeg|jpg|png|gif/;
  const extOk = allowed.test(path.extname(file.originalname).toLowerCase());
  const mimeOk = allowed.test(file.mimetype);
  if (extOk && mimeOk) cb(null, true);
  else cb(new Error('Only image files (JPG, PNG, GIF) are allowed'));
};

const upload = multer({ storage, fileFilter, limits: { fileSize: 5 * 1024 * 1024 } });

// POST /api/submissions - Upload ticket photo for contest
router.post('/', upload.single('ticket_photo'), async (req, res) => {
  try {
    const { name, email, phone } = req.body;

    if (!name || !email || !phone || !req.file) {
      return res.status(400).json({ success: false, message: 'All fields and photo are required' });
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      return res.status(400).json({ success: false, message: 'Invalid email format' });
    }

    const submission = await Submission.create({
      name, email, phone,
      photoPath: `/uploads/${req.file.filename}`,
    });

    // Send confirmation to user
    await sendEmail({
      to: email,
      subject: '🎫 Contest Entry Received - Concert Circle',
      text: `Hey ${name}!\n\nYour chance to get FREE Travis Scott ticket is locked!\n\n5 winners will be announced on Sept 25, 2025.\n\nMeanwhile, check out our concert experience packages!\n\nLess stress. More vibe. All in a Circle. 🔥\n\nConcert Circle Team`,
    });

    // Notify admin
    await sendEmail({
      to: 'leads@concertcircle.com',
      subject: `New Contest Submission - ${name}`,
      text: `New submission:\n\nName: ${name}\nEmail: ${email}\nPhone: ${phone}\nPhoto: ${submission.photoPath}`,
    });

    res.status(201).json({ success: true, message: 'Submission received successfully', submission });
  } catch (err) {
    if (err.message?.includes('Only image files')) {
      return res.status(400).json({ success: false, message: err.message });
    }
    console.error('Submission error:', err);
    res.status(500).json({ success: false, message: 'Server error' });
  }
});

module.exports = router;
