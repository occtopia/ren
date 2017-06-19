<?php get_header(); ?>

  <main class="wrapper">

    <section>

      <h1><?php echo sprintf( __( '%s Search Results for ', 'ren' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('inc/component', 'pagination'); ?>

		</section>

	</main>

<?php get_footer(); ?>
