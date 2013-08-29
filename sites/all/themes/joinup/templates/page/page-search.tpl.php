<?php // $Id: page.tpl.php,v 0.00.5 2011/01/19 09:57:31 sebastien.millart Exp $ 
/**
 * @defgroup templates
 * @defgroup pages
 * @ingroup templates
 * 
 * 
 * @file
 * Default theme implementation for page.
 * 
 * This template defines the main skeleton for the page.
 * 
 * @ingroup pages
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language -> language ?>" lang="<?php print $language -> language ?>" dir="<?php print $language -> dir ?>">
	<head>
		<title><?php print $head_title; ?></title>
		<meta http-equiv="Content-Language" content="<?php print $language -> language ?>" />
		<?php print $head; ?>
		<?php print $styles; ?>
		<!--[if IE]>
			<link rel="stylesheet" href="<?php echo base_path(). path_to_theme() ?>/styles/default/ie.css" type="text/css" media="all"></link>
		<![endif]-->
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo base_path(). path_to_theme() ?>/styles/default/ie7.css" type="text/css" media="all"></link>
			<link rel="stylesheet" href="<?php echo base_path(). path_to_theme() ?>/styles/default/font-awesome-ie7.min.css" type="text/css" media="all"></link>
		<![endif]-->
		<!--[if IE 6]>
			<link rel="stylesheet" href="<?php echo base_path(). path_to_theme() ?>/styles/default/ie6.css" type="text/css" media="all"></link>
		<![endif]-->
		<?php print $scripts; ?>
		<!--[if lte IE 7]>
			<script type="text/javascript" src="<?php echo base_path(). path_to_theme() ?>/scripts/iequotes.js"></script>
		<![endif]-->
	</head>
	<body class="js">
		<a id="top-page" name="top-page"></a>
		<?php
			//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-841
			 //Load general css layout depending on the page and structure
		?>
		<div class="layout  layout-search <?php echo $extra_layout_css ?>" id="layout">
			<div id="header" class="clearfix">
				<div class="header-top clearfix">
					<img alt="European Commission logo" id="banner-flag" src="<?php echo base_path(). path_to_theme() ?>/images/commission/logo/logo_en.gif" />
					<h1 id="banner-image-title"><a href="<?php echo base_path() ?>" title="Joinup"  class="title-en logo"><img alt="<?php print $site_name ?> logo" src="<?php echo base_path(). path_to_theme() ?>/images/logo/joinup.png" /></a>
						<strong><?php echo $global_header_title ?></strong>
					</h1>
				
					<?php if ($header): ?>
						<div id="user-box" class="clearfix"><?php print $header; ?></div>
					<?php endif; ?>
					
				
				
			<p class="off-screen"><?php print t('Accessibility tools') ?></p>
					<ul class="reset-list" id="accessibility-menu">
						<li><a href="#content" accesskey="S"><?php print t('Go to main content [shortcut key S], by skipping navigation top bar, search box and navigation menu.') ?></a></li>
						<li><a href="#block-menu-primary-links"><?php print t('Go to navigation menu, by skipping navigation top bar and search box.') ?></a></li>
						<li><a href="#block-search-0"><?php print t('Go to search box, by skipping navigation top bar.') ?></a></li>
						<li><a href="#block-user-1"><?php print t('Go to navigation top bar.') ?></a></li>
						<li><a href="#block-quick-actions"><?php print t('Go to quick actions links, by skipping navigation top bar, search box, navigation menu and main content.') ?></a></li>
						<li><a href="#block-menu-secondary-links"><?php print t('Go to footer menu, by skipping navigation top bar, search box, navigation menu, main content and quick actions links.') ?></a></li>
					</ul>
					<?php if (isset($secondary_links)) : ?>
						<p class="off-screen"><?php print t('Service tools') ?></p>
						<div class="reset-list" id="services"><?php print theme_links($secondary_links); ?></div>
					<?php endif; ?>
					<ul class="reset-list language-selector-close">
						<li class="selected">
							<a lang="en" href="javascript:void(0)">
								<span class="off-screen"><?php print t('Current language:') ?> </span>
								<?php print t('English (en)') ?><img border="0" alt="" src="<?php echo base_path(). path_to_theme() ?>/images/commission/arrows-up.gif" />
							</a>
						</li>
					</ul>
					
				</div>
			</div>
			<div id="path">
				<p class="off-screen"><?php print t('Navigation path') ?></p>
				 <ul class="reset-list">
					 <li class="first"><a href="http://ec.europa.eu/"><?php print t('European Commission') ?></a> &#62; </li>
					 <li><a href="http://ec.europa.eu/isa/"><?php print t('ISA') ?></a> &#62; </li>
					 <li><?php if ($breadcrumb): print $breadcrumb; endif; ?></li>
				</ul>
			</div>
			<div class="layout-body">
				<div id="menu-wrapper">
					<?php if (isset($primary_links)) : ?>
						<?php print theme_links($primary_links); ?>
					<?php endif; ?>
				</div>
				
				<p class="off-screen"><?php print t('Additional tools') ?></p>
					<ul class="reset-list" id="additional-tools">
					  <li class="print"><a class="link-components" href="javascript:tools.printPage();" title="<?php print t('Print version')?>"><img alt="<?php print t('Print version') ?>" src="<?php echo base_path(). path_to_theme() ?>/images/commission/print.gif" /></a> </li>
					  <li class="font-decrease"><a class="link-components" href="javascript:tools.decreaseFontSize();" title="<?php print t('Decrease text') ?>"><img alt="<?php print t('Decrease text') ?>" src="<?php echo base_path(). path_to_theme() ?>/images/commission/font-decrease.gif" /></a> </li>
					  <li class="font-increase"><a class="link-components" href="javascript:tools.increaseFontSize();" title="<?php print t('Increase text') ?>"><img alt="<?php print t('Increase text') ?>" src="<?php echo base_path(). path_to_theme() ?>/images/commission/font-increase.gif" /></a> </li>
					</ul>
				<div class="layout-wrapper fluid container_16">
					<div class="layout-wrapper-reset">
						<?php if ($highlight): ?>
							<div id="highlight" class="slogan clearfix">
								<?php if ($highlight): ?>
										<?php print $highlight; ?>
									<!-- /#highlight-region -->
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php if ($tabs): ?>
						   <div id="tabs-wrapper" class="advancedSearchTabs">
							   <?php print $tabs ?>
						   </div>
					   <?php endif; ?>
						<div class="layout-left">
							<?php if ($left): ?>
								<div id="left-sidebar-region" class="colspan-<?php print $left_colspan; ?>">
									<?php print $left;?>
								</div>	<!-- /#left-sidebar-region -->
							<?php endif; ?>
						</div>	
						<?php
							//https://webgate.ec.europa.eu/CITnet/jira/browse/ISAICP-797
					 	   //Set diferent classs for content, user and issues pages
					    ?>
						<div class="layout-content <?php echo  $extra_layout_content_css ?>">
							<div class="layout-content-reset">
								<div id="content" class="fluid-<?php print $content_colspan; ?>">
									<?php if ($show_messages && $messages): print $messages; endif; ?>
								       <?php if ($before_content): ?>
									       <div id="before-content-region" class="clearfix">
										       <?php print $before_content ?>
									       </div>	<!-- /#before-content-region -->
								       <?php endif; ?>
								       <?php if ($title): ?>
									       <h2><?php print $title ?></h2>
									       <?php $header_text = variable_get('group_advanced_search_text_information', FALSE);
									       		echo token_replace($header_text, 'global');?>
								       <?php endif; ?>
								       <?php print $help; ?>
								       <div id="content-region">
									       <?php print $content ?>
								       </div>	<!-- /#content-region -->
								       <?php if ($after_content): ?>
									       <div id="after-content-region" class="clearfix">
										       <?php print $after_content ?>
									       </div>	<!-- /#after-content-region -->
								       <?php endif; ?>
								</div> 
							</div>
						</div>
					</div>
				</div>
				<div class="layout-right <?php $right_column_class?>">
					<?php if ($right): ?>
						<div id="right-sidebar-region" class="colspan-<?php print $right_colspan; ?>">
							<?php print $right; ?>
						</div>	<!-- /#right-sidebar-region -->
					<?php endif; ?>
				</div>
			</div>
			<div class="layout-footer">
				<div id="footer" class="grid16col clearfix">
					<div id="footer-region" class="colspan-16">
						<?php // print $feed_icons ?>
						<?php print $footer ?>
					</div>	<!-- /#footer-region -->
					<div class="goto-top"><a onclick="window.scrollTo(0,0);"><?php print t('Top') ?></a></div>
				</div>
			</div>
		</div>
		<?php print $closure; ?>
	</body>
</html>
