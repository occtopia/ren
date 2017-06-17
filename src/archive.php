<?php get_header(); ?>

  <!-- main.wrapper -->
  <main class="wrapper">

    <!-- section -->
    <section>

			<h1>Displaying Archives for <?php the_archive_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->

	</main>
  <!-- main.wrapper -->

<?php get_footer(); ?>
