<?php

/**
 * The template used for displaying page content in page-home.php
 *
 * @package davejmoz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<img class="project-image" src="<?php the_post_thumbnail_url('large'); ?>" />
	</a>
	<?php
		$categories_list = get_the_category_list(__(', ', 'davejmoz'));
		if ('' != $categories_list) {
			$categories_text = 'Posted in: %1$s';
		} else {
	
		}
		printf($categories_text, $categories_list);
	?>
</article><!-- #post-## -->