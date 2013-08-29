<?php

/**
 * Handler to display textareas correctly.
 */
class term_fields_handler_field_textarea extends term_fields_handler_field {
  
  function option_definition() {
    $options = parent::option_definition();
    unset($options['link_to_term']);
    
    return $options;
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    unset($form['link_to_term']);
  }

  function render($values) {
    if (! empty($this->term_fields_field->options['text_processing'])) {
      $format = ! empty($values->{$this->aliases[$this->additional_fields['format']]}) ?
        $values->{$this->aliases[$this->additional_fields['format']]} :
        FILTER_FORMAT_DEFAULT;
      return check_markup($values->{$this->field_alias}, $format, FALSE);
    }
      
    return check_plain($values->{$this->field_alias});
  }
}