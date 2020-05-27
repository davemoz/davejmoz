<?php
/**
 * Template Name: Homepage
 * Template description: The template for displaying the homepage.
 *
 *
 * @package davejmoz
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" role="main">
			<section class="intro">
				<?php the_content(); ?>
			</section>
			<section class="projects-list">
			<?php
				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'project' ),
					'post_status'            => array( 'publish' ),
					'nopaging'               => true,
					'order'                  => 'DESC',
					'orderby'                => 'date',
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
							$query->the_post();
						
							// do something
							get_template_part( 'template-parts/content', 'homepage' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
					}
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();
			?>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>
