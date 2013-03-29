<?php
/*
*/

get_header(); 

if (have_posts()){ 
	while (have_posts()){ the_post(); 
?>
			<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<?php edit_post_link('Edit', '<div class="postmetadata editlink">', '</div>'); ?>
				</header>
	
				<div class="entry">
					<?php the_content('Read the rest of this page &raquo;'); ?>
				</div>
	
				<footer class="postmetadata">
					<time class="postTime" datetime="<?php the_time('Y-m-d') ?>" pubdate="pubdate"><?php the_time('F jS, Y') ?></time>
				</footer>
			</section>
<?php 
	} 
} 
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
