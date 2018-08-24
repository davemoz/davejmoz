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
			Copyright &copy; <?php echo date('Y'); ?>
			<span class="sep"> | </span>
			<a href="/privacy-policy">Privacy Policy</a>
			<span class="sep"> | </span>
			Made with <span class="heart"><i class="fas fa-heart"></i></span> in NY and <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'davejmoz' ) ); ?>"><?php printf( esc_html__( 'proudly powered by %s', 'davejmoz' ), 'WordPress' ); ?></a>.
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
