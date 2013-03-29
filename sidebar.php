<?php
/*
*/

?>
		</div><!-- maincontent -->
		<aside id="sidebar" class="sidebar" role="complementary">
			<h1 class="screenreaderonly">Sidebar</h1>
<?php 
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : 
?>
			<?php get_search_form(); ?>
			<nav class="pages" role="navigation">
				<h1>Pages</h1>
				<ul><?php wp_list_pages('title_li='); ?></ul>
			</nav><!-- pages -->
<?php
endif;
?>
			<?php wp_meta(); ?>	
		</aside><!-- sidebar1 -->

<?php
if(function_exists('dynamic_sidebar') && is_dynamic_sidebar(2)):
?>
		<aside id="sidebar2" class="sidebar" role="complementary">
			<?php dynamic_sidebar(2); ?>
		</aside><!-- sidebar2 -->
<?php
endif;
?>
		<div class="clearboth"></div>
	</div><!-- mainwrap -->