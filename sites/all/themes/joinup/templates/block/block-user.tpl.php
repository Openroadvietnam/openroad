<?php // $Id: block-user.tpl.php,v 0.1 2010/01/20 11:17:36 sebastien.millart Exp $ 
/**@file
 * @ingroup block
 */
if (!empty($block -> subject) && $logged_in){
	$logged_class = "menu-logged";
}
?>

<!-- BEGIN of the Template: block-user.tpl.php

	Title:		<?php ($block -> subject) ? print $block -> subject : print '(no title)'; ?>,
	Module:		<?php print $block -> module; ?>,
	Delta:		<?php print $block -> delta; ?>,
	Region:		<?php print $block -> region; ?>,
	Block ID:	<?php print $block_id; ?>.
		
-->

<div id="block-<?php print $block -> module .'-'. $block -> delta  ; ?>" class="clearfix block <?php echo $logged_class?>">
	<h2<?php if ($accessibility_class): print $accessibility_class; endif; ?>><?php print t('Navigation top bar'); ?></h2>
	<?php if (!empty($block -> subject) && $logged_in): ?>
        <h3><?php print t('Welcome') . ' ' . strip_tags(theme('username',user_load(array('name' => $block -> subject)))); ?></h3>
	<?php endif;?>
	<div class="content">
	<?php//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-840?>
	<?php //Added following lines to change the displayed text for Login and sign-up. Considering visitor and logged in user cases ?>
	<?php if (!empty($block -> subject) && $logged_in): ?>
	<?php print('<ul class="menu"><li class="leaf first"><a href="'.base_path().'people/dashboard">My Dashboard</a> or</li>
<li class="leaf last"><a href="'.base_path().'logout" title="">Logout</a></li>
</ul>')?>
	<?php endif;?>
	
	<?php if (!empty($block -> subject) && !$logged_in): ?>
	<?php //go to the same page after login ?>	
	<?php print('<ul class="menu"><li class="leaf first"><a href="'.base_path().'user/login?destination=' . drupal_get_path_alias($_GET['q']) . '" title="">Login</a> or</li>
<li class="leaf last"><a href="'.base_path().'user/register" title="">Sign up</a></li>
</ul>')?>
	<?php endif;?>
	
	</div>
</div>

<!-- END of the Template: block-user.tpl.php -->

