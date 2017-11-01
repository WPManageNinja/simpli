/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Main Menu bg color
	wp.customize( 'simpli_menu_bg_color', function( value ) {
		value.bind( function( to ) {
			$('.main_menu').css('background-color', to );
		} );
	} );


	// Main Menu text color
	var menuPrevColor = $('.main_menu .menu li a').css('color');
	wp.customize( 'simpli_menu_text_color', function( value ) {
		value.bind( function( to ) {
			$('.main_menu .menu li a').css('color', to );
			menuPrevColor = to;
		} );
	} );
    
    // Main Menu text hover color
	wp.customize( 'simpli_menu_text_hover_color', function( value ) {
		value.bind( function( to ) {
			$('.main_menu .menu li a').hover(
				function(){
					$(this).css('color', to);
				}, function(){
					$(this).css('color', menuPrevColor);
				}
			);
			
		} );
	} );

} )( jQuery );
