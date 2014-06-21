<?php
/*=====
Piece template: Renders the comments area.  Uses 'pieces/comment.php' to render individual comments.
=====*/

if(!isset($tjmThemeHelper)) $tjmThemeHelper = $GLOBALS['tjmThemeHelper'];

//=====debug
if(WP_DEBUG){
?>
<!--Debug:
	@Template TJMBase/comments.php
-->
<?php
}

//=====content
if(comments_open() || get_comments_number()){
?>
<section class="comments" id="comments">
<?php
	//--if the post is requires authentication and the visitor hasn't provided it, display message instead of comments
	if(post_password_required()){
?>
	<p class="notice"><?php _e('This post requires authentication.  Please enter the password to view comments.', 'tjmbase'); ?></p>
<?php
	}else{
		if(have_comments()){
?>
	<header class="commentsHeader">
		<h2 class="commentsHeading"><?php _e('Responses', 'tjmbase'); ?></h2>
		<div class="commentsCount"><?php echo
			__('Count:', 'tjmbase') . ' '
			. number_format_i18n(get_comments_number())
		?></div>
	</header>
<?php
			if(!empty($comments_by_type['comment'])){
?>
	<div class="commentsListWrap">
		<h3 class="commentListHeading">Comments</h3>
		<ol class="commentsList">
			<?php
			//--render each comment from 'pieces/comments.php'.  Create this file in a child theme to override
			wp_list_comments(array('style'=> 'ol', 'type'=> 'comment', 'callback'=> function($comment, $args, $depth) use($tjmThemeHelper){
				echo $tjmThemeHelper->renderer->renderPiece('comment', Array(
					'args'=> $args
					,'comment'=> $comment
					,'depth'=> $depth
				));
			}));
			?>
		</ol>
	</div>
<?php
			}
			if(!empty($comments_by_type['pings'])){
?>
	<div class="commentsListWrap">
		<h3 class="commentListHeading">Trackbacks</h3>
		<ol class="commentsList">
			<?php
			//--render each comment through tjmThemeHelper->outputCommentPiece().  This function renders and outputs 'pieces/comment.php'.  Create this file in a child theme to override
			wp_list_comments(array('style'=> 'ol', 'type'=> 'pings', 'callback'=> function($comment, $args, $depth) use($tjmThemeHelper){
				echo $tjmThemeHelper->renderer->renderPiece('comment', Array(
					'args'=> $args
					,'comment'=> $comment
					,'depth'=> $depth
				));
			}));
			?>
		</ol>
	</div>
<?php
			}

			//--output comments navigation if there are multiple comments pages
			if(get_comment_pages_count() > 1 && get_option('page_comments')){
				$tjmThemeHelper->renderer->renderPiece('relativeNav', Array(
					'classes'=> 'commentRelNav'
					,'id'=> 'comment-nav-below'
					,'nextLink'=> get_next_comments_link(__('Newer Comments', 'tjmbase'))
					,'prevLink'=> get_previous_comments_link(__('Older Comments', 'tjmbase'))
					,'title'=> __('Comment navigation', 'tjmbase')
				));
			}
		}
?>
	<footer class="commentsFooter">
<?php
		//--output message if comments are closed but page has comments
		if(!comments_open() && get_comments_number()){
?>
		<p class="notice"><?php _e('Comments are now closed on this post.', 'tjmbase'); ?></p>
<?php

		//--otherwise, display comment form using the WordPress built in form template
		}else{
			comment_form(Array('title_reply'=> 'Leave a comment'));
		}
?>
	</footer>
<?php
	}
?>
</section>
<?php
}
