<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Simpli
 */

$simpli_blog_meta = get_theme_mod('simpli_blog_meta', true);
$simpli_blog_footer = get_theme_mod('simpli_blog_footer', true);
$simpli_blog_image = get_theme_mod('simpli_blog_image', true);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('normal-post'); ?>>

	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( 'post' === get_post_type() && $simpli_blog_meta ) : ?>

		<ul class="post-meta">
			<li><?php simpli_posted_on(); ?></li>
			<li><?php the_category( ', '); ?></li>
			<li><?php comments_popup_link( esc_html__('No Comment','simpli'), esc_html__('1 Comment','simpli'), esc_html__('% Comments','simpli'), ' ', esc_html__('Comments off','simpli')); ?></li>	
		</ul>
	<?php endif; ?>

    <?php if ( has_post_thumbnail() && $simpli_blog_image ) { ?>
	<div class="post-thubnail">
		<a href="<?php echo esc_url( get_the_permalink() );?>">
			<?php the_post_thumbnail('full'); ?>
	    </a>
	</div>
    <?php } ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->


	<div class="page-link">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simpli' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .page-link -->
    <?php if( $simpli_blog_footer ) { ?>
	<footer class="entry-footer fix">
		<?php the_tags( 'Tags: ', ', ', '' ); ?>
	</footer><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
