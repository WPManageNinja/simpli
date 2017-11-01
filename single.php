<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Simpli
 */

get_header(); 

$simpli_blog_sidebar_layout = get_theme_mod('simpli_blog_sidebar_layout');
$simpli_blog_layout = get_theme_mod('simpli_blog_layout');

if( $simpli_blog_sidebar_layout ){
	$simpli_blog_sidebar_layout = get_theme_mod('simpli_blog_sidebar_layout');
} else{
	$simpli_blog_sidebar_layout = 'right_sidebar';
}

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php 
	        if( $simpli_blog_sidebar_layout === 'right_sidebar' ) { 
	        	echo '<div class="container">';
	   			echo '<div class="content-wrapper simpli-blog">'; 
			} else { 
				echo '<div class="wrapper simpli-blog">'; 
			}
	    	?>
        	<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'single' );

					the_post_navigation(
						array(
							'next_text' => esc_html__( 'Next post', 'simpli' ),
							'prev_text' => esc_html__( 'Previous post', 'simpli' ),
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>

       		<?php 
				if( $simpli_blog_sidebar_layout === 'right_sidebar' ) {
				 	echo '</div>';
				 	echo '<div class="sidebar-wrapper">';
				 	get_sidebar();
				 	echo '</div>';
				 	echo '</div>';
				} else {  
				 	echo '</div>';
				}
        	?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
