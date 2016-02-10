// Listen to close buttons
$(".close-btn").click(function( event ) {
	event.preventDefault();
	$(this).parent().fadeOut();
});

// Dynamic form feedback
var feedbackClasses = {
	initial: 'form-control-feedback',
	success: 'glyphicon glyphicon-ok form-control-feedback',
	failure: 'glyphicon glyphicon-exclamation-sign form-control-feedback'
}
$('input').bind('validation', function(evt, isValid) {
	var $feedbackElem = $(this).parent().children('.form-control-feedback');
	
	// Required and valid
	if(isValid) {
		$feedbackElem.removeClass().addClass(feedbackClasses['success']);
	}
	// Optional and empty
	else if(!isValid && $(this).attr('data-validation-optional') == "true" && $(this).val() == "") {
		$feedbackElem.removeClass().addClass(feedbackClasses['initial']);
	}
	// Required and not valid
	else{
		$feedbackElem.removeClass().addClass(feedbackClasses['failure']);
	}
});
