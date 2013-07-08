// $Id: filefield.js,v 1.28 2010/12/08 21:08:25 quicksketch Exp $

/**
 * Auto-attach standard client side file input validation.
 */
 
Drupal.behaviors.filefieldValidateAutoAttach = function(context) {
  $("input[type=file]").next().attr('disabled', 'true');
  $("input[type=file]", context).bind('change', Drupal.filefield.validateExtensions);
};


/**
 * Prevent FileField uploads when using buttons not intended to upload.
 */
Drupal.behaviors.filefieldButtons = function(context) {
  $('input.form-submit', context).bind('mousedown', Drupal.filefield.disableFields);
  $('div.filefield-element input.form-submit', context).bind('mousedown', Drupal.filefield.progressBar);
};

/**
 * Open links to files within the node form in a new window.
 */
Drupal.behaviors.filefieldPreviewLinks = function(context) {
  $('div.filefield-element div.widget-preview a', context).click(Drupal.filefield.openInNewWindow).attr('target', '_blank');
}

/**
 * Admin enhancement: only show the "Files listed by default" when needed.
 */
Drupal.behaviors.filefieldAdmin = function(context) {
  var $listField = $('div.filefield-list-field', context);
  if ($listField.size()) {
    $listField.find('input').change(function() {	
      if (this.checked) {
        if (this.value == 0) {
          $('#edit-list-default-wrapper').css('display', 'none');
        }
        else {
          $('#edit-list-default-wrapper').css('display', 'block');
        }
      }
    }).change();	
  }
	//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-658
	//Changed the form. Choice between url or file
	var distribution = Array();
	var documentation = Array();
	$("#edit-field-distribution-access-url1-0-url-wrapper label").hide();
    $("#edit-field-distribution-access-url-0-upload1-wrapper label").hide();
	$("#edit-field-documentation-access-url1-0-url-wrapper label").hide();
    $("#edit-field-documentation-access-url-0-upload1-wrapper label").hide();
	if ($("#edit-field-distribution-access-url-0-fid").val() > 0) {		
		$("#edit-field-distribution-access-url-0-upload1-wrapper").show();
		$("#edit-field-distribution-access-url1-0-url-wrapper").hide();	
		distribution[0] = 'checked';
		distribution[1] = '';
	} else {
		$("#edit-field-distribution-access-url-0-upload1-wrapper").hide();
		$("#edit-field-distribution-access-url1-0-url-wrapper").show();		
		distribution[0] = '';
		distribution[1] = 'checked';
	}
	
	if ($("#edit-field-documentation-access-url-0-fid").val() > 0) {			
		$("#edit-field-documentation-access-url-0-upload1-wrapper").show();
		$("#edit-field-documentation-access-url1-0-url-wrapper").hide();
		documentation[0] = 'checked';
		documentation[1] = '';
	} else {	
		$("#edit-field-documentation-access-url-0-upload1-wrapper").hide();
		$("#edit-field-documentation-access-url1-0-url-wrapper").show();
		documentation[0] = '';
		documentation[1] = 'checked';
	}

	if (!$("#url_file_selector_dist input[type=radio][name=group1_dist]").val()) {		
		var radio_selector_dist = "<div id='url_file_selector_dist' class='form-item'><label   >Access URL or file <span class='form-required' title='This field is required.'>*</span></label> <br /><input type='radio' name='group1_dist' value='url' id='url_group1_dist_url' " + distribution[1] + "> Url<br><input type='radio' name='group1_dist' value='file' id='url_group1_dist_file' " + distribution[0] + "> File<br></div> ";    
		$("#edit-field-distribution-access-url1-0-url-wrapper").before(radio_selector_dist);  	
	}
	
	if (!$("#url_file_selector_doc input[type=radio][name=group1_doc]").val() ){		
		var radio_selector_doc = "<div id='url_file_selector_doc' class='form-item'><label   >Access URL or file <span class='form-required' title='This field is required.'>*</span></label> <br /><input type='radio' name='group1_doc' value='url' id='url_group1_doc_url' " + documentation[1] + "> Url<br><input type='radio' name='group1_doc' value='file' id='url_group1_doc_file' " + documentation[0] + "> File<br></div> ";       
		$("#edit-field-documentation-access-url1-0-url-wrapper").before(radio_selector_doc);  	        
	}
	
   //display 2 check box to chose url or fileupload   
    $("#url_file_selector_dist input[type=radio][name=group1_dist]").click(
        function(){
            if(this.value=="file")	
            {
                $("#edit-field-distribution-access-url-0-upload1-wrapper").show();
                $("#edit-field-distribution-access-url1-0-url-wrapper").hide();				
            }
            else if (this.value=="url")
            {
                $("#edit-field-distribution-access-url-0-upload1-wrapper").hide();
                $("#edit-field-distribution-access-url1-0-url-wrapper").show();				
            }   
        });    
		
	//display 2 check box to chose url or fileupload
	$("#url_file_selector_doc input[type=radio][name=group1_doc]").click(
        function(){
            if(this.value=="file")	
            {              
				$("#edit-field-documentation-access-url-0-upload1-wrapper").show();
                $("#edit-field-documentation-access-url1-0-url-wrapper").hide();
            }
            else if (this.value=="url")
            {                
				$("#edit-field-documentation-access-url-0-upload1-wrapper").hide();
                $("#edit-field-documentation-access-url1-0-url-wrapper").show();
            }   
        });    
};

/**
 * Utility functions for use by FileField.
 * @param {Object} event
 */
Drupal.filefield = {
  validateExtensions: function(event) {
    // Remove any previous errors.
    $('.file-upload-js-error').remove();
    var fieldName = this.name.replace(/^files\[([a-z0-9_]+)_\d+\]$/, '$1');
    var extensions = '';
    if (Drupal.settings.filefield && Drupal.settings.filefield[fieldName]) {
      extensions = Drupal.settings.filefield[fieldName].replace(/[, ]+/g, '|');
    }
    if (extensions.length > 1 && this.value.length > 0) {
      var extensionPattern = new RegExp('\\.(' + extensions + ')$', 'gi');
      if (!extensionPattern.test(this.value)) {
        var error = Drupal.t("The selected file %filename cannot be uploaded. Only files with the following extensions are allowed: %extensions.",
          { '%filename' : this.value, '%extensions' : extensions.replace(/\|/g, ', ')}
        );
        $(this).before('<div class="messages error file-upload-js-error">' + error + '</div>');
        this.value = '';
        $(this).next().attr('disabled', 'true');
        return false;
      }
    }
    $(this).next().removeAttr('disabled');
  },
  disableFields: function(event) {
    var clickedButton = this;

    // Only disable upload fields for AHAH buttons.
    if (!$(clickedButton).hasClass('ahah-processed')) {
      return;
    }

    // Check if we're working with an "Upload" button.
    var $enabledFields = [];
    if ($(this).parents('div.filefield-element').size() > 0) {	
      $enabledFields = $(this).parents('div.filefield-element').find('input.form-file');
    }
    // Otherwise we're probably dealing with CCK's "Add another item" button.
    else if ($(this).parents('div.content-add-more').size() > 0) {
      $enabledFields = $(this).parent().parent().find('input.form-file');
    }

    var $disabledFields = $('div.filefield-element input.form-file').not($enabledFields);

    // Disable upload fields other than the one we're currently working with.
    $disabledFields.attr('disabled', 'disabled');

    // All the other mousedown handlers (like AHAH) are excuted before any
    // timeout functions will be called, so this effectively re-enables
    // the filefields after the AHAH process is complete even though it only
    // has a 1 millisecond timeout.
    setTimeout(function(){
      $disabledFields.attr('disabled', '');
    }, 1000);	
	
  },
  progressBar: function(event) {
    var clickedButton = this;
    var $progressId = $(clickedButton).parents('div.filefield-element').find('input.filefield-progress');
    if ($progressId.size()) {
      var originalName = $progressId.attr('name');

      // Replace the name with the required identifier.
      $progressId.attr('name', originalName.match(/APC_UPLOAD_PROGRESS|UPLOAD_IDENTIFIER/)[0]);

      // Restore the original name after the upload begins.
      setTimeout(function() {
        $progressId.attr('name', originalName);
      }, 1000);
    }

    // Show the progress bar if the upload takes longer than 3 seconds.
    setTimeout(function() {
      $(clickedButton).parents('div.filefield-element').find('div.ahah-progress-bar').slideDown();
    }, 500);
  },
  openInNewWindow: function(event) {
    window.open(this.href, 'filefieldPreview', 'toolbar=0,scrollbars=1,location=1,statusbar=1,menubar=0,resizable=1,width=500,height=550');
    return false;
  }
};
