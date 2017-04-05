
<?php if (is_home) : ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php the_content(); ?>
	</section>

	<?php endwhile; ?>

	<?php require('inc/pagination.inc.php'); ?>

	<?php else : ?>

	<section <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1>No Posts Found</h1>
	</section>

	<?php endif; ?>


<?php elseif (is_page('yourPageName')) :



	// WP_Query arguments
	$args = array();

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			// do something
		}
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();



endif; ?>
