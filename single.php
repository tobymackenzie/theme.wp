<?php
/*
*/

get_header(); 

if (have_posts()){
	while (have_posts()){ the_post(); 
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class("item") ?>>
			<header>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<?php edit_post_link('Edit', '<div class="postmetadata editlink">', '</div>'); ?>
				<time class="postTime" datetime="<?php the_time('Y-m-d') ?>" pubdate="pubdate"><?php the_time('F jS, Y') ?></time>
			</header>

			<div class="entry">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</div>

			<footer class="postmetadata">
				<span class="postCategories">Posted in <?php the_category(', ') ?></span>
				<?php the_tags('<span class="postTags">Tags: ', ', ', '</span>'); ?>
				<!--<span class="postCommentsInfo"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span>-->
			</footer>
		</article>
<?php } ?>
		<?php comments_template(); ?>
		
		<!--<div class="navigation">
			<div class="next"><?php next_post_link('&laquo; %link') ?></div>
			<div class="previous"><?php previous_post_link('%link &raquo;') ?></div>
		</div>-->
<?php 
} 
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
