<?php get_header(); ?>

  <!-- main.wrapper -->
	<main class="wrapper">

	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail()) : // Does the post have a thumbnail? ?>

      <!-- span.post-thumbnail -->
      <span class="post-thumbnail">

				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>

      </span>
      <!-- /span.post-thumbnail -->

			<?php endif; ?>
			<!-- /post thumbnail -->

			<!-- post title -->
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<!-- /post title -->

			<!-- span.date -->
			<span class="date">
				<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
					<?php the_date(); ?> <?php the_time(); ?>
				</time>
			</span>
      <!-- /span.date -->

			<span class="author">Published by <?php the_author_posts_link(); ?></span>

			<?php the_content(); ?>

			<?php the_tags( __( 'Tags: ', 'slate' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			<p>Categorized in <?php the_category(', '); ?></p>

			<p>This post was written by <?php the_author(); ?></p>

			<?php edit_post_link(); ?>

			<?php comments_template(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h2>No Posts Found</h2>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->

	</main>
  <!-- /main.wrapper -->

<?php get_footer(); ?>
