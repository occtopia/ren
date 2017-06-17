<?php get_header(); ?>

  <!-- main.wrapper -->
  <main class="wrapper">

    <!-- section -->
    <section>

      <h1><?php echo sprintf( __( '%s Search Results for ', 'slate' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->

	</main>
  <!-- main.wrapper -->

<?php get_footer(); ?>
