<?php if (is_home) : ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_content(); ?>
	</article>

	<?php endwhile; ?>

  <?php get_template_part('inc/component', 'pagination'); ?>

	<?php else : ?>

	<article>
		<h2>No Posts Found</h2>
	</article>

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