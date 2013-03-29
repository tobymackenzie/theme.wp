<?php
/*
*/

get_header(); 
if (have_posts()){
?>
			<section class="items">
			
<?php while (have_posts()){ the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class("item") ?>>
					<header>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<time class="postTime" datetime="<?php the_time('Y-m-d') ?>" pubdate="pubdate"><?php 		the_time('F jS, Y') ?></time>
					</header>
		
					<div class="entry">
						<?php the_excerpt(); ?>
					</div>
		
					<div class="postmetadata">
						<span class="postCategories">Posted in <?php the_category(', ') ?></span>
							<?php the_tags('<span class="postTags">Tags: ', ', ', '</span>'); ?>
						<span class="postCommentsInfo"><?php comments_popup_link('(0)', '(1)', '(%)'); ?></span>
					</div>
				</article>
<?php } ?>
				<nav class="relativenavigation">
					<div class="next"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="previous"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				</nav>
			</section>
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
