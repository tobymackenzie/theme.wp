<div class="docHeaderWrap" id="masthead"><header class="docHeader" role="banner">
<?php
//--display jumpto link if
if(has_nav_menu('header') || is_active_sidebar('header-widget-area')){
?>
	<div class="docJumpActions"><a class="jumpAction" href="#docContent"><?php _e('Skip to content', 'tjmbase'); ?></a></div>
<?php
}
?>
	<?php echo $tjmThemeHelper->renderer->renderPiece('skeleton/headerContent'); ?>
<?php
if(has_nav_menu('header')){
	$menuObject = $tjmThemeHelper->getMenuObject('header');
	$menuHeading = ($menuObject->name)
		? $menuObject->name
		: _e('Navigation Menu', 'tjmbase')
	;
?>
	<div class="docMainNavWrap"><nav class="docMainNav" role="navigation">
		<h3 class="docMainNavHeading"><?php echo $menuHeading; ?></h3>
		<?php wp_nav_menu(Array(
			'menu_class'=> 'navList docMainNavList'
			,'theme_location'=> 'header'
			,'show_home'=> true
		)); ?>
	</nav></div>
<?php
}
if(is_active_sidebar('header-widget-area')){
?>
	<div class="widgetArea docHeaderWidgets"><?php dynamic_sidebar('header-widget-area'); ?></div>
<?php
}
?>
</header></div>
