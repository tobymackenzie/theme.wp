<?php
/*=====
Piece template: Renders relative navigation

Data:
	classes (String): classes to add to wrapper
	id (String): html id attribute of wrapper
	nextLink (String): link for next action
	prevLink (String): link for previous action
	title (String): text to use for heading
	type (String): what this nav is for.  if set, default values will be provided
=====*/

if(!isset($level)){
	$level = 3;
}
if(!isset($classes)){
	$classes = '';
}else{
	$classes .= ' ';
}
$classes .= "nav relNav";

if(isset($type) && $type){
	switch($type){
		case 'other':
			if($wp_query->max_num_pages < 2){
				return;
			}
			$classes .= ' listRelativeNav';
			if(!isset($title)){
				$title = (is_search())
					? __('Search navigation', 'tjmbase')
					: __('Post navigation', 'tjmbase')
				;
			}
			if(!isset($nextLink)){
				$nextLink = get_next_posts_link(__('Older posts', 'tjmbase'));
			}

			if(!isset($prevLink)){
				$prevLink = get_previous_posts_link(__('Newer posts', 'tjmbase'));
			}
		break;
		case 'page':
		case 'single':
			$classes .= ' itemRelativeNav';
			if(!isset($title)){
				$title = __('Adjacent Posts', 'tjmbase');
			}
			if(!isset($nextLink)){
				$nextLink = get_next_post_link('%link', __('Next post:', 'tjmbase') . ' %title');
			}
			if(!isset($prevLink)){
				$prevLink = get_previous_post_link('%link', __('Previous post:', 'tjmbase') . ' %title');
			}
		break;
	}
}

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Piece: TJMBase:relativeNav
-->
<?php
}

//=====content
?>
<nav
	<?php if(isset($id)){ ?> id="<?php echo $id; ?>"<?php } ?>
	class="<?php echo $classes; ?>"
	role="navigation"
>
<?php if(isset($title) && $title){ ?>
	<h<? echo $level; ?> class="navHeading relNavHeading"><?php echo $title; ?></h<? echo $level; ?>>
<?php
}
if(isset($prevLink) && $prevLink){
?>
	<div class="prevNav relNavItem"><?php echo $prevLink; ?></div>
<?php
}
if(isset($nextLink) && $nextLink){
?>
	<div class="nextNav relNavItem"><?php echo $nextLink; ?></div>
<?php
}
?>
</nav>
