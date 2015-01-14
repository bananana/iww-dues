<?php
require_once(dirname(__FILE__) . '/config.php');

// Function to automate the isset() check for input values
function checkInput($name) { return (isset($name)) ? $name : "N/A"); }

// Get necessary input values from the form
$token  = checkInput($_POST['stripeToken']); // (isset($_POST['stripeToken']) ? $_POST['stripeToken'] : "N/A");
$email = checkInput($_POST['inputEmail']); // (isset($_POST['inputEmail']) ? $_POST['inputEmail'] : "N/A");
$XNumber = checkInput($_POST['inputXNum']); // (isset($_POST['inputXNum']) ? $_POST['inputXNum'] : "N/A");
$IUNumber = checkInput($_POST['inputIUNum']); //(isset($_POST['inputIUNum']) ? $_POST['inputIUNum'] : "N/A");
$delegateNumber = checkInput($_POST['inputDelNum']); // (isset($_POST['inputDelNum']) ? $_POST['inputDelNum'] : "N/A");
$dateLastPaid = checkInput($_POST['inputDateLastPaid']; // (isset($_POST['inputDateLastPaid']) ? $_POST['inputDateLastPaid'] : "N/A");
$recurring = checkInput($_POST['radioRecurrence']; // $_POST['radioRecurrence'];
$amount = checkInput($_POST['selectAmound']; //$_POST['selectAmount'];

// Sign up user for recurring dues plan
// if that option was selected, otherwise
// make a one-time payment
if ($recurring) {

	// Figure out which plan to use
	if ($amount == 500) {
		$plan = "subminimum_dues";
	}
	else if ($amount == 900) {
		$plan = "minimum_dues";
	}
	else if ($amount == 1800) {
		$plan = "regular_dues";
	}
	else if ($amount == 2700) {
		$plan = "maximum_dues";
	}
	else {
		$plan = "";
	}
	
	// Create customer for recurring payment
	$customer = Stripe_Customer::create(array(
		'card'  => $token,
		'plan'	=> $plan,
		'email' => $email		
	));	
}
else {
	// Create customer for one time payment
	$customer = Stripe_Customer::create(array(
		'card'  => $token,
		'email' => $email		
	));
	
	// Charge the card
	try {
		$charge = Stripe_Charge::create(array(
			'customer' => $customer->id,
			'amount'   => $amount,
			'currency' => $stripe['currency'],
			'metadata' => array(
				'X Number'	=> $XNumber,
				'IU Number'	=> $IUNumber,
				'Delegate Number' => $delegateNumber,
				'Date Last Paid' => $dateLastPaid
			)
		));
	}
	catch (Stripe_CardError $e) {
		// The card has been declined
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="robots" content="noindex">
	
	<title>IUB460 Dues Payment System</title>
	
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color:#eee;">


<!-- -----------------------
---- Content
------------------------ -->

<p>&nbsp;</p>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 panel panel-default">
			<div class="panel-body">
			
				<img src="iww_logo_128x128.png" alt="IWW Logo" class="img-circle center-block">
				<h1 class="text-center">IWW IUB460</h1>
				<hr>				
				<div class="col-md-12">
					<h2>Thank you!</h2>
					<div class="alert alert-success" role="alert">
						<p class="lead">
							We successfuly recieved $<?php echo $amount / 100; ?> for a <?php echo $recurring ? "recurring monthly" : "one time"; ?> dues payment.
						</p>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<a href="index.php" class="btn btn-primary btn-lg btn-block" role="button">Back to payment form</a>
				</div>
				<div class="col-md-12" style="text-align:center;">
					<p>&nbsp;</p>
					<p>If you have any questions feel free to contact us at <a href="mailto:email@provider.com">[email]</a> or call <a href="tel:1234567890">[number]</a>.</p>
				</div>
				
			</div>
		</div>
	</div>
</div>


<!-- -----------------------
---- Scripts 
------------------------ -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>
