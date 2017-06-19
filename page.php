<?php get_header(); ?>

  <main class="wrapper">

    <section>

      <article>

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

<?php get_footer(); ?>
