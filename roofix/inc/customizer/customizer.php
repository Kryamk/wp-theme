<?php
use radiustheme\roofix\Helper;
/**
 * Roofix Customizer Setup and Custom Controls
 *
 * @package Roofix
 * @since Roofix 1.0
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class rttheme_initialise_customizer_settings
{
    // Get our default values
    private $defaults;

    public function __construct()
    {
        // Get our Customizer defaults
        $this->defaults = rttheme_generate_defaults();
        // Register our Panels
        add_action('customize_register', array($this, 'rttheme_add_customizer_panels'));
        // Register our sections
        add_action('customize_register', array($this, 'rttheme_add_customizer_sections'));

        // Register General sections
        add_action('customize_register', array($this, 'rttheme_register_general_controls'));
        add_action('customize_register', array($this, 'rttheme_register_contact_socials_controls'));
        add_action('customize_register', array($this, 'rttheme_register_construction_controls'));

        // Register our header controls
        add_action('customize_register', array($this, 'rttheme_register_header_controls'));
        add_action('customize_register', array($this, 'rttheme_register_mobile_header_controls'));

        // Register our footer controls
        add_action('customize_register', array($this, 'rttheme_register_footer_controls'));

        // Register our page controls
        add_action('customize_register', array($this, 'rttheme_register_page_layout_controls'));

        // Register post & post single controls
        add_action('customize_register', array($this, 'rttheme_register_blog_layout_controls'));
        add_action('customize_register', array($this, 'rttheme_register_single_blog_layout_controls'));

        add_action('customize_register', array($this, 'rttheme_register_team_archive_layout_controls'));
        add_action('customize_register', array($this, 'rttheme_register_single_team_layout_controls'));

        add_action('customize_register', array($this, 'rttheme_register_services_archive_layout_controls'));
        add_action('customize_register', array($this, 'rttheme_register_single_services_layout_controls'));

        add_action('customize_register', array($this, 'rttheme_register_project_archive_layout_controls'));
        add_action('customize_register', array($this, 'rttheme_register_single_project_layout_controls'));

        add_action('customize_register', array($this, 'rttheme_register_search_layout_controls'));
        add_action('customize_register', array($this, 'rttheme_register_error_layout_controls'));
        add_action('customize_register', array($this, 'rttheme_register_shop_layout_controls'));
        add_action('customize_register', array($this, 'rttheme_register_product_layout_controls'));
        add_action('customize_register', array($this, 'rttheme_register_single_post_controls'));
        add_action('customize_register', array($this, 'rttheme_register_blog_t_post_controls'));

    }

    /**
     * Register the Customizer panels
     */
    public function rttheme_add_customizer_panels($wp_customize)
    {
        // Add our Colors Panel

        $wp_customize->add_panel('rttheme_general_defaults',
                                 array(
                                     'title'       => esc_html__('General', 'roofix'),
                                     'description' => esc_html__('Adjust the overall layout for your site.', 'roofix'),
                                     'priority'    => 25,
                                 )
        );

        $wp_customize->add_panel('rttheme_header_defaults',
                                 array(
                                     'title'       => esc_html__('Header', 'roofix'),
                                     'description' => esc_html__('Adjust the overall layout for your site.', 'roofix'),
                                     'priority'    => 27,
                                 )
        );
        $wp_customize->add_panel('rttheme_layouts_defaults',
                                 array(
                                     'title'       => esc_html__('Layouts', 'roofix'),
                                     'description' => esc_html__('Adjust the overall layout for your site.', 'roofix'),
                                     'priority'    => 28,
                                 )
        );

        $wp_customize->add_panel('rttheme_footer_defaults',
                                 array(
                                     'title'       => esc_html__('Footer', 'roofix'),
                                     'description' => esc_html__('Adjust the overall layout for your site.', 'roofix'),
                                     'priority'    => 29,
                                 )
        );
        $wp_customize->add_panel('rttheme_theme_colors_defaults',
                                 array(
                                     'title'       => esc_html__('Theme Colors', 'roofix'),
                                     'description' => esc_html__('Adjust the overall layout for your site.', 'roofix'),
                                     'priority'    => 30,
                                 )
        );
        $wp_customize->add_panel('rttheme_theme_setting_defaults',
                                 array(
                                     'title'       => esc_html__('Setting ', 'roofix'),
                                     'description' => esc_html__('All other setting.', 'roofix'),
                                     'priority'    => 32,
                                 )
        );

    }


    /**
     * Register the Customizer sections
     */
    public function rttheme_add_customizer_sections($wp_customize)
    {

        // Rename the default Colors section
        $wp_customize->get_section('colors')->title = 'Background';

        // Move the default Colors section to our new Colors Panel
        $wp_customize->get_section('colors')->panel = 'colors_panel';

        // Change the Priority of the default Colors section so it's at the top of our Panel
        $wp_customize->get_section('colors')->priority = 10;


        // Add General Section
        $wp_customize->add_section('general_section',
                                   array(
                                       'title'    => esc_html__('General', 'roofix'),
                                       'panel'    => 'rttheme_general_defaults',
                                       'priority' => 10,
                                   )
        );

        // Add Under Construction Section
        $wp_customize->add_section('under_construction_section',
                                   array(
                                       'title'       => esc_html__('Under Construction', 'roofix'),
                                       'description' => esc_html__('Under Construction / Coming Soon Mode
					If enable, the frontend shows maintenance / coming soon mode page only.', 'roofix'),
                                       'panel'       => 'rttheme_general_defaults',
                                       'priority'    => 10,
                                   )
        );


        // Add our Page & Post Headers Section
        $wp_customize->add_section('contact_socials_section',
                                   array(
                                       'title'    => esc_html__('Contact Socials', 'roofix'),
                                       'panel'    => 'rttheme_general_defaults',
                                       'priority' => 12,
                                   )
        );


        // Add our Header Main Section
        $wp_customize->add_section('header_main_section',
                                   array(
                                       'title' => esc_html__('Header Main', 'roofix'),

                                       'panel'    => 'rttheme_header_defaults',
                                       'priority' => 11,
                                   )
        );

        // Add our Mobile Header Section
        $wp_customize->add_section('mobile_header_section',
                                   array(
                                       'title'    => esc_html__('Mobile Header', 'roofix'),
                                       'panel'    => 'rttheme_header_defaults',
                                       'priority' => 12,
                                   )
        );
        // Add our Footer Layout Section
        $wp_customize->add_section('footer_section',
                                   array(
                                       'title'    => esc_html__('Footer Layout', 'roofix'),
                                       'priority' => 95,
                                       'panel'    => 'rttheme_footer_defaults',
                                   )
        );

        // Add our Pages Layout Section
        $wp_customize->add_section('page_layout_section',
                                   array(
                                       'title' => esc_html__('Pages Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );
        // Add our Blog  Section
        $wp_customize->add_section('blog_layout_section',
                                   array(
                                       'title' => esc_html__('Blog / Archive Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );

        // Add our Single Blog  Section
        $wp_customize->add_section('single_post_layout_section',
                                   array(
                                       'title'    => esc_html__('Single Blog  Layout', 'roofix'),
                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );

        // Add our Team Archive  Section
        $wp_customize->add_section('team_archive_layout_section',
                                   array(
                                       'title' => esc_html__('Team Archive Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );

        // Add our Single Team  Section
        $wp_customize->add_section('team_single_layout_section',
                                   array(
                                       'title' => esc_html__('Single Team Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );

        // Add our Services Archive Section
        $wp_customize->add_section('services_archive_layout_section',
                                   array(
                                       'title' => esc_html__('Services Archive Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );

        // Add our Single Section
        $wp_customize->add_section('services_single_layout_section',
                                   array(
                                       'title' => esc_html__('Single Services Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );

        // Add our project Section
        $wp_customize->add_section('project_archive_layout_section',
                                   array(
                                       'title' => esc_html__('Project Archive Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );

        // Add our Footer Section
        $wp_customize->add_section('project_single_layout_section',
                                   array(
                                       'title' => esc_html__('Single Project Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );
        // Add our Search Section
        $wp_customize->add_section('search_layout_section',
                                   array(
                                       'title'    => esc_html__('Search Page Layout', 'roofix'),
                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );
        // Add our Search Section
        $wp_customize->add_section('error_layout_section',
                                   array(
                                       'title'    => esc_html__('404 Page Layout', 'roofix'),
                                       'priority' => 95,
                                       'panel'    => 'rttheme_layouts_defaults',
                                   )
        );
		
		// Add our wooCommerce shop Section
        $wp_customize->add_section('shop_layout_section',
									array(
                                       'title'    => esc_html__('Shop Page Layout', 'roofix'),
                                       'priority' => 95,
                                       'panel'    => 'woocommerce',
									)
        );
		
		// Add our wooCommerce product Section
        $wp_customize->add_section('product_layout_section',
									array(
                                       'title'    => esc_html__('Shop Single Layout', 'roofix'),
                                       'priority' => 95,
                                       'panel'    => 'woocommerce',
									)
        );


        // Add our Footer Section
        $wp_customize->add_section('author_post_layout_section',
                                   array(
                                       'title' => esc_html__('Author Post  Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_archive_defaults',
                                   )
        );

        // Add our Footer Section
        $wp_customize->add_section('single_post_related_section',
                                   array(
                                       'title' => esc_html__('Related Blog  Layout', 'roofix'),

                                       'priority' => 95,
                                       'panel'    => 'rttheme_single_defaults',
                                   )
        );

        // Add our Footer Section
        $wp_customize->add_section('single_team_layout_section',
                                   array(
                                       'title'       => esc_html__('Single Team Layout', 'roofix'),
                                       'description' => esc_html__('Update the content and style of the site footer. The Footer Content will be displayed just below the footer widgets.', 'roofix'),
                                       'priority'    => 95,
                                       'panel'       => 'rttheme_single_defaults',
                                   )
        );

        // Add our Footer Section
        $wp_customize->add_section('single_team_layout_section',
                                   array(
                                       'title'       => esc_html__('Single Team Layout', 'roofix'),
                                       'description' => esc_html__('Update the content and style of the site footer. The Footer Content will be displayed just below the footer widgets.', 'roofix'),
                                       'priority'    => 95,
                                       'panel'       => 'rttheme_single_defaults',
                                   )
        );

        // Add our Footer Section
        $wp_customize->add_section('single_post_section',
                                   array(
                                       'title'       => esc_html__('Single Blog Setting', 'roofix'),
                                       'description' => esc_html__('Update the content and style of the site footer. The Footer Content will be displayed just below the footer widgets.', 'roofix'),
                                       'priority'    => 95,
                                       'panel'       => 'rttheme_theme_setting_defaults',
                                   )
        );

      // Add our Footer Section
        $wp_customize->add_section('blog_setting_section',
                                   array(
                                       'title'       => esc_html__('Blog Archive Setting', 'roofix'),                                     
                                       'priority'    => 95,
                                       'panel'       => 'rttheme_theme_setting_defaults',
                                   )
        );

    }


    public function rttheme_register_blog_t_post_controls($wp_customize)
    {  
  
        $wp_customize->add_setting('post_archive_number',
                     array(
                         'default'           => $this->defaults['post_archive_number'],
                         'transport'         => 'refresh',
                         'sanitize_callback' => 'rttheme_sanitize_integer'
                     )
        );


        $wp_customize->add_control('post_archive_number',
                                   array(
                                       'label'       => esc_html__('Blog Custom template: Number of items per page', 'roofix'),
                                       'description' => esc_html__('Effect only for Blog custom page template ', 'roofix'),                                       
                                       'section'       => 'blog_setting_section',
                                       'type'        => 'number'
                                   )
        );

        // Test of Dropdown Select2 Control (single select)
        $wp_customize->add_setting('post_archive_orderby',
                                   array(
                                       'default'           => $this->defaults['post_archive_orderby'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Dropdown_Select2_Custom_Control($wp_customize, 'post_archive_orderby',
                         array(
                             'label'       => esc_html__('Blog Custom template: Order By', 'roofix'),
                             'description' => esc_html__('Effect only for Blog custom page template)', 'roofix'),                           
                             'section'       => 'blog_setting_section',
                             'input_attrs' => array(
                                 'placeholder' => esc_html__('Please select a state...', 'roofix'),
                                 'multiselect' => false,
                             ),
                             'choices'     => array(
                                 'options' => array(
                                     'date'       => esc_html__('Date (Recents comes first)', 'roofix'),
                                     'title'      => esc_html__('Title', 'roofix'),
                                     'menu_order' => esc_html__('Custom Order (Available via Order field inside Page Attributes box)', 'roofix'),

                                 )
                             )
                         )
           ));

  }


    public function rttheme_register_single_post_controls ($wp_customize)
    {

        $wp_customize->add_setting('post_date',
                                   array(
                                       'default'           => $this->defaults['post_date'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );

        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_date',
                                                                            array(
                                                                                'label'   => esc_html__('Display Date', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));


        $wp_customize->selective_refresh->add_partial('post_date',
                                                      array(
                                                          'selector'            => '.single-post .single-article-selector',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        $wp_customize->add_setting('post_author_name',
                                   array(
                                       'default'           => $this->defaults['post_author_name'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_author_name',
                                                                            array(
                                                                                'label'   => esc_html__('Display Author Name', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('post_comment_num',
                                   array(
                                       'default'           => $this->defaults['post_comment_num'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_comment_num',
                                                                            array(
                                                                                'label'   => esc_html__('Display Comment Count', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('post_cats',
                                   array(
                                       'default'           => $this->defaults['post_cats'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_cats',
                                                                            array(
                                                                                'label'   => esc_html__('Display Categories', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('post_tags',
                                   array(
                                       'default'           => $this->defaults['post_tags'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_tags',
                                                                            array(
                                                                                'label'   => esc_html__('Display Tag', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('post_social',
                                   array(
                                       'default'           => $this->defaults['post_social'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_social',
                                                                            array(
                                                                                'label'   => esc_html__('Display Social Share', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('post_about_author',
                                   array(
                                       'default'           => $this->defaults['post_about_author'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_about_author',
                                                                            array(
                                                                                'label'   => esc_html__('Display Author About', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('post_author_social',
                                   array(
                                       'default'           => $this->defaults['post_author_social'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_author_social',
                                                                            array(
                                                                                'label'   => esc_html__('Display Author Social', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('post_pagination',
                                   array(
                                       'default'           => $this->defaults['post_pagination'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_pagination',
                                                                            array(
                                                                                'label'   => esc_html__('Display Previous/Next Post Link', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('post_pagination_img',
                                   array(
                                       'default'           => $this->defaults['post_pagination_img'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_pagination_img',
                                                                            array(
                                                                                'label'   => esc_html__('Display Previous/Next Post Image', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));
        $wp_customize->add_setting('post_pagination_date',
                                   array(
                                       'default'           => $this->defaults['post_pagination_date'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'post_pagination_date',
                                                                            array(
                                                                                'label'   => esc_html__('Display Previous/Next Post Date', 'roofix'),
                                                                                'section' => 'single_post_section',
                                                                            )
                                   ));

    }


    /**
     * Register our -- general controls
     */
    public function rttheme_register_typography_controls($wp_customize)
    {

        // Test of Google Font Select Control
          $wp_customize->add_setting('typo_body',
           array(
               'default'           => $this->defaults['typo_body'],
               'sanitize_callback' => 'rttheme_google_font_sanitization'
           )
          );
        $wp_customize->add_control(new RTtheme_Google_Font_Select_Custom_Control($wp_customize, 'typo_body',
                     array(
                         'label'       => esc_html__('Body', 'roofix'),
                         'section'     => 'typography_layout_section',
                         'input_attrs' => array(
                             'font_count' => 'all',
                             'orderby'    => 'popular',
                         ),
                     )
        ));

    }

    public function rttheme_register_general_controls($wp_customize)
    {

        $wp_customize->add_setting('logo',
                                   array(
                                       'default'           => $this->defaults['logo'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'logo',
                                                                  array(
                                                                      'label'         => esc_html__('Main Logo', 'roofix'),
                                                                      'description'   => esc_html__('This is the description for the Media Control', 'roofix'),
                                                                      'section'       => 'general_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));


        $wp_customize->selective_refresh->add_partial('logo',
                                                      array(
                                                          'selector'            => '.logo-selector',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        $wp_customize->add_setting('logo_light',
                                   array(
                                       'default'           => $this->defaults['logo_light'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'logo_light',
                                                                  array(
                                                                      'label'         => esc_html__('Light Logo', 'roofix'),
                                                                      'description'   => esc_html__('This is the description for the Media Control', 'roofix'),
                                                                      'section'       => 'general_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));

        $wp_customize->add_setting('logo_light_t',
                                   array(
                                       'default'           => $this->defaults['logo_light_t'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'logo_light_t',
                                                                  array(
                                                                      'label'         => esc_html__('Transparent Light Logo', 'roofix'),
                                                                      'description'   => esc_html__('Used when Transparent Header is enabled', 'roofix'),
                                                                      'section'       => 'general_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));

        // Logo Area Width
        $wp_customize->add_setting('logo_width',
                                   array(
                                       'default'           => $this->defaults['logo_width'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('logo_width',
                                   array(
                                       'label'       => esc_html__('Logo Area Width', 'roofix'),
                                       'section'     => 'general_section',
                                       'description' => esc_html__('Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width', 'roofix'),
                                       'type'        => 'select',
                                       'choices'     => array(
                                           '1' => esc_html__('1 Column', 'roofix'),
                                           '2' => esc_html__('2 Columns', 'roofix'),
                                           '3' => esc_html__('3 Columns', 'roofix'),
                                           '4' => esc_html__('4 Columns', 'roofix'),

                                       )
                                   )
        );



        /**
         * Separator
         */
        $wp_customize->add_setting('separator_general1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'separator_general1', array(
            'settings' => 'separator_general1',
            'section'  => 'general_section',
        )));
     

        // Add our Checkbox switch setting and control for opening URLs in a new tab
        $wp_customize->add_setting('preloader',
        array(
         'default'           => $this->defaults['preloader'],
         'transport'         => 'refresh',
         'sanitize_callback' => 'rttheme_switch_sanitization',
        )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'preloader',
              array(
                  'label'   => esc_html__('Preloader', 'roofix'),
                  'section' => 'general_section',
              )
        ));



        $wp_customize->add_setting('preloader_image',
        array(
          'default'           => $this->defaults['preloader_image'],
          'transport'         => 'refresh',
          'sanitize_callback' => 'absint',
          'active_callback'   => 'rttheme_is_preloader_enabled',  
        )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'preloader_image',
          array(
              'label'         => esc_html__('Preloader Image', 'roofix'),
              'description'   => esc_html__('This is the description for the Media Control', 'roofix'),
              'section'       => 'general_section',
                         'active_callback'   => 'rttheme_is_preloader_enabled',  
              'mime_type'     => 'image',
              'button_labels' => array(
                  'select'       => esc_html__('Select File', 'roofix'),
                  'change'       => esc_html__('Change File', 'roofix'),
                  'default'      => esc_html__('Default', 'roofix'),
                  'remove'       => esc_html__('Remove', 'roofix'),
                  'placeholder'  => esc_html__('No file selected', 'roofix'),
                  'frame_title'  => esc_html__('Select File', 'roofix'),
                  'frame_button' => esc_html__('Choose File', 'roofix'),
              )
          )
        ));




        // Add our color setting and control for title header normal color
        $wp_customize->add_setting('preloader_bg_color',
                                   array(
                                       'default'           => $this->defaults['preloader_bg_color'],
                                       'transport'         => 'postMessage',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization',
                                                  'active_callback'   => 'rttheme_is_footer_top_enabled',  
                                   )
        );
      $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'preloader_bg_color',
        array(
          'label'   => esc_html__('Preloader color', 'roofix'),
          'section' => 'general_section',
          'active_callback'   => 'rttheme_is_footer_top_enabled',  
        )
      ));


        // Add our Checkbox switch setting and control for opening URLs in a new tab
        $wp_customize->add_setting('back_to_top',
                                   array(
                                       'default'           => $this->defaults['back_to_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'back_to_top',
                                                                            array(
                                                                                'label'   => esc_html__('Back to Top', 'roofix'),
                                                                                'section' => 'general_section',
                                                                            )
                                   ));
       

        // Add our Checkbox switch setting and control for opening URLs in a new tab
        $wp_customize->add_setting('inner_fix_banner',
                                   array(
                                       'default'           => $this->defaults['inner_fix_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'inner_fix_banner',
                                                                            array(
                                                                                'label'   => esc_html__('Inner Banner Parallax', 'roofix'),
                                                                                'section' => 'general_section',
                                                                            )
                                   ));

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_general2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'separator_general2', array(
            'settings' => 'separator_general2',
            'section'  => 'general_section',
        )));


        $wp_customize->add_setting('team_admin_menu_title',
                                   array(
                                       'default'           => $this->defaults['team_admin_menu_title'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_admin_menu_title',
                                   array(
                                       'label'       => esc_html__('Admin Title', 'roofix'),
                                       'description' => esc_html__('Change Admin Title', 'roofix'),
                                       'section'     => 'general_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class'       => 'rt-txt-box',
                                           'style'       => 'border: 1px solid rebeccapurple',
                                           'placeholder' => esc_html__('team', 'roofix'),
                                       ),
                                   )
        );

        $wp_customize->add_setting('team_slug',
                                   array(
                                       'default'           => $this->defaults['team_slug'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_slug',
                                   array(
                                       'label'       => esc_html__('Team Slug', 'roofix'),
                                       'description' => esc_html__('Change the slug name', 'roofix'),
                                       'section'     => 'general_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class'       => 'rt-txt-box',
                                           'style'       => 'border: 1px solid rebeccapurple',
                                           'placeholder' => esc_html__('team', 'roofix'),
                                       ),
                                   )
        );

        $wp_customize->add_setting('team_cat_slug',
                                   array(
                                       'default'           => $this->defaults['team_cat_slug'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_cat_slug',
                                   array(
                                       'label'       => esc_html__('Team Cat Slug', 'roofix'),
                                       'description' => esc_html__('Change the slug name', 'roofix'),
                                       'section'     => 'general_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class'       => 'rt-txt-box',
                                           'style'       => 'border: 1px solid rebeccapurple',
                                           'placeholder' => esc_html__('team-cat', 'roofix'),
                                       ),
                                   )
        );


 $wp_customize->add_setting('services_admin_menu_title',
                                   array(
                                       'default'           => $this->defaults['services_admin_menu_title'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_admin_menu_title',
                                   array(
                                       'label'       => esc_html__('Admin Title', 'roofix'),
                                       'description' => esc_html__('Change Admin Title', 'roofix'),
                                       'section'     => 'general_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class'       => 'rt-txt-box',
                                           'style'       => 'border: 1px solid rebeccapurple',
                                           'placeholder' => esc_html__('team', 'roofix'),
                                       ),
                                   )
        );

        $wp_customize->add_setting('services_slug',
                                   array(
                                       'default'           => $this->defaults['services_slug'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_slug',
                                   array(
                                       'label'       => esc_html__('Services Slug', 'roofix'),
                                       'description' => esc_html__('Change the slug name', 'roofix'),
                                       'section'     => 'general_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class'       => 'rt-txt-box',
                                           'placeholder' => esc_html__('services', 'roofix'),
                                       ),
                                   )
        );


        $wp_customize->add_setting('services_cat_slug',
                                   array(
                                       'default'           => $this->defaults['services_cat_slug'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_cat_slug',
                                   array(
                                       'label'       => esc_html__('Services Cat Slug', 'roofix'),
                                       'description' => esc_html__('Change the slug name', 'roofix'),
                                       'section'     => 'general_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class'       => 'rt-txt-box',
                                           'placeholder' => esc_html__('services-cat', 'roofix'),
                                       ),
                                   )
        );




      $wp_customize->add_setting('projects_admin_menu_title',
                                 array(
                                     'default'           => $this->defaults['projects_admin_menu_title'],
                                     'transport'         => 'refresh',
                                     'sanitize_callback' => 'rttheme_text_sanitization'
                                 )
      );
      $wp_customize->add_control('projects_admin_menu_title',
                                 array(
                                     'label'       => esc_html__('Admin Title', 'roofix'),
                                     'description' => esc_html__('Change Admin Title', 'roofix'),
                                     'section'     => 'general_section',
                                     'type'        => 'text',
                                     'input_attrs' => array(
                                         'class'       => 'rt-txt-box',
                                         'style'       => 'border: 1px solid rebeccapurple',
                                         'placeholder' => esc_html__('team', 'roofix'),
                                     ),
                                 )
      );
        
        
        $wp_customize->add_setting('projects_slug',
                                   array(
                                       'default'           => $this->defaults['projects_slug'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('projects_slug',
                                   array(
                                       'label'       => esc_html__('Projects Slug', 'roofix'),
                                       'description' => esc_html__('Change the slug name', 'roofix'),
                                       'section'     => 'general_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class'       => 'rt-txt-box',
                                           'placeholder' => esc_html__('projects', 'roofix'),
                                       ),
                                   )
        );
        $wp_customize->add_setting('projects_cat_slug',
                                   array(
                                       'default'           => $this->defaults['projects_cat_slug'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('projects_cat_slug',
                                   array(
                                       'label'       => esc_html__('Projects Cat Slug', 'roofix'),
                                       'description' => esc_html__('Change the slug name', 'roofix'),
                                       'section'     => 'general_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class'       => 'rt-txt-box',
                                           'placeholder' => esc_html__('projects-cat', 'roofix'),
                                       ),
                                   )
        );
    }

    /**
     * Register our -- Contact & Socials-- controls
     */
    public function rttheme_register_contact_socials_controls($wp_customize)
    {


        $wp_customize->add_setting('phone_label',
                                   array(
                                       'default'           => $this->defaults['phone_label'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('phone_label',
                                   array(
                                       'label' => esc_html__('Phone label', 'roofix'),

                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );


        $wp_customize->selective_refresh->add_partial('phone_label',
                                                      array(
                                                          'selector'            => '.topbar-information-selector',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        $wp_customize->add_setting('phone',
                                   array(
                                       'default'           => $this->defaults['phone'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('phone',
                                   array(
                                       'label' => esc_html__('Phone', 'roofix'),

                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );

        $wp_customize->add_setting('email_label',
                                   array(
                                       'default'           => $this->defaults['email_label'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('email_label',
                                   array(
                                       'label' => esc_html__('Email label', 'roofix'),

                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );

        $wp_customize->add_setting('email',
                                   array(
                                       'default'           => $this->defaults['email'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('email',
                                   array(
                                       'label'       => esc_html__('Email', 'roofix'),
                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );

        $wp_customize->add_setting('opening_label',
                                   array(
                                       'default'           => $this->defaults['opening_label'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('opening_label',
                                   array(
                                       'label' => esc_html__('Opening label', 'roofix'),

                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );

        $wp_customize->add_setting('opening',
                                   array(
                                       'default'           => $this->defaults['opening'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('opening',
                                   array(
                                       'label'       => esc_html__('Opening', 'roofix'),
                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );


        $wp_customize->add_setting('address_label',
                                   array(
                                       'default'           => $this->defaults['address_label'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('address_label',
                                   array(
                                       'label' => esc_html__('Address label', 'roofix'),

                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );

        $wp_customize->add_setting('offcanvas_address_label',
                                   array(
                                       'default'           => $this->defaults['offcanvas_address_label'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('offcanvas_address_label',
                                   array(
                                       'label' => esc_html__('Offcanvas Menu Address label', 'roofix'),

                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        ); 

        $wp_customize->add_setting('offcanvas_content_title',
                                   array(
                                       'default'           => $this->defaults['offcanvas_content_title'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('offcanvas_content_title',
                                   array(
                                       'label' => esc_html__('Offcanvas Short Title', 'roofix'),

                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );

      $wp_customize->add_setting('offcanvas_content',
                                   array(
                                       'default'           => $this->defaults['offcanvas_content'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'wp_kses_post'
                                   )
        );

        $wp_customize->add_control( new RTtheme_TinyMCE_Custom_control( $wp_customize, 'offcanvas_content',
            array(
            'label' => esc_html__('Offcanvas Menu Short Content', 'roofix'),
            'section' => 'contact_socials_section',
            'input_attrs' => array(
                'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
                'toolbar2' => 'formatselect outdent indent | blockquote charmap',
                'mediaButtons' => true,
            ))
        ) );


        $wp_customize->add_setting('offcanvas_address',
                                   array(
                                       'default'           => $this->defaults['offcanvas_address'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'wp_kses_post'
                                   )
        );

        $wp_customize->add_control( new RTtheme_TinyMCE_Custom_control( $wp_customize, 'offcanvas_address',
            array(
            'label' => esc_html__('Offcanvas Address', 'roofix'),
            'section' => 'contact_socials_section',
            'input_attrs' => array(
                'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
                'toolbar2' => 'formatselect outdent indent | blockquote charmap',
                'mediaButtons' => true,
            ))
        ) );

        $wp_customize->add_setting('address',
                                   array(
                                       'default'           => $this->defaults['address'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'wp_kses_post'
                                   )
        );

        $wp_customize->add_control( new RTtheme_TinyMCE_Custom_control( $wp_customize, 'address',
        array(
            'label' => esc_html__('Address', 'roofix'),
            'section' => 'contact_socials_section',
            'input_attrs' => array(
                'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
                'toolbar2' => 'formatselect outdent indent | blockquote charmap',
                'mediaButtons' => true,
            )
        )
    ) );

        $wp_customize->add_setting('social_label',
                                   array(
                                       'default'           => $this->defaults['social_label'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('social_label',
                                   array(
                                       'label' => esc_html__('Address label', 'roofix'),

                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );

        $wp_customize->add_setting('social_label',
                                   array(
                                       'default'           => $this->defaults['social_label'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('social_label',
                                   array(
                                       'label' => esc_html__('Address label', 'roofix'),

                                       'section'     => 'contact_socials_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class' => 'rt-txt-box',
                                       ),
                                   )
        );


        $wp_customize->add_setting('social_facebook',
                                   array(
                                       'default'           => $this->defaults['social_facebook'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'esc_url_raw'
                                   )
        );
        $wp_customize->add_control('social_facebook',
                                   array(
                                       'label'   => esc_html__('Facebook', 'roofix'),
                                       'section' => 'contact_socials_section',
                                       'type'    => 'url'
                                   )
        );

        $wp_customize->add_setting('social_twitter',
                                   array(
                                       'default'           => $this->defaults['social_twitter'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'esc_url_raw'
                                   )
        );
        $wp_customize->add_control('social_twitter',
                                   array(
                                       'label'   => esc_html__('Twitter', 'roofix'),
                                       'section' => 'contact_socials_section',
                                       'type'    => 'url'
                                   )
        );

        $wp_customize->add_setting('social_linkedin',
                                   array(
                                       'default'           => $this->defaults['social_linkedin'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'esc_url_raw'
                                   )
        );
        $wp_customize->add_control('social_linkedin',
                                   array(
                                       'label'   => esc_html__('Linkedin', 'roofix'),
                                       'section' => 'contact_socials_section',
                                       'type'    => 'url'
                                   )
        );

        $wp_customize->add_setting('social_youtube',
                                   array(
                                       'default'           => $this->defaults['social_youtube'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'esc_url_raw'
                                   )
        );
        $wp_customize->add_control('social_youtube',
                                   array(
                                       'label'   => esc_html__('Youtube', 'roofix'),
                                       'section' => 'contact_socials_section',
                                       'type'    => 'url'
                                   )
        );

        $wp_customize->add_setting('social_pinterest',
                                   array(
                                       'default'           => $this->defaults['social_pinterest'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'esc_url_raw'
                                   )
        );
        $wp_customize->add_control('social_pinterest',
                                   array(
                                       'label'   => esc_html__('Pinterest', 'roofix'),
                                       'section' => 'contact_socials_section',
                                       'type'    => 'url'
                                   )
        );

        $wp_customize->add_setting('social_instagram',
                                   array(
                                       'default'           => $this->defaults['social_instagram'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'esc_url_raw'
                                   )
        );
        $wp_customize->add_control('social_instagram',
                                   array(
                                       'label'   => esc_html__('Instagram', 'roofix'),
                                       'section' => 'contact_socials_section',
                                       'type'    => 'url'
                                   )
        );
        $wp_customize->add_setting('social_rss',
                                   array(
                                       'default'           => $this->defaults['social_rss'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'esc_url_raw'
                                   )
        );
        $wp_customize->add_control('social_rss',
                                   array(
                                       'label'   => esc_html__('RSS', 'roofix'),
                                       'section' => 'contact_socials_section',
                                       'type'    => 'url'
                                   )
        );

    }

    /**
     * Register our -- Under Construction -- controls
     */
    public function rttheme_register_construction_controls($wp_customize)
    {


        // ---- Under Construction / Coming Soon Mode
        $wp_customize->add_setting('under_construction_mode_enable',
                                   array(
                                       'default'           => $this->defaults['under_construction_mode_enable'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'under_construction_mode_enable',
                                                                            array(
                                                                                'label'   => esc_html__('Coming Soon Mode', 'roofix'),
                                                                                'section' => 'under_construction_section',
                                                                            )
                                   ));

        // ---- Under Construction / Coming Soon Mode -- end
        /**
         * Separator
         */
        $wp_customize->add_setting('rttheme_separator_heading_hover', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'rttheme_separator_heading_hover', array(
            'settings' => 'rttheme_separator_heading_hover',
            'section'  => 'under_construction_section',
        )));
        // --- Under Construction Logo
        $wp_customize->add_setting('under_construction_page_logo',
                                   array(
                                       'default'   => $this->defaults['under_construction_page_logo'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'under_construction_page_logo',
                                                                  array(
                                                                      'label'         => esc_html__('Under Construction Logo', 'roofix'),
                                                                      'section'       => 'under_construction_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));
        $wp_customize->selective_refresh->add_partial('under_construction_page_logo', array(
            'selector'        => '.construction-page-logo',
            'render_callback' => '__return_false'
        ));
        // --- Under Construction Logo --end

        // --- Under Construction title of Text Control
        $wp_customize->add_setting('under_construction_title_text',
                                   array(
                                       'default'           => $this->defaults['under_construction_title_text'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('under_construction_title_text',
                                   array(
                                       'label' => esc_html__('Page Title', 'roofix'),

                                       'section'     => 'under_construction_section',
                                       'type'        => 'text',
                                       'input_attrs' => array(
                                           'class'       => 'rt-txt-box',
                                           'placeholder' => esc_html__('Construction Page Title', 'roofix'),
                                       ),
                                   )
        );
        // --- Under Construction title of Text Control --end

        // --- Under construction page image
        $wp_customize->add_setting('under_construction_page_image',
                                   array(
                                       'default'   => $this->defaults['under_construction_page_image'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'under_construction_page_image',
                                                                  array(
                                                                      'label'         => esc_html__('Under Construction Image', 'roofix'),
                                                                      'section'       => 'under_construction_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));
        // --- Under construction page image -end

        // --- Under construction countdown
        $wp_customize->add_setting('under_construction_tc_date',
                                   array(
                                       'default'           => $this->defaults['under_construction_tc_date'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_date_time_sanitization',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Date_Time_Control($wp_customize, 'under_construction_tc_date',
                                                                      array(
                                                                          'label'              => esc_html__('Default Date Control', 'roofix'),
                                                                          'section'            => 'under_construction_section',
                                                                          'include_time'       => false,
                                                                          'allow_past_date'    => false,
                                                                          'twelve_hour_format' => true,
                                                                          'min_year'           => '2010',
                                                                          'max_year'           => '2020',
                                                                      )
                                   ));
       

    }


    /**
     * Register our -- Header controls
     */
    public function rttheme_register_header_controls($wp_customize){


        // Add our Checkbox switch setting and control for opening URLs in a new tab
        $wp_customize->add_setting('header_opt',
                       array(
                           'default'           => $this->defaults['header_opt'],
                           'transport'         => 'refresh',
                           'sanitize_callback' => 'rttheme_switch_sanitization',
                       )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'header_opt',
                          array(
                              'label'   => esc_html__('Display Header Area', 'roofix'),
                              'section' => 'header_main_section',
                          )
                       ));
					   
		/*header top shape*/			   
		$wp_customize->add_setting('header_top_shape',
             array(
                 'default'           => $this->defaults['header_top_shape'],
                 'transport'         => 'refresh',
                 'sanitize_callback' => 'absint',  
                 'active_callback'   => 'rttheme_is_header_top_shape',                       
             )
        );
          $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_top_shape',
              array(
                  'label'         => esc_html__('Header top shape', 'roofix'),
                  'description'   => esc_html__('This is the description for the Media Control', 'roofix'),
                  'section'       => 'header_main_section',
                  'active_callback'   => 'rttheme_is_header_top_shape',
                  'mime_type'     => 'image',
                  'button_labels' => array(
                      'select'       => esc_html__('Select File', 'roofix'),
                      'change'       => esc_html__('Change File', 'roofix'),
                      'default'      => esc_html__('Default', 'roofix'),
                      'remove'       => esc_html__('Remove', 'roofix'),
                      'placeholder'  => esc_html__('No file selected', 'roofix'),
                      'frame_title'  => esc_html__('Select File', 'roofix'),
                      'frame_button' => esc_html__('Choose File', 'roofix'),
                  )
              )
        ));			 



        $wp_customize->add_setting('header_style',
                                   array(
                                       'default'           => $this->defaults['header_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'header_style',
               array(
                   'label'       => esc_html__('Header Layout', 'roofix'),
                   'description' => esc_html__('Select the default Header layout. You can override this settings in individual pages or post etc', 'roofix'),
                   'section'     => 'header_main_section',
                   'choices'     => array(
                       '1' => array(
                           'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/header-1.jpg',
                           'name'  => esc_html__('Header 1', 'roofix')
                       ),
                       '2' => array(
                           'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/header-2.jpg',
                           'name'  => esc_html__('Header 2', 'roofix')
                       ),
                       '3' => array(
                           'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/header-3.jpg',
                           'name'  => esc_html__('Header 3', 'roofix')
                       ),
                       '4' => array(
                           'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/header-4.jpg',
                           'name'  => esc_html__('Header 4', 'roofix')
                       ), 
                       '5' => array(
                           'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/header-5.jpg',
                           'name'  => esc_html__('Header 5', 'roofix')
                       ),                    
                   )
               )
        ));

        // Add our Checkbox switch setting and control for opening URLs in a new tab
        $wp_customize->add_setting('sticky_header',
                     array(
                         'default'           => $this->defaults['sticky_header'],
                         'transport'         => 'refresh',
                         'sanitize_callback' => 'rttheme_switch_sanitization',
                     )
        );

        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'sticky_header',
                    array(
                        'label'   => esc_html__('Sticky Header', 'roofix'),
                        'section' => 'header_main_section',
                    )
        ));

        // Add our Checkbox switch setting and control for opening URLs in a new tab
        $wp_customize->add_setting('tr_header',
                                   array(
                                       'default'           => $this->defaults['tr_header'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'tr_header',
                          array(
                              'label'   => esc_html__('Transparent Header', 'roofix'),
                              'section' => 'header_main_section',
                          )
        ));




        $wp_customize->add_setting('search_icon',
                                   array(
                                       'default'           => $this->defaults['search_icon'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'search_icon',
                                array(
                                    'label'   => esc_html__('Search Icon', 'roofix'),
                                    'section' => 'header_main_section',
                                      'active_callback'   => 'rttheme_is_header_option_enabled', 
                                )
                                   ));




        $wp_customize->add_setting('header_ofc_menu',
                           array(
                               'default'           => $this->defaults['header_ofc_menu'],
                               'transport'         => 'refresh',
                               'sanitize_callback' => 'rttheme_switch_sanitization',
                           )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'header_ofc_menu',
                        array(
                            'label'   => esc_html__('Offcanvas Menu', 'roofix'),
                            'section' => 'header_main_section',
                            'active_callback'   => 'rttheme_is_header_option_enabled', 
                        )
                       ));

 



      $wp_customize->add_setting('header_phone',
                   array(
                       'default'           => $this->defaults['header_phone'],
                       'transport'         => 'refresh',
                       'sanitize_callback' => 'rttheme_switch_sanitization',
                   )
      );
      $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'header_phone',
                    array(
                        'label'   => esc_html__('Header Phone', 'roofix'),
                        'section' => 'header_main_section',
                        'active_callback'   => 'rttheme_is_header_option_enabled', 
                    )
             ));
     
      $wp_customize->add_setting('header_btn',
                                 array(
                                     'default'           => $this->defaults['header_btn'],
                                     'transport'         => 'refresh',
                                     'sanitize_callback' => 'rttheme_switch_sanitization',
                                 )
      );

      $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'header_btn',
                              array(
                                  'label'   => esc_html__('Header Right Button', 'roofix'),
                                  'section' => 'header_main_section',
                                  'active_callback'   => 'rttheme_is_header_option_enabled', 
                              )
              ));

        $wp_customize->add_setting('header_buttontext',
                                   array(
                                       'default'           => $this->defaults['header_buttontext'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('header_buttontext',
                                   array(
                                       'label'   => esc_html__('Button Tex', 'roofix'),
                                       'section' => 'header_main_section',
                                       'active_callback'   => 'rttheme_is_header_option_enabled', 
                                       'type'    => 'text'
                                   )
        );

        $wp_customize->add_setting('header_buttonUrl',
                                   array(
                                       'default'           => $this->defaults['header_buttonUrl'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('header_buttonUrl',
                                   array(
                                       'label'   => esc_html__('Button Link', 'roofix'),
                                       'section' => 'header_main_section',
                                       'active_callback'   => 'rttheme_is_header_option_enabled', 
                                       'type'    => 'text'
                                   )
        );

        

        $wp_customize->add_setting('social_icon',
              array(
              'default'           => $this->defaults['social_icon'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'rttheme_switch_sanitization',
              )
          );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'social_icon',
              array(
                  'label'   => esc_html__('Social Icon', 'roofix'),
                  'section' => 'header_main_section',
                  'active_callback'   => 'rttheme_is_header_option_enabled', 
              )
        ));

        $wp_customize->add_setting('top_bar',
                     array(
                         'default'           => $this->defaults['top_bar'],
                         'transport'         => 'refresh',
                         'sanitize_callback' => 'rttheme_switch_sanitization',
                     )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'top_bar',
                                  array(
                                      'label'   => esc_html__('Top Bar', 'roofix'),
                                      'section' => 'header_main_section',
                                      'active_callback'   => 'rttheme_is_header_option_enabled', 
                                  )
            ));


        $wp_customize->add_setting('top_bar_style',
                                   array(
                                       'default'           => $this->defaults['top_bar_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'top_bar_style',
                                     array(
                                         'label'       => esc_html__('Top Bar Layout', 'roofix'),
                                         'description' => esc_html__('Select the default template layout for Pages . You can override this settings in individual pages', 'roofix'),
                                         'section'     => 'header_main_section',
                                         'active_callback'   => 'rttheme_is_header_option_enabled', 
                                         'choices'     => array(
                                             '1' => array(
                                                 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/top-1.png',
                                                 'name'  => esc_html__('Footer 1', 'roofix')
                                             ),
                                             '2' => array(
                                                 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/top-2.png',
                                                 'name'  => esc_html__('Footer 2', 'roofix')
                                             ),
                                             '3' => array(
                                                 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/top-3.png',

                                                 'name' => esc_html__('Footer 3', 'roofix')
                                             )
                                         )
                                     )
                                   ));

        

        $wp_customize->add_setting('resmenu_width',
                                   array(
                                       'default'           => $this->defaults['resmenu_width'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('resmenu_width',
                                   array(
                                       'label'   => esc_html__('Mobile Menu Width', 'roofix'),
                                       'section' => 'header_main_section',
                                       'type'    => 'text'
                                   )
        );

    }


    /**
     * Register our -- Mobile Header controls
     */
    public function rttheme_register_mobile_header_controls($wp_customize)
    {

        $wp_customize->add_setting('mobile_header_style',
                                   array(
                                       'default'           => $this->defaults['mobile_header_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'mobile_header_style',
                                                                                 array(
                                                                                     'label'       => esc_html__('Mobile Header Layout', 'roofix'),
                                                                                     'description' => esc_html__('You can override this settings only Mobile', 'roofix'),
                                                                                     'section'     => 'mobile_header_section',
                                                                                     'choices'     => array(
                                                                                         '1' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/mobile-header-1.jpg',
                                                                                             'name'  => esc_html__('Layout 1', 'roofix')
                                                                                         ),
                                                                                         '2' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/mobile-header-2.jpg',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         )
                                                                                     )
                                                                                 )
                                   ));

        $wp_customize->add_setting('phone_has_social',
                                   array(
                                       'default'           => $this->defaults['phone_has_social'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'phone_has_social',
                                                                            array(
                                                                                'label'   => esc_html__('Header Top social in mobile', 'roofix'),
                                                                                'section' => 'mobile_header_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('header_btn_has_mobile',
                                   array(
                                       'default'           => $this->defaults['header_btn_has_mobile'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'header_btn_has_mobile',
                                                                            array(
                                                                                'label'   => esc_html__('Button In Mobile', 'roofix'),
                                                                                'section' => 'mobile_header_section',
                                                                            )

                                   ));
								   
								  
        $wp_customize->add_setting('phone_has_mobile',
                                   array(
                                       'default'           => $this->defaults['phone_has_mobile'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'phone_has_mobile',
                                                                            array(
                                                                                'label'   => esc_html__('Header Top Phone in mobile', 'roofix'),
                                                                                'section' => 'mobile_header_section',
                                                                            )
                                   ));
        $wp_customize->add_setting('phone_has_email',
                                   array(
                                       'default'           => $this->defaults['phone_has_email'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'phone_has_email',
                                                                            array(
                                                                                'label'   => esc_html__('Header Top email in mobile', 'roofix'),
                                                                                'section' => 'mobile_header_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('phone_has_opening',
                                   array(
                                       'default'           => $this->defaults['phone_has_opening'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'phone_has_opening',
                                                                            array(
                                                                                'label'   => esc_html__('Header Top opening in mobile', 'roofix'),
                                                                                'section' => 'mobile_header_section',
                                                                            )
                                   ));


    }



    /**
     * Register our Footer controls
     */
    public function rttheme_register_footer_controls($wp_customize)
    {

      $wp_customize->add_setting('full_footer_area',
        array(
        'default'           => $this->defaults['full_footer_area'],
        'transport'         => 'refresh',
        'sanitize_callback' => 'rttheme_switch_sanitization',
        )
      );
      $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'full_footer_area',
          array(
              'label'   => esc_html__('Full Footer Area On/Off', 'roofix'),
              'section' => 'footer_section',               
          )
      ));

        $wp_customize->add_setting('footer_area',
          array(
          'default'           => $this->defaults['footer_area'],
          'transport'         => 'refresh',
          'sanitize_callback' => 'rttheme_switch_sanitization',
          )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'footer_area',
            array(
                'label'   => esc_html__('Display Footer Widget Area', 'roofix'),
                'section' => 'footer_section',               
            )
        ));

        
        /**
         * Separator
         */
        $wp_customize->add_setting('footer_separator1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'footer_separator1', array(
            'settings' => 'footer_separator1',
            'section'  => 'footer_section',
        )));

        $wp_customize->add_setting('footer_top_area',
           array(
               'default'           => $this->defaults['footer_top_area'],
               'transport'         => 'refresh',
               'sanitize_callback' => 'rttheme_switch_sanitization',
           )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'footer_top_area',
              array(
                  'label'   => esc_html__('Display Footer Top', 'roofix'),
                  'section' => 'footer_section',
              )
        ));
        $wp_customize->add_setting('footer_logo',
             array(
                 'default'           => $this->defaults['footer_logo'],
                 'transport'         => 'refresh',
                 'sanitize_callback' => 'absint',  
                 'active_callback'   => 'rttheme_is_footer_top_enabled',                       
             )
        );
          $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo',
              array(
                  'label'         => esc_html__('Footer Logo', 'roofix'),
                  'description'   => esc_html__('This is the description for the Media Control', 'roofix'),
                  'section'       => 'footer_section',
                  'active_callback'   => 'rttheme_is_footer_top_enabled',
                  'mime_type'     => 'image',
                  'button_labels' => array(
                      'select'       => esc_html__('Select File', 'roofix'),
                      'change'       => esc_html__('Change File', 'roofix'),
                      'default'      => esc_html__('Default', 'roofix'),
                      'remove'       => esc_html__('Remove', 'roofix'),
                      'placeholder'  => esc_html__('No file selected', 'roofix'),
                      'frame_title'  => esc_html__('Select File', 'roofix'),
                      'frame_button' => esc_html__('Choose File', 'roofix'),
                  )
              )
          ));

            $wp_customize->add_setting('footer_phone_lable',
             array(
                 'default'           => $this->defaults['footer_phone_lable'],
                 'transport'         => 'refresh',
                 'sanitize_callback' => 'rttheme_text_sanitization',
                 'active_callback'   => 'rttheme_is_footer_top_enabled',
             )
            );

            $wp_customize->add_control('footer_phone_lable',
             array(
                 'label' => esc_html__('Phone label', 'roofix'),
                 'section'     => 'footer_section',                 
                 'type'        => 'text',
                 'active_callback'   => 'rttheme_is_footer_top_enabled',
                 'input_attrs' => array(
                     'class' => 'rt-txt-box',
                 ),
             )
            );
          $wp_customize->selective_refresh->add_partial('footer_phone_lable',
              array(
                  'selector'            => '.footer-top-information-selector',
                  'container_inclusive' => true,
                  'fallback_refresh'    => true,    
                   'active_callback'   => 'rttheme_is_footer_top_enabled',               
              )
          );
          $wp_customize->add_setting('footer_phone',
           array(
               'default'           => $this->defaults['footer_phone'],
               'transport'         => 'refresh',
               'sanitize_callback' => 'rttheme_text_sanitization',
                'active_callback'   => 'rttheme_is_footer_top_enabled',
           )
          );
          $wp_customize->add_control('footer_phone',
           array(
               'label' => esc_html__('Phone', 'roofix'),
               'section'     => 'footer_section',
               'type'        => 'text',
                'active_callback'   => 'rttheme_is_footer_top_enabled',
               'input_attrs' => array(
                'class' => 'rt-txt-box',
                
               ),
           )
          );


          /**
          * Separator
          */
          $wp_customize->add_setting('footer_separator2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
          ));
          $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'footer_separator2', array(
            'settings' => 'footer_separator2',
            'section'  => 'footer_section',
             'active_callback'   => 'rttheme_is_footer_top_enabled',
          )));



        $wp_customize->add_setting('footer_style',
          array(
          'default'           => $this->defaults['footer_style'],
          'transport'         => 'refresh',
          'sanitize_callback' => 'rttheme_radio_sanitization'
          )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'footer_style',
           array(
               'label'       => esc_html__('Footer Layout', 'roofix'),
               'description' => esc_html__('You can override this settings only Mobile', 'roofix'),
               'section'     => 'footer_section',
               'choices'     => array(
                   '1' => array(
                       'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/footer-1.jpg',
                       'name'  => esc_html__('Layout 1', 'roofix')
                   ),
                  
               )
           )
        ));


        $wp_customize->add_setting('active_footer_column',
        array(
          'default'           => $this->defaults['active_footer_column'],
          'transport'         => 'refresh',
          'sanitize_callback' => 'rttheme_switch_sanitization',
        )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'active_footer_column',
        array(
          'label'   => esc_html__('Active Footer Column', 'roofix'),
          'section' => 'footer_section',
        )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('footer_separator3', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'footer_separator3', array(
            'settings' => 'footer_separator3',
            'section'  => 'footer_section',
        )));

        $wp_customize->add_setting('footer_column',
                                   array(
                                       'default'           => $this->defaults['footer_column'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('footer_column',
                       array(
                           'label'   => esc_html__('Number of Columns', 'roofix'),
                           'section' => 'footer_section',
                           'type'    => 'select',
                           'choices' => array(
                               '1' => esc_html__('1 Column', 'roofix'),
                               '2' => esc_html__('2 Columns', 'roofix'),
                               '3' => esc_html__('3 Columns', 'roofix'),
                               '4' => esc_html__('4 Columns', 'roofix'),
                               '6' => esc_html__('6 Columns', 'roofix'),
                           )
                       )
        );



        /**
        * Separator
        */
        $wp_customize->add_setting('footer_separator4', array(
          'default'           => '',
          'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'footer_separator4', array(
          'settings' => 'footer_separator4',
          'section'  => 'footer_section',
        )));

        $wp_customize->add_setting('copyright_area',
             array(
                 'default'           => $this->defaults['copyright_area'],
                 'transport'         => 'refresh',
                 'sanitize_callback' => 'rttheme_switch_sanitization',
             )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'copyright_area',
                array(
                    'label'   => esc_html__('Display Footer Copyright', 'roofix'),
                    'section' => 'footer_section',
                )
           ));

        // Test of Textarea Control
        $wp_customize->add_setting('copyright_text',
             array(
                 'default'           => $this->defaults['copyright_text'],
                 'transport'         => 'refresh',
                 'sanitize_callback' => 'wp_kses_post',
                 'active_callback'   => 'rttheme_is_display_copyright_enabled',

             )
        );

        $wp_customize->add_control( new RTtheme_TinyMCE_Custom_control( $wp_customize, 'copyright_text',
            array(
            'label' => __( 'Copyright Text' ),
            'section' => 'footer_section',
            'active_callback'   => 'rttheme_is_display_copyright_enabled',
                'input_attrs' => array(
                    'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
                    'toolbar2' => 'formatselect outdent indent | blockquote charmap',
                    'mediaButtons' => true,
                )
            )
        ) );
    }

    /**
     * Register our post controls
     */
    public function rttheme_register_post_related_controls($wp_customize)
    {


        $wp_customize->add_setting('show_related_post',
                                   array(
                                       'default'           => $this->defaults['show_related_post'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'show_related_post',
                                                                            array(
                                                                                'label'   => esc_html__('Show Related Post', 'roofix'),
                                                                                'section' => 'single_post_related_section',
                                                                            )
                                   ));
        $wp_customize->selective_refresh->add_partial('show_related_post', array(
            'selector'        => '.related-post-both',
            'render_callback' => '__return_false'
        ));

        $wp_customize->add_setting('related_post_number',
                                   array(
                                       'default'           => $this->defaults['related_post_number'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('related_post_number',
                                   array(
                                       'label'       => esc_html__('Related Post Number', 'roofix'),
                                       'description' => esc_html__('Related Post Number ', 'roofix'),
                                       'section'     => 'single_post_related_section',
                                       'type'        => 'number'
                                   )
        );


        $wp_customize->add_setting('related_post_query',
                                   array(
                                       'default'           => $this->defaults['related_post_query'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('related_post_query',
                                   array(
                                       'label'   => esc_html__('Query Type', 'roofix'),
                                       'section' => 'single_post_related_section',
                                       'type'    => 'select',
                                       'choices' => array(
                                           'cat'    => esc_html__('Posts in the same Categories', 'roofix'),
                                           'tag'    => esc_html__('Posts in the same Tags', 'roofix'),
                                           'author' => esc_html__('Posts by the same Author', 'roofix'),
                                       )
                                   )
        );


        $wp_customize->add_setting('related_post_sort',
                                   array(
                                       'default'           => $this->defaults['related_post_sort'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('related_post_sort',
                                   array(
                                       'label'   => esc_html__('Sort Order', 'roofix'),
                                       'section' => 'single_post_related_section',
                                       'type'    => 'select',
                                       'choices' => array(
                                           'recent'   => esc_html__('Recent Posts', 'roofix'),
                                           'rand'     => esc_html__('Random Posts', 'roofix'),
                                           'modified' => esc_html__('Last Modified Posts', 'roofix'),
                                           'popular'  => esc_html__('Most Commented posts', 'roofix'),
                                           'views'    => esc_html__('Most Viewed posts', 'roofix'),
                                       )
                                   )
        );

        $wp_customize->add_setting('related_title_limit',
                                   array(
                                       'default'           => $this->defaults['related_title_limit'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('related_title_limit',
                                   array(
                                       'label'       => esc_html__('Title Length', 'roofix'),
                                       'description' => esc_html__('Related Post Number ', 'roofix'),
                                       'section'     => 'single_post_related_section',
                                       'type'        => 'number'
                                   )
        );

    }


    /**
     * Register Blog controls
     */
    public function rttheme_register_single_blog_layout_controls($wp_customize)
    {


        $wp_customize->add_setting('single_post_banner',
                                   array(
                                       'default'           => $this->defaults['single_post_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'single_post_banner',
                                    array(
                                        'label'   => esc_html__('Banner', 'roofix'),
                                        'section' => 'single_post_layout_section',
                                    )
                                   ));

        $wp_customize->add_setting('single_post_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['single_post_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'single_post_breadcrumb',
                                      array(
                                          'label'   => esc_html__('Breadcrumb', 'roofix'),
                                          'section' => 'single_post_layout_section',
                                          'active_callback'   => 'rttheme_is_single_post_banner_enabled', 
                                      )
                                   ));

        $wp_customize->selective_refresh->add_partial('single_post_breadcrumb',
                                array(
                                    'selector'            => '.single-post .inner-page-banner .breadcrumbs-area',
                                    'container_inclusive' => true,
                                    'fallback_refresh'    => true,
                                )
        );


        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('single_post_bgtype',
                             array(
                                 'default'           => $this->defaults['single_post_bgtype'],
                                 'transport'         => 'refresh',

                                 'sanitize_callback' => 'rttheme_radio_sanitization'
                             )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'single_post_bgtype',
                      array(
                          'label'       => esc_html__('Banner Background Type', 'roofix'),
                          'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                          'active_callback'   => 'rttheme_is_single_post_banner_enabled', 
                          'section'     => 'single_post_layout_section',
                          'choices'     => array(
                              'bgimg'   => esc_html__('Background Image', 'roofix'),
                              'bgcolor' => esc_html__('Background Color', 'roofix')

                          )
                      )
              ));


        $wp_customize->add_setting('single_post_bgimg',
                                   array(
                                       'default'           => $this->defaults['single_post_bgimg'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'single_post_bgimg',
                  array(
                      'label'         => esc_html__('Banner Background Image', 'roofix'),
                      'section'       => 'single_post_layout_section',
                      'active_callback'   => 'rttheme_is_single_post_banner_enabled', 
                      'active_callback'   => 'rttheme_is_single_post_banner_type_enabled', 
                      'mime_type'     => 'image',
                      'button_labels' => array(
                          'select'       => esc_html__('Select File', 'roofix'),
                          'change'       => esc_html__('Change File', 'roofix'),
                          'default'      => esc_html__('Default', 'roofix'),
                          'remove'       => esc_html__('Remove', 'roofix'),
                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                          'frame_title'  => esc_html__('Select File', 'roofix'),
                          'frame_button' => esc_html__('Choose File', 'roofix'),
                      )
                  )
             ));
        $wp_customize->add_setting('single_post_bgcolor',
                                   array(
                                       'default'           => $this->defaults['single_post_bgcolor'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'single_post_bgcolor',
                                     array(
                                         'label'        => esc_html__('Banner Background Color', 'roofix'),
                                         'description'  => '',
                                         'active_callback'   => 'rttheme_is_single_post_banner_enabled', 
                                         'active_callback'   => 'rttheme_is_single_post_banner_color_type_enabled', 
                                         'section'      => 'single_post_layout_section',
                                         'show_opacity' => true,                                        
                                     )
                                   ));


        $wp_customize->add_setting('single_post_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['single_post_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('single_post_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Top', 'roofix'),
                                       'section' => 'single_post_layout_section',
                                       'active_callback'   => 'rttheme_is_single_post_banner_enabled', 
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('single_post_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['single_post_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('single_post_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Bottom', 'roofix'),
                                       'section' => 'single_post_layout_section',
                                       'active_callback'   => 'rttheme_is_single_post_banner_enabled', 
                                       'type'    => 'text'
                                   )
        );



          $wp_customize->add_setting('single_post_layout',
            array(
            'default'           => $this->defaults['single_post_layout'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'rttheme_radio_sanitization'
            )
          );
          $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'single_post_layout',
            array(
              'label'       => esc_html__('Content Layout', 'roofix'),
              'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
              'section'     => 'single_post_layout_section',
              'choices'     => array(
              'left-sidebar'  => array(
               'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
               'name'  => esc_html__('Left Sidebar', 'roofix')
            ),
              'full-width'    => array(
               'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
               'name'  => esc_html__('Full Width', 'roofix')
            ),
              'right-sidebar' => array(
               'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
               'name'  => esc_html__('Right Sidebar', 'roofix')
              )
            )
          )
       ));


        $elementor_templates = Helper::custom_sidebar_fields();
        $elementor_choices = array();
        // Add our default footer selection to our list of choices
        $elementor_choices[$this->defaults['page_sidebar']] = __('Default Sidebar', 'roofix');
        // Add our Elementor templates to our list of choices
        foreach ($elementor_templates as $key => $value) {
            $elementor_choices[$key] = $value;
        }

        // Add our Select setting and control for selecting the footer template to use
        $wp_customize->add_setting('single_post_sidebar',
                                   array(
                                       'default'           => $this->defaults['single_post_sidebar'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('single_post_sidebar',
                                   array(
                                       'label'   => esc_html__('Select Sidebar ', 'roofix'),
                                       'section' => 'single_post_layout_section',
                                       'type'    => 'select',
                                        'active_callback'   => 'rttheme_is_single_post_sidebar_enabled',                                          
                                       'choices' => $elementor_choices,
                                   )
          );

          $wp_customize->add_setting('single_post_padding_top',
                 array(
                     'default'           => $this->defaults['single_post_padding_top'],
                     'transport'         => 'refresh',
                     'sanitize_callback' => 'rttheme_text_sanitization'
                 )
          );

          $wp_customize->add_control('single_post_padding_top',
                 array(
                     'label'       => esc_html__('Content Padding Top', 'roofix'),
                     'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                     'section'     => 'single_post_layout_section',
                     'type'        => 'text'
                 )
          );

          $wp_customize->add_setting('single_post_padding_bottom',
                 array(
                     'default'           => $this->defaults['single_post_padding_bottom'],
                     'transport'         => 'refresh',
                     'sanitize_callback' => 'rttheme_text_sanitization'
                 )
          );
          $wp_customize->add_control('single_post_padding_bottom',
                 array(
                     'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                     'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                     'section'     => 'single_post_layout_section',
                     'type'        => 'text'
                 )
          );

    }


    /**
     * Register Single team controls
     */
    public function rttheme_register_single_team_layout_controls($wp_customize)
    {


        $wp_customize->add_setting('team_banner',
                                   array(
                                       'default'           => $this->defaults['team_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'team_banner',
                                      array(
                                          'label'   => esc_html__('Banner', 'roofix'),
                                          'section' => 'team_single_layout_section',
                                      )
                                   ));
        $wp_customize->selective_refresh->add_partial('team_banner',
                                array(
                                    'selector'            => '.single-roofix_team .inner-page-banner .breadcrumbs-area',
                                    'container_inclusive' => true,
                                    'fallback_refresh'    => true,
                                    'active_callback'   => 'rttheme_is_team_layout_banner_enabled',
                                )
        );

        $wp_customize->add_setting('team_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['team_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'team_breadcrumb',
                                    array(
                                        'label'   => esc_html__('Breadcrumb', 'roofix'),
                                        'section' => 'team_single_layout_section',
                                        'active_callback'   => 'rttheme_is_team_layout_banner_enabled',
                                    )
                                   ));

        $wp_customize->add_setting('team_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['team_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner spacing Top', 'roofix'),
                                       'section' => 'team_single_layout_section',
                                       'active_callback'   => 'rttheme_is_team_layout_banner_enabled',
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('team_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['team_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner spacing Bottom', 'roofix'),
                                       'section' => 'team_single_layout_section',
                                       'active_callback'   => 'rttheme_is_team_layout_banner_enabled',
                                       'type'    => 'text'
                                   )
        );
        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('team_bgtype',
                                   array(
                                       'default'           => $this->defaults['team_bgtype'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'team_bgtype',
                                  array(
                                      'label'       => esc_html__('Banner Background Type', 'roofix'),
                                      'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                      'active_callback'   => 'rttheme_is_team_layout_banner_enabled',
                                      'section'     => 'team_single_layout_section',
                                      'choices'     => array(
                                          'bgimg'   => esc_html__('Background Image', 'roofix'),
                                          'bgcolor' => esc_html__('Background Color', 'roofix')
                                      )
                                  )
                                   ));


        $wp_customize->add_setting('team_bgimg',
                                   array(
                                       'default'   => $this->defaults['team_bgimg'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'team_bgimg',
                                array(
                                    'label'         => esc_html__('Banner Background Image', 'roofix'),
                                    'section'       => 'team_single_layout_section',
                                    'active_callback'   => 'rttheme_is_team_layout_banner_enabled',
                                    'active_callback'   => 'rttheme_is_team_layout_banner_type_enabled',
                                    'mime_type'     => 'image',
                                    'button_labels' => array(
                                        'select'       => esc_html__('Select File', 'roofix'),
                                        'change'       => esc_html__('Change File', 'roofix'),
                                        'default'      => esc_html__('Default', 'roofix'),
                                        'remove'       => esc_html__('Remove', 'roofix'),
                                        'placeholder'  => esc_html__('No file selected', 'roofix'),
                                        'frame_title'  => esc_html__('Select File', 'roofix'),
                                        'frame_button' => esc_html__('Choose File', 'roofix'),
                                    )
                                )
                                   ));
        $wp_customize->add_setting('team_bgcolor',
                                   array(
                                       'default'           => $this->defaults['team_bgcolor'],
                                       'transport'         => 'postMessage',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'team_bgcolor',
                             array(
                                 'label'        => esc_html__('Banner Background Color', 'roofix'),
                                 'description'  => '',
                                 'section'      => 'team_single_layout_section',
                                 'active_callback'   => 'rttheme_is_team_layout_banner_enabled',
                                 'active_callback'   => 'rttheme_is_team_layout_banner_color_type_enabled',
                                 'show_opacity' => true,                                      
                             )
                      ));

        $wp_customize->add_setting('rttheme_team_heading_hover', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'rttheme_team_heading_hover', array(
            'settings' => 'rttheme_team_heading_hover',
            'section'  => 'team_single_layout_section',
        )));

        $wp_customize->add_setting('team_layout',
                                   array(
                                       'default'           => $this->defaults['team_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'team_layout',
                                     array(
                                         'label'       => esc_html__('Layout', 'roofix'),
                                         'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                         'section'     => 'team_single_layout_section',
                                         'choices'     => array(
                                             'left-sidebar'  => array(
                                                 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                 'name'  => esc_html__('Left Sidebar', 'roofix')
                                             ),
                                             'full-width'    => array(
                                                 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                                 'name'  => esc_html__('Full Width', 'roofix')
                                             ),
                                             'right-sidebar' => array(
                                                 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                                 'name'  => esc_html__('Right Sidebar', 'roofix')
                                             )
                                         )
                                     )
                                   ));

        $wp_customize->selective_refresh->add_partial('team_layout',
                    array(
                        'selector'            => '.single-team-partial',
                        'container_inclusive' => true,
                        'fallback_refresh'    => true,
                    )
        );


        $elementor_templates = Helper::custom_sidebar_fields();
        $elementor_choices = array();
        // Add our default footer selection to our list of choices
        $elementor_choices[$this->defaults['team_sidebar']] = __('Default Sidebar', 'roofix');
        // Add our Elementor templates to our list of choices
        foreach ($elementor_templates as $key => $value) {
            $elementor_choices[$key] = $value;
        }

        // Add our Select setting and control for selecting the footer template to use
        $wp_customize->add_setting('team_sidebar',
                                   array(
                                       'default'           => $this->defaults['team_sidebar'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('team_sidebar',
                                   array(
                                       'label'   => esc_html__('Select Sidebar ', 'roofix'),
                                       'section' => 'team_single_layout_section',
                                        'active_callback'   => 'rttheme_is_team_layout_sidebar_enabled',
                                       'type'    => 'select',
                                       'choices' => $elementor_choices,
                                   )
        );


        $wp_customize->add_setting('team_padding_top',
                                   array(
                                       'default'           => $this->defaults['team_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'team_single_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('team_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['team_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'team_single_layout_section',
                                       'type'        => 'text'
                                   )
        );


        $wp_customize->add_setting('team_arc_social_display',
                                   array(
                                       'default'           => $this->defaults['team_arc_social_display'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'team_arc_social_display',
                                                                            array(
                                                                                'label'   => esc_html__('Social Media Display', 'roofix'),
                                                                                'section' => 'team_single_layout_section',
                                                                            )
                                   ));


    }

    /**
     * Register Team Archive controls
     */
    public function rttheme_register_team_archive_layout_controls($wp_customize)
    {


        $wp_customize->add_setting('team_archive_banner',
                                   array(
                                       'default'           => $this->defaults['team_archive_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'team_archive_banner',
                                                                            array(
                                                                                'label'   => esc_html__('Banner', 'roofix'),
                                                                                'section' => 'team_archive_layout_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('team_archive_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['team_archive_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'team_archive_breadcrumb',
                                    array(
                                        'label'   => esc_html__('Breadcrumb', 'roofix'),
                                        'section' => 'team_archive_layout_section',
                                         'active_callback'   => 'rttheme_is_team_archive_banner_enabled',
                                    )
                                   ));



        $wp_customize->selective_refresh->add_partial('team_archive_breadcrumb',
                                                      array(
                                                          'selector'            => '.archive.tax-roofix_team_category .inner-page-banner .breadcrumbs-area',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('team_archive_bgtype',
                                   array(
                                       'default'           => $this->defaults['team_archive_bgtype'],
                                       'transport'         => 'refresh',

                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'team_archive_bgtype',
                                                                                array(
                                                                                    'label'       => esc_html__('Banner Background Type', 'roofix'),
                                                                                    'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                                                                    'section'     => 'team_archive_layout_section',
                                                                                     'active_callback'   => 'rttheme_is_team_archive_banner_enabled',
                                                                                    'choices'     => array(
                                                                                        'bgimg'   => esc_html__('Background Image', 'roofix'),
                                                                                        'bgcolor' => esc_html__('Background Color', 'roofix')

                                                                                    )
                                                                                )
                                   ));


        $wp_customize->add_setting('team_archive_bgimg',
                                   array(
                                       'default'   => $this->defaults['team_archive_bgimg'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'team_archive_bgimg',
                                                                  array(
                                                                      'label'         => esc_html__('Banner Background Image', 'roofix'),
                                                                      'section'       => 'team_archive_layout_section',
                                                                      'mime_type'     => 'image',
                                                                       'active_callback'   => 'rttheme_is_team_archive_banner_enabled',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));
        $wp_customize->add_setting('team_archive_bgcolor',
                                   array(
                                       'default'           => $this->defaults['team_archive_bgcolor'],
                                       'transport'         => 'postMessage',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'team_archive_bgcolor',
                                                                             array(
                                                                                 'label'        => esc_html__('Banner Background Color', 'roofix'),
                                                                                 'description'  => '',
                                                                                 'section'      => 'team_archive_layout_section',
                                                                                  'active_callback'   => 'rttheme_is_team_archive_banner_enabled',
                                                                                 'show_opacity' => true,
                                                                             )
                                   ));

        $wp_customize->add_setting('team_archive_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['team_archive_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_archive_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner top spacing', 'roofix'),
                                       'section' => 'team_archive_layout_section',
                                        'active_callback'   => 'rttheme_is_team_archive_banner_enabled',
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('team_archive_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['team_archive_inner_padding_bottom'],
                                       'transport'         => 'refresh',

                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_archive_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner Bottom spacing', 'roofix'),
                                       'section' => 'team_archive_layout_section',
                                        'active_callback'   => 'rttheme_is_team_archive_banner_enabled',
                                       'type'    => 'text'
                                   )
        );

        $wp_customize->add_setting('team_separator1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'team_separator1', array(
            'settings' => 'team_separator1',
            'section'  => 'team_archive_layout_section',
        )));

        $wp_customize->add_setting('team_arc_style',
                                   array(
                                       'default'           => $this->defaults['team_arc_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'team_arc_style',
                                                                                 array(
                                                                                     'label'       => esc_html__('Team Archive Content Layout', 'roofix'),

                                                                                     'section'     => 'team_archive_layout_section',
                                                                                     'choices'     => array(
                                                                                         '1' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 1', 'roofix')
                                                                                         ),
                                                                                         '2' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         ),
                                                                                         '3' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         )
                                                                                     )
                                                                                 )
                                   ));
        $wp_customize->selective_refresh->add_partial('team_arc_style',
                                                      array(
                                                          'selector'            => '.archive-team-add_partial',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        $wp_customize->add_setting('team_archive_number',
                                   array(
                                       'default'           => $this->defaults['team_archive_number'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('team_archive_number',
                                   array(
                                       'label'       => esc_html__('Team Custom template: Number of items per page', 'roofix'),
                                       'description' => esc_html__('Effect only for Team custom archive Page template ', 'roofix'),
                                       'section'     => 'team_archive_layout_section',
                                       'type'        => 'number'
                                   )
        );

        // Test of Dropdown Select2 Control (single select)
        $wp_customize->add_setting('team_archive_orderby',
                                   array(
                                       'default'           => $this->defaults['team_archive_orderby'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Dropdown_Select2_Custom_Control($wp_customize, 'team_archive_orderby',
                               array(
                                   'label'       => esc_html__('Team Custom template: Order By', 'roofix'),
                                   'description' => esc_html__('Effect only for Team custom page template)', 'roofix'),
                                   'section'     => 'team_archive_layout_section',
                                   'input_attrs' => array(
                                       'placeholder' => esc_html__('Please select a state...', 'roofix'),
                                       'multiselect' => false,
                                   ),
                                   'choices'     => array(
                                       'options' => array(
                                           'date'       => esc_html__('Date (Recents comes first)', 'roofix'),
                                           'title'      => esc_html__('Title', 'roofix'),
                                           'menu_order' => esc_html__('Custom Order (Available via Order field inside Page Attributes box)', 'roofix'),

                                       )
                                   )
                               )
                                   ));

        $wp_customize->add_setting('team_separator2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'team_separator2', array(
            'settings' => 'team_separator2',
            'section'  => 'team_archive_layout_section',
        )));

        $wp_customize->add_setting('team_archive_layout',
                                   array(
                                       'default'           => $this->defaults['team_archive_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'team_archive_layout',
                             array(
                                 'label'       => esc_html__('Page Layout', 'roofix'),
                                 'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                 'section'     => 'team_archive_layout_section',
                                 'choices'     => array(
                                     'left-sidebar'  => array(
                                         'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                         'name'  => esc_html__('Left Sidebar', 'roofix')
                                     ),
                                     'full-width'    => array(
                                         'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                         'name'  => esc_html__('Full Width', 'roofix')
                                     ),
                                     'right-sidebar' => array(
                                         'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                         'name'  => esc_html__('Right Sidebar', 'roofix')
                                     )
                                 )
                             )
                                   ));

        $wp_customize->selective_refresh->add_partial('team_archive_layout', array(
            'selector'        => '.rttheme-team-grid-wrapper',
            'render_callback' => '__return_false'
        ));


        $elementor_templates = Helper::custom_sidebar_fields();
        $elementor_choices = array();
        // Add our default footer selection to our list of choices
        $elementor_choices[$this->defaults['team_archive_sidebar']] = __('Default Sidebar', 'roofix');
        // Add our Elementor templates to our list of choices
        foreach ($elementor_templates as $key => $value) {
            $elementor_choices[$key] = $value;
        }

        // Add our Select setting and control for selecting the footer template to use
        $wp_customize->add_setting('team_archive_sidebar',
                               array(
                                   'default'           => $this->defaults['team_archive_sidebar'],
                                   'transport'         => 'refresh',
                                   'sanitize_callback' => 'rttheme_radio_sanitization'
                               )
        );
        $wp_customize->add_control('team_archive_sidebar',
                               array(
                                   'label'   => esc_html__('Select Sidebar ', 'roofix'),
                                   'section' => 'team_archive_layout_section',                                       
                                    'active_callback'   => 'rttheme_is_team_archive_sidebar_enabled',
                                   'type'    => 'select',
                                   'choices' => $elementor_choices,
                               )
        );



        $wp_customize->add_setting('team_archive_padding_top',
                                   array(
                                       'default'           => $this->defaults['team_archive_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_archive_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'team_archive_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('team_archive_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['team_archive_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('team_archive_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'team_archive_layout_section',
                                       'type'        => 'text'
                                   )
        );


    }

    /**
     * Register Single services controls
     */
    public function rttheme_register_single_services_layout_controls($wp_customize)
    {


        $wp_customize->add_setting('services_banner',
                                   array(
                                       'default'           => $this->defaults['services_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'services_banner',
                                                                            array(
                                                                                'label'   => esc_html__('Banner', 'roofix'),
                                                                                'section' => 'services_single_layout_section',
                                                                            )
                                   ));

        $wp_customize->selective_refresh->add_partial('services_banner',
                                                      array(
                                                          'selector'            => '.single-roofix_services .inner-page-banner .breadcrumbs-area',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        $wp_customize->add_setting('services_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['services_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'services_breadcrumb',
                                                                            array(
                                                                                'label'   => esc_html__('Breadcrumb', 'roofix'),
                                                                                'section' => 'services_single_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('services_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['services_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Banner Top spaces', 'roofix'),
                                       'section' => 'services_single_layout_section',
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('services_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['services_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Banner Bottom spaces ', 'roofix'),
                                       'section' => 'services_single_layout_section',
                                       'type'    => 'text'
                                   )
        );

        $wp_customize->add_setting('services_bgtype',
                                   array(
                                       'default'           => $this->defaults['services_bgtype'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'services_bgtype',
                                                                                array(
                                                                                    'label'       => esc_html__('Banner Background Type', 'roofix'),
                                                                                    'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                                                                    'section'     => 'services_single_layout_section',
                                                                                    'choices'     => array(
                                                                                        'bgimg'   => esc_html__('Background Image', 'roofix'),
                                                                                        'bgcolor' => esc_html__('Background Color', 'roofix')
                                                                                    )
                                                                                )
                                   ));

        $wp_customize->add_setting('services_bgimg',
                                   array(
                                       'default'   => $this->defaults['services_bgimg'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'services_bgimg',
                                                                  array(
                                                                      'label'         => esc_html__('Banner Background Image', 'roofix'),
                                                                      'section'       => 'services_single_layout_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));


        $wp_customize->add_setting('services_bgcolor',
                                   array(
                                       'default'           => $this->defaults['services_bgcolor'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'services_bgcolor',
                                                                             array(
                                                                                 'label'        => esc_html__('Banner Background Color', 'roofix'),
                                                                                 'description'  => '',
                                                                                 'section'      => 'services_single_layout_section',
                                                                                 'show_opacity' => true,
                                                                                 
                                                                             )
                                   ));

        /**
         * Separator
         */
        $wp_customize->add_setting('services_separator_general1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'services_separator_general1', array(
            'settings' => 'services_separator_general1',
            'section'  => 'services_single_layout_section',
        )));

        $wp_customize->add_setting('services_layout',
                                   array(
                                       'default'           => $this->defaults['services_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'services_layout',
                                 array(
                                     'label'       => esc_html__('Layout', 'roofix'),
                                     'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                     'section'     => 'services_single_layout_section',
                                     'choices'     => array(
                                         'left-sidebar'  => array(
                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                             'name'  => esc_html__('Left Sidebar', 'roofix')
                                         ),
                                         'full-width'    => array(
                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                             'name'  => esc_html__('Full Width', 'roofix')
                                         ),
                                         'right-sidebar' => array(
                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                             'name'  => esc_html__('Right Sidebar', 'roofix')
                                         )
                                     )
                                 )
                                   ));


        $wp_customize->selective_refresh->add_partial('services_layout',
                                                      array(
                                                          'selector'            => '.single-service-partial',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        $elementor_templates = Helper::custom_sidebar_fields();
        $elementor_choices = array();
        // Add our default footer selection to our list of choices
        $elementor_choices[$this->defaults['services_sidebar']] = __('Default Sidebar', 'roofix');
        // Add our Elementor templates to our list of choices
        foreach ($elementor_templates as $key => $value) {
            $elementor_choices[$key] = $value;
        }

        // Add our Select setting and control for selecting the footer template to use
        $wp_customize->add_setting('services_sidebar',
                                   array(
                                       'default'           => $this->defaults['services_sidebar'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('services_sidebar',
                                   array(
                                       'label'   => esc_html__('Select Sidebar ', 'roofix'),
                                       'section' => 'services_single_layout_section',
                                       'type'    => 'select',
                                       'choices' => $elementor_choices,
                                   )
        );


        /**
         * Separator
         */
        $wp_customize->add_setting('services_separator_general2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'services_separator_general2', array(
            'settings' => 'services_separator_general2',
            'section'  => 'services_single_layout_section',
        )));


        $wp_customize->add_setting('services_padding_top',
                                   array(
                                       'default'           => $this->defaults['services_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'services_single_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('services_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['services_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'services_single_layout_section',
                                       'type'        => 'text'
                                   )
        );


        $wp_customize->add_setting('services_single_arc_style',
                                   array(
                                       'default'           => $this->defaults['services_single_arc_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'services_single_arc_style',
                                   array(
                                       'label'   => esc_html__('Services Layout', 'roofix'),
                                       'section' => 'services_single_layout_section',
                                       'choices' => array(
                                           'style1' => array(
                                               'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                               'name'  => esc_html__('Layout 1', 'roofix')
                                           ),
                                           'style2' => array(
                                               'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                               'name'  => esc_html__('Layout 2', 'roofix')
                                           ),
                                       )
                                   )
                                   ));


    }

    /**
     * Register services Archive controls
     */
    public function rttheme_register_services_archive_layout_controls($wp_customize)
    {


       $wp_customize->add_setting('services_archive_banner',
                                   array(
                                       'default'           => $this->defaults['services_archive_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'services_archive_banner',
                                      array(
                                          'label'   => esc_html__('Banner', 'roofix'),
                                          'section' => 'services_archive_layout_section',
                                      )
                                   ));


        $wp_customize->add_setting('services_archive_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['services_archive_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'services_archive_breadcrumb',
                                        array(
                                            'label'   => esc_html__('Breadcrumb', 'roofix'),
                                             'active_callback'   => 'rttheme_is_services_archive_banner_enabled',
                                            'section' => 'services_archive_layout_section',
                                        )
                                   ));


        $wp_customize->selective_refresh->add_partial('services_archive_breadcrumb',
                              array(
                                  'selector'            => '.archive.tax-roofix_services_category .inner-page-banner .breadcrumbs-area',
                                  'container_inclusive' => true,
                                  'fallback_refresh'    => true,
                              )
        );
       


        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('services_archive_bgtype',
                                   array(
                                       'default'           => $this->defaults['services_archive_bgtype'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'services_archive_bgtype',
                                    array(
                                        'label'       => esc_html__('Banner Background Type', 'roofix'),
                                        'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                         'active_callback'   => 'rttheme_is_services_archive_banner_enabled',
                                        'section'     => 'services_archive_layout_section',
                                        'choices'     => array(
                                            'bgimg'   => esc_html__('Background Image', 'roofix'),
                                            'bgcolor' => esc_html__('Background Color', 'roofix')

                                        )
                                    )
                                   ));


        $wp_customize->add_setting('services_archive_bgimg',
                                   array(
                                       'default'   => $this->defaults['services_archive_bgimg'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'services_archive_bgimg',
                                  array(
                                      'label'         => esc_html__('Banner Background Image', 'roofix'),
                                      'section'       => 'services_archive_layout_section',
                                       'active_callback'   => 'rttheme_is_services_archive_banner_enabled',
                                       'active_callback'   => 'rttheme_is_services_archive_banner_type_enabled',
                                      'mime_type'     => 'image',
                                      'button_labels' => array(
                                          'select'       => esc_html__('Select File', 'roofix'),
                                          'change'       => esc_html__('Change File', 'roofix'),
                                          'default'      => esc_html__('Default', 'roofix'),
                                          'remove'       => esc_html__('Remove', 'roofix'),
                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                      )
                                  )
                                   ));
        $wp_customize->add_setting('services_archive_bgcolor',
                           array(
                               'default'           => $this->defaults['services_archive_bgcolor'],
                               'transport'         => 'postMessage',
                               'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                           )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'services_archive_bgcolor',
                                     array(
                                         'label'        => esc_html__('Banner Background Color', 'roofix'),
                                         'description'  => '',
                                         'section'      => 'services_archive_layout_section',
                                          'active_callback'   => 'rttheme_is_services_archive_banner_enabled',
                                          'active_callback'   => 'rttheme_is_services_archive_banner_color_type_enabled',
                                         'show_opacity' => true,
                                        
                                     )
                                   ));

        $wp_customize->add_setting('services_archive_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['services_archive_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_archive_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Top', 'roofix'),
                                       'section' => 'services_archive_layout_section',
                                        'active_callback'   => 'rttheme_is_services_archive_banner_enabled',
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('services_archive_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['services_archive_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_archive_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Bottom', 'roofix'),
                                       'section' => 'services_archive_layout_section',
                                        'active_callback'   => 'rttheme_is_services_archive_banner_enabled',
                                       'type'    => 'text'
                                   )
        );


        /**
         * Separator
         */
        $wp_customize->add_setting('services_archive_separator_general1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'services_archive_separator_general1', array(
            'settings' => 'services_archive_separator_general1',
            'section'  => 'services_archive_layout_section',
        )));

        $wp_customize->add_setting('services_archive_layout',
                                   array(
                                       'default'           => $this->defaults['services_archive_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'services_archive_layout',
                                 array(
                                     'label'       => esc_html__('Layout', 'roofix'),
                                     'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                     'section'     => 'services_archive_layout_section',
                                     'choices'     => array(
                                         'left-sidebar'  => array(
                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                             'name'  => esc_html__('Left Sidebar', 'roofix')
                                         ),
                                         'full-width'    => array(
                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                             'name'  => esc_html__('Full Width', 'roofix')
                                         ),
                                         'right-sidebar' => array(
                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                             'name'  => esc_html__('Right Sidebar', 'roofix')
                                         )
                                     )
                                 )
                                   ));


        $wp_customize->selective_refresh->add_partial('services_archive_layout', array(
            'selector'        => '.rttheme-services-grid-wrapper',
            'render_callback' => '__return_false'
        ));

        $elementor_templates = Helper::custom_sidebar_fields();
        $elementor_choices = array();
        // Add our default footer selection to our list of choices
        $elementor_choices[$this->defaults['services_archive_sidebar']] = __('Default Sidebar', 'roofix');
        // Add our Elementor templates to our list of choices
        foreach ($elementor_templates as $key => $value) {
            $elementor_choices[$key] = $value;
        }

        // Add our Select setting and control for selecting the footer template to use
        $wp_customize->add_setting('services_archive_sidebar',
                                   array(
                                       'default'           => $this->defaults['services_archive_sidebar'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('services_archive_sidebar',
                                   array(
                                       'label'   => esc_html__('Select Sidebar ', 'roofix'),
                                       'section' => 'services_archive_layout_section',
                                         'active_callback'   => 'rttheme_is_services_archive_sidebar_enabled',
                                       'type'    => 'select',
                                       'choices' => $elementor_choices,
                                   )
        );

        $wp_customize->add_setting('services_archive_padding_top',
                                   array(
                                       'default'           => $this->defaults['services_archive_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_archive_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'services_archive_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('services_archive_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['services_archive_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('services_archive_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'services_archive_layout_section',
                                       'type'        => 'text'
                                   )
        );

        /**
         * Separator
         */
        $wp_customize->add_setting('services_archive_separator_general2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'services_archive_separator_general2', array(
            'settings' => 'services_archive_separator_general2',
            'section'  => 'services_archive_layout_section',
        )));


        $wp_customize->add_setting('services_arc_style',
                                   array(
                                       'default'           => $this->defaults['services_arc_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'services_arc_style',
                                                                                 array(
                                                                                     'label'       => esc_html__('Services Content Layout', 'roofix'),
                                                                                     'description' => esc_html__('Select the default template layout for services archive', 'roofix'),
                                                                                     'section'     => 'services_archive_layout_section',
                                                                                     'choices'     => array(
                                                                                         'style1' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 1', 'roofix')
                                                                                         ),
                                                                                         'style2' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         ),
                                                                                         'style3' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         )
                                                                                     )
                                                                                 )
                                   ));


        $wp_customize->selective_refresh->add_partial('services_arc_style',
                                                      array(
                                                          'selector'            => '.archive-services-add_partial',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        $wp_customize->add_setting('services_archive_number',
                                   array(
                                       'default'           => $this->defaults['services_archive_number'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('services_archive_number',
                                   array(
                                       'label'       => esc_html__('Number of items per page', 'roofix'),
                                       'description' => esc_html__('Effect only for Blog custom services template ', 'roofix'),
                                       'section'     => 'services_archive_layout_section',
                                       'type'        => 'number'
                                   )
        );

        $wp_customize->add_setting('services_archive_content_number',
                                   array(
                                       'default'           => $this->defaults['services_archive_content_number'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('services_archive_content_number',
                                   array(
                                       'label'   => esc_html__('Number of Content', 'roofix'),
                                       'section' => 'services_archive_layout_section',
                                       'type'    => 'number'
                                   )
        );


        $wp_customize->add_setting('services_archive_orderby',
                                   array(
                                       'default'           => $this->defaults['services_archive_orderby'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Dropdown_Select2_Custom_Control($wp_customize, 'services_archive_orderby',
                                                                               array(
                                                                                   'label'       => esc_html__('Services Custom template: Order By', 'roofix'),
                                                                                   'description' => esc_html__('Effect only for services custom page template)', 'roofix'),
                                                                                   'section'     => 'services_archive_layout_section',
                                                                                   'input_attrs' => array(
                                                                                       'placeholder' => esc_html__('Please select a state...', 'roofix'),
                                                                                       'multiselect' => false,
                                                                                   ),
                                                                                   'choices'     => array(
                                                                                       'options' => array(
                                                                                           'date'       => esc_html__('Date (Recents comes first)', 'roofix'),
                                                                                           'title'      => esc_html__('Title', 'roofix'),
                                                                                           'menu_order' => esc_html__('Custom Order (Available via Order field inside Page Attributes box)', 'roofix'),

                                                                                       )
                                                                                   )
                                                                               )
                                   ));

    }

    /**
     * Register Single project controls
     */
    public function rttheme_register_single_project_layout_controls($wp_customize)
    {

        $wp_customize->add_setting('project_banner',
                                   array(
                                       'default'           => $this->defaults['project_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'project_banner',
                                                                            array(
                                                                                'label'   => esc_html__('Banner', 'roofix'),
                                                                                'section' => 'project_single_layout_section',
                                                                            )
                                   ));
        $wp_customize->selective_refresh->add_partial('project_banner',
                                                      array(
                                                          'selector'            => '.single-roofix_projects .inner-page-banner .breadcrumbs-area',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );
        $wp_customize->add_setting('project_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['project_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'project_breadcrumb',
                                                                            array(
                                                                                'label'   => esc_html__('Breadcrumb', 'roofix'),
                                                                                'section' => 'project_single_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('project_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['project_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner Top Spacing ', 'roofix'),
                                       'section' => 'project_single_layout_section',
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('project_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['project_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner buttom Spacing', 'roofix'),
                                       'section' => 'project_single_layout_section',
                                       'type'    => 'text'
                                   )
        );


        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('project_bgtype',
                                   array(
                                       'default'           => $this->defaults['project_bgtype'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'project_bgtype',
                                                                                array(
                                                                                    'label'       => esc_html__('Banner Background Type', 'roofix'),
                                                                                    'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                                                                    'section'     => 'project_single_layout_section',
                                                                                    'choices'     => array(
                                                                                        'bgimg'   => esc_html__('Background Image', 'roofix'),
                                                                                        'bgcolor' => esc_html__('Background Color', 'roofix')
                                                                                    )
                                                                                )
                                   ));
        $wp_customize->add_setting('project_bgimg',
                                   array(
                                       'default'   => $this->defaults['project_bgimg'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'project_bgimg',
                                                                  array(
                                                                      'label'         => esc_html__('Banner Background Image', 'roofix'),
                                                                      'section'       => 'project_single_layout_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));
        $wp_customize->add_setting('project_bgcolor',
                                   array(
                                       'default'           => $this->defaults['project_bgcolor'],
                                       'transport'         => 'postMessage',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'project_bgcolor',
                                                                             array(
                                                                                 'label'        => esc_html__('Banner Background Color', 'roofix'),
                                                                                 'description'  => '',
                                                                                 'section'      => 'project_single_layout_section',
                                                                                 'show_opacity' => true,
                                                                             )
                                   ));


        /**
         * Separator
         */
        $wp_customize->add_setting('project_general1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'project_general1', array(
            'settings' => 'project_general1',
            'section'  => 'project_single_layout_section',
        )));

        $wp_customize->add_setting('project_layout',
                                   array(
                                       'default'           => $this->defaults['project_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'project_layout',
                                                                                 array(
                                                                                     'label'       => esc_html__('Layout', 'roofix'),
                                                                                     'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                                                                     'section'     => 'project_single_layout_section',
                                                                                     'choices'     => array(
                                                                                         'left-sidebar'  => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sp1.png',
                                                                                             'name'  => esc_html__('Left Sidebar', 'roofix')
                                                                                         ),
                                                                                         'full-width'    => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                                                                             'name'  => esc_html__('Full Width', 'roofix')
                                                                                         ),
                                                                                         'right-sidebar' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                                                                             'name'  => esc_html__('Right Sidebar', 'roofix')
                                                                                         )
                                                                                     )
                                                                                 )
                                   ));

        $wp_customize->selective_refresh->add_partial('project_layout',
                                                      array(
                                                          'selector'            => '.single-project-partial',
                                                          'container_inclusive' => false,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        $wp_customize->add_setting('project_padding_top',
                                   array(
                                       'default'           => $this->defaults['project_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'project_single_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('project_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['project_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'project_single_layout_section',
                                       'type'        => 'text'
                                   )
        );


        $wp_customize->add_setting('project_single_arc_style',
                                   array(
                                       'default'           => $this->defaults['project_single_arc_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'project_single_arc_style',
                                                                                 array(
                                                                                     'label'       => esc_html__('project Layout Style   ', 'roofix'),
                                                                                     'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                                                                     'section'     => 'project_single_layout_section',
                                                                                     'choices'     => array(
                                                                                         'style1' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sp1.png',
                                                                                             'name'  => esc_html__('Layout 1', 'roofix')
                                                                                         ),
                                                                                         'style2' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         ), 
                                                                                         'style3' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 3', 'roofix')
                                                                                         ),
                                                                                     )
                                                                                 )
                                   ));


        /**
         * Separator
         */


        $wp_customize->add_setting('related_project_separator2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'related_project_separator2', array(
            'settings' => 'related_project_separator2',
            'section'  => 'project_single_layout_section',
        )));


        $wp_customize->add_setting('project_single_btn',
                                   array(
                                       'default'           => $this->defaults['project_single_btn'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'project_single_btn',
                                                                            array(
                                                                                'label'   => esc_html__('Projects Button', 'roofix'),
                                                                                'section' => 'project_single_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('project_single_btn_txt',
                                   array(
                                       'default'           => $this->defaults['project_single_btn_txt'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_single_btn_txt',
                                   array(
                                       'label'   => esc_html__('Button Text', 'roofix'),
                                       'section' => 'project_single_layout_section',
                                       'type'    => 'text'
                                   )
        );


        $wp_customize->add_setting('project_single_btn_url',
                                   array(
                                       'default'           => $this->defaults['project_single_btn_url'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_single_btn_url',
                                   array(
                                       'label'   => esc_html__('Button Url', 'roofix'),
                                       'section' => 'project_single_layout_section',
                                       'type'    => 'text'
                                   )
        );


        /**
         * Separator
         */


        $wp_customize->add_setting('related_project_separator1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'related_project_separator1', array(
            'settings' => 'related_project_separator1',
            'section'  => 'project_single_layout_section',
        )));


        $wp_customize->add_setting('related_project',
                                   array(
                                       'default'           => $this->defaults['related_project'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'related_project',
                                                                            array(
                                                                                'label'   => esc_html__('Related Projects', 'roofix'),
                                                                                'section' => 'project_single_layout_section',
                                                                            )
                                   ));


        $wp_customize->selective_refresh->add_partial('related_project',
                                                      array(
                                                          'selector'            => '.single-project-related',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )

        );


        $wp_customize->add_setting('related_project_title',
                                   array(
                                       'default'           => $this->defaults['related_project_title'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('related_project_title',
                                   array(
                                       'label'   => esc_html__('Related Project Title', 'roofix'),
                                       'section' => 'project_single_layout_section',
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('related_project_count',
                                   array(
                                       'default'           => $this->defaults['related_project_count'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('related_project_count',
                                   array(
                                       'label' => esc_html__('Related Project Limit', 'roofix'),

                                       'section' => 'project_single_layout_section',
                                       'type'    => 'number'
                                   )
        );


    }

    /**
     * Register project Archive controls
     */
    public function rttheme_register_project_archive_layout_controls($wp_customize)
    {


        $wp_customize->add_setting('project_archive_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['project_archive_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'project_archive_breadcrumb',
                                                                            array(
                                                                                'label'   => esc_html__('Breadcrumb', 'roofix'),
                                                                                'section' => 'project_archive_layout_section',
                                                                            )
                                   ));


        $wp_customize->selective_refresh->add_partial('project_archive_breadcrumb',
                                                      array(
                                                          'selector'            => '.archive.tax-roofix_projects_category .inner-page-banner .breadcrumbs-area',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );



        $wp_customize->add_setting('project_archive_banner',
                                   array(
                                       'default'           => $this->defaults['project_archive_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'project_archive_banner',
                                                                            array(
                                                                                'label'   => esc_html__('Banner', 'roofix'),
                                                                                'section' => 'project_archive_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'project_archive_banner',
                                                                            array(
                                                                                'label'   => esc_html__('Banner', 'roofix'),
                                                                                'section' => 'project_archive_layout_section',
                                                                            )
                                   ));


        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('project_archive_bgtype',
                                   array(
                                       'default'           => $this->defaults['project_archive_bgtype'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'project_archive_bgtype',
                                                                                array(
                                                                                    'label'       => esc_html__('Banner Background Type', 'roofix'),
                                                                                    'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                                                                    'section'     => 'project_archive_layout_section',
                                                                                    'choices'     => array(
                                                                                        'bgimg'   => esc_html__('Background Image', 'roofix'),
                                                                                        'bgcolor' => esc_html__('Background Color', 'roofix')

                                                                                    )
                                                                                )
                                   ));


        $wp_customize->add_setting('project_archive_bgimg',
                                   array(
                                       'default'   => $this->defaults['project_archive_bgimg'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'project_archive_bgimg',
                                                                  array(
                                                                      'label'         => esc_html__('Banner Background Image', 'roofix'),
                                                                      'section'       => 'project_archive_layout_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));
        $wp_customize->add_setting('project_archive_bgcolor',
                                   array(
                                       'default'           => $this->defaults['project_archive_bgcolor'],
                                       'transport'         => 'postMessage',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'project_archive_bgcolor',
                                                                             array(
                                                                                 'label'        => esc_html__('Banner Background Color', 'roofix'),
                                                                                 'description'  => '',
                                                                                 'section'      => 'project_archive_layout_section',
                                                                                 'show_opacity' => true,

                                                                             )
                                   ));

        $wp_customize->add_setting('project_archive_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['project_archive_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_archive_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Top', 'roofix'),
                                       'section' => 'project_archive_layout_section',
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('project_archive_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['project_archive_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_archive_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Bottom', 'roofix'),
                                       'section' => 'project_archive_layout_section',
                                       'type'    => 'text'
                                   )
        );


        /**
         * Separator
         */


        $wp_customize->add_setting('project_separator1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'project_separator1', array(
            'settings' => 'project_separator1',
            'section'  => 'project_archive_layout_section',
        )));


        $wp_customize->add_setting('project_archive_layout',
                                   array(
                                       'default'           => $this->defaults['project_archive_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'project_archive_layout',
                                 array(
                                     'label'       => esc_html__('Layout', 'roofix'),
                                     'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                     'section'     => 'project_archive_layout_section',
                                     'choices'     => array(
                                         'left-sidebar'  => array(
                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                             'name'  => esc_html__('Left Sidebar', 'roofix')
                                         ),
                                         'full-width'    => array(
                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                             'name'  => esc_html__('Full Width', 'roofix')
                                         ),
                                         'right-sidebar' => array(
                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                             'name'  => esc_html__('Right Sidebar', 'roofix')
                                         )
                                     )
                                 )
                                   ));


        $wp_customize->selective_refresh->add_partial('project_archive_layout',
                                                      array(
                                                          'selector'            => '.archive-project-add_partial',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        $elementor_templates = Helper::custom_sidebar_fields();
        $elementor_choices = array();
        // Add our default footer selection to our list of choices
        $elementor_choices[$this->defaults['project_archive_sidebar']] = __('Default Sidebar', 'roofix');
        // Add our Elementor templates to our list of choices
        foreach ($elementor_templates as $key => $value) {
            $elementor_choices[$key] = $value;
        }

        // Add our Select setting and control for selecting the footer template to use
        $wp_customize->add_setting('project_archive_sidebar',
                                   array(
                                       'default'           => $this->defaults['project_archive_sidebar'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('project_archive_sidebar',
                                   array(
                                       'label'   => esc_html__('Select Sidebar ', 'roofix'),
                                       'section' => 'project_archive_layout_section',
                                       'type'    => 'select',
                                       'choices' => $elementor_choices,
                                   )
        );
        $wp_customize->add_setting('project_archive_padding_top',
                                   array(
                                       'default'           => $this->defaults['project_archive_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_archive_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'project_archive_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('project_archive_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['project_archive_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('project_archive_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'project_archive_layout_section',
                                       'type'        => 'text'
                                   )
        );


        /**
         * Separator
         */

        $wp_customize->add_setting('project_separator2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'project_separator2', array(
            'settings' => 'project_separator2',
            'section'  => 'project_archive_layout_section',
        )));


        $wp_customize->add_setting('project_arc_style',
                                   array(
                                       'default'           => $this->defaults['project_arc_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'project_arc_style',
                                                                                 array(
                                                                                     'label'       => esc_html__('Project Content Layout', 'roofix'),
                                                                                     'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                                                                     'section'     => 'project_archive_layout_section',
                                                                                     'choices'     => array(
                                                                                         'style1' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 1', 'roofix')
                                                                                         ),
                                                                                         'style2' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         ),
                                                                                         'style3' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         )
                                                                                     )
                                                                                 )
                                   ));

        $wp_customize->add_setting('project_archive_number',
                                   array(
                                       'default'           => $this->defaults['project_archive_number'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('project_archive_number',
                                   array(
                                       'label'       => esc_html__('Project Custom template: Number of items per page', 'roofix'),
                                       'description' => esc_html__('Effect only for Project custom page template ', 'roofix'),
                                       'section'     => 'project_archive_layout_section',
                                       'type'        => 'number'
                                   )
        );

        $wp_customize->add_setting('project_content_number',
                                   array(
                                       'default'           => $this->defaults['project_content_number'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('project_content_number',
                                   array(
                                       'label'   => esc_html__('Number of Content (layout 2)', 'roofix'),
                                       'section' => 'project_archive_layout_section',
                                       'type'    => 'number'
                                   )
        );

        // Test of Dropdown Select2 Control (single select)
        $wp_customize->add_setting('project_archive_orderby',
                                   array(
                                       'default'           => $this->defaults['project_archive_orderby'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Dropdown_Select2_Custom_Control($wp_customize, 'project_archive_orderby',
                                                                               array(
                                                                                   'label'       => esc_html__('Blog Custom template: Order By', 'roofix'),
                                                                                   'description' => esc_html__('Effect only for Blog custom page template)', 'roofix'),
                                                                                   'section'     => 'project_archive_layout_section',
                                                                                   'input_attrs' => array(
                                                                                       'placeholder' => esc_html__('Please select a state...', 'roofix'),
                                                                                       'multiselect' => false,
                                                                                   ),
                                                                                   'choices'     => array(
                                                                                       'options' => array(
                                                                                           'date'       => esc_html__('Date (Recents comes first)', 'roofix'),
                                                                                           'title'      => esc_html__('Title', 'roofix'),
                                                                                           'menu_order' => esc_html__('Custom Order (Available via Order field inside Page Attributes box)', 'roofix'),

                                                                                       )
                                                                                   )
                                                                               )
                                   ));

    }

    /**
     * Register our Footer controls
     */
    public function rttheme_register_author_layout_controls($wp_customize)
    {


        $wp_customize->add_setting('author_layout',
                                   array(
                                       'default'           => $this->defaults['author_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'author_layout',
                                                                                 array(
                                                                                     'label'       => esc_html__('Layout', 'roofix'),
                                                                                     'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                                                                     'section'     => 'author_post_layout_section',
                                                                                     'choices'     => array(
                                                                                         'left-sidebar'  => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Left Sidebar', 'roofix')
                                                                                         ),
                                                                                         'full-width'    => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                                                                             'name'  => esc_html__('Full Width', 'roofix')
                                                                                         ),
                                                                                         'right-sidebar' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                                                                             'name'  => esc_html__('Right Sidebar', 'roofix')
                                                                                         )
                                                                                     )
                                                                                 )
                                   ));

        $wp_customize->selective_refresh->add_partial('author_layout', array(
            'selector'        => '.author-details-block',
            'render_callback' => '__return_false'
        ));


        $wp_customize->add_setting('author_padding_top',
                                   array(
                                       'default'           => $this->defaults['author_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('author_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'author_post_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('author_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['author_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('author_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'author_post_layout_section',
                                       'type'        => 'text'
                                   )
        );


        $wp_customize->add_setting('author_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['author_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_breadcrumb',
                                                                            array(
                                                                                'label'   => esc_html__('Breadcrumb', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('author_banner',
                                   array(
                                       'default'           => $this->defaults['author_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_banner',
                                                                            array(
                                                                                'label'   => esc_html__('Banner', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));


        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('author_bgtype',
                                   array(
                                       'default'           => $this->defaults['author_bgtype'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'author_bgtype',
                                                                                array(
                                                                                    'label'       => esc_html__('Banner Background Type', 'roofix'),
                                                                                    'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                                                                    'section'     => 'author_post_layout_section',
                                                                                    'choices'     => array(
                                                                                        'bgimg'   => esc_html__('Background Image', 'roofix'),
                                                                                        'bgcolor' => esc_html__('Background Color', 'roofix')

                                                                                    )
                                                                                )
                                   ));


        $wp_customize->add_setting('author_bgimg',
                                   array(
                                       'default'           => $this->defaults['author_bgimg'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'author_bgimg',
                                                                  array(
                                                                      'label'         => esc_html__('Banner Background Image', 'roofix'),
                                                                      'section'       => 'author_post_layout_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));
        $wp_customize->add_setting('author_bgcolor',
                                   array(
                                       'default'           => $this->defaults['author_bgcolor'],
                                       'transport'         => 'postMessage',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'author_bgcolor',
                                                                             array(
                                                                                 'label'        => esc_html__('Banner Background Color', 'roofix'),
                                                                                 'description'  => '',
                                                                                 'section'      => 'author_post_layout_section',
                                                                                 'show_opacity' => true,
                                                                                 'palette'      => array(
                                                                                     '#000',
                                                                                     '#fff',
                                                                                     '#df312c',
                                                                                     '#df9a23',
                                                                                     '#eef000',
                                                                                     '#7ed934',
                                                                                     '#1571c1',
                                                                                     '#8309e7'
                                                                                 )
                                                                             )
                                   ));

        $wp_customize->add_setting('author_show_post_thumb',
                                   array(
                                       'default'           => $this->defaults['author_show_post_thumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_show_post_thumb',
                                                                            array(
                                                                                'label'   => esc_html__('Blog show post thumb', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('author_show_preview_image',
                                   array(
                                       'default'           => $this->defaults['author_show_preview_image'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_show_preview_image',
                                                                            array(
                                                                                'label'   => esc_html__('Show Preview Post Thumb', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('author_content_style',
                                   array(
                                       'default'           => $this->defaults['author_content_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'author_content_style',
                                                                                 array(
                                                                                     'label'       => esc_html__('Blog Content Layout', 'roofix'),
                                                                                     'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                                                                     'section'     => 'author_post_layout_section',
                                                                                     'choices'     => array(
                                                                                         'style1' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 1', 'roofix')
                                                                                         ),
                                                                                         'style2' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         ),
                                                                                         'style3' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         )
                                                                                     )
                                                                                 )
                                   ));

        $wp_customize->add_setting('author_cats',
                                   array(
                                       'default'           => $this->defaults['author_cats'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_cats',
                                                                            array(
                                                                                'label'   => esc_html__('Show Categories', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('author_content_display',
                                   array(
                                       'default'           => $this->defaults['author_content_display'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_content_display',
                                                                            array(
                                                                                'label'   => esc_html__('Show content Display', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('author_content_number',
                                   array(
                                       'default'           => $this->defaults['author_content_number'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('author_content_number',
                                   array(
                                       'label'   => esc_html__('Number of Content', 'roofix'),
                                       'section' => 'author_post_layout_section',
                                       'type'    => 'number'
                                   )
        );

        $wp_customize->add_setting('author_author_name',
                                   array(
                                       'default'           => $this->defaults['author_author_name'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_author_name',
                                                                            array(
                                                                                'label'   => esc_html__('Show Author Name', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('author_date',
                                   array(
                                       'default'           => $this->defaults['author_date'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_date',
                                                                            array(
                                                                                'label'   => esc_html__('Show Date', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('author_view',
                                   array(
                                       'default'           => $this->defaults['author_view'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_view',
                                                                            array(
                                                                                'label'   => esc_html__('Show/hide Post View', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('author_comment_num',
                                   array(
                                       'default'           => $this->defaults['author_comment_num'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'author_comment_num',
                                                                            array(
                                                                                'label'   => esc_html__('Show Comment Number', 'roofix'),
                                                                                'section' => 'author_post_layout_section',
                                                                            )
                                   ));


    }

    /**
     * Register blog_layout  controls
     */

    public function rttheme_register_blog_layout_controls($wp_customize)
    {

        $wp_customize->add_setting('blog_banner',
                                   array(
                                       'default'           => $this->defaults['blog_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'blog_banner',
                                                                            array(
                                                                                'label'   => esc_html__('Banner', 'roofix'),
                                                                                'section' => 'blog_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('blog_breadcrumb',
          array(
            'default'           => $this->defaults['blog_breadcrumb'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'rttheme_switch_sanitization',
          )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'blog_breadcrumb',
                              array(
                                  'label'   => esc_html__('Breadcrumb', 'roofix'),
                                  'section' => 'blog_layout_section',
                                  'active_callback'   => 'rttheme_is_blog_banner_enabled',
                              )
        ));

        $wp_customize->selective_refresh->add_partial('blog_breadcrumb',
                                                      array(
                                                          'selector'            => '.blog .inner-page-banner .breadcrumbs-area',
                                                          'container_inclusive' => true,
                                                          'fallback_refresh'    => true,
                                                      )
        );


        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('blog_bgtype',
                             array(
                                 'default'           => $this->defaults['blog_bgtype'],
                                 'transport'         => 'refresh',
                                 'sanitize_callback' => 'rttheme_radio_sanitization'
                             )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'blog_bgtype',
                              array(
                                  'label'       => esc_html__('Banner Background Type', 'roofix'),
                                  'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                  'section'     => 'blog_layout_section',
                                  'active_callback'   => 'rttheme_is_blog_banner_enabled',
                                  'choices'     => array(
                                      'bgimg'   => esc_html__('Background Image', 'roofix'),
                                      'bgcolor' => esc_html__('Background Color', 'roofix')

                                  )
                              )
            ));


        $wp_customize->add_setting('blog_bgimg',
                                   array(
                                       'default'           => $this->defaults['blog_bgimg'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'blog_bgimg',
                        array(
                            'label'         => esc_html__('Banner Background Image', 'roofix'),
                            'section'       => 'blog_layout_section',
                            'active_callback'   => 'rttheme_is_blog_banner_enabled',
                            'mime_type'     => 'image',
                            'button_labels' => array(
                                'select'       => esc_html__('Select File', 'roofix'),
                                'change'       => esc_html__('Change File', 'roofix'),
                                'default'      => esc_html__('Default', 'roofix'),
                                'remove'       => esc_html__('Remove', 'roofix'),
                                'placeholder'  => esc_html__('No file selected', 'roofix'),
                                'frame_title'  => esc_html__('Select File', 'roofix'),
                                'frame_button' => esc_html__('Choose File', 'roofix'),
                            )
                        )
                  ));
        $wp_customize->add_setting('blog_bgcolor',
                                   array(
                                       'default'           => $this->defaults['blog_bgcolor'],
                                       'transport'         => 'postMessage',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'blog_bgcolor',
                                                                             array(
                     'label'        => esc_html__('Banner Background Color', 'roofix'),
                     'description'  => '',
                     'section'      => 'blog_layout_section',
                     'active_callback'   => 'rttheme_is_blog_banner_enabled',
                     'show_opacity' => true,
                     
                 )
            ));


        $wp_customize->add_setting('blog_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['blog_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('blog_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner Top spaces', 'roofix'),
                                       'section' => 'blog_layout_section',
                                       'type'    => 'text',
                                        'active_callback'   => 'rttheme_is_blog_banner_enabled',
                                   )
        );
        $wp_customize->add_setting('blog_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['blog_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('blog_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner Bottom Spaces', 'roofix'),
                                       'section' => 'blog_layout_section',
                                       'type'    => 'text',
                                        'active_callback'   => 'rttheme_is_blog_banner_enabled',
                                   )
        );

        /**
         * Separator
         */
        $wp_customize->add_setting('blog_banner_separator1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'blog_banner_separator1', array(
            'settings' => 'blog_banner_separator1',
            'section'  => 'blog_layout_section',
        )));


        $wp_customize->add_setting('blog_layout',
                                   array(
                                       'default'           => $this->defaults['blog_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'blog_layout',
                           array(
                               'label'       => esc_html__('Blog Layout', 'roofix'),
                               'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                               'section'     => 'blog_layout_section',
                               'choices'     => array(
                                   'left-sidebar'  => array(
                                       'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                       'name'  => esc_html__('Left Sidebar', 'roofix')
                                   ),
                                   'full-width'    => array(
                                       'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                       'name'  => esc_html__('Full Width', 'roofix')
                                   ),
                                   'right-sidebar' => array(
                                       'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                       'name'  => esc_html__('Right Sidebar', 'roofix')
                                   )
                               )
                           )
                   ));


        $wp_customize->selective_refresh->add_partial('blog_layout',
                    array(
                        'selector'            => '.customize-content-selector',
                        'container_inclusive' => true,
                        'fallback_refresh'    => true,
                    )
        );

        $elementor_templates = Helper::custom_sidebar_fields();
        $elementor_choices = array();
        // Add our default footer selection to our list of choices
        $elementor_choices[$this->defaults['blog_sidebar']] = __('Default Sidebar', 'roofix');
        // Add our Elementor templates to our list of choices
        foreach ($elementor_templates as $key => $value) {
            $elementor_choices[$key] = $value;
        }

        // Add our Select setting and control for selecting the footer template to use
        $wp_customize->add_setting('blog_sidebar',
                                   array(
                                       'default'           => $this->defaults['blog_sidebar'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('blog_sidebar',
                                   array(
                                       'label'   => esc_html__('Select Sidebar ', 'roofix'),
                                       'section' => 'blog_layout_section',
                                       'type'    => 'select',
                                       'choices' => $elementor_choices,
                                        'active_callback'   => 'rttheme_is_blog_sidebar_enabled',
                                   )
        );


       

        $wp_customize->add_setting('blog_padding_top',
                                   array(
                                       'default'           => $this->defaults['blog_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('blog_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'blog_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('blog_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['blog_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('blog_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'blog_layout_section',
                                       'type'        => 'text'
                                   )
        );

       /**
         * Separator
         */
        $wp_customize->add_setting('blog_banner_separator2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'blog_banner_separator2', array(
            'settings' => 'blog_banner_separator2',
            'section'  => 'blog_layout_section',
        )));


        $wp_customize->add_setting('blog_style',
                                   array(
                                       'default'           => $this->defaults['blog_style'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'blog_style',
                                                                                 array(
                                                                                     'label'       => esc_html__('Blog Content Layout', 'roofix'),
                                                                                     'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                                                                                     'section'     => 'blog_layout_section',
                                                                                     'choices'     => array(
                                                                                         '1' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 1', 'roofix')
                                                                                         ),
                                                                                         '2' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         ),
                                                                                         '3' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         ),
                                                                                         '4' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         ),
                                                                                         '5' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         ),
                                                                                         '6' => array(
                                                                                             'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                                                                             'name'  => esc_html__('Layout 2', 'roofix')
                                                                                         )
                                                                                     )
                                                                                 )
                                   ));

        $wp_customize->add_setting('blog_date',
                                   array(
                                       'default'           => $this->defaults['blog_date'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'blog_date',
                                                                            array(
                                                                                'label'   => esc_html__('Show Date', 'roofix'),
                                                                                'section' => 'blog_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('blog_author_name',
                                   array(
                                       'default'           => $this->defaults['blog_author_name'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'blog_author_name',
                                                                            array(
                                                                                'label'   => esc_html__('Show Author Name', 'roofix'),
                                                                                'section' => 'blog_layout_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('blog_cats',
                                   array(
                                       'default'           => $this->defaults['blog_cats'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'blog_cats',
                                                                            array(
                                                                                'label'   => esc_html__('Show Categories', 'roofix'),
                                                                                'section' => 'blog_layout_section',
                                                                            )
                                   ));

        $wp_customize->add_setting('blog_comment_num',
                                   array(
                                       'default'           => $this->defaults['blog_comment_num'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'blog_comment_num',
                                                                            array(
                                                                                'label'   => esc_html__('Show Comment Display', 'roofix'),
                                                                                'section' => 'blog_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('blog_cotent_show',
                                   array(
                                       'default'           => $this->defaults['blog_cotent_show'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'blog_cotent_show',
                                                                            array(
                                                                                'label'   => esc_html__('Show Content Display', 'roofix'),
                                                                                'section' => 'blog_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('blog_title_number',
                                   array(
                                       'default'           => $this->defaults['blog_title_number'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('blog_title_number',
                                   array(
                                       'label'   => esc_html__('Number of Title', 'roofix'),
                                       'section' => 'blog_layout_section',
                                       'type'    => 'number'
                                   )
        );

        $wp_customize->add_setting('blog_content_number',
                                   array(
                                       'default'           => $this->defaults['blog_content_number'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_sanitize_integer'
                                   )
        );
        $wp_customize->add_control('blog_content_number',
                                   array(
                                       'label'   => esc_html__('Number of Content', 'roofix'),
                                       'section' => 'blog_layout_section',
                                       'type'    => 'number'
                                   )
        );


        $wp_customize->add_setting('read_more_show',
                                   array(
                                       'default'           => $this->defaults['read_more_show'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'read_more_show',
                                                                            array(
                                                                                'label'   => esc_html__('Show Read More', 'roofix'),
                                                                                'section' => 'blog_layout_section',
                                                                            )
                                   ));
    }

    /**
     * Register our Footer controls
     */
    public function rttheme_register_page_layout_controls($wp_customize)
    {



        $wp_customize->add_setting('page_banner',
                                   array(
                                       'default'           => $this->defaults['page_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'page_banner',
                                      array(
                                          'label'   => esc_html__('Banner', 'roofix'),
                                          'section' => 'page_layout_section',
                                      )
                                   ));

        $wp_customize->selective_refresh->add_partial('page_banner',
                                array(
                                    'selector'            => '.page .inner-page-banner .breadcrumbs-area',
                                    'container_inclusive' => true,
                                    'fallback_refresh'    => true,
                                )
        );


        $wp_customize->add_setting('page_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['page_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                          
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'page_breadcrumb',
                          array(
                              'label'   => esc_html__('Breadcrumb', 'roofix'),
                              'section' => 'page_layout_section',
                               'active_callback'   => 'rttheme_is_page_banner_enabled',   
                          )
                                   ));

        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('page_bgtype',
                                   array(
                                       'default'           => $this->defaults['page_bgtype'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization',
                                        
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'page_bgtype',
                        array(
                            'label'       => esc_html__('Banner Background Type', 'roofix'),
                            'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                            'section'     => 'page_layout_section',
                             'active_callback'   => 'rttheme_is_page_banner_enabled',   
                            'choices'     => array(
                                'bgimg'   => esc_html__('Background Image', 'roofix'),
                                'bgcolor' => esc_html__('Background Color', 'roofix')

                            )
                        )
             ));
        $wp_customize->add_setting('page_bgimg',
                                   array(
                                       'default'   => $this->defaults['page_bgimg'],
                                       'transport' => 'refresh',                                         
                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'page_bgimg',
                    array(
                        'label'         => esc_html__('Banner Background Image', 'roofix'),
                        'section'       => 'page_layout_section',                        
                        'active_callback'   => 'rttheme_is_page_banner_enabled',   
                        'active_callback' => 'rttheme_is_page_banner_type_enabled',
                        'mime_type'     => 'image',
                        'button_labels' => array(
                            'select'       => esc_html__('Select File', 'roofix'),
                            'change'       => esc_html__('Change File', 'roofix'),
                            'default'      => esc_html__('Default', 'roofix'),
                            'remove'       => esc_html__('Remove', 'roofix'),
                            'placeholder'  => esc_html__('No file selected', 'roofix'),
                            'frame_title'  => esc_html__('Select File', 'roofix'),
                            'frame_button' => esc_html__('Choose File', 'roofix'),
                        )
                    )
               ));



        $wp_customize->add_setting('page_bgcolor',
                                   array(
                                       'default'           => $this->defaults['page_bgcolor'],
                                       'transport'         => 'refresh',
                                       
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'page_bgcolor',
                                   array(
                                       'label'        => esc_html__('Banner Background Color', 'roofix'),
                                       'description'  => '',
                                       'section'      => 'page_layout_section',
                                        'active_callback'   => 'rttheme_is_page_banner_enabled',
                                        'active_callback' => 'rttheme_is_page_banner_color_type_enabled',  
                                        'show_opacity' => true,

                                   )
                                   ));


        $wp_customize->add_setting('page_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['page_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization',
                                       
                                   )
        );
        $wp_customize->add_control('page_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Top', 'roofix'),
                                       'section' => 'page_layout_section',
                                       'type'    => 'text',
                                        'active_callback'   => 'rttheme_is_page_banner_enabled',  
                                   )
        );
        $wp_customize->add_setting('page_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['page_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization',
                                       
                                   )
        );
        $wp_customize->add_control('page_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Bottom', 'roofix'),
                                       'section' => 'page_layout_section',
                                       'type'    => 'text',
                                        'active_callback'   => 'rttheme_is_page_banner_enabled',  
                                   )
        );

        $wp_customize->add_setting('page_layout',
                                   array(
                                       'default'           => $this->defaults['page_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'page_layout',
                           array(
                               'label'       => esc_html__('Layout', 'roofix'),
                               'description' => esc_html__('Select the default template layout for Pages', 'roofix'),
                               'section'     => 'page_layout_section',
                               'choices'     => array(
                                   'left-sidebar'  => array(
                                       'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                       'name'  => esc_html__('Left Sidebar', 'roofix')
                                   ),
                                   'full-width'    => array(
                                       'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                       'name'  => esc_html__('Full Width', 'roofix')
                                   ),
                                   'right-sidebar' => array(
                                       'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                       'name'  => esc_html__('Right Sidebar', 'roofix')
                                   )
                               )
                           )
                                   ));

        $wp_customize->selective_refresh->add_partial('page_layout',
                        array(
                            'selector'            => '.page .page-selector',
                            'container_inclusive' => true,
                            'fallback_refresh'    => true,
                        )
        );

        $elementor_templates = Helper::custom_sidebar_fields();
        $elementor_choices = array();
        // Add our default footer selection to our list of choices
        $elementor_choices[$this->defaults['page_sidebar']] = __('Default Sidebar', 'roofix');
        // Add our Elementor templates to our list of choices
        foreach ($elementor_templates as $key => $value) {
            $elementor_choices[$key] = $value;
        }

        // Add our Select setting and control for selecting the footer template to use
        $wp_customize->add_setting('page_sidebar',
                                   array(
                                       'default'           => $this->defaults['page_sidebar'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control('page_sidebar',
                                   array(
                                       'label'   => esc_html__('Select Sidebar ', 'roofix'),
                                       'section' => 'page_layout_section',
                                       'type'    => 'select',
                                        'active_callback'   => 'rttheme_is_page_sidebar_enabled',                                          
                                       'choices' => $elementor_choices,
                                   )
        );
        $wp_customize->add_setting('page_padding_top',
                                   array(
                                       'default'           => $this->defaults['page_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );

        $wp_customize->add_control('page_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'page_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('page_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['page_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('page_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('Page Content Padding Top ', 'roofix'),
                                       'section'     => 'page_layout_section',
                                       'type'        => 'text'
                                   )
        );

    }

    /**
     * Register our Footer controls
     */
    public function rttheme_register_search_layout_controls($wp_customize)
    {


        $wp_customize->add_setting('search_layout',
                                   array(
                                       'default'           => $this->defaults['search_layout'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'search_layout',
                         array(
                             'label'       => esc_html__('Layout', 'roofix'),
                             'description' => esc_html__('Select the default template layout for searchs', 'roofix'),
                             'section'     => 'search_layout_section',
                             'choices'     => array(
                                 'left-sidebar'  => array(
                                     'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
                                     'name'  => esc_html__('Left Sidebar', 'roofix')
                                 ),
                                 'full-width'    => array(
                                     'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
                                     'name'  => esc_html__('Full Width', 'roofix')
                                 ),
                                 'right-sidebar' => array(
                                     'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
                                     'name'  => esc_html__('Right Sidebar', 'roofix')
                                 )
                             )
                         )
          ));

        
        $wp_customize->add_setting('search_padding_top',
                                   array(
                                       'default'           => $this->defaults['search_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('search_padding_top',
                                   array(
                                       'label'       => esc_html__('Content Padding Top', 'roofix'),
                                       'description' => esc_html__('search Content Padding Top ', 'roofix'),
                                       'section'     => 'search_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('search_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['search_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('search_padding_bottom',
                                   array(
                                       'label'       => esc_html__('Content Padding Bottom', 'roofix'),
                                       'description' => esc_html__('search Content Padding Top ', 'roofix'),
                                       'section'     => 'search_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('search_banner',
                                   array(
                                       'default'           => $this->defaults['search_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'search_banner',
                                      array(
                                          'label'   => esc_html__('Banner', 'roofix'),
                                          'section' => 'search_layout_section',
                                      )
                                   ));


        $wp_customize->add_setting('search_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['search_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'search_breadcrumb',
                                    array(
                                        'label'   => esc_html__('Breadcrumb', 'roofix'),
                                        'section' => 'search_layout_section',
                                    )
                                   ));

        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('search_bgtype',
                                   array(
                                       'default'           => $this->defaults['search_bgtype'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'search_bgtype',
                                          array(
                                              'label'       => esc_html__('Banner Background Type', 'roofix'),
                                              'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                              'section'     => 'search_layout_section',
                                              'choices'     => array(
                                                  'bgimg'   => esc_html__('Background Image', 'roofix'),
                                                  'bgcolor' => esc_html__('Background Color', 'roofix')

                                              )
                                          )
                                   ));


        $wp_customize->add_setting('search_bgimg',
                                   array(
                                       'default'   => $this->defaults['search_bgimg'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'search_bgimg',
                            array(
                                'label'         => esc_html__('Banner Background Image', 'roofix'),
                                'section'       => 'search_layout_section',
                                'mime_type'     => 'image',
                                'button_labels' => array(
                                    'select'       => esc_html__('Select File', 'roofix'),
                                    'change'       => esc_html__('Change File', 'roofix'),
                                    'default'      => esc_html__('Default', 'roofix'),
                                    'remove'       => esc_html__('Remove', 'roofix'),
                                    'placeholder'  => esc_html__('No file selected', 'roofix'),
                                    'frame_title'  => esc_html__('Select File', 'roofix'),
                                    'frame_button' => esc_html__('Choose File', 'roofix'),
                                )
                            )
                                   ));
        $wp_customize->add_setting('search_bgcolor',
                                   array(
                                       'default'           => $this->defaults['search_bgcolor'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'search_bgcolor',
                                                                             array(
                                                                                 'label'        => esc_html__('Banner Background Color', 'roofix'),
                                                                                 'description'  => '',
                                                                                 'section'      => 'search_layout_section',
                                                                                 'show_opacity' => true,
                                                                                 'palette'      => array(
                                                                                     '#ee212b',
                                                                                     '#fff',
                                                                                     '#df312c',
                                                                                     '#df9a23',
                                                                                     '#eef000',
                                                                                     '#7ed934',
                                                                                     '#1571c1',
                                                                                     '#8309e7'
                                                                                 )
                                                                             )
                                   ));


        $wp_customize->add_setting('search_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['search_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('search_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Top', 'roofix'),
                                       'section' => 'search_layout_section',
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('search_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['search_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('search_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Bottom', 'roofix'),
                                       'section' => 'search_layout_section',
                                       'type'    => 'text'
                                   )
        );

    }


    /**
     * Register our Footer controls
     */
    public function rttheme_register_error_layout_controls($wp_customize)
    {



        $wp_customize->add_setting('error_title',
                                   array(
                                       'default'           => $this->defaults['error_title'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('error_title',
                                   array(
                                       'label'       => esc_html__('Error Title', 'roofix'),                                     
                                       'section'     => 'error_layout_section',
                                       'type'        => 'text'
                                   )
        ); 

        $wp_customize->selective_refresh->add_partial('error_title',
                          array(
                              'selector'            => '.error_add_partial',
                              'container_inclusive' => true,
                              'fallback_refresh'    => true,
                          )
        );
        $wp_customize->add_setting('error_text1',
                                   array(
                                       'default'           => $this->defaults['error_text1'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('error_text1',
                                   array(
                                       'label'       => esc_html__('Error Text 1', 'roofix'),                                     
                                       'section'     => 'error_layout_section',
                                       'type'        => 'text'
                                   )
        );

        $wp_customize->add_setting('error_text2',
                                   array(
                                       'default'           => $this->defaults['error_text2'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('error_text2',
                                   array(
                                       'label'       => esc_html__('Error Text 1', 'roofix'),                                      
                                       'section'     => 'error_layout_section',
                                       'type'        => 'text'
                                   )
        );    

        $wp_customize->add_setting('error_buttontext',
                                   array(
                                       'default'           => $this->defaults['error_buttontext'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('error_buttontext',
                                   array(
                                       'label'       => esc_html__('Error Button Text', 'roofix'),                                       
                                       'section'     => 'error_layout_section',
                                       'type'        => 'text'
                                   )
        );


      

        $wp_customize->add_setting('error_banner',
                                   array(
                                       'default'           => $this->defaults['error_banner'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'error_banner',
                                                                            array(
                                                                                'label'   => esc_html__('Banner', 'roofix'),
                                                                                'section' => 'error_layout_section',
                                                                            )
                                   ));


        $wp_customize->add_setting('error_breadcrumb',
                                   array(
                                       'default'           => $this->defaults['error_breadcrumb'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_switch_sanitization',
                                   )
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'error_breadcrumb',
                                                                            array(
                                                                                'label'   => esc_html__('Breadcrumb', 'roofix'),
                                                                                'section' => 'error_layout_section',
                                                                            )
                                   ));

        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting('error_bgtype',
                                   array(
                                       'default'           => $this->defaults['error_bgtype'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_radio_sanitization'
                                   )
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'error_bgtype',
                                                                                array(
                                                                                    'label'       => esc_html__('Banner Background Type', 'roofix'),
                                                                                    'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
                                                                                    'section'     => 'error_layout_section',
                                                                                    'choices'     => array(
                                                                                        'bgimg'   => esc_html__('Background Image', 'roofix'),
                                                                                        'bgcolor' => esc_html__('Background Color', 'roofix')

                                                                                    )
                                                                                )
                                   ));


        $wp_customize->add_setting('error_bgimg',
                                   array(
                                       'default'   => $this->defaults['error_bgimg'],
                                       'transport' => 'refresh',

                                       'sanitize_callback' => 'absint',
                                   )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'error_bgimg',
                                                                  array(
                                                                      'label'         => esc_html__('Banner Background Image', 'roofix'),
                                                                      'section'       => 'error_layout_section',
                                                                      'mime_type'     => 'image',
                                                                      'button_labels' => array(
                                                                          'select'       => esc_html__('Select File', 'roofix'),
                                                                          'change'       => esc_html__('Change File', 'roofix'),
                                                                          'default'      => esc_html__('Default', 'roofix'),
                                                                          'remove'       => esc_html__('Remove', 'roofix'),
                                                                          'placeholder'  => esc_html__('No file selected', 'roofix'),
                                                                          'frame_title'  => esc_html__('Select File', 'roofix'),
                                                                          'frame_button' => esc_html__('Choose File', 'roofix'),
                                                                      )
                                                                  )
                                   ));
        $wp_customize->add_setting('error_bgcolor',
                                   array(
                                       'default'           => $this->defaults['error_bgcolor'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
                                   )
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'error_bgcolor',
                                                                             array(
                                                                                 'label'        => esc_html__('Banner Background Color', 'roofix'),
                                                                                 'description'  => '',
                                                                                 'section'      => 'error_layout_section',
                                                                                 'show_opacity' => true,
                                                                                 'palette'      => array(
                                                                                     '#ee212b',
                                                                                     '#fff',
                                                                                     '#df312c',
                                                                                     '#df9a23',
                                                                                     '#eef000',
                                                                                     '#7ed934',
                                                                                     '#1571c1',
                                                                                     '#8309e7'
                                                                                 )
                                                                             )
                                   ));


        $wp_customize->add_setting('error_inner_padding_top',
                                   array(
                                       'default'           => $this->defaults['error_inner_padding_top'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('error_inner_padding_top',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Top', 'roofix'),
                                       'section' => 'error_layout_section',
                                       'type'    => 'text'
                                   )
        );
        $wp_customize->add_setting('error_inner_padding_bottom',
                                   array(
                                       'default'           => $this->defaults['error_inner_padding_bottom'],
                                       'transport'         => 'refresh',
                                       'sanitize_callback' => 'rttheme_text_sanitization'
                                   )
        );
        $wp_customize->add_control('error_inner_padding_bottom',
                                   array(
                                       'label'   => esc_html__('Inner Banner Padding Bottom', 'roofix'),
                                       'section' => 'error_layout_section',
                                       'type'    => 'text'
                                   )
        );


    }
	// Shop page layout
	public function rttheme_register_shop_layout_controls($wp_customize){

        
		$wp_customize->add_setting('shop_layout',
			array(
			   'default'           => $this->defaults['shop_layout'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_radio_sanitization'
			)
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'shop_layout',
			array(
				 'label'       => esc_html__('Layout', 'roofix'),
				 'description' => esc_html__('Select the default template layout for searchs', 'roofix'),
				 'section'     => 'shop_layout_section',
				 'choices'     => array(
					 'left-sidebar'  => array(
						 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
						 'name'  => esc_html__('Left Sidebar', 'roofix')
					 ),
					 'full-width'    => array(
						 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
						 'name'  => esc_html__('Full Width', 'roofix')
					 ),
					 'right-sidebar' => array(
						 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
						 'name'  => esc_html__('Right Sidebar', 'roofix')
					)
				)
			)
        ));
				
		$wp_customize->add_setting('shop_padding_top',
			array(
			   'default'           => $this->defaults['shop_padding_top'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_text_sanitization'
			)
        );
        $wp_customize->add_control('shop_padding_top',
			array(
			   'label'       => esc_html__('Content Padding Top', 'roofix'),
			   'description' => esc_html__('search Content Padding Top ', 'roofix'),
			   'section'     => 'shop_layout_section',
			   'type'        => 'text'
			)
        );

        $wp_customize->add_setting('shop_padding_bottom',
			array(
			   'default'           => $this->defaults['shop_padding_bottom'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_text_sanitization'
			)
        );
        $wp_customize->add_control('shop_padding_bottom',
			array(
			   'label'       => esc_html__('Content Padding Bottom', 'roofix'),
			   'description' => esc_html__('search Content Padding Top ', 'roofix'),
			   'section'     => 'shop_layout_section',
			   'type'        => 'text'
			)
        );

        $wp_customize->add_setting('shop_banner',
			array(
			   'default'           => $this->defaults['shop_banner'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_switch_sanitization',
			)
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'shop_banner',
			array(
				'label'   => esc_html__('Banner', 'roofix'),
				'section' => 'shop_layout_section',
			)
		));


        $wp_customize->add_setting('shop_breadcrumb',
			array(
			   'default'           => $this->defaults['shop_breadcrumb'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_switch_sanitization',
			)
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'shop_breadcrumb',
			array(
				'label'   => esc_html__('Breadcrumb', 'roofix'),
				'section' => 'shop_layout_section',
			)
		));
		
		// Test of Text Radio Button Custom Control
        $wp_customize->add_setting('shop_bgtype',
			array(
			   'default'           => $this->defaults['shop_bgtype'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_radio_sanitization'
			)
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'shop_bgtype',
			array(
				'label'       => esc_html__('Banner Background Type', 'roofix'),
				'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
				'section'     => 'shop_layout_section',
				'choices'     => array(
					'bgimg'   => esc_html__('Background Image', 'roofix'),
					'bgcolor' => esc_html__('Background Color', 'roofix')

				)
			)
		));

        $wp_customize->add_setting('shop_bgimg',
			array(
			   'default'   => $this->defaults['shop_bgimg'],
			   'transport' => 'refresh',

			   'sanitize_callback' => 'absint',
			)
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'shop_bgimg',
			array(
				'label'         => esc_html__('Banner Background Image', 'roofix'),
				'section'       => 'shop_layout_section',
				'mime_type'     => 'image',
				'button_labels' => array(
					'select'       => esc_html__('Select File', 'roofix'),
					'change'       => esc_html__('Change File', 'roofix'),
					'default'      => esc_html__('Default', 'roofix'),
					'remove'       => esc_html__('Remove', 'roofix'),
					'placeholder'  => esc_html__('No file selected', 'roofix'),
					'frame_title'  => esc_html__('Select File', 'roofix'),
					'frame_button' => esc_html__('Choose File', 'roofix'),
				)
			)
		));
        $wp_customize->add_setting('shop_bgcolor',
			array(
			   'default'           => $this->defaults['shop_bgcolor'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
			)
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'shop_bgcolor',
			array(
				 'label'        => esc_html__('Banner Background Color', 'roofix'),
				 'description'  => '',
				 'section'      => 'shop_layout_section',
				 'show_opacity' => true,
				 'palette'      => array(
					 '#ee212b',
					 '#fff',
					 '#df312c',
					 '#df9a23',
					 '#eef000',
					 '#7ed934',
					 '#1571c1',
					 '#8309e7'
				 )
			)
		));

        $wp_customize->add_setting('shop_inner_padding_top',
			array(
			   'default'           => $this->defaults['shop_inner_padding_top'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_text_sanitization'
			)
        );
        $wp_customize->add_control('shop_inner_padding_top',
			array(
			   'label'   => esc_html__('Inner Banner Padding Top', 'roofix'),
			   'section' => 'shop_layout_section',
			   'type'    => 'text'
			)
        );
        $wp_customize->add_setting('shop_inner_padding_bottom',
			array(
			   'default'           => $this->defaults['shop_inner_padding_bottom'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_text_sanitization'
			)
        );
        $wp_customize->add_control('shop_inner_padding_bottom',
			array(
			   'label'   => esc_html__('Inner Banner Padding Bottom', 'roofix'),
			   'section' => 'shop_layout_section',
			   'type'    => 'text'
			)
        );
		
		$wp_customize->add_setting('products_cols_width',
			array(
				'default'           => $this->defaults['products_cols_width'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_sanitize_integer'
			)
        );


        $wp_customize->add_control('products_cols_width',
			array(
			   'label'       => esc_html__('Products Per Column', 'roofix'),
			   'description' => esc_html__('Use product per col default 4', 'roofix'),                                       
			   'section'       => 'shop_layout_section',
			   'type'        => 'number'
			)
        );
		
		$wp_customize->add_setting('products_per_page',
			array(
				'default'           => $this->defaults['products_per_page'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_sanitize_integer'
			)
        );


        $wp_customize->add_control('products_per_page',
			array(
			   'label'       => esc_html__('Number of items per page', 'roofix'),
			   'description' => esc_html__('Effect only for Shop custom page template ', 'roofix'),
			   'section'       => 'shop_layout_section',
			   'type'        => 'number'
			)
        );	
		
	}
	
	public function rttheme_register_product_layout_controls($wp_customize){

        
		$wp_customize->add_setting('product_layout',
			array(
			   'default'           => $this->defaults['product_layout'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_radio_sanitization'
			)
        );
        $wp_customize->add_control(new RTtheme_Image_Radio_Button_Custom_Control($wp_customize, 'product_layout',
			array(
				 'label'       => esc_html__('Layout', 'roofix'),
				 'description' => esc_html__('Select the default template layout for searchs', 'roofix'),
				 'section'     => 'product_layout_section',
				 'choices'     => array(
					 'left-sidebar'  => array(
						 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-left.png',
						 'name'  => esc_html__('Left Sidebar', 'roofix')
					 ),
					 'full-width'    => array(
						 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-full.png',
						 'name'  => esc_html__('Full Width', 'roofix')
					 ),
					 'right-sidebar' => array(
						 'image' => trailingslashit(get_template_directory_uri()) . 'assets/img/sidebar-right.png',
						 'name'  => esc_html__('Right Sidebar', 'roofix')
					)
				)
			)
        ));
		
		
		$wp_customize->add_setting('product_padding_top',
			array(
			   'default'           => $this->defaults['product_padding_top'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_text_sanitization'
			)
        );
        $wp_customize->add_control('product_padding_top',
			array(
			   'label'       => esc_html__('Content Padding Top', 'roofix'),
			   'description' => esc_html__('search Content Padding Top ', 'roofix'),
			   'section'     => 'product_layout_section',
			   'type'        => 'text'
			)
        );

        $wp_customize->add_setting('product_padding_bottom',
			array(
			   'default'           => $this->defaults['product_padding_bottom'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_text_sanitization'
			)
        );
        $wp_customize->add_control('product_padding_bottom',
			array(
			   'label'       => esc_html__('Content Padding Bottom', 'roofix'),
			   'description' => esc_html__('search Content Padding Top ', 'roofix'),
			   'section'     => 'product_layout_section',
			   'type'        => 'text'
			)
        );

        $wp_customize->add_setting('product_banner',
			array(
			   'default'           => $this->defaults['product_banner'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_switch_sanitization',
			)
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'product_banner',
			array(
				'label'   => esc_html__('Banner', 'roofix'),
				'section' => 'product_layout_section',
			)
		));


        $wp_customize->add_setting('product_breadcrumb',
			array(
			   'default'           => $this->defaults['product_breadcrumb'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_switch_sanitization',
			)
        );
        $wp_customize->add_control(new RTtheme_Toggle_Switch_Custom_control($wp_customize, 'product_breadcrumb',
			array(
				'label'   => esc_html__('Breadcrumb', 'roofix'),
				'section' => 'product_layout_section',
			)
		));
		
		// Test of Text Radio Button Custom Control
        $wp_customize->add_setting('product_bgtype',
			array(
			   'default'           => $this->defaults['product_bgtype'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_radio_sanitization'
			)
        );
        $wp_customize->add_control(new RTtheme_Text_Radio_Button_Custom_Control($wp_customize, 'product_bgtype',
			array(
				'label'       => esc_html__('Banner Background Type', 'roofix'),
				'description' => esc_html__('Banner Background Type Image / Color ', 'roofix'),
				'section'     => 'product_layout_section',
				'choices'     => array(
					'bgimg'   => esc_html__('Background Image', 'roofix'),
					'bgcolor' => esc_html__('Background Color', 'roofix')

				)
			)
		));

        $wp_customize->add_setting('product_bgimg',
			array(
			   'default'   => $this->defaults['product_bgimg'],
			   'transport' => 'refresh',

			   'sanitize_callback' => 'absint',
			)
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'product_bgimg',
			array(
				'label'         => esc_html__('Banner Background Image', 'roofix'),
				'section'       => 'product_layout_section',
				'mime_type'     => 'image',
				'button_labels' => array(
					'select'       => esc_html__('Select File', 'roofix'),
					'change'       => esc_html__('Change File', 'roofix'),
					'default'      => esc_html__('Default', 'roofix'),
					'remove'       => esc_html__('Remove', 'roofix'),
					'placeholder'  => esc_html__('No file selected', 'roofix'),
					'frame_title'  => esc_html__('Select File', 'roofix'),
					'frame_button' => esc_html__('Choose File', 'roofix'),
				)
			)
		));
        $wp_customize->add_setting('product_bgcolor',
			array(
			   'default'           => $this->defaults['product_bgcolor'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_hex_rgba_sanitization'
			)
        );

        $wp_customize->add_control(new RTtheme_Customize_Alpha_Color_Control($wp_customize, 'product_bgcolor',
			array(
				 'label'        => esc_html__('Banner Background Color', 'roofix'),
				 'description'  => '',
				 'section'      => 'product_layout_section',
				 'show_opacity' => true,
				 'palette'      => array(
					 '#ee212b',
					 '#fff',
					 '#df312c',
					 '#df9a23',
					 '#eef000',
					 '#7ed934',
					 '#1571c1',
					 '#8309e7'
				 )
			)
		));

        $wp_customize->add_setting('product_inner_padding_top',
			array(
			   'default'           => $this->defaults['product_inner_padding_top'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_text_sanitization'
			)
        );
        $wp_customize->add_control('product_inner_padding_top',
			array(
			   'label'   => esc_html__('Inner Banner Padding Top', 'roofix'),
			   'section' => 'product_layout_section',
			   'type'    => 'text'
			)
        );
        $wp_customize->add_setting('product_inner_padding_bottom',
			array(
			   'default'           => $this->defaults['product_inner_padding_bottom'],
			   'transport'         => 'refresh',
			   'sanitize_callback' => 'rttheme_text_sanitization'
			)
        );
        $wp_customize->add_control('product_inner_padding_bottom',
			array(
			   'label'   => esc_html__('Inner Banner Padding Bottom', 'roofix'),
			   'section' => 'product_layout_section',
			   'type'    => 'text'
			)
        );
		
		
		
	}

}

//Option for active callback dependency
function display_top_tags()
{
    if (get_theme_mod('post_style') == '5') {
        return true;
    }
    return false;
}

/**
 * Active Callback for checking if the WooCommerce plugin is active
 *
 * @return string    boolean
 */
function rttheme_is_woocommerce_plugin_active_active_callback()
{
    return rttheme_rtispluginactive('woocommerce');
}

/**
 * Active Callback for checking if the Elementor plugin is active
 *
 * @return string    boolean
 */
function rttheme_is_elementor_plugin_active_active_callback()
{
    return rttheme_rtispluginactive('elementor');
}
/**
 * Initialise our Customizer settings only when they're required
 */
if (class_exists('WP_Customize_Control')) {
    $rttheme_settings = new rttheme_initialise_customizer_settings();
}
