<?php require_once('./config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="robots" content="<?php echo $robots; ?>">
	
    <title><?php echo $title . " | " . $secondaryTitle; ?></title>
	
	<!-- Bootstrap -->
    <link href="vendor/twitter/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

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

<p class="hidden-xs">&nbsp;</p>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-sm-12 col-md-offset-2 panel panel-default">
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
								
				<!-- Dues Form -->
				<form 
					class="form-horizontal" 
					id="dues-form" 
					action="charge.php" 
					method="post" 
					role="form">
				  
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-3" for="inputName">Full Name</label>
					<div class="col-md-8 col-sm-11">
						
						<input 
							type="text" 
							class="form-control" 
							id="inputName" 
                            data-validation="required"
                            data-validation-error-msg="Name field is required"
							tabindex="1"
							placeholder="Ben Fletcher">
							
						<span class="form-control-feedback"></span>
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  <div class="form-group form-group-lg has-feedback">
					<label for="inputEmail" class="col-md-3 control-label">Email</label>
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

                        <span class="form-control-feedback"></span>
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  <div class="form-group form-group-lg has-feedback">
					<label for="inputPhone" class="col-md-3 control-label">Phone</label>
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
                            data-validation-error-msg="Not a valid phone number"
                            placeholder="123-456-7890">

                        <span class="form-control-feedback"></span>						
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>			  
				  <div class="form-group form-group-lg has-feedback has-feedback">
					<label class="control-label col-md-3" for="inputXNum">X Number</label>
					<div class="col-md-8 col-sm-11">

						<input 
							type="text" 
							class="form-control" 
							id="inputXNum" 
							name="inputXNum"
							data-validation="custom"
							data-validation-optional="true"
                            data-validation-regexp="^(x|X)?[0-9]{6}$"
                            data-validation-error-msg="Not a valid X Number"
							tabindex="4"
							placeholder="X123456">

                        <span class="form-control-feedback"></span>						
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
                        <h4 style="padding-top:3px;">
                            <a href="#" data-toggle="modal" data-target="#XNumModal">
                                <span class="glyphicon glyphicon-question-sign"></span>
                            </a>
                        </h4>
					</div>
				  </div>
				  <div class="form-group form-group-lg has-feedback">
					<label for="inputEmployer" class="col-md-3 control-label">Employer</label>
					<div class="col-md-8 col-sm-11">
					
						<input 
							type="text" 
							class="form-control"
							id="inputEmployer" 
							name="inputEmployer"
							tabindex="5"
							data-validation="alphanumeric" 
							data-validation-allowing="-.,! "
							data-validation-optional="true"
							placeholder="">
						
                        <span class="form-control-feedback"></span>						
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
				  <hr>
				  <div class="form-group form-group-lg has-feedback">
					<label class="control-label col-md-3" for="inputCardNum">Card Number</label>
					<div class="col-md-8 col-sm-11">
							
						<input 
							type="text" 
							class="form-control" 
							id="inputCardNum" 
							data-validation="credit_card_number"
							tabindex="6"
							autocomplete="off"
							placeholder="1234-1234-1234-1234">
								
                        <span class="form-control-feedback"></span>						
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
						&nbsp;
					</div>
				  </div>
					
                  <div class="form-group form-group-lg has-feedback has-feedback">
					<label class="control-label col-md-3" for="inputExpiration">Expiration</label>
				    <div class="col-md-8 col-sm-11">	
						<input 
							type="text" 
							class="form-control" 
							id="inputExpiration" 
							data-validation="credit_card_expiry" 
							tabindex="7"
							autocomplete="off"
							placeholder="MM/YYYY">
						
                        <span class="form-control-feedback"></span>						
                    </div>
   					<div class="col-md-1 col-sm-1 hidden-xs">
						&nbsp;
					</div>
                 </div>
                <div class="form-group form-group-lg has-feedback has-feedback">
					<label class="control-label col-md-3" for="inputCVC">CVC</label>
					<div class="col-md-8 col-sm-11">
							
						<input 
							type="text" 
							class="form-control" 
							id="inputCVC" 
							data-validation="custom"
							data-validation-regexp="^[0-9]{3}$"
							tabindex="8"
							autocomplete="off"
							placeholder="123">
					  
                        <span class="form-control-feedback"></span>						
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
                        <h4 style="padding-top:3px;">
                            <a href="#" data-toggle="modal" data-target="#CVCModal">
                                <span class="glyphicon glyphicon-question-sign"></span>
                            </a>
                        </h4>
					</div>
				  </div>				  
				  <div class="form-group form-group-lg has-feedback">
					<label for="selectPlan" class="col-md-3 control-label">Monthly Dues</label>
					<div class="col-md-8 col-sm-11">
						
                        <select class="form-control" id="selectPlan" name="selectPlan" tabindex="9">
                            <?php
                            foreach($duesPlans as $plan => $caption) {
                                echo '<option value="' . $plan . '"' . ($plan == $duesPlansDefault ? ' selected="selected"' : '') . '>' . $caption . '</option>' . "\n";
                            }
                            ?>
						</select>
					
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
                        <h4 style="padding-top:3px;">
                            <a href="#" data-toggle="modal" data-target="#DuesAmountModal">
                                <span class="glyphicon glyphicon-question-sign"></span>
                            </a>
                        </h4>
					</div>
				  </div>
				  <div class="form-group form-group-lg has-feedback">
					<label class="col-sm-3 control-label">Membership</label>
					<div class="cols-md-offset-2 col-md-8 col-sm-11">
						<div class="btn-group btn-group-lg radio-segmented" data-toggle="buttons" style="width:100%">	
							<label class="btn btn-default btn-left active" style="width:50%">
							
								<input 
									type="radio" 
									id="yes-initiation" 
									name="radioInitiation" 
									value="true" 
									tabindex="10"
									checked> New/Returning
									
							</label>
							<label class="btn btn-default btn-right" style="width:50%">
							
								<input 
									type="radio" 
									id="no-initiation"
									name="radioInitiation" 									
									tabindex="11"
									value="false"> Current
									
							</label>						
						</div>
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
                        <h4 style="padding-top:3px;">
                            <a href="#" data-toggle="modal" data-target="#InitiationModal">
                                <span class="glyphicon glyphicon-question-sign"></span>
                            </a>
                        </h4>
					</div>
				  </div>
				  <hr>
				  <div class="form-group form-group-lg has-feedback">
					<div class="col-md-offset-3 col-md-8 col-sm-11">					
                        <button type="submit" class="btn btn-lg btn-primary btn-block" id="submit-btn" tabindex="12">
                            <?php echo $submitBtn; ?>
                        </button>		
					</div>
					<div class="col-md-1 col-sm-1 hidden-xs">
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


<!-- 
---- Modals 
------------------------ -->

<?php require_once('./modals.html'); ?>


<!-- 
---- Scripts 
------------------------ -->

<!-- jQuery -->
<script src="vendor/frameworks/jquery/jquery.min.js"></script>

<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v2/"></script>

<!-- Set Stripe publishable key -->
<script>
    Stripe.setPublishableKey('<?php echo $stripe['publishable_key']; ?>');
</script>

<!-- jQuery Form Validator -->
<script src="vendor/victorjonsson/jQuery-Form-Validator/form-validator/jquery.form-validator.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Event listeners -->
<script src="js/event-listeners.js"></script>

<!-- Validate form and process payment -->
<script src="js/form-validation.js"></script>

</body>
</html>
