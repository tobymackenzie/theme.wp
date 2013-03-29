<?php
/*
*/

get_header(); 

if (have_posts()){
?>
			<section class="items">
<?php
	while (have_posts()){ the_post(); 
?>
				<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
					<header>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<?php edit_post_link('Edit', '<div class="postmetadata editlink">', '</div>'); ?>
						<time class="postTime" datetime="<?php the_time('Y-m-d') ?>" pubdate="pubdate"><?php the_time('F jS, Y') ?></time>
						<!-- by <?php the_author() ?> -->
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
				<nav class="relativenavigation">
					<div class="next"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="previous"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				</nav>
			</section><!-- items -->
<?php 
}else{ 
?>
			<section id="404">
				<h2>Not Found</h2>
				<p>Sorry, the page or item you were looking for was not found.  You can try the search or main navigation to find it.</p>
				<?php get_search_form(); ?>
			</section><!-- 404 -->
<?php 
} 
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
