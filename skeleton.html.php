<?php
/*=====
Skeleton template: HTML
The skeleton wrapper for all normal pages.  The equivalent of 'header.php' and 'footer.php' in one file.  Requires files using this to use an output buffer and save the output into the 'main' buffer.
=====*/

if(!(isset($isXSLT) && $isXSLT)){
?>
<!DOCTYPE html>
<?php } ?>
<html <?php body_class('doc ua-no-js'); ?> <?php language_attributes(); ?>>
	<head>
		<?php echo $tjmThemeHelper->renderer->renderPiece('skeleton/meta'); ?>
		<?php echo $tjmThemeHelper->renderer->renderPiece('skeleton/styles'); ?>
		<?php echo $tjmThemeHelper->renderer->renderPiece('skeleton/preScripts'); ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class('body'); ?> id="body">
		<div class="docBody hfeed site">
			<?php echo $tjmThemeHelper->renderer->renderPiece('skeleton/header'); ?>
			<?php echo $tjmThemeHelper->renderer->renderPiece('skeleton/contentWrap'); ?>
			<?php echo $tjmThemeHelper->renderer->renderPiece('skeleton/footer'); ?>
		</div>
		<?php echo $tjmThemeHelper->renderer->renderPiece('skeleton/postScripts'); ?>
		<?php wp_footer(); ?>
	</body>
</html>
