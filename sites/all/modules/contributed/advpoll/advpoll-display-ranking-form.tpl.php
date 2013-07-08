<?php

/**
 * @file advpoll-display-ranking-form.tpl.php
 * Default theme implementation to show voting form for ranked polls.
 *
 * $writein_choice - writein_choice element, if poll needs it.
 * $form_id
 * $form_submit
 * $choice_list - choices in the poll.
 * $tabledrag_group_class
 * $footer_message - an optional message that can display below the poll. * 
 */
?>
<div class="poll">
  <div class="advpoll-available-choices">
    <div class="choice-header"><?php print t('Choices'); ?></div>
    <div class="vote-choices">
      <?php print $choice_list; ?>
    </div>
    <?php if (isset($writein_choice)): ?>
    <div class="writein-choice"><?php print $writein_choice; ?></div>
    <?php endif; ?>
  </div>
  <!-- table-drag re-ordering if JavaScript is enabled. -->
  <div class="advpoll-drag-box">
    <div class="advpoll-vote-header"><?php print t('Your Vote'); ?></div>
    <table cellspacing="0" id="<?php print $form_id ?>-table" class="advpoll-existing-choices-table">
    </table>
    <div class="vote-status"></div>
  </div>
  <?php print $form_submit; ?>
  <br />
  <?php if ($message): ?><p class="message"><?php print $message; ?></p><?php endif; ?>
 
</div>
<div class="clear-fix"></div>
  <?php if ($footer_message): ?>
  <p class="footer-message"><?php print $footer_message; ?></p>
  <?php endif; ?>  
