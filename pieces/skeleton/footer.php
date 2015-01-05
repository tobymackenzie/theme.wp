<div class="docFooterWrap"><footer class="docFooter" role="contentinfo">
<?php
if(is_active_sidebar('footer-widget-area')){
?>
	<div class="widgetArea docFooterWidgets">
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
	<div class="docFooterNavWrap"><nav class="docFooterNav" role="navigation">
		<h3 class="docFooterNavHeading"><?php echo $menuHeading; ?></h3>
		<?php wp_nav_menu(Array(
			'menu_class'=> 'navList docFooterNavList'
			,'theme_location'=> 'footer'
		)); ?>
	</nav></div>
<?php } ?>
</footer></div>
