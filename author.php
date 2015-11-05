<?php get_header(); ?>

	<p class="posts-by">Posts by <?php echo get_the_author();?>
		<?php

		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'partials/archive-post' );

			endwhile;

		else :

			//get_template_part( 'content', 'none' );

		endif;

get_footer();
