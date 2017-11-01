<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>

				<?php
				endif;


				if( isset( $simpli_blog_layout ) && $simpli_blog_layout == 'simple_list_style' ){
					$post_format = 'simple';
				} elseif ( isset( $simpli_blog_layout ) && $simpli_blog_layout == 'classic' ) {
					$post_format = get_post_format();
				} else {
					$post_format = get_post_format();
				}


				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', $post_format );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

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
