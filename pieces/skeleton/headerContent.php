<?php
/*=====
Piece template: Markup for doc header.
=====*/

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Piece: TJMBase:headerContent
-->
<?php
}

//=====data
if(!isset($headerImage)){
	$headerImage = get_header_image();
}

//=====content
?>
<div class="docHeaderContent">
	<div class="docLogo">
<?php if(!is_front_page()){ ?>
		<a class="docLogoAction" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
<?php
}
if(display_header_text() || empty($headerImage)){
?>
			<span class="docSiteName"><?php bloginfo('name'); ?></span>
<?php
}
if(!empty($headerImage)){
	//-# only fill alt text if header text isn't set.  Otherwise, text would be duplicated
?>
			<img
				alt="<?php if(!display_header_text()){ bloginfo('name'); } ?>"
				class="docHeaderImage"
				height="<?php echo get_custom_header()->height; ?>"
				src="<?php echo esc_url($headerImage); ?>"
				title="<?php echo esc_attr(get_bloginfo('name')); ?>"
				width="<?php echo get_custom_header()->width; ?>"
			/>
<?php
}
if(!is_front_page()){
?>
		</a>
<?php } ?>
	</div>
<?php if(display_header_text() && get_bloginfo('description')){ ?>
	<div class="docSiteDescription"><?php bloginfo('description'); ?></div>
<?php } ?>
</div>
