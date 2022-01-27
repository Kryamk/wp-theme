<?php
/*namespace radiustheme\roofix;
use radiustheme\roofix\RDTheme;
use WP_Customize_Control;*/


/**
 * Roofix Customizer Setup and Custom Controls
 *
 * @package Roofix
 * @since Roofix 1.0
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */

class rttheme_initialise_customizer_typography_settings {
	// Get our default values
	private $defaults;

	public function __construct() {
		// Get our Customizer defaults
		$this->defaults = rttheme_generate_defaults();		
		// Register our Panels
		add_action( 'customize_register', array( $this, 'rttheme_add_typography_customizer_panels' ) );
		// Register our sections
		add_action( 'customize_register', array( $this, 'rttheme_add_typography_customizer_sections' ) );
		

		add_action( 'customize_register', array( $this, 'rttheme_register_typography_controls' ) );
		
	}

	/**
	 * Register the Customizer panels
	 */
	public function rttheme_add_typography_customizer_panels( $wp_customize ) {
		
		$wp_customize->add_panel( 'rttheme_typography_defaults',
			 	array(
				'title' => esc_html__( 'Typography', 'roofix' ),
				'description' => esc_html__( 'Adjust the overall layout for your site.', 'roofix' ),
				'priority' => 29,
			)
		);		
		
	}


/**
 * Register the Customizer sections
 */
	public function rttheme_add_typography_customizer_sections( $wp_customize ) {
		
		// Add our Footer Section
		$wp_customize->add_section( 'typography_layout_section',
			array(
				'title' => esc_html__( 'Typography', 'roofix' ),				
				'priority' => 95,
				'panel' => 'rttheme_typography_defaults',
			)
		);

	}

/**
 * Register our -- general controls
 */
	public function rttheme_register_typography_controls( $wp_customize ) {

		// Test of Google Font Select Control
		$wp_customize->add_setting( 'typo_body',
			array(
				'default' => $this->defaults['typo_body'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new RTtheme_Google_Font_Select_Custom_Control( $wp_customize, 'typo_body',
			array(
				'label' => esc_html__( 'Body', 'roofix' ),	
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_body_size',
			array(
				'default' => $this->defaults['typo_body_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_body_size',
			array(
				'label' => esc_html__( 'Font Size', 'roofix' ),
				'description' => esc_html__( 'Font Size (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_body_height',
			array(
				'default' => $this->defaults['typo_body_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_body_height',
			array(
				'label' => esc_html__( 'Line Height', 'roofix' ),
				'description' => esc_html__( 'Line Height (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);
		/**
		* Separator
		*/
        $wp_customize->add_setting('typo_separator_general2', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'typo_separator_general2', array(
            'settings' => 'separator_general1',
            'section' => 'typography_layout_section',
        )));


		// H1 Google Font Select Control
		$wp_customize->add_setting( 'typo_h1',
			array(
				'default' => $this->defaults['typo_h1'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new RTtheme_Google_Font_Select_Custom_Control( $wp_customize, 'typo_h1',
			array(
				'label' => esc_html__( 'Header h1 ', 'roofix' ),	
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h1_size',
			array(
				'default' => $this->defaults['typo_h1_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h1_size',
			array(
				'label' => esc_html__( 'Font Size', 'roofix' ),
				'description' => esc_html__( 'Font Size (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h1_height',
			array(
				'default' => $this->defaults['typo_h1_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h1_height',
			array(
				'label' => esc_html__( 'Line Height', 'roofix' ),
				'description' => esc_html__( 'Line Height (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);
		/**
		* Separator
		*/
        $wp_customize->add_setting('typo_h1_separator', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'typo_h1_separator', array(
            'settings' => 'separator_general1',
            'section' => 'typography_layout_section',
        )));

		$wp_customize->add_setting( 'typo_h2',
			array(
				'default' => $this->defaults['typo_h2'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new RTtheme_Google_Font_Select_Custom_Control( $wp_customize, 'typo_h2',
			array(
				'label' => esc_html__( 'Header h2 ', 'roofix' ),	
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h2_size',
			array(
				'default' => $this->defaults['typo_h2_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h2_size',
			array(
				'label' => esc_html__( 'Font Size', 'roofix' ),
				'description' => esc_html__( 'Font Size (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h2_height',
			array(
				'default' => $this->defaults['typo_h2_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h2_height',
			array(
				'label' => esc_html__( 'Line Height', 'roofix' ),
				'description' => esc_html__( 'Line Height (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);
		/**
		* Separator
		*/
        $wp_customize->add_setting('typo_h2_separator', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'typo_h2_separator', array(
            'settings' => 'separator_general1',
            'section' => 'typography_layout_section',
        )));

		// h3 Google Font Select Control------------------------------------------------------------------------------------

		$wp_customize->add_setting( 'typo_h3',
			array(
				'default' => $this->defaults['typo_h3'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new RTtheme_Google_Font_Select_Custom_Control( $wp_customize, 'typo_h3',
			array(
				'label' => esc_html__( 'Header h3 ', 'roofix' ),	
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h3_size',
			array(
				'default' => $this->defaults['typo_h3_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h3_size',
			array(
				'label' => esc_html__( 'Font Size', 'roofix' ),
				'description' => esc_html__( 'Font Size (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h3_height',
			array(
				'default' => $this->defaults['typo_h3_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h3_height',
			array(
				'label' => esc_html__( 'Line Height', 'roofix' ),
				'description' => esc_html__( 'Line Height (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);
		/**
		* Separator
		*/
        $wp_customize->add_setting('typo_h3_separator', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'typo_h3_separator', array(
            'settings' => 'separator_general1',
            'section' => 'typography_layout_section',
        )));

		// h4 Google Font Select Control ------------------------------------------------------------------------------------

		$wp_customize->add_setting( 'typo_h4',
			array(
				'default' => $this->defaults['typo_h4'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new RTtheme_Google_Font_Select_Custom_Control( $wp_customize, 'typo_h4',
			array(
				'label' => esc_html__( 'Header h4 ', 'roofix' ),	
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h4_size',
			array(
				'default' => $this->defaults['typo_h4_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h4_size',
			array(
				'label' => esc_html__( 'Font Size', 'roofix' ),
				'description' => esc_html__( 'Font Size (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h4_height',
			array(
				'default' => $this->defaults['typo_h4_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h4_height',
			array(
				'label' => esc_html__( 'Line Height', 'roofix' ),
				'description' => esc_html__( 'Line Height (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);
		/**
		* Separator
		*/
        $wp_customize->add_setting('typo_h4_separator', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'typo_h4_separator', array(
            'settings' => 'separator_general1',
            'section' => 'typography_layout_section',
        )));

		// h5 Google Font Select Control  -------------------------------------------------------------------------------

		$wp_customize->add_setting( 'typo_h5',
			array(
				'default' => $this->defaults['typo_h5'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new RTtheme_Google_Font_Select_Custom_Control( $wp_customize, 'typo_h5',
			array(
				'label' => esc_html__( 'Header h5 ', 'roofix' ),	
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h5_size',
			array(
				'default' => $this->defaults['typo_h5_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h5_size',
			array(
				'label' => esc_html__( 'Font Size', 'roofix' ),
				'description' => esc_html__( 'Font Size (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h5_height',
			array(
				'default' => $this->defaults['typo_h5_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h5_height',
			array(
				'label' => esc_html__( 'Line Height', 'roofix' ),
				'description' => esc_html__( 'Line Height (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);
		/**
		* Separator
		*/
        $wp_customize->add_setting('typo_h5_separator', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'typo_h5_separator', array(
            'settings' => 'separator_general1',
            'section' => 'typography_layout_section',
        )));	

        // h6 Google Font Select Control -----------------------------------------------------------------------------------
        
		$wp_customize->add_setting( 'typo_h6',
			array(
				'default' => $this->defaults['typo_h6'],
				'sanitize_callback' => 'rttheme_google_font_sanitization'
			)
		);
		$wp_customize->add_control( new RTtheme_Google_Font_Select_Custom_Control( $wp_customize, 'typo_h6',
			array(
				'label' => esc_html__( 'Header h6 ', 'roofix' ),	
				'section' => 'typography_layout_section',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'popular',
				),
			)
		) );	
		$wp_customize->add_setting( 'typo_h6_size',
			array(
				'default' => $this->defaults['typo_h6_size'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h6_size',
			array(
				'label' => esc_html__( 'Font Size', 'roofix' ),
				'description' => esc_html__( 'Font Size (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',				
					
				),
			)
		);
		$wp_customize->add_setting( 'typo_h6_height',
			array(
				'default' => $this->defaults['typo_h6_height'],
				'transport' => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
		);
		$wp_customize->add_control( 'typo_h6_height',
			array(
				'label' => esc_html__( 'Line Height', 'roofix' ),
				'description' => esc_html__( 'Line Height (px)', 'roofix' ),
				'section' => 'typography_layout_section',
				'type' => 'text',
				'input_attrs' => array(
					'class' => 'rtt-txt-box',					
					
				),
			)
		);
		/**
		* Separator
		*/
        $wp_customize->add_setting('typo_h6_separator', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'typo_h6_separator', array(
            'settings' => 'separator_general1',
            'section' => 'typography_layout_section',
        )));




	}


}

/**
 * Load all our Customizer Custom Controls
 */

//Helper::requires( 'customizer/typography/typography-controls.php' );

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	$rttheme_settings = new rttheme_initialise_customizer_typography_settings();
}
