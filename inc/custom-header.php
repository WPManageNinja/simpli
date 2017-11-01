<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Simpli
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses simpli_header_style()
 */
function simpli_custom_header_setup() {
	add_theme_support( 'custom-header' );
}
add_action( 'after_setup_theme', 'simpli_custom_header_setup' );

