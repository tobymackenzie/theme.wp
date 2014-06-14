<?php
/*=====
Skeleton template: HTML
The skeleton wrapper for all normal pages.  The equivalent of 'header.php' and 'footer.php' in one file.  Requires files using this to use an output buffer and save the output into the 'main' buffer.
=====*/

if(!(isset($isXSLT) && $isXSLT)){
?>
<!DOCTYPE html>
<?php } ?>
<html <?php body_class('html ua-no-js'); ?> <?php language_attributes(); ?>>
	<head>
<?php /*--meta */ ?>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width" />
		<title><?php echo $pageTitle; ?></title>

<?php /*--links */ ?>
		<link rel="pingback" href="<?php echo bloginfo('pingback_url'); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php /*--styles (CSS) */ ?>
		<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_url'); ?>" />

<?php /*--behavior (JavaScript) */ ?>
		<script>
			document.getElementsByTagName('html')[0].className += ' ua-js';
		</script>
<?php //-# Loads shim to add support for HTML5 elements in older IE versions. ?>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/behavior/html5shiv.js"></script>
		<![endif]-->

		<?php wp_head(); ?>
	</head>
	<body <?php body_class('body'); ?> id="body">
		<div class="sitePageWrap hfeed site">
			<header class="siteHeaderWrap" id="masthead" role="banner"><div class="siteHeader">
				<?php echo $tjmThemeHelper->renderer->renderPiece('siteHeaderContent'); ?>
<?php
//--display jumpto link if
if(has_nav_menu('header') || is_active_sidebar('header-widget-area')){
?>
				<div class="jumpTo"><a href="#mainContent" title="<?php esc_attr_e('Skip to content', 'tjmbase'); ?>"><?php _e('Skip to content', 'tjmbase'); ?></a></div>
<?php
}
if(has_nav_menu('header')){
	$menuObject = $tjmThemeHelper->getMenuObject('header');
	$menuHeading = ($menuObject->name)
		? $menuObject->name
		: _e('Site Navigation Menu', 'tjmbase')
	;
?>
				<nav class="siteMainNavWrap" role="navigation"><div class="siteMainNav">
					<h3 class="siteMainNavHeading"><?php echo $menuHeading; ?></h3>
					<?php wp_nav_menu(Array(
						'menu_class'=> 'navList siteMainNavList'
						,'theme_location'=> 'header'
						,'show_home'=> true
					)); ?>
				</div></nav>
<?php
}
if(is_active_sidebar('header-widget-area')){
?>
				<div class="widgetArea headerWidgets"><?php dynamic_sidebar('header-widget-area'); ?></div>
<?php
}
?>
			</div></header>
			<div class="siteContentWrap">
<?php

//--main with wrapper
if($tjmThemeHelper->buffers->has('main')){
?>
				<main class="siteMain" id="mainContent" role="main"><?php echo $tjmThemeHelper->buffers->get('main'); ?></main>
<?php
}

//--aside/sidebar
if($tjmThemeHelper->buffers->has('aside')){
	echo $tjmThemeHelper->buffers->get('aside');
}
?>
			</div>
<?php
//--footer
?>
			<footer class="siteFooterWrap" role="contentinfo"><div class="siteFooter">
<?php
if(is_active_sidebar('footer-widget-area')){
?>
				<div class="widgetArea footerWidgets">
					<?php dynamic_sidebar('footer-widget-area'); ?>
				</div>
<?php
}
if(has_nav_menu('footer')){
	$menuObject = $tjmThemeHelper->getMenuObject('footer');
	$menuHeading = ($menuObject->name)
		? $menuObject->name
		: _e("Additional Navigation", 'tjmbase')
	;
?>
				<nav class="siteFooterNavWrap" role="navigation"><div class="siteFooterNav">
					<h3 class="siteFooterNavHeading"><?php echo $menuHeading; ?></h3>
					<?php wp_nav_menu(Array(
						'menu_class'=> 'navList siteFooterNavList'
						,'theme_location'=> 'footer'
					)); ?>
				</div></nav>
<?php } ?>
			</div></footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
