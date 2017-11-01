<?php
/**
 * Simpli Theme Customizer
 *
 * @package Simpli
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simpli_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'simpli_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'simpli_customize_partial_blogdescription',
		) );

	}


	// Theme options panel
    $wp_customize->add_panel( 'simpli_theme_options', array(
    	'priority' => 25,
    	'capability' => 'edit_theme_options',
    	'theme_supports' => '',
    	'title'  => __('Simpli Theme Options', 'simpli')
    ));

    // General settings 
    $wp_customize->add_section( 'simpli_general_settings', array(
    	'title'		=> __( 'General Settings', 'simpli' ),
    	'priority'	=> 1000,
    	'panel'		=> 'simpli_theme_options'
    ));

    $wp_customize->add_setting( 'simpli_page_wrapper_top_padding', array(
    	'default' 	        => '0',
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'absint'
    ));
    
    $wp_customize->add_control( 'simpli_page_wrapper_top_padding', array(
		'label' => __('Page Wrapper Padding Top', 'simpli'),
		'type' => 'number',
		'section' => 'simpli_general_settings',
		'settings' => 'simpli_page_wrapper_top_padding',
		'input_attrs' => array(
                'min'   => 0,
                'max'   => 150,
                'step'  => 1,
        ),  
    ) );

    $wp_customize->add_setting( 'simpli_page_wrapper_bottom_padding', array(
    	'default' 	        => '0',
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'absint'
    ));
    
    $wp_customize->add_control( 'simpli_page_wrapper_bottom_padding', array(
		'label' => __('Page Wrapper Padding Bottom', 'simpli'),
		'type' => 'number',
		'section' => 'simpli_general_settings',
		'settings' => 'simpli_page_wrapper_bottom_padding',
		'input_attrs' => array(
                'min'   => 0,
                'max'   => 150,
                'step'  => 1,
        ),  
    ) );

    // Logo settings 
    $wp_customize->add_section( 'simpli_logo_settings', array(
        'title'     => __( 'Logo Settings', 'simpli' ),
        'priority'  => 1005,
        'panel'     => 'simpli_theme_options',
        'description' => __( 'To upload custom logo image - go to Appearance > Customize > Site Identity', 'simpli' )
    ));

    $wp_customize->add_setting( 'simpli_logo_width', array(
        'default'           => '32',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'simpli_sanitize_number'
    ));

    $wp_customize->add_control( 'simpli_logo_width', array(
        'label' => __('Logo Width (px) ', 'simpli'),
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_logo_width',
    ) );

    $wp_customize->add_setting( 'simpli_logo_height', array(
        'default'           => '32',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'simpli_sanitize_number'
    ));

    $wp_customize->add_control( 'simpli_logo_height', array(
        'label' => __('Logo Height (px) ', 'simpli'),
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_logo_height',
    ) );

    $wp_customize->add_setting( 'simpli_logo_left_margin', array(
        'default'           => '',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'simpli_sanitize_number'
    ));

    $wp_customize->add_control( 'simpli_logo_left_margin', array(
        'label' => __('Logo Left Margin (px) ', 'simpli'),
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_logo_left_margin',
    ) );

    $wp_customize->add_setting( 'simpli_logo_uc', array(
        'default'           => false,
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));

    $wp_customize->add_control( 'simpli_logo_uc', array(
        'label' => __('Site Title Uppercase', 'simpli'),
        'type'   => 'checkbox',
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_logo_uc',
    ) );

    $wp_customize->add_setting( 'simpli_logo_font_color', array(
        'default'           => '#303030',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simpli_logo_font_color', array(
        'label' => __('Site Title Text color', 'simpli'),
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_logo_font_color'
    )) );
   
    $wp_customize->add_setting( 'simpli_logo_font_size', array(
        'default'           => '31',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'simpli_sanitize_number'
    ));

    $wp_customize->add_control( 'simpli_logo_font_size', array(
        'label' => __('Site Title Font Size (px) ', 'simpli'),
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_logo_font_size',
    ) );

    $wp_customize->add_setting( 'simpli_logo_font_weight', array(
        'default'           => '700',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'simpli_sanitize_number'
    ));

    $wp_customize->add_control( 'simpli_logo_font_weight', array(
        'label' => __('Site Title Font Weight ', 'simpli'),
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_logo_font_weight',
    ) );
    
    $wp_customize->add_setting( 'simpli_tagline_visibility', array(
        'default'           => true,
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));

    $wp_customize->add_control( 'simpli_tagline_visibility', array(
        'label' => __('Show/Hide Site Tagline', 'simpli'),
        'type'   => 'checkbox',
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_tagline_visibility',
    ) );

    $wp_customize->add_setting( 'simpli_tagline_uc', array(
        'default'           => false,
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));

    $wp_customize->add_control( 'simpli_tagline_uc', array(
        'label' => __('Site Tagline Uppercase?', 'simpli'),
        'type'   => 'checkbox',
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_tagline_uc',
    ) );

    $wp_customize->add_setting( 'simpli_tagline_font_size', array(
        'default'           => '21',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'simpli_sanitize_number'
    ));

    $wp_customize->add_control( 'simpli_tagline_font_size', array(
        'label' => __('Tagline Font Size (px) ', 'simpli'),
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_tagline_font_size',
    ) );

    $wp_customize->add_setting( 'simpli_tagline_font_color', array(
        'default'           => '#303030',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simpli_tagline_font_color', array(
        'label' => __('Tagline Text color', 'simpli'),
        'section' => 'simpli_logo_settings',
        'settings' => 'simpli_tagline_font_color'
    )) );


    // Menu section
    $wp_customize->add_section( 'simpli_main_menu_section', array(
    	'title'		=> __( 'Main Menu Settings', 'simpli' ),
    	'priority'	=> 1010,
    	'panel'		=> 'simpli_theme_options'
    ));

    $wp_customize->add_setting( 'simpli_menu_bg_color', array(
    	'default' 	        => '#4A90E2',
    	'type'		        => 'theme_mod',
    	'transport'			=> 'postMessage',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_hex_color'
    ));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simpli_menu_bg_color', array(
		'label' => __('Main Menu Background color', 'simpli'),
		'section' => 'simpli_main_menu_section',
		'settings' => 'simpli_menu_bg_color'
    )) );
    
    $wp_customize->add_setting( 'simpli_menu_text_color', array(
    	'default' 	        => '#ffffff',
    	'type'		        => 'theme_mod',
    	'transport'			=> 'postMessage',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_hex_color'
    ));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simpli_menu_text_color', array(
		'label' => __('Main Menu Text color', 'simpli'),
		'section' => 'simpli_main_menu_section',
		'settings' => 'simpli_menu_text_color'
    )) );

    $wp_customize->add_setting( 'simpli_menu_text_hover_color', array(
    	'default' 	        => '#303030',
    	'type'		        => 'theme_mod',
    	'transport'			=> 'postMessage',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_hex_color'
    ));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simpli_menu_text_hover_color', array(
		'label' => __('Main Menu Text Hover color', 'simpli'),
		'section' => 'simpli_main_menu_section',
		'settings' => 'simpli_menu_text_hover_color'
    )) );

    // Footer section
    $wp_customize->add_section( 'simpli_copyright_section', array(
    	'title'		=> __( 'Footer Settings', 'simpli' ),
    	'priority'	=> 1015,
    	'panel'		=> 'simpli_theme_options'
    ));

    $wp_customize->add_setting( 'simpli_copyright_section_visiblity', array(
    	'default' 	        => true,
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'simpli_copyright_section_visiblity', array(
		'label' => __('Show/Hide Copyright Section', 'simpli'),
		'type' => 'checkbox',
		'section' => 'simpli_copyright_section',
		'settings' => 'simpli_copyright_section_visiblity'
    ) );

    $wp_customize->add_setting( 'simpli_copyright_section_bg_color', array(
    	'default' 	        => '#ffffff',
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_hex_color'
    ));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simpli_copyright_section_bg_color', array(
		'label' => __('Copyright Section Background color', 'simpli'),
		'section' => 'simpli_copyright_section',
		'settings' => 'simpli_copyright_section_bg_color'
    )) );

    $wp_customize->add_setting( 'simpli_copyright_section_text_color', array(
    	'default' 	        => '#303030',
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simpli_copyright_section_text_color', array(
		'label' => __('Copyright Text color', 'simpli'),
		'section' => 'simpli_copyright_section',
		'settings' => 'simpli_copyright_section_text_color'
    )) );

    // Blog section
    $wp_customize->add_section( 'simpli_blog_section', array(
    	'title'		=> __( 'Blog Settings', 'simpli' ),
    	'priority'	=> 1020,
    	'panel'		=> 'simpli_theme_options'
    ));

    $wp_customize->add_setting( 'simpli_blog_layout', array(
    	'default' 	        => 'classic',
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_blog_layout'
    ));
    $wp_customize->add_control( 'simpli_blog_layout', array(
		'label' => __('Blog Layout', 'simpli'),
		'type' => 'radio',
		'section' => 'simpli_blog_section',
		'settings' => 'simpli_blog_layout',
		'choices' => array(
			'classic' => __( 'Classic Style', 'simpli' ), 
			'simple_list_style' => __( 'Simple List Style', 'simpli' ), 
		)
    ) );

    $wp_customize->add_setting( 'simpli_blog_sidebar_layout', array(
    	'default' 	        => 'right_sidebar',
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_blog_sidebar_layout'
    ));
    $wp_customize->add_control( 'simpli_blog_sidebar_layout', array(
		'label' => __('Blog Sidebar Layout', 'simpli'),
		'type' => 'radio',
		'section' => 'simpli_blog_section',
		'settings' => 'simpli_blog_sidebar_layout',
		'choices' => array(
			'no_sidebar' => __( 'No Sidebar', 'simpli' ), 
			'right_sidebar' => __( 'Blog With Right Sidebar', 'simpli' ), 
		)
    ) );

    $wp_customize->add_setting( 'simpli_blog_image', array(
    	'default' 	        => true,
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'simpli_blog_image', array(
		'label' => __('Show/Hide Featured Image On Classic Layout', 'simpli'),
		'type' => 'checkbox',
		'section' => 'simpli_blog_section',
		'settings' => 'simpli_blog_image'
    ) );


    $wp_customize->add_setting( 'simpli_blog_meta', array(
    	'default' 	        => true,
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'simpli_blog_meta', array(
		'label' => __('Show/Hide Post Meta On Classic Layout', 'simpli'),
		'type' => 'checkbox',
		'section' => 'simpli_blog_section',
		'settings' => 'simpli_blog_meta'
    ) );

    $wp_customize->add_setting( 'simpli_blog_footer', array(
    	'default' 	        => true,
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'simpli_blog_footer', array(
		'label' => __('Show/Hide Blog Footer On Classic Layout', 'simpli'),
		'type' => 'checkbox',
		'section' => 'simpli_blog_section',
		'settings' => 'simpli_blog_footer'
    ) );

    $wp_customize->add_setting( 'simpli_single_blog_image', array(
    	'default' 	        => true,
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'simpli_single_blog_image', array(
		'label' => __('Show/Hide Featured Image On Single Post', 'simpli'),
		'type' => 'checkbox',
		'section' => 'simpli_blog_section',
		'settings' => 'simpli_single_blog_image'
    ) );

    $wp_customize->add_setting( 'simpli_single_blog_date', array(
    	'default' 	        => true,
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'simpli_single_blog_date', array(
		'label' => __('Show/Hide Single Blog Post Date', 'simpli'),
		'type' => 'checkbox',
		'section' => 'simpli_blog_section',
		'settings' => 'simpli_single_blog_date'
    ) );

    $wp_customize->add_setting( 'simpli_single_blog_meta', array(
    	'default' 	        => true,
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'simpli_single_blog_meta', array(
		'label' => __('Show/Hide Single Blog Post Meta', 'simpli'),
		'type' => 'checkbox',
		'section' => 'simpli_blog_section',
		'settings' => 'simpli_single_blog_meta'
    ) );
    
    $wp_customize->add_setting( 'simpli_single_blog_footer', array(
    	'default' 	        => true,
    	'type'		        => 'theme_mod',
    	'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'simpli_sanitize_checkbox'
    ));
    $wp_customize->add_control( 'simpli_single_blog_footer', array(
		'label' => __('Show/Hide Single Blog Footer', 'simpli'),
		'type' => 'checkbox',
		'section' => 'simpli_blog_section',
		'settings' => 'simpli_single_blog_footer'
    ) );

}
add_action( 'customize_register', 'simpli_customize_register' );



// setup theme custom styling
function simpli_custom_styling(){

	
	$simpli_page_wrapper_top_padding = get_theme_mod('simpli_page_wrapper_top_padding');
	$simpli_page_wrapper_bottom_padding = get_theme_mod('simpli_page_wrapper_bottom_padding');

    $simpli_logo_width = get_theme_mod('simpli_logo_width');
    $simpli_logo_height = get_theme_mod('simpli_logo_height');
    $simpli_logo_left_margin = get_theme_mod('simpli_logo_left_margin');
    $simpli_logo_uc = get_theme_mod('simpli_logo_uc');
    $simpli_logo_font_color = get_theme_mod('simpli_logo_font_color');
    $simpli_logo_font_size = get_theme_mod('simpli_logo_font_size');
    $simpli_logo_font_weight = get_theme_mod('simpli_logo_font_weight');
    $simpli_tagline_visibility = get_theme_mod('simpli_tagline_visibility');
    $simpli_tagline_uc = get_theme_mod('simpli_tagline_uc');
    $simpli_tagline_font_size = get_theme_mod('simpli_tagline_font_size');
    $simpli_tagline_font_color = get_theme_mod('simpli_tagline_font_color');

	$simpli_menu_bg_color = get_theme_mod('simpli_menu_bg_color');
	$simpli_menu_text_color = get_theme_mod('simpli_menu_text_color');
	$simpli_menu_text_hover_color = get_theme_mod('simpli_menu_text_hover_color');

    $simpli_copyright_section_bg_color = get_theme_mod('simpli_copyright_section_bg_color');
    $simpli_copyright_section_text_color = get_theme_mod('simpli_copyright_section_text_color');


	$output = '';

    if( $simpli_logo_width ){
        $output .= esc_html( '.logo img{ width:' . $simpli_logo_width .'px'.' }' ."\n" );
    }

    if( $simpli_logo_height ){
        $output .= esc_html( '.logo img{ height:' . $simpli_logo_height .'px'.' }' ."\n" );
    }
    
    if( $simpli_logo_left_margin ){
        $output .= esc_html( '.logo img{ margin-left:' . $simpli_logo_left_margin .'px'.' }' ."\n" );
    }

    if( $simpli_logo_uc && $simpli_logo_uc == true ){
        $output .= esc_html( '.site-header-bg h2.site-title, .site-header-bg h2.site-title a { text-transform: uppercase; }' ."\n" );
    }
    
    if( $simpli_logo_font_color ){
        $output .= esc_html( '.site-header-bg h2.site-title, .site-header-bg h2.site-title a { color:' . $simpli_logo_font_color .' }' ."\n" );
    }

    if( $simpli_logo_font_size ){
        $output .= esc_html( '.site-header-bg h2.site-title, .site-header-bg h2.site-title a { font-size:' . $simpli_logo_font_size .'px'.' }' ."\n" );
    }

    if( $simpli_logo_font_weight ){
        $output .= esc_html( '.site-header-bg h2.site-title, .site-header-bg h2.site-title a { font-weight:' . $simpli_logo_font_weight .' }' ."\n" );
    }

    if( $simpli_tagline_visibility && $simpli_tagline_visibility == true ){
        $output .= esc_html( '.site-header-bg h3.site-description { display: block; }' ."\n" );
    } else {
        $output .= esc_html( '.site-header-bg h3.site-description { display: none; }' ."\n" );
    }

    if( $simpli_tagline_uc && $simpli_tagline_uc == true ){
        $output .= esc_html( '.site-header-bg h3.site-description { text-transform: uppercase; }' ."\n" );
    }

    if( $simpli_tagline_font_size ){
        $output .= esc_html( '.site-header-bg h3.site-description { font-size:' . $simpli_tagline_font_size .'px'.' }' ."\n" );
    }

    if( $simpli_tagline_font_color ){
        $output .= esc_html( '.site-header-bg h3.site-description { color:' . $simpli_tagline_font_color .' }' ."\n" );
    }


	if( $simpli_menu_bg_color ){
		$output .= esc_html( '.main_menu{ background-color:' . $simpli_menu_bg_color .' }' ."\n" );
	}

	if( $simpli_menu_text_color ){
		$output .= esc_html( '.main_menu .menu li a{ color:' . $simpli_menu_text_color .' }' ."\n" );
	}

	if( $simpli_menu_text_hover_color ){
		$output .= esc_html( '.main_menu .menu li a:hover{ color:' . $simpli_menu_text_hover_color .' }' ."\n" );
	}

	if( $simpli_page_wrapper_top_padding ){
		$output .= esc_html( '.site-main{ padding-top:' . $simpli_page_wrapper_top_padding .'px'.' }' ."\n" );
	}

	if( $simpli_page_wrapper_bottom_padding ){
		$output .= esc_html( '.site-main{ padding-bottom:' . $simpli_page_wrapper_bottom_padding .'px'.' }' ."\n" );
	}

	if( $simpli_copyright_section_bg_color ){
		$output .= esc_html( '.site-footer{ background-color:' . $simpli_copyright_section_bg_color .' }' ."\n" );
	}

	if( $simpli_copyright_section_text_color ){
		$output .= esc_html( 'footer .site-info, .site-info a, .site-info span { color:' . $simpli_copyright_section_text_color .' }' ."\n") ;
	}


	if( isset( $output ) && $output !== '' ){
		$output = strip_tags( $output );
		$output = "<!--Simpli Custom Styling-->\n<style type=\"text/css\">\n" . $output . "</style>\n";
		echo $output;
	}


}
add_action( 'wp_head', 'simpli_custom_styling' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function simpli_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function simpli_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

// Sanitization to validate that the input value is an integer
function simpli_sanitize_number( $input ){
    return absint( $input );
}

// Sanitization for blog layout
function simpli_sanitize_blog_layout( $value ){
	$default = simpli_blog_layout();
	if( array_key_exists( $value, $default ) ){
		return $value;
	}
	return apply_filters( 'simpli_blog_layout', current( $default ) );
}

function simpli_blog_layout(){
	$default = array(
		'classic' => __( 'Classic Style', 'simpli' ), 
		'simple_list_style' => __( 'Simple List Style', 'simpli' ), 
    );

    return apply_filters( 'simpli_blog_layout', $default );
}

// Sanitization for blog sidebar layout
function simpli_sanitize_blog_sidebar_layout( $value ){
	$default = simpli_blog_sidebar_layout();
	if( array_key_exists( $value, $default ) ){
		return $value;
	}
	return apply_filters( 'simpli_blog_sidebar_layout', current( $default ) );
}

function simpli_blog_sidebar_layout(){
	$default = array(
		'no_sidebar' => __( 'No Sidebar', 'simpli' ), 
		'right_sidebar' => __( 'Blog With Right Sidebar', 'simpli' ), 
    );

    return apply_filters( 'simpli_blog_sidebar_layout', $default );
}


function simpli_sanitize_checkbox( $input ){
    return ( isset( $input ) && true == $input ? true : false );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simpli_customize_preview_js() {
	wp_enqueue_script( 'simpli-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'simpli_customize_preview_js' );
