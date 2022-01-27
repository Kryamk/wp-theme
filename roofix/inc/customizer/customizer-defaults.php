<?php
/**
 * Set our Customizer default options
 *
 * @return array    Customizer defaults
 * @since Roofix 1.0
 *
 */

if (!function_exists('rttheme_generate_defaults')) {
    function rttheme_generate_defaults()
    {
        $customizer_defaults = array(         
           
            'logo'                           => '',
            'logo_light'                     => '',
            'logo_light_t'                   => '',
            'logo_width'                     => 2,
            'preloader'                      => '',
            'preloader_image'                => '',
            'back_to_top'                    => 0,
            'preloader_bg_color'             => '#ffffff',  
            'inner_fix_banner'               => 0,
            'team_admin_menu_title'          => 'Team Member',
            'team_slug'                      => 'team',
            'team_cat_slug'                  => 'team-cat',
            'services_admin_menu_title'      => 'services',
            'services_slug'                  => 'services',
            'services_cat_slug'              => 'services-cat',
            'projects_admin_menu_title'      => 'Projects',
            'projects_slug'                  => 'projects',
            'projects_cat_slug'              => 'projects-cat',

            
            // General  
            'under_construction_mode_enable' => 0,
            'under_construction_page_logo'   => '',
            'under_construction_title_text'  => '',
            'under_construction_page_image'  => '',
            'under_construction_tc_date'     => '',

            // header
            'header_opt'                    => 1,
            'sticky_menu'                   => 1,
            'sticky_header'                 => 0,
            'tr_header'                     => 0,
            'header_style'                  => '1',
            'search_icon'                   => 1,
            'header_ofc_menu'               => 0,
            'header_phone'                  => 0,

            'header_btn'                    => 0,
            'header_buttontext'             => 'Appointment',
            'header_buttonUrl'              => '#',

            'top_bar'                       => 0,
            'top_bar_style'                 => '1',
            'social_icon'                   => '',
            'header_top_shape'              => '',

            'resmenu_width'         => '991',
            'cart_icon'             =>  1,
            'social_gplus'          => '#',

            // Mobile header
            'mobile_header_style'   => 1,
            'phone_has_social'      => 1,
            'header_btn_has_mobile' => 1,
            'phone_has_mobile'      => 1,
            'phone_has_email'       => 1,
            'phone_has_opening'     => 1,

            // Footer 
            'full_footer_area'      => 1,
            'footer_area'           => 1,
            'footer_style'          => 1,
            'footer_top_area'       => '',

            'footer_logo'            => '',
            'footer_phone_lable'     => 'Need Any Roofing Help?',
            'footer_phone'           => 'Call Us: +123-559-990',


            'active_footer_column'  => 1,
            'footer_column'         => 4,
            'copyright_area'        => 1,
            'copyright_text'        => '&copy; Copyright roofix 2021. All Right Reserved. Designed and Developed by <a rel="nofollow" target="_blank" href="#">RadiusTheme</a>',

            // Contact Socials
            'phone_label'           => 'Hot Line:',
            'phone'                 => '+ 980-222-444',           
            'email_label'           => 'E-mail:',
            'email'                 => 'info@rofix.com',
            'opening_label'         => 'Saturday - Sunday',
            'opening'               => '09:00AM - 10:00PM',
            'address_label'         => 'Address ',
            'offcanvas_content_title'         => 'About Us ',
            'offcanvas_content'         => 'Roof when anery known printer took 
galley ype and scrambled money 
make type specim book. ',
            'offcanvas_address_label'         => 'Where to Find Us ',

            'offcanvas_address'               => '17 Mark Street, NY 10330, USA
New York 2021',
            'address'               => '59 Street, Chicago, Newyork City',


            'social_label'        => 'Follow Us',
            'social_facebook'     => '#',
            'social_twitter'      => '#',
            'social_linkedin'     => '#',
            'social_youtube'      => '#',
            'social_pinterest'    => '#',
            'social_instagram'    => '#',
            'social_rss'          => '#',


            // page layout 
            'page_layout'         => 'full-width',
            'page_padding_top'    => 110,
            'page_padding_bottom' => 120,
            'page_breadcrumb'     => 0,
            'page_banner'         => 1,
            'page_bgtype'         => 'bgcolor',
            'page_bgimg'          => '',
            'page_bgcolor'        => '#707173',

            'page_inner_padding_top'    => '',
            'page_inner_padding_bottom' => '',

            'page_sidebar'              => '',

            // Blog layout 
            'post_archive_style'   => '1',
            'post_archive_number'  => '9',
            'post_archive_orderby' => 'date',

            'blog_layout'               => 'right-sidebar',
            'blog_padding_top'          => 120,
            'blog_padding_bottom'       => 120,
            'blog_banner'               => 1,
            'blog_breadcrumb'           => 0,
            'blog_bgtype'               => 'bgcolor',
            'blog_bgimg'                => '',
            'blog_bgcolor'              => '#707173',
            'blog_inner_padding_top'    => '',
            'blog_inner_padding_bottom' => '',
            'blog_sidebar'              => '',
            'blogheader_opt'              => '',
            'blog_footer_area'              => '',

            'blog_style'                            => 1,
            'blog_date'                             => 1,
            'blog_author_name'                      => 1,
            'blog_cats'                             => 1,
            'blog_comment_num'                      => 1,
            'blog_cotent_show'                      => 1,
            'blog_content_number'                   => 20,
            'blog_title_number'                     => 15,
            'read_more_show'                        => 1,

            // Blog single layout 
            'single_post_layout'                    => 'right-sidebar',
            'single_post_padding_top'               => 120,
            'single_post_padding_bottom'            => 120,
            'single_post_breadcrumb'                => 0,
            'single_post_banner'                    => 1,
            'single_post_bgtype'                    => 'bgcolor',
            'single_post_bgimg'                     => '',
            'single_post_bgcolor'                   => '#707173',
            'single_post_inner_padding_top'         => '',
            'single_post_inner_padding_bottom'      => '',
            'single_post_sidebar'                   => '',


            // Single Post
            'post_date'                             => 1,
            'post_comment_num'                      => 1,
            'post_author_name'                      => 1,
            'post_cats'                             => 1,
            'post_tags'                             => 1,
            'post_social'                           => 0,
            'post_about_author'                     => 1,
            'post_author_social'                    => 0,
            'post_pagination'                       => 1,
            'post_pagination_img'                   => 0,
            'post_pagination_date'                  => 0,


            // Team archive layout 
            'team_archive_layout'                   => 'full-width',
            'team_archive_padding_top'              => 110,
            'team_archive_padding_bottom'           => 120,
            'team_archive_breadcrumb'               => 0,
            'team_archive_banner'                   => 1,
            'team_archive_bgtype'                   => 'bgcolor',
            'team_archive_bgimg'                    => '',
            'team_archive_bgcolor'                  => '#707173',
            'team_archive_inner_padding_top'        => '',
            'team_archive_inner_padding_bottom'     => '',

            'team_arc_style'                        => 1,
            'team_archive_number'                   => 9,
            'team_archive_orderby'                  => 'date',
            'team_archive_sidebar'                  => '',

            // Team single layout 
            'team_layout'                           => 'full-width',
            'team_padding_top'                      => 110,
            'team_padding_bottom'                   => 120,
            'team_breadcrumb'                       => 1,
            'team_banner'                           => 1,
            'team_bgtype'                           => 'bgcolor',
            'team_bgimg'                            => '',
            'team_bgcolor'                          => '#707173',
            'team_arc_social_display'               => 0,
            'team_inner_padding_top'                => '',
            'team_inner_padding_bottom'             => '',
            'team_sidebar'                          => '',


            // services archive layout
            'services_archive_layout'               => 'full-width',
            'services_archive_padding_top'          => 110,
            'services_archive_padding_bottom'       => 120,
            'services_archive_breadcrumb'           => 0,
            'services_archive_banner'               => 1,
            'services_archive_bgtype'               => 'bgcolor',
            'services_archive_bgimg'                => '',
            'services_archive_bgcolor'              => '#707173',
            'services_archive_inner_padding_top'    => '',
            'services_archive_inner_padding_bottom' => '',
            'services_archive_sidebar'              => '',

            'services_arc_style'                => 'style1',
            'services_archive_number'           => 9,
            'services_archive_orderby'          => 'date',
            'services_archive_content_number'   => '20',

            // services single layout 
            'services_layout'           => 'full-width',
            'services_padding_top'      => 110,
            'services_padding_bottom'   => 120,
            'services_breadcrumb'       => 0,
            'services_banner'           => 1,
            'services_bgtype'           => 'bgcolor',
            'services_bgimg'            => '',
            'services_bgcolor'          => '#707173',
            'services_single_arc_style' => 'style1',

            'services_inner_padding_top'           => '',
            'services_inner_padding_bottom'        => '',
            'services_sidebar'                     => '',


            // project archive layout
            'project_archive_layout'               => 'full-width',
            'project_archive_sidebar'              => '',
            'project_archive_padding_top'          => 110,
            'project_archive_padding_bottom'       => 120,
            'project_archive_breadcrumb'           => 0,
            'project_archive_banner'               => 1,
            'project_archive_bgtype'               => 'bgcolor',
            'project_archive_bgimg'                => '',
            'project_archive_bgcolor'              =>'#707173',
            'project_archive_inner_padding_top'    => '',
            'project_archive_inner_padding_bottom' => '',


            'project_arc_style'            => 'style1',
            'project_archive_number'       => 9,
            'project_archive_number'       => 9,
            'project_archive_orderby'      => 'date',
            'project_content_number'       => '20',

            // project single layout 
            'project_layout'               => 'full-width',
            'project_padding_top'          => 110,
            'project_padding_bottom'       => 120,
            'project_breadcrumb'           => 0,
            'project_banner'               => 1,
            'project_bgtype'               => 'bgcolor',
            'project_bgimg'                => '',
            'project_bgcolor'              => '#707173',
            'project_single_arc_style'     => 'style1',
            'project_inner_padding_top'    => '',
            'project_inner_padding_bottom' => '',
            'project_sidebar'              => '',

            'project_single_btn'            => '',
            'project_single_btn_txt'        => 'Contact Us',
            'project_single_btn_url'        => '#',

            'related_project'             => 1,
            'related_project_title'       => 'Related Project',
            'related_project_count'       => 6,
			
			// Shop page
			'shop_layout' => 'full-width',
			'shop_sidebar' => '',
			'shop_padding_top' => '120',
			'shop_padding_bottom' => '120',
			'shop_banner' => 1,
			'shop_breadcrumb' => 0,
			'shop_bgtype' => 'bgcolor',
			'shop_bgimg' => '',			
			'shop_bgcolor' => '#707173',
			'shop_inner_padding_top' => '',
			'shop_inner_padding_bottom' => '',			
			'wc_shop_quickview_icon' => 1,
			'wc_product_quickview_icon' => 1,
			'wc_shop_wishlist_icon' => 1,
			'wc_product_wishlist_icon' => 1,			
			'quickview' => 1,
			'wishlist' => 1,
			'products_cols_width' => 4,
			'products_per_page' => 9,
                  'shopheader_opt' => '',
                  'shop_footer_area' => '',
			
			// Shop Details
			'product_layout' => 'full-width',
			'product_sidebar' => '',
			'product_padding_top' => 120,
			'product_padding_bottom' => 120,
			'product_inner_padding_top' => '',
			'product_inner_padding_bottom' => '',
			'product_banner' => 1,
			'product_breadcrumb' => 0,
			'product_bgtype' => 'bgcolor',
			'product_bgimg' => '',
			'product_bgcolor' => '#707173',
			'wc_product_compare_icon' => 1,


            // Search layout
            'search_layout'               => 'full-width',
            'search_padding_top'          => 110,
            'search_padding_bottom'       => 120,
            'search_breadcrumb'           => 0,
            'search_banner'               => 1,
            'search_bgtype'               => 'bgcolor',
            'search_bgimg'                => '',
            'search_bgcolor'              => '#707173',
            'search_inner_padding_top'    => '',
            'search_inner_padding_bottom' => '',
            'search_archive_sidebar'      => '',
            'search_sidebar'              => '',

            // Search layout 
            'error_layout'                => 'full-width',
            'error_padding_top'           => 110,
            'error_padding_bottom'        => 120,
            'error_breadcrumb'            => 0,
            'error_banner'                => 1,
            'error_bgtype'                => 'bgcolor',
            'error_bgimg'                 => '',
            'error_bgcolor'               => '#707173',
            'error_inner_padding_top'     => '',
            'error_inner_padding_bottom'  => '',
            'error_sidebar'               => '',
            'error_title'                 => 'Page Title',
            'error_buttontext'            => 'GO TO HOME PAGE',
            'error_text1'                 => 'OOPS! THAT PAGE CAN’T BE FOUND.',
            'error_text2'                 => 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.',


            'typo_body'   => json_encode(
                array(
                    'font'          => 'Roboto',
                    'regularweight' => 'normal',

                )
            ),
            'typo_body_size'   => '16px',
            'typo_body_height' => '28px',


            'typo_h1'        => json_encode(
                array(
                    'font'          => 'Inter',
                    'regularweight' => '800',

                )
            ),
            'typo_h1_size'   => '46px',
            'typo_h1_height' => '54px',


            'typo_h2'        => json_encode(
                array(
                    'font'          => 'Inter',
                    'regularweight' => '800',

                )
            ),
            'typo_h2_size'   => '36px',
            'typo_h2_height' => '46px',


            'typo_h3'        => json_encode(
                array(
                    'font'          => 'Inter',
                    'regularweight' => '800',

                )
            ),
            'typo_h3_size'   => '28px',
            'typo_h3_height' => '38px',



            'typo_h4'        => json_encode(
                array(
                    'font'          => 'Inter',
                    'regularweight' => '800',

                )
            ),
            'typo_h4_size'   => '22px',
            'typo_h4_height' => '32px',


            'typo_h5'        => json_encode(
                array(
                    'font'          => 'Inter',
                    'regularweight' => '800',

                )
            ),
            'typo_h5_size'   => '18px',
            'typo_h5_height' => '28px',


            'typo_h6'        => json_encode(
                array(
                    'font'          => 'Inter',
                    'regularweight' => '700',

                )
            ),
            'typo_h6_size'   => '16px',
            'typo_h6_height' => '26px',
          

        );

        return apply_filters('rttheme_customizer_defaults', $customizer_defaults);
    }
}


/**
 * Check if certain plugins are active
 *
 * @param string Plugin name to check
 * @return boolean
 * @since Roofix 1.0
 *
 */
if (!function_exists('rttheme_rtispluginactive')) {
    function rttheme_rtispluginactive($plugin)
    {
        $return_val = false;

        switch (strtolower($plugin)) {
            case 'woocommerce':
                if (class_exists('WooCommerce')) {
                    $return_val = true;
                }
                break;
            case 'elementor':
                if (class_exists('Elementor\Plugin')) {
                    $return_val = true;
                }
                break;

            default:
                $return_val = false;
        }

        return $return_val;
    }
}

/**
 * Return a string containing the default footer credits & link
 *
 * @return string Footer credits & link
 * @since Roofix 1.0
 *
 */
if (!function_exists('rttheme_get_credits_default')) {
    function rttheme_get_credits_default()
    {
        $output = '';
        $output = sprintf('<p style="text-align: center;">%1$s <a href="%2$s" title="%3$s">%4$s</a> &amp; <a href="%5$s" title="%6$s">%7$s</a></p>',
                          esc_html__('Proudly powered by', 'roofix'),
                          esc_url(esc_html__('http://wordpress.org', 'roofix')),
                          esc_attr(esc_html__('Semantic Personal Publishing Platform', 'roofix')),
                          esc_html__('WordPress', 'roofix'),
                          esc_url(esc_html__('http://radiustheme.com', 'roofix')),
                          esc_attr(esc_html__('Radius  Themes', 'roofix')),
                          esc_html__('Radius theme ', 'roofix')
        );

        return $output;
    }
}
