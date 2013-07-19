<?php
/*=====
Piece template: Renders a single comment
=====*/

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Piece: TJMBase:authorInfo
-->
<?php
}

//=====data
if(isset($classes)){
	$classes .= ' ';
}else{
	$classes = '';
}
$classes .= 'author';

//=====content
?>
<div class="<?php echo $classes; ?>">
	<h2 class="authorHeading"><?php printf(__('About %s', 'tjmbase'), get_the_author()); ?></h2>
	<div class="authorAvatar">
		<?php echo get_avatar(get_the_author_meta('user_email'), 120); ?>
	</div>
	<p class="authorDescription"><?php the_author_meta('description'); ?></p>
	<div class="authorLink">
		<a class="authorAction" href="<?php echo esc_url(get_author_posts_url(get_author_meta('ID'))); ?>"><?php printf(__('View all of %s\'s posts', 'tjmbase'), get_the_author()); ?></a>
	</div>
</div>
