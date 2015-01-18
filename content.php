<?php
/*=====
Content template: Renders the main content area when no more specific content templates exist.  TJMBase uses this template for all content types (eg 'index', 'single', 'archive', 'page', and 'search') except 'none'.
=====*/

global $tjmThemeHelper;

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Template TJMBase/content.php
-->
<?php
}

//=====content
?>
<article <?php post_class("entry entry-default entry-" . get_the_ID() . " h-entry"); ?> id="post-<?php the_ID(); ?>">
	<header class="entryHeader">
		<?php the_post_thumbnail(); ?>
<?php if(is_page() || is_single()){ ?>
		<h1 class="entryHeading p-name"><?php the_title(); ?></h1>
<?php	if(is_single()){ ?>
		<a class="entryPermalink permalink u-url" href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'tjmbase'), the_title_attribute(Array('echo'=> false)))); ?>" rel="bookmark"><?php _e('Permalink', 'tjmbase'); ?></a>
<?php
	}
}else{
?>
		<h1 class="entryHeading p-name"><a class="entryHeadingAction u-url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php
}
if(!is_page()){
?>
		<time class="dt-published entryTime" datetime="<?php the_time('Y-m-d G:i') ?>" pubdate="pubdate"><?php the_time('F jS, Y G:i') ?></time>
<?php	if(is_sticky() && is_home() && ! is_paged()){ ?>
		<div class="entryFeatured"><?php _e('Featured', 'tjmbase'); ?></div>
<?php
	}
	echo $tjmThemeHelper->renderer->renderPiece('tags', Array('tags'=> get_the_tags()));
}
if(is_single() && comments_open()){
?>
		<?php comments_popup_link(
			__('Leave a comment', 'tjmbase')
			,__('One Comment', 'tjmbase')
			,__('% Comments', 'tjmbase')
			,'entryGoToCommentsAction'
		); ?>
<?php
}
?>
		<?php edit_post_link(__('Edit', 'tjmbase'), '<span class="editActionWrap">', '</span>'); ?>
	</header>
<?php

//--Output entry content.  Excerpt for search results, full content for everything else.
if(is_search()){
?>
	<div class="entrySummary p-summary"><?php the_excerpt(); ?></div>
<?php }else{ ?>
	<div class="e-content entryContent">
		<?php the_content(__('Continue reading', 'tjmbase')); ?>
		<?php wp_link_pages(Array(
			'after'=> '</div>'
			,'before'=> '<div class="pageLinks">' . __('Pages:', 'tjmbase')
		)); ?>
	</div>
<?php } ?>
	<footer class="entryFooter">
<?php
//--Output author info for single post entry if the blog has multiple authors and author has a description
if(
	is_single()
	&& get_the_author_meta('description')
	&& is_multi_author() //-# does db query, so do last
){
	$tjmThemeHelper->renderer->render('authorInfo', Array('classes'=> 'entryAuthor'));
}
?>
	</footer>
</article>
