const stripe = Stripe("pk_test_51N5oaNL1p7QH1CUF2zaoHU1OSU3rxqna2afVsyzEBz5VTYFxRjM8A5l6yG92e4WSoVFp3uIvplqpE8nx52DgKMEN003WYUTALO");


// Helper for displaying status messages.
const addMessage = (message) => {
  // Get the messages div
  const messagesDiv = document.querySelector('#messages');

  // Check if there is already an error message
  if (messagesDiv.innerHTML.length > 0) {
    // Remove the last error message
    messagesDiv.innerHTML = messagesDiv.innerHTML.slice(0, -1);
  }

  // Add the new error message
  messagesDiv.innerHTML += `> ${message}<br>`;

  // Display the messages div
  messagesDiv.style.display = 'block';

  // Log the message to the console
  console.log(`Debug: ${message}`);
};


if(error) {
  // Check if there is already an error message
  if (messagesDiv.innerHTML.length > 0) {
    // Remove the last error message
    messagesDiv.innerHTML = messagesDiv.innerHTML.slice(0, -1);
  }

  // Add the new error message
  addMessage(error.message);

  // Re-enable the form so the customer can resubmit.
  paymentForm.querySelector('button').disabled = false;
  return;
}

// Adds links for known Stripe objects to the Stripe dashboard.
const addDashboardLinks = (message) => {
  const piDashboardBase = 'https://dashboard.stripe.com/test/payments';
  return message.replace(
    /(pi_(\S*)\b)/g,
    `<a href="${piDashboardBase}/$1" target="_blank">$1</a>`
  );
};


const appearance = {
  theme: 'night',
  labels: 'floating',

};


