<?php
/*=====
Piece template: Renders a single comment
=====*/

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Piece: TJMBase:comment
-->
<?php
}

//=====data
global $post;
$GLOBALS['comment'] = $comment;

if($args['style'] === 'div'){
	$containerTag = 'div';
}else{
	$containerTag = 'li';
}

$commentType = ($comment->comment_type === 'pingback' || $comment->comment_type === 'trackback')
	? 'trackback'
	: $comment->comment_type
;

//=====content
?>
<<?php echo $containerTag; ?> <?php comment_class('commentWrap'); ?>>
	<article class="comment comment-<?php echo $commentType; ?> p-comment" id="comment-<?php comment_ID(); ?>">
		<header class="commentHeader commentAuthor vcard<?php if($comment->user_id === $post->post_author){ ?> postAuthor<?php } ?>">
			<span class="commentAuthorAvatar avatarWrap"><?php echo get_avatar($comment, 44); ?></span>
			<cite class="commentAuthorName fn"><?php echo get_comment_author_link(); ?></cite>
			<a class="commentPermalink permalink" href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php _e('Permalink', 'tjmbase'); ?></a>
			<time datetime="<?php echo get_comment_time('c'); ?>">
				<?php echo get_comment_date() . " " . get_comment_time(); ?>
			</time>
<?php		if($comment->comment_approved === '0'){ ?>
			<p class="commentApprovalNotice notice"><?php _e('Your comment hasn\'t been approved yet', 'tjmbase'); ?></p>
<?php		} ?>
			<?php edit_comment_link(__('Edit', 'tjmbase'), '<span class="editAction">', '</span>'); ?>
		</header>
		<div class="commentContent"><?php comment_text(); ?></div>
		<?php comment_reply_link(array_merge($args, array(
			'after'=> '</footer>'
			,'before'=> '<footer class="commentFooter">'
			,'depth'=> $depth
			,'max_depth'=> $args['max_depth']
			,'reply_text'=> sprintf(__('Reply to %1$s', 'tjmbase'), get_comment_author())
		))); ?>
<?php

//-#omit trailing tag, as WordPress will add it automatically (allows adding nested comments)
?>
	</article>
