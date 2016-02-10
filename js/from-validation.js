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
		return Stripe.card.validateExpiry(value);
	},
	errorMessage : 'Credit card expiration date is incorrect',
	errorMessageKey : 'badCreditCardEpiry'
});

// Validate the form. If successful proceed to token creation
$.validate({
    form : '#dues-form',
	onSuccess : function() {
		
		// Create Stripe single use token
		$('#submit-btn').prop('disabled', true);
		Stripe.card.createToken({
			name   : $('#inputName').val(),
			number : $('#inputCardNum').val(),
			exp    : $('#inputExpiration').val(),
			cvc    : $('#inputCVC').val()
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
