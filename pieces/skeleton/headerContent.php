<?php
/*=====
Piece template: Markup for site header.
=====*/

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Piece: TJMBase:siteHeaderContent
-->
<?php
}

//=====data
if(!isset($headerImage)){
	$headerImage = get_header_image();
}

//=====content
?>
<div class="siteHeaderContent">
	<div class="siteLogo">
<?php if(!is_front_page()){ ?>
		<a class="siteLogoLink" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
<?php
}
if(display_header_text() || empty($headerImage)){
?>
			<span class="siteName"><?php bloginfo('name'); ?></span>
<?php
}
if(!empty($headerImage)){
	//-# only fill alt text if header text isn't set.  Otherwise, text would be duplicated
?>
			<img
				alt="<?php if(!display_header_text()){ bloginfo('name'); } ?>"
				class="siteHeaderImage"
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
	<div class="siteDescription"><?php bloginfo('description'); ?></div>
<?php } ?>
</div>
