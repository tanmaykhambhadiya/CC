document.getElementById('paymentForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const fullName = document.getElementById('fullName').value.trim();
  const email = document.getElementById('email').value.trim();
  const phone = document.getElementById('phone').value.trim();

  if (!fullName || !email || !phone) {
    alert("Please fill all fields.");
    return;
  }

  const payload = { fullName, email, phone };

  fetch('cr-payment.php', {
    method: 'POST',
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload)
  })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        document.getElementById('paymentForm').style.display = 'none';
        document.getElementById('ticketName').textContent = fullName;
        document.getElementById('ticketId').textContent = data.ticket_id;
        document.getElementById('successBox').style.display = 'block';
      } else {
        alert("❌ " + data.message);
      }
    })
    .catch(err => {
      alert("Something went wrong. Try again.");
      console.error(err);
    });
});
