<?php get_header(); ?>

  <!-- main.wrapper -->
  <main class="wrapper">

    <section>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    		<?php the_content(); ?>

        <?php comments_template( '', true ); ?>

        <?php edit_post_link(); ?>

    	</article>

    	<?php endwhile; ?>

    	<?php require('inc/pagination.inc.php'); ?>

    	<?php else : ?>

    	<article>
    		<h2>No Posts Found</h2>
    	</article>

      <?php endif; ?>

    </section>

	</main>
  <!-- main.wrapper -->

<?php get_footer(); ?>
