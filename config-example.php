<?php
require_once('./vendor/stripe/stripe-php/lib/Stripe.php');

// General Settings
$image = "iww_logo_128x128.png";
$title = "NYC GMB";
$secondaryTitle = "Dues Payment";
$robots = "noindex";
$submitBtn = "Pay Dues";

// IU List. Used for suggestions in "IU #" field
$IUNumbers = array(
	110,120,130,140,
	210,220,230,
	310,320,330,
	410,420,430,440,450,460,470,480,490,
	510,520,530,540,550,560,
	610,613,620,630,640,650,660,670,680,690
);

// Stripe Settings
$stripe = array(
  "secret_key"     	=> "sk_test",
  "publishable_key"	=> "pk_test",
  "currency"		=> "usd"
);
Stripe::setApiKey($stripe['secret_key']);

