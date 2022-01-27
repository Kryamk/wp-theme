<?php
/**
 * @author  rttheme
 * @since   1.0
 * @version 1.0
 * @package rttheme
 */


/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 */
/**
 * rttheme_custom_customize_register
 */

if (!function_exists('rttheme_custom_customize_register')) {
    function rttheme_custom_customize_register()
    {
        /**
         * Custom Separator
         */
        class RTtheme_Separator_Custom_control extends WP_Customize_Control
        {
            public $type = 'separator';

            public function render_content()
            {
                ?>
                <p>
                <hr></p>
                <?php
            }
        }
    }

    add_action('customize_register', 'rttheme_custom_customize_register');
}

/**
 * Start RTtheme_Customize
 */
class RTtheme_Customize
{
    /**
     * This hooks into 'customize_register' (available as of WP 3.4) and allows
     * you to add new sections and controls to the Theme Customize screen.
     *
     * Note: To enable instant preview, we have to actually write a bit of custom
     * javascript. See rttheme_live_preview() for more.
     *
     * @see add_action('customize_register',$func)
     * @param \WP_Customize_Manager $wp_customize
     * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
     * @since rttheme 1.0
     */

    public static function register($wp_customize)
    {

        //1. Define a new section (if desired) to the Theme Customizer
        $wp_customize->add_panel('rttheme_colors_options',
            array(
                'title' => esc_html__('Theme Colors', 'roofix'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'description' => esc_html__('Allows you to customize some example settings for rttheme.', 'roofix'), //Descriptive tooltip
            )
        );

        $wp_customize->add_section('rttheme_colors_main_options',
            array(
                'title' => esc_html__('General', 'roofix'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'rttheme_colors_options',
            )
        );

        /*************************
         * Primary
         ************************/
       $wp_customize->add_setting('primary_txt_color', 
            array(
                'default' => '#707173', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control( 
            $wp_customize, 
            'rttheme_primary_txt_color',
            array(
                'label' => esc_html__('Body Text Color', 'roofix'),
                'settings' => 'primary_txt_color', 
                'priority' => 10, 
                'section' => 'rttheme_colors_main_options', 
            )
        ));
        $wp_customize->add_setting('primary_color', 
            array(
                'default' => '#ee212b', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control( 
            $wp_customize, 
            'rttheme_primary_color',
            array(
                'label' => esc_html__('Primary Color', 'roofix'),
                'settings' => 'primary_color', 
                'priority' => 10, 
                'section' => 'rttheme_colors_main_options', 
            )
        ));
        $wp_customize->add_setting('dark_primary_color', 
            array(
                'default' => '#d21c1d', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control( 
            $wp_customize, 
            'rttheme_dark_primary_color',
            array(
                'label' => esc_html__('Dark  Primary Color', 'roofix'),
                'settings' => 'dark_primary_color', 
                'priority' => 10, 
                'section' => 'rttheme_colors_main_options', 
            )
        ));        
        $wp_customize->add_setting('secondery_color', 
            array(
                'default' => '#393738', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control( 
            $wp_customize, 
            'rttheme_secondery_color',
            array(
                'label' => esc_html__('Title Color', 'roofix'),
                'settings' => 'secondery_color', 
                'priority' => 10, 
                'section' => 'rttheme_colors_main_options',
            )
        ));
        /**
         * Separator
         */
        $wp_customize->add_setting('rttheme_separator_heading_hover', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new RTtheme_Separator_Custom_control($wp_customize, 'rttheme_separator_heading_hover', array(
            'settings' => 'rttheme_separator_heading_hover',
            'section' => 'rttheme_colors_main_options',
        )));
      
        /*************************
         * Header Color
         ************************/

        $wp_customize->add_section('rttheme_colors_header_options',
            array(
                'title' => esc_html__('Header', 'roofix'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'rttheme_colors_options',
            )
        );

        /*
        * Top Bar Header
        */
        // Text color
        $wp_customize->add_setting('color_topbar_body_color',
            array(
                //'default' => '#cecece',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rttheme_color_topbar_body_color',
            array(
                'label' => esc_html__('Header Top - Text Color', 'roofix'),
                'settings' => 'color_topbar_body_color',
                'priority' => 10,
                'section' => 'rttheme_colors_header_options',
            )
        ));
        // Link Color
        $wp_customize->add_setting('color_topbar_link_color',
            array(
                // 'default' => '#cecece',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
      
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rttheme_color_topbar_link_color',
            array(
                'label' => esc_html__('Header Top - Link Color', 'roofix'),
                'settings' => 'color_topbar_link_color',
                'priority' => 10,
                'section' => 'rttheme_colors_header_options',
            )
        ));
        // Link Hover Color
        $wp_customize->add_setting('color_topbar_link_hover_color',
            array(
                // 'default' => '#ff2c54',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rttheme_color_topbar_link_hover_color',
            array(
                'label' => esc_html__('Header Top - Link Hover Color', 'roofix'),
                'settings' => 'color_topbar_link_hover_color',
                'priority' => 10,
                'section' => 'rttheme_colors_header_options',
            )
        ));
        // BG Color
        $wp_customize->add_setting('color_topbar_bg',
            array(
                //'default' => '#0eac85',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rttheme_color_topbar_bg',
            array(
                'label' => esc_html__('Header Top - Background Color', 'roofix'),
                'settings' => 'color_topbar_bg',
                'priority' => 10,
                'section' => 'rttheme_colors_header_options',
            )
        ));
		
		// Logo bg Color
        $wp_customize->add_setting('color_logo_bg',
            array(
				'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rttheme_color_logo_bg',
            array(
                'label' => esc_html__('Logo Background Color', 'roofix'),
                'settings' => 'color_logo_bg',
                'priority' => 10,
                'section' => 'rttheme_colors_header_options',
            )
        ));
		
		// Button bg Color
        $wp_customize->add_setting('color_header_button_bg',
            array(
				'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rttheme_color_header_button_bg',
            array(
                'label' => esc_html__('Button Background Color', 'roofix'),
                'settings' => 'color_header_button_bg',
                'priority' => 10,
                'section' => 'rttheme_colors_header_options',
            )
        ));
		
		// Button hover bg Color
        $wp_customize->add_setting('color_header_button_hover_bg',
            array(
				'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'rttheme_color_header_button_hover_bg',
            array(
                'label' => esc_html__('Button Hover Background Color', 'roofix'),
                'settings' => 'color_header_button_hover_bg',
                'priority' => 10,
                'section' => 'rttheme_colors_header_options',
            )
        ));

       

        //  Footer
        $wp_customize->add_section('rttheme_colors_footer_options',
            array(
                'title' => esc_html__('Footer', 'roofix'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'rttheme_colors_options',
            )
        );
        
        // Footer Heading Color
        $wp_customize->add_setting('color_footer_heading_color', 
            array(
                'default' => '#ffffff', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control( 
            $wp_customize, 
            'rttheme_color_footer_heading_color',
            array(
                'label' => esc_html__('Heading Color', 'roofix'),
                'settings' => 'color_footer_heading_color', 
                'priority' => 10, 
                'section' => 'rttheme_colors_footer_options', 
            )
        ));

        // Text Color
        $wp_customize->add_setting('color_footer_body_color', 
            array(
                // 'default' => '#6b7074', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control( 
            $wp_customize, 
            'rttheme_color_footer_body_color',
            array(
                'label' => esc_html__('Text Color', 'roofix'),
                'settings' => 'color_footer_body_color', 
                'priority' => 10, 
                'section' => 'rttheme_colors_footer_options', 
            )
        ));

        // Link Color
        $wp_customize->add_setting('color_footer_link_color', 
            array(
                // 'default' => '#6b7074', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control( 
            $wp_customize, 
            'rttheme_color_footer_link_color',
            array(
                'label' => esc_html__('Link Color', 'roofix'),
                'settings' => 'color_footer_link_color', 
                'priority' => 10, 
                'section' => 'rttheme_colors_footer_options', 
            )
        ));

        // Link Hover Color
        $wp_customize->add_setting('color_footer_link_hover_color', 
            array(
                // 'default' => '#ff2c54', 
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control( 
            $wp_customize, 
            'rttheme_color_footer_link_hover_color',
            array(
                'label' => esc_html__('Link Hover Color', 'roofix'),
                'settings' => 'color_footer_link_hover_color', 
                'priority' => 10, 
                'section' => 'rttheme_colors_footer_options', 
            )
        )); 
    }
    

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     *
     * Used by hook: 'wp_head'
     *
     * @see add_action('wp_head',$func)
     * @since rttheme 1.0
     */
    public static function rttheme_custom_color_output()
    {
        ?>
        <!--Customizer CSS-->
      	<style type="text/css">
            
            /* Body */

            <?php self::generate_css('body,
            .post-each.post-each-alt .entry-meta-1 li,
            .post-each .entry-meta-2 li.vcard-author a,
            .post-each .entry-meta-1 span.updated,
            .post-each .entry-meta-1 li i,
            .post-each .entry-meta-2 li.vcard-author i,
            .widget ul > li a,
            .news-meta-info.mar20-ul li a,
            .single-post-pagination .rtin-item .rtin-content a.rtin-link,
            #respond .logged-in-as a,
            .single-post-pagination .rtin-item .rtin-content a.rtin-link,
            .widget-search-box .stylish-input-group .form-control,
            .about-box-layout8r .item-content .list-item li,
            .heading-layout1 .item-subtitle

            ', 'color ', 'primary_txt_color'); ?>
            /* Link */

            <?php self::generate_css('a', 'color ', 'primary_color'); ?>
            /* Link Hover */

            <?php self::generate_css('a:hover, a:focus, a:active', 'color ', 'dark_primary_color'); ?>

            /* Meta */
            <?php self::generate_css('
                h1, 
                h2, 
                h3, 
                h4, 
                h5, 
                h6,
                h1 a, 
                h2 a, 
                h3 a, 
                h4 a, 
                h5 a, 
                h6 a,
                .pagination-area ul li a, .pagination-area ul li span,
                .single-post-pagination .rtin-item .rtin-content .rtin-title a,
                .heading-layout1new h2,
                .service-box-layout6-new .item-content .item-title a,
                .heading-layout1 h2,
                .blog-box-layout6-new .item-content .item-title a,
                .service-box-layout7-new .item-title a,
                .project-box-layout6 .item-excerpt .item-heading .item-tag a,
                .widget_roofix_posts .media-body h3 a,
                .post-each .entry-content-area .entry-header h2,
                .post-each .entry-content-area .entry-header h2 a

             ', 'color ', 'secondery_color'); ?>

     
        <?php self::generate_css('
             .widget ul > li a:hover,
             .progress-box-layout4:hover .inner-item .item-icon i,
             .progress-box-layout4 .inner-item .item-content .count-number .suffix,
             .project-box-layout5-new .project-box .item-content .item-title a:hover,
             .team-box-layout7-new .item-img .item-icons.item-social:hover,
             .footer-wrap-fix-off .footer-box-layout1 ul.menu > li:hover:before,
             .footer-bottom-wrap-layout1 .copyright a:hover,
             .site-header .main-navigation ul li ul li a:hover,
             .trheader.non-stick .site-header .main-navigation ul.menu > li > a:hover,
            
             .topbar-information4 .header-left-4layout > li > i,
             .header-left-4layout .tophead-social li a:hover, 
             .about-info-list .about-info li:after,
             .service-box-layout6-new .item-content .item-title a:hover,
             .service-box-layout6-new .item-content .non-ghost-btn-md:hover,
             .service-slider-new-area .owl-theme .owl-nav [class*=owl-]:hover,
             .rt-isotope-wrapper .rt-isotope-tab-wrp .isotop-btn a.current,
             .rt-isotope-wrapper .rt-isotope-tab-wrp .isotop-btn a:hover,
             .project-box-layout6 .item-excerpt .item-heading .item-title a:hover,
             .project-box-layout6 .item-excerpt .item-heading .item-tag a:hover,
             .blog-box-layout6-new .item-content .entry-meta li i,
             .top-footer-layout1 .footer-social ul li a:hover,
             .blog-box-layout6-new .item-content .item-title a:hover,
             .primary-color .elementor-icon-box-description,
             .process-box-layout1new:hover .item-icon i:before,
             .testimonial-box-layout8-new .rt-arrow i,
             .site-header .main-navigation ul.menu > li.current-menu-item > a,
             .site-header .main-navigation ul.menu > li.current > a,
             .search-box-area .search-box a.search-button:hover i:before,
             .service-box-layout6-new:hover .item-img .item-icon i:before,
             .site-header .main-navigation ul li ul li a:before,
           
             .team-box-layout7-new .item-img .item-icons .action-share-wrap a:hover i,
             .wp-block-themepunch-revslider .play-btn i:before,
             .header-top-bar.layout-2 .header-social-layout1 ul.tophead-social li a:hover,
             .about-box-layout8r .item-content .list-item li i,
             .blog-box-layout1-new .item-content .item-title a:hover,
             .blog-box-layout1-new .item-content .entry-meta li i,
             .nav-control-layout5w .owl-next:hover span i,
             .nav-control-layout5w .owl-prev:hover span i,
             .rtin-insurance-tab .nav-tabs .nav-item a:hover,
             .rtin-insurance-tab .nav-tabs .nav-item a.active,
             .rtin-insurance-tab .rtin-item ul li:after,
             .single-team-box-layout1 .item-content .item-mail i,
             .single-team-box-layout1 .item-content .item-social li,            
             .testimonial-box-layout9-new .slick-prev > span i,
             .testimonial-box-layout9-new .slick-next > span i,
             .project-box-layout1 .item-footer .item-title a:hover,
             .project-box-layout1 .item-footer .item-tag.item-subtitle a:hover,
             .project-box-layout1 .item-content .item-btn:hover,
             .single-project-related .related-wrp .media-body .item-title a:hover,
             .single-project-related .related-wrp .media-body .item-subtitle a:hover,
             .nav-control-layout1w .owl-nav .owl-next i,
             .header-top-bar.layout-2 .header-social-layout1 ul.tophead-social li a:hover i,
             .nav-control-layout1w .owl-nav .owl-prev i,
             .widget_roofix_service_navigation_sidebar ul.menu li a:hover,
             .widget_roofix_posts .media-body h3 a:hover,
             .nav-control-layout4 .owl-nav div:hover,
             .blog-box-layout3new .item-content .item-title a:hover,
             .news-meta-info.mar20-ul li i,
                    
             .single-post-pagination .rtin-item .rtin-content a.rtin-link i,
             .comments-area .main-comments .comment-meta .comment-meta-left a:hover,
             .single-post-pagination .rtin-item .rtin-content a.rtin-link:hover,
             .single-post-pagination .rtin-item .rtin-content .rtin-title a:hover,
             #respond .logged-in-as a:hover,
             .widget-search-box .stylish-input-group .input-group-addon:hover button span,
             .news-meta-info.mar20-ul li a:hover,
             .breadcrumb-area .entry-breadcrumb > span a:hover,
             .widget-project-info .project-details > ul > li a:hover,
             .site-header .main-navigation ul.menu > li > a:hover,
             .side-menu-rt ul.offcanvas-menu li a:hover,
             .side-menu-rt ul.offcanvas-menu li a:before,
             .overly-sidebar-wrapper.show .overly-sidebar-content .circle-btn:hover,
			 .sidebarBtn span,
			 .mean-container .mean-nav ul li a i, 
			 .mean-container .mean-nav > ul > li a i,
			 .mean-container .mean-nav ul li a:hover, 
			 .mean-container .mean-nav > ul > li.current-menu-item > a,
			 .mean-container .mean-nav ul li ul.sub-menu > li a:hover

            ','color ', 'primary_color');

              ?>

         
        <?php self::generate_css('
            .top-footer-layout1 .footer-contact-phone i,
            .footer-box-layout1 .footer-title:after,
            .footer-box-layout1 .footer-form-box .contact-form-box .form-group .item-btn,
            .blog-box-layout6-new .item-img .item-date,
            .heading-layout1new .item-subtitle:after,
            .testimonial-box-layout8-new .nav-item:after,
            .widget-form .contact-form-box .form-group .item-btn,
            .process-box-layout1new,
            .project-box-layout6 .item-content .item-heading .item-title:after,
            .rt-isotope-wrapper .rt-isotope-tab-wrp .isotop-btn a:after,
            .heading-layout1new .item-subtitle:after,
            .about-box-layout7-new .item-img:after,
            .service-slider-new-area .owl-theme .owl-dots .owl-dot.active span,
            .service-slider-new-area .owl-theme .owl-dots .owl-dot:hover span,
            .service-slider-new-area .owl-theme .owl-dots .owl-dot.active span,
            .service-slider-new-area .owl-theme .owl-dots .owl-dot:hover span,
            .service-box-layout6-new .item-img .item-icon,
            .header4-icon-right a.header-btn-new,
            .header4-icon-right .circle-btn.offcanvas-menu-btn:hover .btn-icon-wrap span,
            .header-menu.menu-layout4 .container-fluid .primary-bg-brind,
            .team-box-layout7-new .item-content,

            .testimonial-box-layout8-new .rt-arrow:hover,
            .non-ghost-btn-md:hover span,
            .project-box-layout6 .item-excerpt .item-heading .item-title:after,
            .non-ghost-btn-md.btn-fill,
            .non-ghost-btn-md.btn-fill:hover span,
            .wp-block-themepunch-revslider .play-btn:hover,
            .contact-wrap-layout-before:before,
            #slider-2-slide-2-layer-7,
            .about-box-layout-viedo .item-content .item-subtitle:after,
            .service-box-layout7-new .item-title:after,
            .about-box-layout8r .item-img .item-icon .play-btn:hover,
            .about-box-layout8r .item-content .subtitle-style:after,
            .content-slide-new .slick-dots li button:hover,
            .content-slide-new .slick-dots li.slick-active button,
            .project-box-layout5-new .project-box .item-content .item-title:after,
            .nav-control-layout5w .owl-next span,
            .nav-control-layout5w .owl-prev span,
            .nav-control-layout5w .owl-next:hover span:after,
            .nav-control-layout5w .owl-prev:hover span:after,
            .testimonial-box-layout9-new .slick-prev > span:after,
            .testimonial-box-layout9-new .slick-next > span:after,
            .testimonial-box-layout9-new .slick-next:hover > span,
            .testimonial-box-layout9-new .slick-prev:hover > span,
            .testimonial-box-layout9-new .nav-item:after,
            .rtin-insurance-tab .nav-tabs .nav-item a:hover:before,
            .rtin-insurance-tab .nav-tabs .nav-item a.active:before,
            .pagination-area ul li.active a,
            .pagination-area ul li a:hover,
            .pagination-area ul li span.current,
            .project-box-layout1 .item-footer .item-title:after,
            .project-box-layout1 .item-img:after,
            .widget-project-info .project-info-title:after,
            .nav-control-layout1w .owl-nav .owl-prev:hover,
            .nav-control-layout1w .owl-nav .owl-next:hover,
            .nav-control-layout1w .owl-nav .owl-next:after,
            .single-project-related .related-wrp .media-body .item-title:after,
            .nav-control-layout1w .owl-nav .owl-prev:after,
            .testimonial-box-layout2 .rt-arrow:hover,
            .services-list-layout2 .item-content .stitle-holder .s-title:after,
            .about-box-layout9r .item-img .item-icon .play-btn:hover,
            .sidebar-widget-area .widget .widget-title:after,
            .widget_roofix_service_navigation_sidebar ul.menu li a:hover span,
            .widget-download .item-list div.widget-primary-btn a,
            .widget-download .item-list div.widget-sec-btn a:hover,
            .widget_tag_cloud a:hover,
            .blog-box-layout3new .item-img .top-item,
            .single-blog-box-layout1 .blog-author .item-social li a:hover,
            .post-each .entry-thumbnail-area .post-item-date,
            .single-blog-box-layout1 .item-tag-area .item-social ul li a:hover,
            #respond .comment-reply-title:after,
            .comments-area h3.comment-title:after,
            .comments-area .main-comments .comment-meta .reply-area a:hover,
            #respond form .btn-send,
            .contact-box-layout15 .media .item-icon,
            .contact-form-box-light .item-btn.fw-btn-fill,
            .post-each.post-each-single .entry-content-area .entry-tags a:hover,
			.rt-slider-button-primary,
			.rt-slider-button-primary-lg,
			.service-box-layout6-new .item-content .item-icon,
			.icon-box-layout6:hover .icon-layout-6 span,
			.image-box-layout8 .item-box .call-info,
			.rtin-banner-tab-layout2 .tab-nav-wrap .tab-nav-list li a.active,			
			.icon-box-layout5 .icon-layout-5:before,
			.project-box-5 .project-box-img .item-content,
			.price-table-layout1 .rtin-footer a:hover,
            .service-box-layout7-new:before,
            .video-box-slide .swiper-pagination-bullet-active,
            .video-box-slide .swiper-pagination-bullet:hover,
            .testimonial-box-layout9-new .swiper-pagination-bullet,
            .contact-form-box-home input.item-btn[type="submit"],
            .rt-project-wrap .rt-arrow span,
            .rt-owl-carousel .swiper-pagination-bullet.swiper-pagination-bullet-active,
            .rt-owl-carousel .swiper-pagination-bullet.swiper-pagination-bullet:hover            

            ', 'background-color ', 'primary_color'); ?>

            <?php self::generate_css('
            .footer-wrap-fix-off .footer-box-layout1 .footer-form-box .contact-form-box .form-group .item-btn:hover,
            .non-ghost-btn-md.btn-fill:hover,          
            .non-ghost-btn-md.btn-fill span,
            .widget-form .contact-form-box .form-group .item-btn:hover,
            .service-box-layout7media,
            #respond form .btn-send:hover,
            .contact-form-box-light .item-btn.fw-btn-fill:hover,
            .header4-icon-right a.header-btn-new:hover,
			.rt-slider-button-primary:hover,
			.rt-slider-button-primary-lg:hover

            ', 'background-color ', 'dark_primary_color'); ?>

            <?php self::generate_css('
            .testimonial-box-layout8-new .slide-content-media .media-body-footer,
            .process-box-layout1new,
            .process-box-layout1new:hover .item-icon i:before,
            .process-box-layout1new:hover,
            .testimonial-box-layout8-new .rt-arrow:hover,
            .site-header .main-navigation ul li ul,
            .site-header .main-navigation ul li ul li a:before,
            .service-slider-new-area .owl-theme .owl-dots .owl-dot.active,
            .service-slider-new-area .owl-theme .owl-dots .owl-dot:hover,
            .progress-box-layout4:after,
            .testimonial-box-layout9-new .slide-content-media .media-body-footer,
            .testimonial-box-layout9-new .slick-next:hover > span,
            .testimonial-box-layout9-new .slick-prev:hover > span,
            .rtin-insurance-tab .nav-tabs .nav-item a:hover:after,
            .rtin-insurance-tab .nav-tabs .nav-item a.active:after,
            .nav-control-layout1w .owl-nav .owl-prev:hover,
            .nav-control-layout1w .owl-nav .owl-next:hover,
            .wp-block-quote:not(.is-large):not(.is-style-large),
			.mean-container .mean-bar,
			.price-table-layout1 .rtin-footer a,
            .rt-owl-carousel .swiper-pagination-bullet.swiper-pagination-bullet-active,
            .rt-owl-carousel .swiper-pagination-bullet.swiper-pagination-bullet:hover

            ', 'border-color ', 'primary_color');

             ?>

            <?php self::generate_css('
            .team-box-layout7-new .item-content .cls-1,
            .service-box-layout6-new .item-content .svg-content svg.top-svg,
            .service-box-layout6-new .item-content .svg-content svg.bottom-svg,
            .about-box-layout-viedo .item-content svg

            ', 'fill ', 'primary_color'); ?>

            <?php self::generate_css('           
            .service-box-layout6-new .item-content .svg-content svg.bottom-svg

            ', 'fill ', 'dark_primary_color'); ?>
			
			<?php self::generate_css('
			.offcanvas-list span i,
			.social-icon-off a,
			.price-table-layout1 .rtin-list-item li i,
			.service-box-layout2 .service-box-media .item-icon.icon-layout-3 i,
			.service-box-layout2 .service-box-media .item-icon.icon-layout-3 i:before,
			.elementor-accordion .elementor-accordion-item .elementor-tab-title span.elementor-accordion-icon,
			.rtin-banner-tab-layout2 .tab-content .rtin-item .rtin-text .service-tab-list li:before,
			.heading-layout1 .item-subtitle,
			.service-box-layout2 .item-title a:hover,
			.service-box-layout2 .service-box-media .item-icon.icon-layout-2 i:before,
			.project-box-layout6-new .project-box .item-title a:hover,
			.team-box-layout1 .item-content .item-title a:hover,
			.team-box-layout1 .item-content .item-social li a:hover,
			.post-each .entry-meta-1 li i,
			.post-each .entry-content-area .entry-header a.entry-title:hover,
			.post-each .entry-content-area:hover .entry-meta-1 span.updated i,
			.mobile-header-topbar .mobile-top li.social-icon a,
			.mobile-header-topbar ul.mobile-top > li > i,
			.header-style-2 .menu-1v2 .header-phone-btn .phone-number,
			.woocommerce .rt-product-block .price-title-box .rtin-title a:hover,
			.woocommerce .rt-product-block .price-title-box .rtin-price,
			.woocommerce .rt-product-block .rtin-thumb-wrapper .rtin-buttons-area a,
			.woocommerce .widget_products .product_list_widget li a:hover,
			.woocommerce-cart table.woocommerce-cart-form__contents .product-name a:hover,
			.woocommerce .roofix-product-details-page .single-product-top-1 .rtin-right span.price, 
			.woocommerce .roofix-product-details-page .single-product-top-1 .rtin-right p.price,
			.woocommerce .roofix-product-details-page .single-product-top-1 .rtin-right .post-share-btn .post-social-sharing ul.item-social li a:hover,
			.woocommerce .roofix-product-details-page .single-product-top-1 .rtin-right .wistlist-compare-box a:hover,
			.price-table-layout1 .rtin-footer a,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
            .post-each .entry-meta-2 li.vcard-author i,
            .post-each .entry-meta-2 li.vcard-comments i,
            .site-header .main-navigation > nav > ul.menu > li > a.active,
            .icon-layout-4 .service-box-media .item-icon i:before

            ', 'color ', 'primary_color'); ?>
			
			<?php self::generate_css(' 
			#preloader
            ', 'background-color ', 'preloader_bg_color'); ?> 
			
			<?php self::generate_css('
			.social-icon-off a:hover,
			.post-each .entry-meta-1 li a:hover,
			.mobile-header-topbar .mobile-top li.social-icon a:hover

            ', 'color ', 'dark_primary_color'); ?>
			
			<?php self::generate_css('
			.rt-button-sp,
			.half-left-bg:after,
			.team-box-layout1 .item-content:before,
			.video-wrapper-inner .popup-video .player-wave .waves,
			.service-box-layout2 .media.service-box-media:hover .item-icon.icon-layout-3 i,
			.elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active span.elementor-accordion-icon,
			.rtin-banner-tab-layout1 .tab-nav-wrap,
			.overly-sidebar-wrapper .overly-sidebar-content .circle-btn:hover,
			.project-box-layout6-new .project-box .item-title:after,
			.testimonial-box-layout2 .item-img:after,
			.mean-bar .mobile-btn,
			.offcanvas-menu-btn:hover .btn-icon-wrap span,
			.header-style-5 .site-header .primary-bg-brind,
			.header-style-5 .header5-icon-right a.header-btn-new,
			.woocommerce .rt-product-block .rtin-thumb-wrapper .rtin-buttons-area .btn-icons .yith-wcqv-button:hover,
			.woocommerce .rt-product-block .rtin-thumb-wrapper .rtin-buttons-area .btn-title a:hover,
			.woocommerce .rt-product-block .rtin-thumb-wrapper .rtin-buttons-area .btn-icons .rdtheme-wishlist-icon:hover,
			.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a:before

            ', 'background-color ', 'primary_color'); ?>
			
			
			<?php self::generate_css('            
			.woocommerce #respond input#submit.alt, 
			.woocommerce #respond input#submit, 
			.woocommerce button.button.alt, 
			.woocommerce input.button.alt, 
			.woocommerce button.button, 
			.woocommerce a.button.alt, 
			.woocommerce input.button, 
			.woocommerce a.button

            ', 'background-color ', 'primary_color'); ?>
			
			<?php self::generate_css('            
			.woocommerce #respond input#submit.alt:hover, 
			.woocommerce #respond input#submit:hover, 
			.woocommerce button.button.alt:hover, 
			.woocommerce input.button.alt:hover, 
			.woocommerce button.button:hover, 
			.woocommerce a.button.alt:hover, 
			.woocommerce input.button:hover, 
			.woocommerce a.button:hover

            ', 'background-color ', 'dark_primary_color'); ?>
			
			<?php self::generate_css('            
			.rt-button-sp:hover,
			.mean-bar .mobile-btn:hover,
			.header-style-5 .header5-icon-right a.header-btn-new:hover

            ', 'background-color ', 'dark_primary_color'); ?>
			
			<?php self::generate_css('
			.header-menu.menu-layout4 .container-fluid .primary-bg-brind,
			.header-style-5 .site-header .primary-bg-brind
            ', 'background-color ', 'color_logo_bg'); ?>
			
			<?php self::generate_css('
			.header4-icon-right a.header-btn-new,
			.header-style-5 .header5-icon-right a.header-btn-new
            ', 'background-color ', 'color_header_button_bg'); ?>
			
			<?php self::generate_css('
			.header4-icon-right a.header-btn-new:hover,
			.header-style-5 .header5-icon-right a.header-btn-new:hover
            ', 'background-color ', 'color_header_button_hover_bg'); ?>

		</style>

		<!--/ Customizer CSS-->
        <?php
        // Pie Color To Jquery
        $secondary       = get_theme_mod( 'color_variation_seven' );
        $primary         = get_theme_mod( 'primary_color' );
        $rttheme_track_color = ( $secondary ) ? $secondary : '#e1e3e5';
        $rttheme_bar_color   = ( $primary ) ? $primary : '#ff2b56';
        $pie_chart_data = array(
            'rttheme_track_color' => $rttheme_track_color,
            'rttheme_bar_color'   => $rttheme_bar_color,
        );                            
        wp_localize_script( 'rttheme-main', 'rttheme_pie_data', $pie_chart_data );
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $rtprefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since rttheme 1.0
     */
    public static function generate_css($selector, $style, $mod_name, $rtprefix = '', $postfix = '', $echo = true)
    {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if (!empty($mod)) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $rtprefix . $mod . $postfix
            );
            if ($echo) {
                echo rtthemecapeing($return);
            }
        }
        return $return;
    }  



    public static function generate_css_rgba($selector, $style, $mod_name, $rtprefix = '', $postfix = '', $echo = true)
    {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if (!empty($mod)) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $rtprefix . $mod . $postfix
            );
            if ($echo) {
                $return = rthex2rgb($return);
                echo rtthemecapeing( $return );
            }
        }
        return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('RTtheme_Customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('RTtheme_Customize', 'rttheme_custom_color_output'));

/**
 * Escapeing
 */

if (!function_exists('rtthemecapeing')) {
    function rtthemecapeing($html)
    {
        return $html;
    }
}
if (!function_exists('rthex2rgb')) {
     function rthex2rgb($hex) {
        $hex = str_replace("#", "", $hex);
        if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
        }
        $rgb = "$r, $g, $b";
        return $rgb;
      }
  }
