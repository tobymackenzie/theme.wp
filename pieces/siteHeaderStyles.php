<?php
/*=====
Piece template: Styles for site header, allowing default stylesheet to be overridden by settings.
=====*/

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Piece: TJMBase:siteHeaderStyles
-->
<?php
}

//=====content
?>
<style>
<?php
//--custom header text color
if(display_header_text()){
?>
	.siteLogoLink
	,.siteName
	,.siteDescription
	{
		color: #<?php echo $textColor; ?>
	}
<?php

//--hide header text
}else{
?>
	.siteLogo
	,.siteDescription
	{
		clip: rect(1px 1px 1px 1px); clip rect(1px, 1px, 1px, 1px);
		position: absolute !important;
	}
?>
<?php
}
?>
</style>
