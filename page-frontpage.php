<?php
/**
 * Template Name: Front Page Layout
 *
 * This is the template that can be used to create full width static frontpages.
 * displays sidebar widget areas below main content.
 *
 * @package enrichmg
 */

get_header(); ?>

	<div id="primary" class="content-area no-sidebar">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( '/template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar('nosidebar'); ?>

<?php get_footer(); ?>
