const mongoose = require('mongoose');

const bookingSchema = new mongoose.Schema({
  firstName: { type: String, required: true, trim: true },
  lastName: { type: String, required: true, trim: true },
  email: { type: String, required: true, trim: true, lowercase: true },
  phone: { type: String, required: true, trim: true },
  sourceDestination: { type: String, required: true, trim: true },
  groupSize: { type: Number, required: true, min: 1 },
  stayDuration: { type: Number, required: true, min: 1 },
  tripType: { type: String, required: true, trim: true },
  packageType: {
    type: String,
    required: true,
    enum: ['fly-to-the-rage', 'utopia-circle', 'astro-deluxe-drop'],
  },
  travelType: { type: String, trim: true },
  cityPlaces: { type: String, trim: true },
  additionalRequirements: { type: String, trim: true },
  discountCode: { type: String, trim: true },
}, { timestamps: true });

module.exports = mongoose.model('Booking', bookingSchema);
