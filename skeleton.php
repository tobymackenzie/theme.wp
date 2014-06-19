<?php
/*=====
Skeleton loader:

The skeleton loader for all normal pages.  Loads 'skeleton.html.php' for regular page loads, or 'skeleton.json.php' for ajax requests.  Requires files using this to use an output buffer and save the output into the 'main' buffer.

=====*/

//==shared data

$tjmThemeHelper->data->set('pageTitle', wp_title('-', false, 'right') . get_bloginfo('name'));

//==load required skeleton
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
	require($tjmThemeHelper->paths->getThemeFilePath('skeleton.json.php'));
}else{
	require($tjmThemeHelper->paths->getThemeFilePath('skeleton.html.php'));
}
