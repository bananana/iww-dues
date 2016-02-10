<?php
require_once(dirname(__FILE__) . '/config.php');

// Get necessary input values from the form
$token      = $_POST['stripeToken'];
$email      = (isset($_POST['inputEmail']) ? $_POST['inputEmail'] : "N/A");
$phone      = (isset($_POST['inputPhone']) ? $_POST['inputPhone'] : "N/A");
$xnumber    = (isset($_POST['inputXNum']) ? $_POST['inputXNum'] : "N/A");
$employer   = (isset($_POST['inputEmployer']) ? $_POST['inputEmployer'] : "N/A");
$plan       = (isset($_POST['selectPlan']) ? $_POST['selectPlan'] : $duesPlansDefault);
$initiation = ($_POST['radioInitiation'] === 'true');

// Sign up user for recurring dues plan
try {
    // Figure out initiation amount from plan amount
    $pl = \Stripe\Plan::retrieve($plan);
    $initiationAmount = $pl->amount;

	// Create the customer object 
	$customer = \Stripe\Customer::create(array(
		'card'  => $token,
		'plan'	=> $plan,
        'email' => $email,
		'metadata' => array(
			'X Number' => $xnumber,
			'Phone'	   => $phone,
			'Employer' => $employer
		),
        'account_balance' => ($initiation ? $initiationAmount : 0)
	));
} 
catch (\Stripe\Error\Card $e) {

    // Since it's a decline, \Stripe\Error\Card will be caught
    $body = $e->getJsonBody();
    $err  = $body['error'];
    print('Status is:' . $e->getHttpStatus() . "\n");
    print('Type is:' . $err['type'] . "\n");
    print('Code is:' . $err['code'] . "\n");
    print('Param is:' . $err['param'] . "\n");
    print('Message is:' . $err['message'] . "\n");
}
catch (\Stripe\Error\RateLimit $e) {
    // Too many requests made to the API too quickly
}
catch (\Stripe\Error\InvalidRequest $e) {
    // Invalid parameters were supplied to Stripe's API
}
catch (\Stripe\Error\Authentication $e) {
    // Authentication with Stripe's API failed
    // (maybe you changed API keys recently)
} 
catch (\Stripe\Error\ApiConnection $e) {
    // Network communication with Stripe failed
} 
catch (\Stripe\Error\Base $e) {
    // Display a very generic error to the user, and maybe send
    // yourself an email
} 
catch (Exception $e) {
    // Something else happened, completely unrelated to Stripe
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="robots" content="<?php echo $robots; ?>">
	
	<title><?php echo $title . " | " . $secondaryTitle; ?></title>
	
	<!-- Bootstrap -->
    <link href="vendor/twitter/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="vendor/afarkas/html5shiv/dist/html5shiv.min.js"></script>
	<script src="vendor/rogeriopradoj/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color:#eee;">


<!-- 
---- Content
------------------------ -->

<p>&nbsp;</p>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 panel panel-default">
			<div class="panel-body">
			
				<!-- Standard header -->
				<header class="row clearfix hidden-xs">
					<div class="col-sm-4 col-md-3 col-sm-3">
						<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-circle img-responsive pull-left">
					</div>
					<div class="col-sm-8 col-md-9">
						<h1>
							<?php echo $title; ?>
							<br>
							<small><?php echo $secondaryTitle; ?></small>
						</h1>
					</div>
                </header>

				<!-- Extra small header -->
				<header class="row clearfix visible-xs-block">
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-circle img-responsive pull-left" style="width:64px; margin-right:15px">
					<h2 class="visible-xs-inline">
						<?php echo $title; ?>
						<br>
						<small><?php echo $secondaryTitle; ?></small>
					</h2>
				</header>
                <hr>				

				<div class="col-md-12">
					<div class="alert alert-success" role="alert">
					    <h2>Thank you!</h2>
						<p class="lead">
							We successfuly recieved $<?php echo $amount / 100; ?> for a <?php echo $recurring ? "recurring monthly" : "one time"; ?> dues payment.
						</p>
						<?php if($initiation) { ?>
						<p class="lead">
							We have also made a one time re-initiation charge of <?php echo $amount / 100; ?>.
						</p>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<a href="index.php" class="btn btn-primary btn-lg btn-block" role="button">Back to payment form</a>
                </div>
			</div>
		</div>
	</div>
</div>


<!--
---- Scripts 
------------------------ -->

<!-- jQuery -->
<script src="vendor/frameworks/jquery/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
