<?php
/**
 * Template Name: Landing
 * Template description: The template for displaying the landing (temp) homepage.
 *
 *
 * @package davejmoz
 */

get_header(); ?>

	<div id="primary" class="content-area--landing">
		<main id="main" class="content-area-main" role="main">

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary.content-area--landing -->

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>
