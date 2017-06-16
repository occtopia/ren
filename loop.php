<?php if (is_home) : ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php the_content(); ?>
	</section>

	<?php endwhile; ?>

	<?php require('inc/pagination.inc.php'); ?>

	<?php else : ?>

	<section>
		<h1>No Posts Found</h1>
	</section>

	<?php endif;

// Else if is another page name
elseif (is_page('yourPageName')) :

	// Arguments
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
		// if no posts are available
	}

	// Reset original Post Data
	wp_reset_postdata();


// Otherwise, do this...
else :

		// Arguments
		$args = array();

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				// if no posts are available
			}
		} else {
			// if no posts are available
		}

		// Reset original Post Data
		wp_reset_postdata();

endif; ?>
