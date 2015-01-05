<?php
if(isset($tags)){
	if($tags){
?>
<div class="entryTagsWrap">
	<h2 class="entryTagHeading"><?php __('Tags', 'tjmbase'); ?></h2>
	<ul class="entryTags">
<?php
		foreach($tags as $tag){
?>
		<li class="entryTag"><a class="entryTagAction" href="<?php echo esc_url(get_tag_link($tag)); ?>" rel="tag"><?php echo $tag->name; ?></a></li>
<?php
		}
?>
	</ul>
</div>
<?php
	}
}else{
	the_tags('<ul class="entryTags"><li class="entryTag">', '</li><li class="entryTag">', '</li></ul>');
}
