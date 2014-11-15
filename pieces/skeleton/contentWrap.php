<div class="docContent">
<?php

//--main with wrapper
if($tjmThemeHelper->buffers->has('main')){
?>
	<div class="docMainWrap" id="docMain"><main class="docMain" role="main"><?php echo $tjmThemeHelper->buffers->get('main'); ?></main></div>
<?php
}

//--aside/sidebar
if($tjmThemeHelper->buffers->has('aside')){
	echo $tjmThemeHelper->buffers->get('aside');
}
?>
</div>
