<?php
/*
*/

if(!defined('pagIsXSLT')): ?>
<!DOCTYPE html>
<?php endif; ?>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<title><?php wp_title(':', true, 'right'); ?> <?php bloginfo('name'); ?></title>	

	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style_ie6.css" />
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style_ie7.css" />
	<![endif]-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="pagewrap">
	<header id="header" role="banner">
		<hgroup>
			<h1 class="logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<h2 class="tagline"><?php bloginfo('description'); ?></h2>
		</hgroup>
		<div id="jumpnavigation" class="screenreaderonly"><a href="#maincontent">Jump To Main Content</a></div>
		<nav>
			<h1 class="screenreaderonly">Navigation</h1>
			<ul>
				<li><a href="/item1/">Item1</a></li>
			</ul>
		</nav>
	</header>
	<div id="mainwrap">
		<div id="maincontent" role="main">
