<?php

/**
 * @file
 * Page callbacks for the advpoll module.
 */

/**
 * Remove an individual voter from the electoral list.
 */
function advpoll_remove_voter() {
  $nid = arg(1);
  $uid = arg(3);
  if ($uid && $node = node_load($nid)) {
    $result = db_query('SELECT name FROM {users} WHERE uid = %d', $uid);
    if ($user = db_fetch_object($result)) {
      db_query('DELETE FROM {advpoll_electoral_list} WHERE nid = %d AND uid = %d', $nid, $uid);
      drupal_set_message(t('%user removed from the electoral list.', array('%user' => $user->name)));
    }
    else {
      drupal_set_message(t('No user found with a uid of %uid.', array('%uid' => $uid)));
    }
  }
  drupal_goto('node/'. $node->nid .'/electoral_list');
}


/**
 * Callback for canceling a vote.
 */
function advpoll_cancel($node) {
  global $user;
  if (isset($node->type) && $node->voted && _advpoll_is_active($node)) {
    if ($user->uid && count($user_votes = votingapi_select_votes(array('content_type' => 'advpoll', 'content_id' => $node->nid, 'uid' => $user->uid))) > 0) {
      votingapi_delete_votes($user_votes);
    }
    else {
      $user_votes = votingapi_select_votes(array('content_type' => 'advpoll', 'content_id' => $node->nid, 'vote_source' => ip_address()));
      votingapi_delete_votes($user_votes);
    }

    $mode = _advpoll_get_mode($node->type);
    $function = 'advpoll_cancel_'. $mode;
    if (function_exists($function)) {
      $function($node, $user_votes);
    }
    votingapi_recalculate_results('advpoll', $node->nid);
    drupal_set_message(t('Your vote was canceled.'));
  }
  else {
    drupal_set_message(t('You are not allowed to cancel an invalid choice.'), 'error');
  }
  drupal_goto('node/'. $node->nid);
}
function _advpoll_settings () {
    $form['#tree'] = TRUE;

    $advpollSettings = variable_get('advpoll_settings', array());
    
    $form['advpoll_settings'] = array(
        '#type' => 'fieldset',
        '#title' => 'Advanced Poll Settings',
    );    
    $options['aftervote'] = t('After voting');
    $options['always'] = t('Always');
    $options['afterclose'] = t('After poll is closed');
    
    $form['advpoll_settings']['show_results'] = array(
        '#type' => 'radios',
        '#title' => 'Display results',
        '#default_value' => (!empty($advpollSettings['show_results'])) ? $advpollSettings['show_results'] : 'aftervote',
        '#options' => $options,
        '#description' => t('When should users who have permission to view vote results be able to see them?'),
    );      
    
    
    $form['advpoll_settings']['multiple_choice'] = array(
        '#type' => 'radios',
        '#title' => 'Multiple Choice Behavior',
        '#default_value' => (!empty($advpollSettings['multiple_choice'])) ? $advpollSettings['multiple_choice'] : '0',
        '#options' => array(t('Approval Voting'), t('Pool votes and choices')),
        '#description' => t('Approval voting weighs each votes against each individual choice.'),
    );      
    
    
    $form['advpoll_settings']['voting_mode'] = array(
        '#type' => 'radios',
        '#title' => 'Voting Mode',
        '#default_value' => (!empty($advpollSettings['voting_mode'])) ? $advpollSettings['voting_mode'] : '0',
        '#options' => array(t('Normal'), t('By Cookie'), t('Unlimited')),
        '#description' => t('Voting mode determines how users are tracked for votes. Normal follows VotingAPI settings, By Cookie uses a cookie, and Unlimited adds votes with no user tracking.'),
    );      
    
    $form['advpoll_settings']['cookie_duration'] = array(
        '#type' => 'textfield',
        '#title' => 'Cookie Duration',
        '#default_value' => (!empty($advpollSettings['cookie_duration'])) ? $advpollSettings['cookie_duration'] : 60,
        '#required' => FALSE,
        '#description' => t('If you have chosen to opt for cookies to track user voting, this is the duration of the cookie in minutes'),
    );      

    $form['advpoll_settings']['vote_registered'] = array(
        '#type' => 'textfield',
        '#title' => 'After voting messaging',
        '#default_value' => (!empty($advpollSettings['vote_registered'])) ? $advpollSettings['vote_registered'] : t('Your vote was registered.'),
        '#required' => FALSE,
        '#description' => t('Messaging that appears after a vote has been cast.'),
    );      

    $form['advpoll_settings']['ineligible_message'] = array(
        '#type' => 'textfield',
        '#title' => 'Messaging for ineligible voters.',
        '#default_value' => (!empty($advpollSettings['ineligible_message'])) ? $advpollSettings['ineligible_message'] : t('You are not eligible to vote in this poll.'),
        '#required' => FALSE,
        '#description' => t('Messaging that appears after a vote has been cast.'),
    );      
    
    
    $form['advpoll_settings']['vote_completed'] = array(
        '#type' => 'textfield',
        '#title' => 'Voting completed (cannot be cancelled)',
        '#default_value' => (!empty($advpollSettings['vote_completed'])) ? $advpollSettings['vote_completed'] : t('Thank you for voting.'),
        '#required' => FALSE,
        '#description' => t('Messaging appears when 1. user cannot cancel votes, 2. Results cannot be viewed and 3. user has voted.'),
    );      
    
    return system_settings_form($form);    
}
