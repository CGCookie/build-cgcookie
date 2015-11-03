<?php


$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
$style = $thumb ? sprintf('style="background-image:url(%s);"', $thumb[0] ) : false;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('class' => 'flex--item'));?> >


	<div class="post--inner">
		<?php if ( $thumb ):?>
			<a href="<?php the_permalink(); ?>"><div class="post--thumb" <?php echo $style;?>></div></a>
		<?php endif; ?>
		<div class="entry">
			<header class="entry-header">

				<div class="entry-meta">
					<p><?php echo the_date( 'm.d.Y' ); ?> by <?php the_author_posts_link(); ?></p>
				</div>

				<h2 class="entry--title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>

			</header>

			<!-- Entry -->
			<div class="entry--content">
				<?php the_excerpt(); ?>
			</div>

			<a class="button small ghost" href="<?php the_permalink(); ?>" title="Read more about <?php the_title(); ?>">Read More</a>
		</div>
	</div>

</article>