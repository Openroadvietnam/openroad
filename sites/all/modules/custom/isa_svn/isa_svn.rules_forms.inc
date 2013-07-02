<?php
/**
 * @file
 * @ingroup isa_svn
 */

/**
 *
 * @param array $settings
 * @param type $form 
 */
function isa_svn_action_new_repo_form($settings, &$form) {
  $settings += array('message' => '', 'error' => '');
  $form['settings']['tool'] = array(
    '#type' => 'select',
    '#title' => t('Version control tool'),
    '#default_value' => $settings['tool'],
    '#options' => array('SVN'),
    '#description' => t('Select your usual version control system tool'),
  );
}

/**
 *
 * @param type $arg 
 */
function isa_svn_action_new_repo_validate($arg) {
  $settings = $arg['#post']['settings'];
  // placeholder
}

/**
 *
 * @param type $form_id
 * @param type $form_values 
 */
function isa_svn_action_new_repo_submit($form_id, $form_values) {
  $settings = $form_values['#post']['settings'];
  // placeholder
}
