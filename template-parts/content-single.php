<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Simpli
 */

$simpli_single_blog_date = get_theme_mod('simpli_single_blog_date', true);
$simpli_single_blog_meta = get_theme_mod('simpli_single_blog_meta', true);
$simpli_single_blog_footer = get_theme_mod('simpli_single_blog_footer', true);
$simpli_single_blog_image = get_theme_mod('simpli_single_blog_image', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( 'post' === get_post_type() && $simpli_single_blog_date ) : ?>
		<div class="entry-meta">
			<?php simpli_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

    <?php if ( 'post' === get_post_type() && $simpli_single_blog_meta ) : ?>
		<div class="posted-by">
			<?php simpli_posted_by(); ?>
		</div>
	<?php endif; ?>


	<?php if ( has_post_thumbnail() && $simpli_single_blog_image ) { ?>
	<div class="post-thubnail">
		<?php the_post_thumbnail('full'); ?>
	</div>
    <?php } ?>

	<div class="post-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'simpli' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simpli' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

    <?php if( $simpli_single_blog_footer ) { ?>
	<footer class="entry-footer fix">
		<?php simpli_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->
