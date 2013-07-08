//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-850
//Link to advanced search with actual values
jQuery(document).ready(function(){
	//Get config
	var pluginSetttings = Drupal.settings.isa_apachesolr;
	var uri = URI.parse(jQuery(pluginSetttings.searchLinkId).attr('href'));
	var query = URI.parseQuery(uri.query);
	jQuery(pluginSetttings.searchLinkId).click(function(){
		//Set GET vars in url
		var filters = '';
		jQuery(pluginSetttings.formId).find(pluginSetttings.filtersClass).each(function(i){
			if( undefined !== jQuery(this).attr('value') && undefined !== jQuery(this).attr('name') ){
				if( 'checkbox' == jQuery(this).attr('type') ){
					if(true === jQuery(this).attr('checked')){
						filters += jQuery(this).attr('value') + " ";
					}
				}else{
					filters += jQuery(this).attr('value') + " ";
				}
			}
		})
		query.filters = filters;
		var searchString = '';
		//Add to path the string to search
		if("" !== jQuery(pluginSetttings.searchIField).attr('value')){
			searchString = "/" + jQuery(pluginSetttings.searchIField).attr('value') ;
		}
		var url = pluginSetttings.searchPath  + searchString  + "?" + jQuery.trim( URI.buildQuery(query) );
		jQuery(this).attr('href' , url);
	})
})