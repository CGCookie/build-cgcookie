<?php

/**
*
*	Custom comments callback
*
*	@since pre-5.0
*/
function cgc_comment( $comment, $args, $depth ) {

	global $post;

	$GLOBALS['comment'] = $comment;
	// check user levels and add appropriate class for badges
	$commentAuthor = get_user_by('email', $comment->comment_author_email);
	$author_id     = $commentAuthor ? $commentAuthor->ID : false;

	$avatar 		= class_exists( 'cgcUserApi' ) ? cgcUserApi::get_profile_avatar( $author_id, 90 ) : false;

	$userClass = '';
	if( $commentAuthor ) {

		if ( $post->post_author == $commentAuthor->ID ) {
			$userClass = 'author';
		} else if ( user_can( $commentAuthor->ID, 'manage_options' ) ) {
			$userClass = 'admin';
		//} else if ( cgc_check_for_citizen(1, $commentAuthor->ID ) )	{
		//	$userClass = 'citizen-member';
		}
	} else {
		$userClass = '';
	}
	$userClass .= ' clearfix';

	?>
	<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent'); ?> id="li-comment-<?php comment_ID(); ?>">
	<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-author">
				<?php echo $avatar;?>
				<?php if ($userClass != '') { ?><span class="user-badge <?php echo $userClass;?>"></span><?php } ?>
			</div>
		<div class="comment-content">
			<div class="comment-text">
				<div class="comment-author-name">
					<span><?php if( $commentAuthor ) {
						echo '<a href="' . home_url('u/' . $commentAuthor->user_login) . '">' . $commentAuthor->display_name . '</a>';
					} elseif( $commentAuthor && $disabled ) {
						echo 'Annonymous';
					} else {
						echo $comment->comment_author;
					} ?> says:</span>
				</div>

				<?php comment_text(); ?>

				<footer>
					<div class="comment-meta">
						<span class="comment-date"><?php comment_date('M j, Y');  echo ' <span>at</span> '; comment_time(); ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></span>
					</div>
					<div class="comment-reply">
						<?php if (is_user_logged_in() ): ?>
							<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'reply' ) ) ); ?>
						<?php else: ?>
							<a id="header-login-form-toggle" href="#" data-reveal-id="header-login-form" class="login-link join-now">Log in to reply</a>
						<?php endif; ?>
					</div><!-- .reply -->
				</footer>
				</div>
		</div>

	</article><!-- #comment-## -->
	<?php

}