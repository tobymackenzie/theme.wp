<form id="searchform" class="searchform" role="search" method="get" action="<?php bloginfo('siteurl');?>">
	<label class="screenreaderonly" for="s">Search site for:</label>
	<input class="searchtext" type="text" value="<?php esc_attr(apply_filters('the_search_query', get_search_query()));?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="Search" />
</form>