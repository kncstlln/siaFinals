<?php
require_once 'shared.php';

// Returning after redirecting to a payment method portal.
$paymentIntent = $stripe->paymentIntents->retrieve(
   $_GET['payment_intent'],
);

$myJSON = json_encode($paymentIntent);
var_dump($myJSON); 
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Payment Intent</title>
    <link rel="stylesheet" href="css/success.css" />
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body style="background-color:#1A1F36;">
    <main>

      <div class="card"> 
  <div class="header"> 
    <div class="image">
      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 7L9.00004 18L3.99994 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
      </div> 
      <div class="content">
         <span class="title">Payment Successful</span> 
         <p class="message"><?= $myJSON?>;</p> 
      </div> 
         <div class="actions">
            <a href="https://gmail.com/"><button class="history" type="button">Check Email</button></a>
            <a href="/siaintegration/index.php"><button class="track" type="button">Back</button></a>
            </div> 
            </div> 
            </div>
            
    </main>
  </body>
</html>
