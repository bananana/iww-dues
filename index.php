<?php require_once('./config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="robots" content="<?php echo $robots; ?>">
	
	<title><?php echo $title; ?></title>
	
	<!-- Bootstrap -->
	<link href="vendor/twitter/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom styles -->
	<style>
		body {
			background-color:#eee;
		}
		.help-btn {
			padding-top:3px;
		}
		.form-control-feedback {
			margin-top:6px;
		}
	</style>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="vendor/afarkas/html5shiv/dist/html5shiv.min.js"></script>
	<script src="vendor/rogeriopradoj/respond/dest/respond.min.js"></script>
	<![endif]-->
</head>
<body>


<!-- =======================
---- Content
------------------------ -->

<p class="hidden-xs">&nbsp;</p>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2 panel panel-default">
			<div class="panel-body">
				
				<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-circle center-block">
				<h1 class="text-center"><?php echo $title; ?></h1>
				<hr>
					
				<!-- Dues Form -->
				<form 
					class="form-horizontal" 
					id="dues-form" 
					action="charge.php" 
					method="post" 
					role="form">
				  
				  <div class="form-group form-group-lg has-feedback">
					<label for="inputName" class="col-md-2 control-label">Full Name</label>
					<div class="col-md-8 col-sm-11">
						
						<input 
							type="text" 
							class="form-control" 
							id="inputName"
							data-validation="required"
							tabindex="1"
							placeholder="Ben Fletcher">
						
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  <div class="form-group form-group-lg has-feedback">
					<label for="inputEmail" class="col-md-2 control-label">Email</label>
					<div class="col-md-8 col-sm-11">
					
						<input 
							type="text" 
							class="form-control" 
							id="inputEmail" 
							name="inputEmail"
							data-validation="email" 
							tabindex="2"
							placeholder="email@service.com">
							
						<span class="form-control-feedback"></span>						
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  <!--
				  <div class="form-group form-group-lg has-feedback">
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
						
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  -->
				  <hr>
				  			  
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-2" for="inputXNum">X Number</label>
					<div class="col-md-8 col-sm-11">

						<input 
							type="text" 
							class="form-control" 
							id="inputXNum" 
							name="inputXNum"
							data-validation="custom"
							data-validation-regexp="^(x|X)?[0-9]{6}$"
							tabindex="4"
							placeholder="X123456">
						
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						<h4 class="help-btn">
							<a href="#" data-toggle="modal" data-target="#XNumModal">
								<span class="glyphicon glyphicon-question-sign"></span>
							</a>
						</h4>
					</div>
				  </div>
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-2" for="inputIUNum">IU</label>
					<div class="col-md-8 col-sm-11">

						<input 
							type="text" 
							class="form-control" 
							id="inputIUNum" 
							name="inputIUNum"
							data-validation="custom"
							data-validation-optional="true"
							data-validation-regexp="^[0-9]{3}$"
							tabindex="5"
							placeholder="460">
						
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						<h4 class="help-btn">
							<a href="#" data-toggle="modal" data-target="#IUNumModal">
								<span class="glyphicon glyphicon-question-sign"></span>
							</a>
						</h4>
					</div>
				  </div>
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-2" for="inputDelNum">Delegate</label>
					<div class="col-md-8 col-sm-11">

						<input 
							type="text" 
							class="form-control" 
							id="inputDelNum" 
							name="inputDelNum"
							data-validation="number"
							tabindex="6"
							placeholder="1234">
						
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						<h4 class="help-btn">
							<a href="#" data-toggle="modal" data-target="#DelNumModal">
								<span class="glyphicon glyphicon-question-sign"></span>
							</a>
						</h4>
					</div>
				  </div>
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-2" for="inputDateLastPaid">Last Paid</label>
					<div class="col-md-8 col-sm-11">

						<input 
							type="text" 
							class="form-control" 
							id="inputDateLastPaid" 
							name="inputDateLastPaid"
							data-validation="date"
							data-validation-format="mm/dd/yyyy"
							tabindex="7"
							placeholder="mm/dd/yyyy">
						
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						<h4 class="help-btn">
							<a href="#" data-toggle="modal" data-target="#DateLastPaidModal">
								<span class="glyphicon glyphicon-question-sign"></span>
							</a>
						</h4>
					</div>
				  </div>
				  <hr>
				  
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-2" for="inputCardNum">Card Number</label>
					<div class="col-md-8 col-sm-11">
							
						<input 
							type="text" 
							class="form-control" 
							id="inputCardNum" 
							autocomplete="off"
							data-validation="credit_card_number"
							tabindex="8"
							placeholder="1234-1234-1234-1234">
								
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-2" for="inputExpiration">Expiration</label>
					<div class="col-md-3 col-sm-11">
					
						<input 
							type="text" 
							class="form-control" 
							id="inputExpiration" 
							autocomplete="off"
							data-validation="credit_card_expiry" 
							tabindex="9"
							placeholder="MM/YYYY">
						
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-sm-1 hidden-lg hidden-md hidden-xs">
						&nbsp;
					</div>
					<label class="control-label col-md-2 hidden-sm" for="inputCVC"><br class="visible-xs-block">CVC</label>
					<div class="visible-sm-block col-sm-10"><br><strong>CVC</strong></div> <!-- Hack to fix alignent on small screens -->
					<div class="col-md-3 col-sm-11">
							
						<input 
							type="text" 
							class="form-control" 
							id="inputCVC"
							autocomplete="off"							
							data-validation="custom"
							data-validation-regexp="^[0-9]{3}$"
							tabindex="10"
							placeholder="123">
					  
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						<h4 class="help-btn">
							<a href="#" data-toggle="modal" data-target="#CVCModal">
								<span class="glyphicon glyphicon-question-sign"></span>
							</a>
						</h4>
					</div>
				  </div>				  
				  <div class="form-group form-group-lg">
					<label for="selectAmount" class="col-md-2 control-label">Amount</label>
					<div class="col-md-8 col-sm-11">
						
						<select 
							class="form-control" 
							id="selectAmount" 
							name="selectAmount" 
							tabindex="11">
								<option value="500">$5.00 (subminimum)</option>
								<option value="900">$9.00 (minimum)</option>
								<option value="1800" selected>$18.00 (regular)</option>
								<option value="2700">$27.00 (maximum)</option>
						</select>
					
					</div>
					<div class="col-md-2 col-sm-1 hidden-xs">
						<h4 class="help-btn">
							<a href="#" data-toggle="modal" data-target="#DuesAmountModal">
								<span class="glyphicon glyphicon-question-sign"></span>
							</a>
						</h4>
					</div>
				  </div>
				  <div class="form-group form-group-lg">
					<label for="recurrance" class="col-sm-2 control-label">&nbsp;</label>
					<div class="cols-md-offset-2 col-md-8">
						<div class="btn-group btn-group-lg radio-segmented" data-toggle="buttons" style="width:100%">
							<label class="btn btn-default active" for="recurring" style="width:50%">
							
								<input
									type="radio"
									class="pull-left"
									id="recurring"
									name="radioRecurrance"
									value="1"
									tabindex="12"
									autocomplete="off"
									checked> Recurring
								  
							</label>
							<label class="btn btn-default" for="one-time" style="width:50%">
								
								  <input
								  	type="radio"
								  	class="pull-right"
								  	id="one-time"
								  	name="radioRecurrance"
								  	tabindex="13"
									autocomplete="off"
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
					
						<button 
							type="submit" 
							class="btn btn-lg btn-primary btn-block" 
							id="submit-btn" 
							tabindex="14"><?php echo $submit_btn; ?>
						</button>		
							
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


<!-- =======================
---- Modals 
------------------------ -->

<?php require_once('./modals.html'); ?>


<!-- =======================
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
// Set Stripe publishable key
Stripe.setPublishableKey('<?php echo $stripe['publishable_key']; ?>');

// Listen to modal close buttons
$(".close-btn").click(function( event ) {
	event.preventDefault();
	$(this).parent().fadeOut();
});

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
		var regexp = new RegExp(/^[0-9]{2}\/[0-9]{4}$/);
		if (regexp.test(value)) {
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

// Validate the form, if successful, proceed to token creation
$.validate({
	form : '#dues-form',
	onError : function() {
		//console.log('Form is not valid');
	},
	onSuccess : function() {
		//console.log('Form is valid');
		
		// Split the expiration date into month (index 0) and year (index 1)
		var $expiration = $('#inputExpiration').val().split("/");
		
		// Disable submit button
		$('#submit-btn').prop('disabled', true);
		
		// Create Stripe single use token
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

// Dynamic form feedback
var feedbackClasses = {
	initial: 'form-control-feedback',
	success: 'glyphicon glyphicon-ok form-control-feedback',
	failure: 'glyphicon glyphicon-warning-sign form-control-feedback'
}
$('input').bind('validation', function(evt, isValid) {
	var $feedbackElem = $(this).parent().children('.form-control-feedback');
	
	// If required and valid
	if(isValid) {
		$feedbackElem.removeClass().addClass(feedbackClasses['success']);
	}
	// If optional and empty (not valid)
	else if(!isValid && $(this).attr('data-validation-optional') == "true" && $(this).val() == "") {
		$feedbackElem.removeClass().addClass(feedbackClasses['initial']);
	}
	// If required and not valid
	else{
		$feedbackElem.removeClass().addClass(feedbackClasses['failure']);
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
