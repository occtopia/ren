<?php get_header(); ?>

  <main class="wrapper">

    <section>

			<h1>Displaying Archives for <?php the_archive_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('inc/component', 'pagination'); ?>

		</section>

	</main>

<?php get_footer(); ?>
