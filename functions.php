<?php
/*
*/

// register two sidebars for widgetizing
if(function_exists('register_sidebar')){
	register_sidebars(2, array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

// select template for single posts by category slug, default to regular single.php
/*add_filter('single_template', create_function('$t', 
	'foreach( (array) get_the_category() as $fncCategory ) { 
		if ( file_exists(TEMPLATEPATH . "/single-{$fncCategory->slug}.php") ) 
			return TEMPLATEPATH . "/single-{$fncCategory->slug}.php"; 
	} 
	return $t;
' ));*/

// add variables to allowable for searches for custom fields searches
/*$wp->add_query_var('meta_key');
$wp->add_query_var('meta_value');
$wp->add_query_var('meta_compare');
*/


/* ************
functions and shortcodes for templates
************** */


/* **** determine section **** */
/*function fncsIsSection($argName){
	global $post;
	switch($argName):
		case 'home':
			return (is_front_page()) ? true : false;
		case 'about-us':
			return (is_page('about-us')) ? true : false;
		case 'international':
			return (is_page('international')) ? true : false;
		case 'teams':
			return (is_page('teams')
				|| fncsHasParent(19)
			) ? true : false;
		case 'footskills':
			return (is_page('footskills')) ? true : false;
		case 'news':
			return (is_page('news')
				|| (is_single() && in_category('news'))
				|| is_category('news')
			) ? true : false;
		case 'contact':
			return (is_page('contact')) ? true : false;
	endswitch;
}*/


/* **** hasParent **** */
// based on instructions from http://codex.wordpress.org/Conditional_Tags
/*function fncsHasParent($argParentID){
	global $post;
	
	if(is_page($argParentID)) return true;
	
	$fncAncestors = get_post_ancestors($post->ID);
	foreach($fncAncestors as $forAncestor)
		if(is_page() && $forAncestor == $argParentID) return true;
	
	return false;
}*/


/* **** internalLink **** */
/*add_shortcode('internalLink', 'fncsInternalLink');
function fncsInternalLink($argArray, $argContent=null){
	// set up variables
	$fncInternalPath = ($argArray['path'])?$argArray['path']: '/';
		if(substr($fncInternalPath,0,1) != "/")
			$fncInternalPath = "/".$fncInternalPath;
		if(substr($fncInternalPath,-1,1) != "/" 
				&& strpos($argArray['path'], ".") == false 
				&& strpos($argArray['path'], "#") == false 
				&& strpos($argArray['path'], "?") == false
			)
			$fncInternalPath .= "/";
	$fncAddClasses = ($argArray['add_classes'])?$argArray['add_classes']: null;
	$fncReturn = '';
	
	$fncReturn .= "<a href=\"".get_bloginfo('url')."{$fncInternalPath}\"";
	if($fncAddClasses != null)
		$fncReturn .= " class=\"{$fncAddClasses}\"";
	$fncReturn .= ">{$argContent}</a>";

	return do_shortcode($fncReturn);
}*/


/* **** hide ***** */
// hide shortcode to comment out pieces
/*add_shortcode('hide', 'fncsHide');
function fncsHide($argArray, $argContent=null){
	return "";
}*/


?>