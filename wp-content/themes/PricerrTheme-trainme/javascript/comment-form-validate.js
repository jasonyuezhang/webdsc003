/*--------------------------------------------------
		 COMMENT FORM CODE
---------------------------------------------------*/
jQuery(document).ready(function($){
/*	jQuery('form#comment-form').submit(function() {
		jQuery('form#comment-form .contact-error').remove();
		var hasError = false;
		jQuery('form#comment-form .required').next('input').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
            	var labelText = jQuery(this).prev('label').text();
            	jQuery(this).parent().append('<span class="contact-error">Required</span>');
            	jQuery(this).addClass('inputError');
            	hasError = true;
            } else if(jQuery(this).hasClass('email')) {
            	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            	if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
            		var labelText = jQuery(this).prev('label').text();
            		jQuery(this).parent().append('<span class="contact-error">Invalid</span>');
            		jQuery(this).addClass('inputError');
            		hasError = true;
            	}
            }
		});
		if(!hasError) {
			var formInput = jQuery(this).serialize();
			jQuery.post(jQuery(this).attr('action'),formInput, function(data){
				jQuery("form#comment-form").before('<div class="contact-success"><strong>THANK YOU!</strong><p>Your comment was successfully sent.</p></div>');
			});
		}


		return false;

	});*/
	jQuery(".comment-list li").addClass("comment");
	jQuery("#comment-form").addClass("form");
	jQuery("#comment-form #submit").addClass("submit");
	jQuery("#reply-title").addClass("title");
	jQuery("#reply-title").after("<p>Make sure you fill in all mandatory fields.</p>")
});
       