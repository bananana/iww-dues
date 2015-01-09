<?php
require_once('./vendor/stripe/stripe-php/lib/Stripe.php');

// General Settings
$image = "iww_logo_128x128.png";
$title = "NYC GMB";
$secondaryTitle = "Dues Payment";
$robots = "noindex";
$submitBtn = "Pay Dues";

// Stripe Settings
$stripe = array(
  "secret_key"     	=> "sk_test",
  "publishable_key"	=> "pk_test",
  "currency"		=> "usd"
);
Stripe::setApiKey($stripe['secret_key']);

