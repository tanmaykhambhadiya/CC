const mongoose = require('mongoose');

const ticketPurchaseSchema = new mongoose.Schema({
  ticketType: { type: String, required: true, trim: true },
  fullName: { type: String, required: true, trim: true },
  email: { type: String, required: true, trim: true, lowercase: true },
  phone: { type: String, required: true, trim: true },
  concertPlace: { type: String, required: true, trim: true },
  quantity: { type: Number, required: true, min: 1 },
}, { timestamps: true });

module.exports = mongoose.model('TicketPurchase', ticketPurchaseSchema);
