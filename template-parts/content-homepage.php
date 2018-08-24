<?php

/**
 * The template used for displaying page content in page-home.php
 *
 * @package davejmoz
 */

?>

<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: url( <?php the_post_thumbnail_url('original'); ?> ); background-size: cover; background-position: center center; background-repeat: no-repeat;">
		<header class="entry-header">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			<?php
		$categories_list = get_the_category_list(__(', ', 'davejmoz'));
		if ('' != $categories_list) {
			$categories_text = 'Posted in: %1$s';
		} else {

		}
		printf($categories_text, $categories_list);
		?>
		</header><!-- .entry-header -->
		<footer class="entry-footer">
			<?php // edit_post_link( esc_html__( 'Edit', 'davejmoz' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
</a>
