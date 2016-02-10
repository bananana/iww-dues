<?php
require_once('./vendor/stripe/stripe-php/init.php');

// Mode
$testing = true;

// General Settings
$robots         = 'noindex';
$image          = 'iww_logo_128x128.png';
$title          = 'IWW';
$secondaryTitle = 'Dues Payment';
$submitBtn      = 'Start Membership';
$duesPlans      = array(
    'subminimum_dues' => '$6.00 (subminimum)',
    'minimum_dues'    => '$11.00 (minimum)',
    'regular_dues'    => '$22.00 (regular)',
    'maximum_dues'    => '$33.00 (maximum)'
);
$duesPlansDefault = 'regular_dues';

// Stripe Settings
if($testing) {
    $stripe = array(
        'secret_key'      => 'sk_live_',
        'publishable_key' => 'pk_live_',
        'currency'		=> 'usd'
    );
}
else {
    $stripe = array(
        'secret_key'      => 'sk_test_',
        'publishable_key' => 'pk_test_',
        'currency'        => 'usd'
    );
}
\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
