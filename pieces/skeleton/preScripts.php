<?php /*--behavior (JavaScript) */ ?>
<script><!--
	<?php /*{# stick class name onto html denoting js support. -@<http://www.paulirish.com/2009/avoiding-the-fouc-v3/> #}*/ ?>
	(function(H){H.className=H.className.replace(/\bua-no-js\b/,'ua-js')})(document.documentElement);
	<?php /*{# tell js what environment we're in #}*/ ?>
	window.ENV = '{{app.environment}}';
--></script>
<?php //-# Loads shim to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/behavior/html5shiv.js"></script>
<![endif]-->
