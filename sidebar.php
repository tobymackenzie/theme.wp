<?php
/*=====
Piece template: Renders both sidebar widget areas if enabled
=====*/

global $tjmThemeHelper;

$tjmThemeHelper->buffers->start('aside');

//=====debug
if(WP_DEBUG){
?>
<!--Debug
	@Template TJMBase/sidebar.php
-->
<?php
}

//=====content
if(is_active_sidebar('aside-1')){
?>
<aside class="widgetArea aside1 aside" role="complementary"><?php dynamic_sidebar('aside-1'); ?></aside>
<?php
}
if(is_active_sidebar('aside-2')){
?>
<aside class="widgetArea aside2 aside" role="complementary"><?php dynamic_sidebar('aside-2'); ?></aside>
<?php
}
$tjmThemeHelper->buffers->end('aside');
