<?php
include 'shared.php';

try {
  $currency = "PHP";
  $paymentIntent = $stripe->paymentIntents->create([
    'automatic_payment_methods' => ['enabled' => true],
    'amount' => $subtotal = $_POST['subtotal'] * 100,
    'currency' => $currency

  ]);
} catch (\Stripe\Exception\ApiErrorException $e) {
  http_response_code(400);
  error_log($e->getError()->message);
?>
  <h1>Error</h1>
  <p>Your Payment Intent failed</p>
  <p>Please try again!</p>
<?php
  exit;
} catch (Exception $e) {
  error_log($e);
  http_response_code(500);
  exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Payment</title>
    <link rel="stylesheet" href="css/base.css" />
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./utils.js"></script>
    <script>


      document.addEventListener('DOMContentLoaded', async () => {
        const stripe = Stripe('<?= $_ENV["STRIPE_PUBLISHABLE_KEY"]; ?>', {
          apiVersion: '2022-11-15',
        });

        const elements = stripe.elements({
          clientSecret: '<?= $paymentIntent->client_secret; ?>', appearance,
        });

        const linkAuthenticationElement = elements.create("linkAuthentication");
        linkAuthenticationElement.mount("#link-authentication-element");

        const addressElement = elements.create("address", {
        mode: "shipping",
        });
        addressElement.mount("#address-element");

        const paymentElement = elements.create('payment');
        paymentElement.mount('#payment-element');



        const paymentForm = document.querySelector('#payment-form');
        paymentForm.addEventListener('submit', async (e) => {
          // Avoid a full page POST request.
          e.preventDefault();

          // Disable the form from submitting twice.
          paymentForm.querySelector('button').disabled = true;

          // Confirm the card payment that was created server side:
          const {error} = await stripe.confirmPayment({
            elements,
            confirmParams: {
              return_url: `${window.location.origin}/siaintegration/public/return.php`
            }
          });
          if(error) {
            addMessage(error.message);

            // Re-enable the form so the customer can resubmit.
            paymentForm.querySelector('button').disabled = false;
            return;
          }
        });
      });
    </script>
  </head>
  <body style="background-color:#1A1F36;">
    <main>
      <h1 style="color: white;"><center>Payment</center></h1>

      <form id="payment-form">
        <label style="color: white;" for="payment-element">User Credentials</label>
        <div id="link-authentication-element">
        <!--Stripe.js injects the Link Authentication Element-->
        </div>
        <div id="address-element">
        <!-- Elements will create form elements here -->
        </div>
        <div id="payment-element">
          <!-- Elements will create input elements here -->
        </div>

        <!-- We'll put the error messages in this element -->
        <div id="payment-errors" role="alert"></div>
          <a href="../index.php?page=cart">Back</a>
          <button style="width: 100px; height: 40px;" id="submit">
            Pay
      </form>

      <div id="messages" role="alert" style="display: none;"></div>
    </main>
  </body>
</html>
