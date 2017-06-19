<?php get_header(); ?>

  <main class="wrapper">

    <section>

			<h1><?php single_cat_title( __( 'Currently browsing ', 'ren' ) ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('inc/component', 'pagination'); ?>

		</section>

	</main>

<?php get_footer(); ?>
