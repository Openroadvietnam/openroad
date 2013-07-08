// $Id: captcha.js,v 1.2 2011/02/02 10:07:39 soxofaan Exp $

// TODO: change this to Drupal.behaviors.captchaadmin = function (context) {}
$(document).ready(function(){

	// Add onclick handler to checkbox for adding a CAPTCHA description
	// so that the textfields for the CAPTCHA description are hidden
	// when no description should be added.
	$("#edit-captcha-add-captcha-description").click(function() {
		if ($("#edit-captcha-add-captcha-description").is(":checked")) {
			// Show the CAPTCHA description textfield(s).
			$("#edit-captcha-description-wrapper").show("slow");
		}
		else {
			// Hide the CAPTCHA description textfield(s).
			$("#edit-captcha-description-wrapper").hide("slow");
		}
	});
	// Hide the CAPTCHA description textfields if option is disabled on page load.
	if (!$("#edit-captcha-add-captcha-description").is(":checked")) {
		$("#edit-captcha-description-wrapper").hide();
	}

});

//CSR Modify the context attachment : javascript error on registration page
Drupal.behaviors.captcha =  function(context) {
//  attach: function (context) {
  // Turn off autocompletion for the CAPTCHA response field
  $("#edit-captcha-response").attr("autocomplete", "off");
  //}
};
