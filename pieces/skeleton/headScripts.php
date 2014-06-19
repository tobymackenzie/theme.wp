<?php /*--behavior (JavaScript) */ ?>
<script>
	document.getElementsByTagName('html')[0].className += ' ua-js';
</script>
<?php //-# Loads shim to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/behavior/html5shiv.js"></script>
<![endif]-->
