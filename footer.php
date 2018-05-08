<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package davejmoz
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			Copyright &copy; <?php the_date('Y'); ?>
			<span class="sep"> | </span>
			Made with <i class="fab fa-heart">Love</i> in NY and <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'davejmoz' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'davejmoz' ), 'WordPress' ); ?></a>.
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
