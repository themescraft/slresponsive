<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SlResponsive
 */

?>

		</div><!-- #content -->
	</div><!-- .container -->
	
	<footer id="colophon" class="site-footer bg-inverse" role="contentinfo">
		<div class="site-info container">
			<div class="row">
				<div class="left-col col-md-6">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'slresponsive' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'slresponsive' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'slresponsive' ), 'Slresponsive', '<a href="https://themescraft.co/" rel="designer">ThemesCraft.co</a>' ); ?>
				</div>
				<div class="right-col col-md-6">
					<?php dynamic_sidebar( 'footer-bottom-right' ); ?>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
