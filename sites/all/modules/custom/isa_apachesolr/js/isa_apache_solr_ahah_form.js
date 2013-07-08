jQuery(function() {
	//Get confg
	var ahahSettings = Drupal.settings.isa_apachesolr;
	jQuery(ahahSettings.submitButton).trigger('click');
	//Execute when an ahah call ends
	jQuery(document).ajaxComplete(function(e, xhr, settings){
		var ahahSettings = Drupal.settings.isa_apachesolr;
		if(ahahSettings.url == settings.url){//Execute only in the indicated form
			return;
		}
		jQuery(ahahSettings.toolboxId).find("a").click(function(){
			var url = URI.parse(jQuery(this).attr('href'));
			url = URI.parseQuery(url.query);
			jQuery(ahahSettings.hiddenSort).attr('value',url.solrsort);
			jQuery(ahahSettings.submitButton).trigger('click');
			return false;
		})
		jQuery(ahahSettings.paginationDiv).find("a").click(function(){
			var url = URI.parse(jQuery(this).attr('href'));
			url = URI.parseQuery(url.query);
			jQuery(ahahSettings.hiddenPage).attr('value',url.page);
			jQuery(ahahSettings.submitButton).trigger('click');
			jQuery(ahahSettings.hiddenPage).attr('value', '');
			return false;
		})
	})
});