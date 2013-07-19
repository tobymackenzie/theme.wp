<?php
/*=====
Page template: Default page template when no other more specific page templates are defined.  Page templates are loaded directly by WordPress:  All other templates are loaded from actions in the page template.  TJMBase only has this one, but other common page templates include page.php for pages and single.php for single posts.
=====*/

//=====pre-content
get_header();

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Template TJMBase/index.php
-->
<?php
}

//=====content
if(have_posts()){
	while(have_posts()){
		the_post();
		get_template_part('content', get_post_format());
	}
	$postType = tjmGetPostType();
	if($postType !== 'page'){
		echo $tjmThemeHelper->renderer->renderPiece('relativeNav', Array('id'=> 'nav-below', 'type'=> $postType));
	}
	if($postType === 'single' || $postType === 'page'){
		comments_template('', true);
	}
}else{
	get_template_part('content', 'none');
}

//=====post-content
get_sidebar();
get_footer();
