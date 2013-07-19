<?php
/*=====
Content template: Renders the main content area when no posts or pages are found.
=====*/

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Template TJMBase/content-none.php
-->
<?php
}

//=====content
?>
<article class="entry entry-none entry-0" id="post-0">
	<header class="entryHeader">
		<h1 class="entryHeading"><?php _e('Nothing found', 'tjmbase'); ?></h1>
	</header>
	<div class="entryContent">
<?php if(is_search()){ ?>
		<p class="notice"><?php _e('Sorry, but your search did not match anything on this site. Please try a different search.', 'tjmbase'); ?></p>
<?php }else{ ?>
		<p><?php _e('Sorry, but what you are looking for could not be found. Perhaps you can find what you are looking for with a search.', 'tjmbase'); ?></p>
<?php } ?>
		<?php get_search_form(); ?>
	</div>
</article>
