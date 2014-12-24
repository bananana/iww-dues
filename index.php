<?php require_once('./config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="robots" content="<?php echo $robots; ?>">
	
	<title><?php echo $title; ?></title>
	
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


<!-- -----------------------
---- Content
------------------------ -->

<p class="hidden-xs">&nbsp;</p>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2 panel panel-default">
			<div class="panel-body">
				
				<div class="hidden-xs hidden-sm">
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-circle center-block">
					<h1 class="text-center"><?php echo $title; ?></h1>
				</div>
				<div class="visible-xs-block visible-sm-block col-md-8">
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-circle">
					<h3 class="text-center pull-right" style="width:150px;"><?php echo $title; ?></h3>
				</div>
				<hr>
								
				<!-- Dues Form -->
				<form 
					class="form-horizontal" 
					id="dues-form" 
					action="charge.php" 
					method="post" 
					role="form">
				  
				  <div class="form-group" id="instructions">
					<div class="col-md-8 col-sm-11 col-md-offset-2">

						<div class="alert alert-danger" id="errors" style="display:none;" role="alert"></div>						
					</div>
				  </div>
				  <div class="form-group form-group-lg">
					<label class="control-label col-md-2" for="inputName">Full Name</label>
					<div class="col-md-8 col-sm-11">
						<div class="input-group">
						
							<input 
								type="text" 
								class="form-control" 
								id="inputName" 
								data-validation="required"
								tabindex="1"
								placeholder="Ben Fletcher">
							
							<span class="input-group-addon" title="Required"><span class="glyphicon glyphicon-asterisk"></span></span>
						</div>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  <div class="form-group form-group-lg">
					<label for="inputEmail" class="col-md-2 control-label">Email</label>
					<div class="col-md-8 col-sm-11">
					
						<input 
							type="text" 
							class="form-control" 
							id="inputEmail" 
							name="inputEmail"
							data-validation-optional="true"
							data-validation="email" 
							tabindex="2"
							placeholder="email@service.com">
						
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  <div class="form-group form-group-lg">
					<label for="inputPhone" class="col-md-2 control-label">Phone</label>
					<div class="col-md-8 col-sm-11">
					
						<input 
							type="text" 
							class="form-control" 
							id="inputPhone" 
							name="inputPhone"
							tabindex="3"
							data-validation="custom"
							data-validation-optional="true"
							data-validation-regexp="^[0-9]{3}[-. ]?[0-9]{3}[-. ]?[0-9]{4}$"
							placeholder="123-456-7890">
						
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>			  
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-2" for="inputXNum">
						X Number
					</label>
					<div class="col-md-8 col-sm-11">

						<input 
							type="text" 
							class="form-control" 
							id="inputXNum" 
							name="inputXNum"
							data-validation="custom"
							data-validation-optional="true"
							data-validation-regexp="^(x|X)?[0-9]{6}$"
							tabindex="4"
							placeholder="X123456">

					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						<h4 style="padding-top:3px;"><a href="#" data-toggle="modal" data-target="#XNumModal"><span class="glyphicon glyphicon-question-sign"></span></a></h4>
					</div>
				  </div>
				  <hr>
				  <div class="form-group form-group-lg">
					<label class="control-label col-md-2" for="inputCardNum">Card Number</label>
					<div class="col-md-8 col-sm-11">
						<div class="input-group">
							
							<input 
								type="text" 
								class="form-control" 
								id="inputCardNum" 
								data-validation="credit_card_number"
								tabindex="5"
								autocomplete="off"
								placeholder="1234-1234-1234-1234">
								
							<span class="input-group-addon" title="Required"><span class="glyphicon glyphicon-asterisk"></span></span>
						</div>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
					
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-2" for="inputExpiration">Expiration</label>
					<div class="col-md-3 col-sm-11">
						<div class="input-group">
					
							<input 
								type="text" 
								class="form-control" 
								id="inputExpiration" 
								data-validation="credit_card_expiry" 
								tabindex="6"
								autocomplete="off"
								placeholder="MM/YYYY">
						
							<span class="input-group-addon" title="Required"><span class="glyphicon glyphicon-asterisk"></span></span>
						</div>
					</div>
					<div class="col-sm-1 hidden-lg hidden-md hidden-xs">
						&nbsp;
					</div>
				
					<label class="control-label col-md-2 hidden-sm" for="inputCVC"><br class="visible-xs-block">CVC</label>
					<div class="visible-sm-block col-sm-10"><br><strong>CVC</strong></div> <!-- Hack to fix alignent on small screens -->
					<div class="col-md-3 col-sm-11">
						<div class="input-group">
							
							<input 
								type="text" 
								class="form-control" 
								id="inputCVC" 
								data-validation="custom"
								data-validation-regexp="^[0-9]{3}$"
								tabindex="7"
								autocomplete="off"
								placeholder="123">
					  
							<span class="input-group-addon" title="Required"><span class="glyphicon glyphicon-asterisk"></span></span>
						</div>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						<h4 style="padding-top:3px;"><a href="#" data-toggle="modal" data-target="#CVCModal"><span class="glyphicon glyphicon-question-sign"></span></a></h4>
					</div>
				  </div>				  
				  <div class="form-group form-group-lg">
					<label for="selectAmount" class="col-md-2 control-label">Amount</label>
					<div class="col-md-8 col-sm-11">
						
						<select class="form-control" id="selectAmount" name="selectAmount" tabindex="8">
							<option value="500">$5.00 (subminimum)</option>
							<option value="900">$9.00 (minimum)</option>
							<option value="1800" selected>$18.00 (regular)</option>
							<option value="2700">$27.00 (maximum)</option>
						</select>
					
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						<h4 style="padding-top:3px;"><a href="#" data-toggle="modal" data-target="#DuesAmountModal"><span class="glyphicon glyphicon-question-sign"></span></a></h4>
					</div>
				  </div>
				  <div class="form-group form-group-lg">
					<label for="recurrance" class="col-sm-2 control-label">&nbsp;</label>
					<div class="cols-md-offset-2 col-md-8">
						<div class="btn-group btn-group-lg" style="width:100%">						
							<label class="btn btn-default" style="width:50%">
							
								<input 
									type="radio" 
									id="recurring" 
									name="radioRecurrance" 
									value="1" 
									tabindex="9"
									checked> Recurring
									
							</label>
							<label class="btn btn-default" style="width:50%">
							
								<input 
									type="radio" 
									id="one-time"
									name="radioRecurrance" 									
									tabindex="10"
									value="0"> One Time							
									
							</label>						
						</div>
					</div>
					<div class="col-md-2 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  <hr>
				  <div class="form-group form-group-lg">
					<div class="col-md-offset-2 col-md-8">					
						<button type="submit" class="btn btn-lg btn-primary btn-block" id="submit-btn" tabindex="11">Start Membership</button>		
					</div>
					<div class="col-md-2 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  
				  <input 
					type="hidden" 
					data-validation="length"
					data-validation-length="max0"
					value="">
					
				  <input 
					type="text" 
					style="display:none;"
					data-validation="length"
					data-validation-length="max0"
					value="">
					
				</form><!-- /dues-form -->
				
			</div><!-- /panel-body -->
		</div><!-- /panel -->
	</div><!-- /row -->
</div><!-- /container -->


<!-- -----------------------
---- Modals 
------------------------ -->

<!-- X Number -->
<div class="modal fade" id="XNumModal" tabindex="-1" role="dialog" aria-labelledby="XNumModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="XNumModalLabel">X Number</h4>
      </div>
      <div class="modal-body">
		<table class="table table-bordered">
			<tr>
				<th class="active">If you are currently signing up:</th>
				<th class="active">If you're already a member of IWW:</th>
			</tr>
			<tr>
				<td>This field is not required. X Number identifies your red card and proves your membership.</td>
				<td>You can find your X Number on the 1<sup>st</sup> page of your red card. It starts with an <strong>X</strong> followed by 6 digits.</td>
			</tr>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- CVC -->
<div class="modal fade" id="CVCModal" tabindex="-1" role="dialog" aria-labelledby="CCVModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="CCVModalLabel">CVC (Card Verification Code)</h4>
      </div>
      <div class="modal-body">
		This is a 3 digit code on the back of your credit or debit card.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Dues -->
<div class="modal fade" id="DuesAmountModal" tabindex="-1" role="dialog" aria-labelledby="DuesAmountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="DuesAmountModalLabel">IWW Dues</h4>
      </div>
      <div class="modal-body">
		<p>The monthly dues rates for the IWW are below. All amounts are in US dollars.</p>
		<table class="table table-bordered">
			<tr class="active"><th>Type</th><th>Amount</th><th>Condition</th></tr>
			<tr><td>Subminimum</td><td>$5.00</td><td>If you are currently unemployed</td></tr>
			<tr><td>Minimum</td><td>$9.00</td><td>If you make less than $2,000.00 per month</td></tr>
			<tr><td>Regular</td><td>$18.00</td><td>If you make between $2,000.00-$3,500.00 per month</td></tr>
			<tr><td>Maximum</td><td>$27.00</td><td>If you make more than $3,500.00 per month</td></tr>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- -----------------------
---- Scripts 
------------------------ -->

<!-- jQuery -->
<script src="vendor/frameworks/jquery/jquery.min.js"></script>

<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v2/"></script>

<!-- jQuery Form Validator -->
<script src="vendor/victorjonsson/jQuery-Form-Validator/form-validator/jquery.form-validator.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Validate form and process payment -->
<script>	
// Listen to close buttons
$(".close-btn").click(function( event ) {
	event.preventDefault();
	$(this).parent().fadeOut();
});

// Set Stripe publishable key
Stripe.setPublishableKey('<?php echo $stripe['publishable_key']; ?>');

// Custom validators
$.formUtils.addValidator({
	name : 'credit_card_number',
	validatorFunction : function(value, $el, config, language, $form) {
		return Stripe.card.validateCardNumber(value);
	},
	errorMessage : 'Credit card number is incorrect',
	errorMessageKey : 'badCreditCardNumber'
});
$.formUtils.addValidator({
	name : 'credit_card_expiry',
	validatorFunction : function(value, $el, config, language, $form) {			
		var $regexp = new RegExp(/^[0-9]{2}\/[0-9]{4}$/);
		if ($regexp.test(value)) {
			var monthAndYear = value.split("/");
			return Stripe.card.validateExpiry(monthAndYear[0], monthAndYear[1]);			
		}
		else {
			return false;
		}
	},
	errorMessage : 'Credit card expiration date is incorrect',
	errorMessageKey : 'badCreditCardEpiry'
});

// Validate the form. If successful proceed to token creation
$.validate({
	form : '#dues-form',
	onError : function() {
		//console.log('Form is not valid');
	},
	onSuccess : function() {
		//console.log('Form is valid');
		
		// Split the expiration date into month (index 0) and
		// year (index 1)
		var $expiration = $('#inputExpiration').val().split("/");
		
		// Create Stripe single use token
		$('#submit-btn').prop('disabled', true);
		Stripe.card.createToken({
			name: 		$('#inputName').val(),
			number: 	$('#inputCardNum').val(),
			exp_month: 	$expiration[0],
			exp_year: 	$expiration[1],
			cvc: 		$('#inputCVC').val()
		}, stripeResponseHandler);
		
		// Prevent the form from submitting with the default action
		return false;
	}
});

// Handle response from Stripe
function stripeResponseHandler(status, response) {	
	var $form = $('#dues-form');
	
	if (response.error) {
		// Show the errors on the form
		$('#errors').text(response.error.message);
		$('#errors').show();
		$('#submit-btn').prop('disabled', false);
	}
	else {
		// Response contains id and card, which contains additional card details
		var token = response.id;
		
		// Insert the token into the form so it gets submitted to the server
		$form.append($('<input type="hidden" name="stripeToken" />').val(token));
		
		// Submit
		$form.get(0).submit();
	}
}
</script>

</body>
</html>
