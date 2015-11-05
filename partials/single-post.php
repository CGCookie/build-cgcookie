<?php
	$auth_id 		= get_the_author_meta('ID');
	$twitter_link 	= get_user_meta( $auth_id, 'profile_twitter', true );
	$profile_link   = get_author_posts_url( $auth_id );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class();?> >

	<!-- Entry Cover -->
	<header class="entry-header">

		<h1 class="entry--title"><?php the_title();?></h1>

	</header>

	<!-- Entry -->
	<div class="entry--content">
		<?php

			if( has_post_thumbnail() ) {
				the_post_thumbnail( 'full' );
			}

			the_content();

			wp_link_pages( array(
				'before'      => '<div class="post-pagination"><span class="post-pagination-title">Pages:</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div>

	<footer class="entry-footer">

		<div class="entry--author__avatar">
			<?php echo get_avatar( get_the_author_meta('ID' ), 48, true ); ?>
			<p class="entry--author__details">
				Posted by <a href="<?php echo esc_url( $profile_link );?>"><?php echo get_the_author();?></a>
				on <?php echo the_date( 'm.d.Y' ); ?>
			</p>
			<p class="entry--author__twitter">
				<a href="http://twitter.com/<?php echo $twitter_link;?>">@<?php echo $twitter_link;?></a>
			</p>
		</div>

	</footer>

</article>