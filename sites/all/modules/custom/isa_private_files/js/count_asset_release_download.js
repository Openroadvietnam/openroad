jQuery(function() {
	var settingsConfig = Drupal.settings.isa_private_files;
	var getUrl = function(params){
		var classes = params.attr('class').replace(settingsConfig.linkClass,"");
		var url = settingsConfig.target + "?";
		var params = new Array();
		classes = classes.split(" ");
		for(var i in classes){
			if(classes[i].indexOf('nid') > -1 || classes[i].indexOf('did') > -1){
				params = classes[i].split("-");
				url += params[0] + "=" + params[1] + "&";
			}
		}
		return url;
	}
	jQuery("." + settingsConfig.linkClass).click(function(){
		var link = this;
		jQuery.ajax({
			url: getUrl(jQuery(this)),
			complete: function(e,msg){
				window.open(jQuery(link).attr('href'),'_self');
			}
		})
		return false;
	})
});