<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
<?php if ( comments_open( get_the_ID() ) ) : ?>
<div id="comments">
	<a id="leave-comment" class="button" href="#respond-wrap" rel="bookmark" title="Comments for <?php the_title(); ?>">Leave Comment</a>
	<h3 itemprop="title" id="discussion">Discussion</h3>
	<?php if ( have_comments() ) : ?>
		<strong><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</strong>
		<ol class="commentlist clearfix">
			<?php wp_list_comments( array( 'callback' => 'cgc_comment' ) ); ?>
		</ol>
		<div class="comment-navigation">
			<div class="older"><?php previous_comments_link() ?></div>
			<div class="newer"><?php next_comments_link() ?></div>
		</div>
	 <?php else : // this is displayed if there are no comments so far ?>
	 <p class="empty">No comments yet. Might we suggest something other than "first post"?</p>

	<?php endif; ?>

	<div id="respond-wrap">
		<h3 itemprop="title">Leave a Comment</h3>
		<div id="respond">
			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

				<?php if ( is_user_logged_in() ) : ?>

				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

				<?php else : ?>

				<p>
					<label for="author">Name</label>
					<input class="comment-input" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				</p>
				<p>
					<label for="email">Mail</label>
					<input class="comment-input" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				</p>
				<p>
					<label for="url">Website</label>
					<input class="comment-input" type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
				</p>

				<?php endif; ?>

		<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

				<p><textarea name="comment" id="comment" tabindex="4" rows="8"></textarea></p>
				<p><input name="submit" type="submit" id="submit" class="submit-comment" tabindex="5" value="Leave Comment" />
				<?php cancel_comment_reply_link('<i class="icon-remove"></i> Nah, I changed my mind.'); ?>	
				<?php comment_id_fields();
				if ( 'cgc_images' == get_post_type() ) { ?>
					<input type="hidden" name="cgc_object_redirect" value="<?php echo get_permalink(); ?>#comments">
				<?php }  else { ?>
					<input type="hidden" name="cgc_object_redirect" value="<?php echo get_permalink(); ?>">
				<?php } ?>
				</p>
				<?php do_action('comment_form', $post->ID); ?>

			</form>

			<?php endif; // If registration required and not logged in ?>
		</div>
	</div>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>

