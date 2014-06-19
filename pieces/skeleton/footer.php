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
