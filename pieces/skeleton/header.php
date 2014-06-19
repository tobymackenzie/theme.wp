<header class="siteHeaderWrap" id="masthead" role="banner"><div class="siteHeader">
	<?php echo $tjmThemeHelper->renderer->renderPiece('skeleton/headerContent'); ?>
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
