<?php
/*=====
Piece template: Renders the style block for handling custom backgrounds.  We simply modify the built in function to target <html> instead of <body>.
=====*/

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Piece: TJMBase:customBackgroundStyle
-->
<?php
}

//=====content
ob_start();
_custom_background_cb();
$content = ob_get_contents();
ob_end_clean();
$content = str_replace('body.custom-background', 'html.custom-background', $content);

echo $content;
