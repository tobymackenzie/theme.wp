TJMBase WordPress Theme
=======================

This is a WordPress theme very much meant to be used as a base for building another theme.  It comes almost completely unstyled.  It has templates with widget and nav locations to cover most situations, and class name hooks to handle most style situations, so you could go pretty far just editing styles.  It uses my [WPThemeHelper project](https://github.com/tobymackenzie/WPThemeHelper) and other niceties to help make development easier.

### WPThemeHelper

This helps abstract away some of the boring or repetetive tasks common to developing a WordPress theme.  For instance, I use its SettingHelper to set most theme settings with a simple JSON file (settings.json).  I use it's buffer management / template rendering functionality to help keep template output organized and DRY.

### Skeleton

I like to have my site "skeleton" (header and footer in WordPress parlance) to be in one file.  I find this makes it easier to see what is going on and to maintain. To do this, I capture the "main" page content (ie what the stuff between `get_header()` and `get_footer()` or `get_sidebar()`) in an output buffer, then stick it in the middle of a skeleton file (skeleton.html.php).  I maintain compatibility with the `get_header()` and `get_footer()` functions by having the former start an output buffer and the latter ends it and then renders the skeleton template.

I also like to be able to load my content in a JSON wrapper instead of the full HTML wrapper.  This is useful for if you use the history API to handle page changes, pulling content via AJAX and sticking it into the "main" area without having to do a full page refresh.  To this end, I have set up a switch to load "skeleton.json.php" instead of the HTML version if the request is via AJAX.

### Template Pieces

With the Renderer of WPThemeHelper, I can render reusable bits of code from the pieces folder.  Unlike `get_template_part()`, I can pass data into these templates.  This also allows me to easily load template files in the callback functions used for the bits of markup used by theme features such as the custom header and custom background.  I've seen other themes put this markup directly in the callback functions, making them difficult to find, look at, modify, and maintain.

### General

I tried keep things organized and DRY.  I use a fairly minimal number of the basic WordPress templates with conditions to handle minor differences.  The theme is set up to be used as a parent theme.  It is easy to override any of the templates, including things rendered with the Renderer.  I use composer to work with dependencies that are maintained separately (namely WPThemeHelper).

Usage
-----

Clone this theme project and put it in your theme folder.  Run `bin/composer install` to get dependencies in place.  Then you can activate this theme and modify to your hearts content.  Or, more ideally, you can create a child theme and override whatever you need to.  To do so, you would put the line 'Template: tjmbase' in the comments at the top of your child theme's 'style.css'.  To modify the settings that go to WPThemeHelper, you can create a `$tjmThemeHelper` array in your 'functions.php' file.  This array will be passed to the constructor of WPThemeHelper.

