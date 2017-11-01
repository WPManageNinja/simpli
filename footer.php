<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simpli
 */

$simpli_copyright_section_visiblity = get_theme_mod('simpli_copyright_section_visiblity', true);

?>

	</div><!-- #content -->

	<?php if( $simpli_copyright_section_visiblity ) : ?>

	<footer id="colophon" class="site-footer">
	    <div class="site-info">
	    	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'simpli' ) ); ?>"><?php
	    		/* translators: %s: CMS name, i.e. WordPress. */
	    		printf( esc_html__( 'Proudly powered by %s', 'simpli' ), 'WordPress' );
	    	?></a>
	    	<span class="sep"> | </span>
	    	<?php
	    		/* translators: 1: Theme name, 2: Theme author. */
	    		printf( esc_html__( 'Theme: %1$s by %2$s.', 'simpli' ), 'simpli', '<a href=" '.esc_url('https://wpmanageninja.com/').'">WpManageNinja</a>' );
	    	?>
	    </div><!-- .site-info -->
	</footer><!-- #colophon -->

	<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
