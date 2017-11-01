<?php
/**
 * The template for displaying archive pages
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
					if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

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
