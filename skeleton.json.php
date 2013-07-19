<?php
/*=====
Skeleton template: JSON

The skeleton wrapper for all pages loaded via AJAX.  Returns only the title and content so they can be put into place by JavaScript.  Requires files using this to use an output buffer and save the output into the 'main' buffer.

=====*/

header("Content-type: application/json");

echo json_encode(Array(
	'title'=> $pageTitle
	,'content'=> $tjmThemeHelper->buffers->get('main')
));
