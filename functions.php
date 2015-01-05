<?php
use TJM\WPThemeHelper\SettingHelper;
use TJM\WPThemeHelper\WPThemeHelper;

//--load composer autoloader if not already loaded.  This allows a project to load this project as a composer module.
if(!class_exists('\Composer\Autoload\ClassLoader')){
	require_once(__DIR__ . '/vendor/autoload.php');
}

/*=====
Sets up the class that manages theme functionality not built into WordPress.
=====*/

//--Create instance of helper if not created already by child class.  Set in child class to override functionality.  Set to array in child class to provide base options.
//---make following logic easier
if(!isset($tjmThemeHelper)){
	$tjmThemeHelper = Array();
}
//---set some default settings for rendering callbacks
if(is_array($tjmThemeHelper) && !(isset($tjmThemeHelper['settings']) && is_object($tjmThemeHelper['settings']))){
	$tjmThemeHelper['settings'] = new SettingHelper(Array(
		'overrideDefaults'=> false
		,'settings'=> SettingHelper::buildSettingsArray(
			SettingHelper::getBaseDefaults()
			// ,Array(
			// 	'i18n'=> array(
			// 		'dir'=> 'languages'
			// 		,'domain'=> 'tjmbase'
			// 	)
			// )
			,(isset($tjmThemeHelper['settings'])) ? $tjmThemeHelper['settings'] : null
			//--create callbacks to use our templates for certain custom theme abilities.  These can't be defined in 'settings.json'
			,function($settings, $args){
				if(isset($settings['custom-background'])){
					$settings['custom-background'] = array_merge(Array(
						'wp-head-callback'=> function(){
							echo $GLOBALS['tjmThemeHelper']->renderer->renderPiece('customBackgroundStyles');
						}
					), $settings['custom-background']);
				}
				if(isset($settings['custom-header'])){
					$settings['custom-header'] = array_merge(Array(
						'admin-head-callback'=> function(){
							echo $GLOBALS['tjmThemeHelper']->renderer->renderPiece('docHeaderStyles');
						}
						,'admin-preview-callback'=> function(){
							echo $GLOBALS['tjmThemeHelper']->renderer->renderPiece('skeleton/headerContent');
						}
						,'wp-head-callback'=> function(){
							$textColor = get_header_textcolor();
							echo $GLOBALS['tjmThemeHelper']->renderer->renderPiece('docHeaderStyles', Array(
								'textColor'=> $textColor
							));
						}
					), $settings['custom-header']);
				}
			}
		)
	));
}

//---instantiate WPThemeHelper
if(!is_object($tjmThemeHelper)){
	$tjmThemeHelper = new WPThemeHelper($tjmThemeHelper);
}


/*=====
==template data
=====*/
if(!$tjmThemeHelper->data->has('pageTitleSeparator', '-')){
	$tjmThemeHelper->data->set('pageTitleSeparator', '-');
}
if(!$tjmThemeHelper->data->has('pageTitleLocation', 'right')){
	$tjmThemeHelper->data->set('pageTitleLocation', 'right');
}


/*=====
==template filters
=====*/
//--format title
//-@ http://codex.wordpress.org/Function_Reference/wp_title#Customizing_with_the_filter
add_filter('wp_title', function($title, $separator = '-', $display = false, $location = 'right') use($tjmThemeHelper){
	$string = $tjmThemeHelper->renderer->renderPiece('skeleton/title', Array('display'=> $display, 'location'=> $location, 'separator'=> $separator, 'title'=> $title));
	return $string;
}, 10, 2);

/*=====
==template shortcodes / functions
=====*/
/*
Function: tjmGetPostType
Get the type of post, so we can switch on it in templates.

-# should put somewhere that isn't global
*/
function tjmGetPostType(){
	if(is_page()){
		$type = 'page';
	}elseif(is_single()){
		$type = 'single';
	}else{
		$type = 'other';
	}
	return $type;
};
$tjmThemeHelper->shortcodes->add(Array(
	/*
	Shortcode: comment
	Allow adding comments to posts that won't get rendered to output.
	*/
	'comment'=> function($attr, $content = null){
		return "";
	}
	/*
	Shortcode: internalLink
	Convenience shortcode for adding internal links.  Automatically adds html wrapper and beginning slash.
	*/
	,'internalLink'=> function($attr, $content = null){
		// set up variables
		$internalPath = (isset($attr['path'])) ? $attr['path']: '/';
		if(substr($internalPath,0,1) !== "/"){
			$internalPath = "/".$internalPath;
		}
		if(substr($internalPath,-1,1) !== "/"
			&& strpos($attr['path'], ".") == false
			&& strpos($attr['path'], "#") == false
			&& strpos($attr['path'], "?") == false
		){
			$internalPath .= "/";
		}
		$classes = (isset($attr['class'])) ? $attr['class'] : null;

		$output = '';
		$output .= "<a href=\"".home_url()."{$internalPath}\"";
		if($classes !== null){
			$output .= " class=\"{$classes}\"";
		}
		$output .= ">{$content}</a>";

		return do_shortcode($output);
	}
));

/*=====
==for theme check compliance
=====*/
//--enqueue comment scripts
if(is_singular()){
	wp_enqueue_script("comment-reply");
}
//--a bunch of stuff done by default by WPThemeHelper
if(!isset($tjmThemeHelper)){
	$tjmThemeHelper = Array(
		'settings'=> SettingHelper::getBaseDefaults()
	);
}
if(!is_object($tjmThemeHelper)){
	add_theme_support('automatic-feed-links');
	if(!isset($content_width)){
		$content_width = $tjmThemeHelper['settings']['content-width'];
	}
	add_theme_support('custom-background', $tjmThemeHelper['settings']['custom-background']);
	add_theme_support('custom-header', $tjmThemeHelper['settings']['custom-header']);
	if($tjmThemeHelper['settings']['post-thumbnails']){
		add_theme_support('post-thumbnails');
	}
	if($tjmThemeHelper['settings']['title-tag']){
		add_theme_support('title-tag');
	}
	add_action('widgets_init', function() use($tjmThemeHelper){
		register_sidebar($tjmThemeHelper['settings']['widget-areas']);
	});
}
