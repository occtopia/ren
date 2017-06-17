<?php get_header(); ?>

  <!-- main.wrapper -->
  <main class="wrapper">

    <!-- section -->
    <section>

			<h1><?php single_cat_title( __( 'Currently browsing ', 'slate' ) ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->

	</main>
  <!-- main.wrapper -->

<?php get_footer(); ?>
