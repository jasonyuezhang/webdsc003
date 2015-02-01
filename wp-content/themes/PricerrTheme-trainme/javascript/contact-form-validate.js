/*--------------------------------------------------
		 CONTACT FORM CODE
---------------------------------------------------*/
jQuery(document).ready(function($){
	jQuery('form#contact-form').submit(function() {
		jQuery('form#contact-form .contact-error').remove();
		var hasError = false;
		jQuery('form#contact-form .requiredField').each(function() {
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
				jQuery("form#contact-form").before('<div class="contact-success"><strong>THANK YOU!</strong><p>Your email was successfully sent. We will contact you as soon as possible.</p></div>');
			});
		}


		return false;

	});
});

/*--------------------------------------------------
		 CONTACT POPUP WINDOW CODE
---------------------------------------------------*/
jQuery(document).ready(function() {
	jQuery('a.contact-button').click(function() {
		var loginBox = jQuery(this).attr('href');
		//Fade in the Popup
		jQuery(loginBox).fadeIn(300);
		var popMargTop = (jQuery(loginBox).height() + 24) / 2;
		var popMargLeft = (jQuery(loginBox).width() + 24) / 2;
		jQuery(loginBox).css({
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});		
		jQuery('body').append('<div id="contact-mask"></div>');
		jQuery('#contact-mask').fadeIn(300);
		return false;
	});	
	jQuery('a.close, #contact-mask').live('click', function() {
	  jQuery('#contact-mask , .contact-popup').fadeOut(300 , function() {
		jQuery('#contact-mask').remove();
	}); 
	return false;
	});
});        