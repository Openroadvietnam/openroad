/**
 * Add some user friendly behaviors for Term Fields module.
 */

Drupal.behaviors.termFields = function() {
  
  /**
   * "Add field" administration form helper.
   */
  if (Drupal.settings.termFields && Drupal.settings.termFields.typeDescriptions && Drupal.settings.termFields.widgetOptions) {
    var form = $('form#term-fields-admin-add-term-form:not(.term-fields-processed)');
    
    if (form.length) {
      form
        .addClass('term-fields-processed')
        .find('select[name=type]')
          .bind('change', function() {
            var value = $(this).val();
            var widgetSelect = form.find('select[name=widget]');
            var options = '';
            
            if (value == '' || ! Drupal.settings.termFields.widgetOptions[value]) {
              widgetSelect.attr('disabled', 'disabled');
              return;
            }
            
            for (i in Drupal.settings.termFields.widgetOptions[value]) {
              options += '<option value="'+ i +'">'+ Drupal.settings.termFields.widgetOptions[value][i]['title'] +'</option>';
            }
            
            widgetSelect
              .html(options)
              .removeAttr('disabled')
              .unbind('change')
              .bind('change', function() {
                var sibling = $(this).siblings('div.description');
                if (sibling.length) {
                  var option = $(this).val();
                  var description = Drupal.settings.termFields.widgetOptions[value][option]['description'] ? Drupal.settings.termFields.widgetOptions[value][option]['description'] : '';
                  sibling.html(description);
                }
              })
              .trigger('change');
          })
          .trigger('change');
    };
  } // End of "Add field" administration form helper.

};
