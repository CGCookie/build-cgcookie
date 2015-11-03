<?php
	$auth_id 		= get_the_author_meta('ID');
	$user_id    	= get_current_user_ID();
	$profile_link 	= class_exists('cgcUserAPI') ? cgcUserAPI::get_profile_link( $auth_id ) : false;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class();?> >

	<!-- Entry Cover -->
	<header class="entry-header">

		<div class="entry--author__avatar">
			<?php echo get_avatar( get_the_author_meta('ID' ), 48, true ); ?>
			<a href="<?php echo esc_url( $profile_link );?>"><?php echo get_the_author();?></a>
			<p class="entry-date"><?php echo the_date( 'm.d.Y' ); ?></p>
		</div>

		<?php echo function_exists('cgc_social_sharing') ? cgc_social_sharing( 'object-mast__share' ) : false;?>

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

		<?php echo get_avatar( get_the_author_meta('ID' ),90, true ); ?>

		<?php get_template_part('partials/author-block');?>

	</footer>

</article>