newjQuery.fn.selectedFacets = function(options) {
 var settingsSelectedFacets = newjQuery.extend( {
      'targetDiv'         : '.selected-facets-body',
      'sourceCheckboxes' : '.apachesolr-unclick',
      'resetUrl' : ''
    }, options);
    newjQuery(document).ready(function(){
          newjQuery(settingsSelectedFacets.sourceCheckboxes).each(function(i){
               newjQuery(this).each(function(e){
                    var element = newjQuery(this).parent().clone();
                    element.find('input').remove();
                    element.wrapInner('<div class="filterSelectedText"/>');
                    element.append('<div class="facet-filters-close"></div>');
                    element.find('.facet-filters-close').click(function(){
                         window.location.href = newjQuery(this).prev().find('a').attr('href');
                    })
                    var thisBlock = newjQuery(settingsSelectedFacets.targetDiv).append(element);
               })
          })
          if ( newjQuery(settingsSelectedFacets.targetDiv).find('.facet-filters-close').length ) {
               newjQuery(settingsSelectedFacets.targetDiv).append('<a href="' + settingsSelectedFacets.resetUrl + '">Clear filters</a>');
          }
    })
};