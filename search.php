<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

	<section id="primary" class="content-area">
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
							<h1 class="page-title"><?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'simpli' ), '<span>' . get_search_query() . '</span>' );
							?></h1>
						</header><!-- .page-header -->

						<?php

						if( isset( $simpli_blog_layout ) && $simpli_blog_layout == 'simple_list_style' ){
							$post_format = 'simple';
						} elseif ( isset( $simpli_blog_layout ) && $simpli_blog_layout == 'classic' ) {
							$post_format = 'search';
						} else {
							$post_format = 'search';
						}
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
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
	</section><!-- #primary -->

<?php
get_footer();
