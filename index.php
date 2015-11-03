<?php

	get_header();

	?>

	<main class="content-width blog--archive">

		<?php

		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				the_title();

			endwhile;

		else :

			//get_template_part( 'content', 'none' );

		endif;

		?>

	</main>

<?php get_footer(); ?>
