<?php
//-@ http://codex.wordpress.org/Function_Reference/wp_title#Customizing_with_the_filter

global $page, $paged;

//--feeds get plain title, as
$bits = Array();
if(!is_feed()){
	if($paged >= 2 || $page >= 2){
		$bits[] = sprintf(__('Page %s', '_s'), max($paged, $page));
	}
	$bits[] = get_bloginfo('name');
}
if($location !== 'right'){
	$bits = array_reverse($bits);
	echo implode($separator, $bits) . $title . ' ';
}else{
	echo $title . ' ' . implode($separator, $bits);
}
