<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package davejmoz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: url( <?php the_post_thumbnail_url('original'); ?> ); background-size: cover; background-position: center center;">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php echo project_categories_terms_links(); ?>
	</header><!-- .entry-header -->

	<?php /*
	<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'davejmoz' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	*/ ?>

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'davejmoz' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

