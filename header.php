<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simpli
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'simpli' ); ?></a>

	<?php if( get_header_image() !== '' ){ ?>

		<header id="masthead" class="site-header-bg" style="background-image: url('<?php esc_attr( header_image() ); ?>');">

	<?php } else { ?> 

	<header id="masthead" class="site-header">
		
	<?php } ?> 

			<nav id="nav_bar" class="main_menu">
				<span class="close_button">&times;</span>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
			<div class="header-container fix">
			    
				<div class="menu_button">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu-button.png" alt="">
				</div>
				<?php if( has_custom_logo() ) { ?>
				<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php the_custom_logo(); ?></a></div>
				<?php } else { ?>
				<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
				<h3 class="site-description"><?php bloginfo( 'description' ); ?></h3>	
				<?php } ?>
				
			</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
