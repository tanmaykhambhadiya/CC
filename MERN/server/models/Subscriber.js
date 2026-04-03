const mongoose = require('mongoose');

const subscriberSchema = new mongoose.Schema({
  name: { type: String, trim: true },
  email: { type: String, required: true, trim: true, lowercase: true, unique: true },
  phone: { type: String, trim: true },
}, { timestamps: true });

module.exports = mongoose.model('Subscriber', subscriberSchema);
