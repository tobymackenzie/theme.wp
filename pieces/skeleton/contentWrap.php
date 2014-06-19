<div class="siteContentWrap">
<?php

//--main with wrapper
if($tjmThemeHelper->buffers->has('main')){
?>
	<main class="siteMain" id="mainContent" role="main"><?php echo $tjmThemeHelper->buffers->get('main'); ?></main>
<?php
}

//--aside/sidebar
if($tjmThemeHelper->buffers->has('aside')){
	echo $tjmThemeHelper->buffers->get('aside');
}
?>
</div>
