<?php

	get_header();

	?>
	<main class="content-width--small">

		<?php

		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'partials/single-post' );

				/*
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				*/

			endwhile;

		else :

			get_template_part( 'partials/none' );

		endif;

		?>

	</main>

<?php get_footer(); ?>
