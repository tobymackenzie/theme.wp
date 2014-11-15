<?php
/*=====
Piece template: Styles for doc header, allowing default stylesheet to be overridden by settings.
=====*/

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Piece: TJMBase:docHeaderStyles
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
	.docLogoAction
	,.docSiteName
	,.docSiteDescription
	{
		color: #<?php echo $textColor; ?>
	}
<?php

//--hide header text
}else{
?>
	.docLogo
	,.docSiteDescription
	{
		clip: rect(1px 1px 1px 1px); clip rect(1px, 1px, 1px, 1px);
		position: absolute !important;
	}
?>
<?php
}
?>
</style>
