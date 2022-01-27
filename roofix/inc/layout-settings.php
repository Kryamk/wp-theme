<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

	class Layouts {

		public $roofix = ROOFIX_THEME_PREFIX;
		public $cpt    = ROOFIX_THEME_CPT_PREFIX;
		public function __construct() {
			add_action( 'template_redirect', array( $this, 'layout_settings' ) );
		}
		public function layout_settings() {
			// Single Pages
			if( is_single() || is_page() ) {
				$post_type = get_post_type();
				$post_id   = get_the_id();
				switch( $post_type ) {
					case 'page':
					$roofix = 'page';
					break;
					case 'post':
					$roofix = 'single_post';
					break;
					case "{$this->cpt}_team":
					$roofix = 'team';
					RDTheme::$options[$roofix . '_layout'] = 'full-width';
					break;
					case "{$this->cpt}_services":
					$roofix = 'services';
					//RDTheme::$options[$roofix . '_layout'] = 'full-width';
					break;
					case "{$this->cpt}_projects":
					$roofix = 'project';
					//RDTheme::$options[$roofix . '_layout'] = 'full-width';
					break;
					case 'product':
					$roofix = 'product';
					break;
					default:
					$roofix = 'single_post';
					break;
				}

				$layout         = get_post_meta( $post_id, "{$this->cpt}_layout", true );
				$sidebar        = get_post_meta( $post_id, "{$this->cpt}_sidebar", true );
				$top_bar        = get_post_meta( $post_id, "{$this->cpt}_top_bar", true );
				$top_bar_style  = get_post_meta( $post_id, "{$this->cpt}_top_bar_style", true );
				$tr_header      = get_post_meta( $post_id, "{$this->cpt}_tr_header", true );
				$header_style   = get_post_meta( $post_id, "{$this->cpt}_header", true );
				$header_area    = get_post_meta( $post_id, "{$this->cpt}_header_opt", true );
				$footer_style   = get_post_meta( $post_id, "{$this->cpt}_footer", true );
				$footer_area    = get_post_meta( $post_id, "{$this->cpt}_footer_area", true );
				$padding_top    = get_post_meta( $post_id, "{$this->cpt}_top_padding", true );
				$padding_bottom = get_post_meta( $post_id, "{$this->cpt}_bottom_padding", true );
				$has_banner     = get_post_meta( $post_id, "{$this->cpt}_banner", true );
				$has_breadcrumb = get_post_meta( $post_id, "{$this->cpt}_breadcrumb", true );
				$bgtype         = get_post_meta( $post_id, "{$this->cpt}_banner_type", true );
				$bgcolor        = get_post_meta( $post_id, "{$this->cpt}_banner_bgcolor", true );
				$bgimg          = get_post_meta( $post_id, "{$this->cpt}_banner_bgimg", true );

				$inner_padding_top    = get_post_meta( $post_id, "{$this->cpt}_inner_padding_top", true );
				$inner_padding_bottom = get_post_meta( $post_id, "{$this->cpt}_inner_padding_bottom", true );

				$single_services_layout = get_post_meta( $post_id, "{$this->cpt}_single_services_arc_style", true );
				$single_project_layout  = get_post_meta( $post_id, "{$this->cpt}_single_project_arc_style", true );

				RDTheme::$single_services_layout = ( empty( $single_services_layout ) || $single_services_layout == 'default' ) ?
				RDTheme::$options['services_single_arc_style'] : $single_services_layout;

				RDTheme::$single_project_layout = ( empty( $single_project_layout ) || $single_project_layout == 'default' ) ?
				RDTheme::$options['services_single_arc_style'] : $single_project_layout;

				RDTheme::$layout 			= ( empty( $layout ) || $layout == 'default' ) ? RDTheme::$options[$roofix . '_layout'] : $layout;

				RDTheme::$sidebar 			= ( empty( $sidebar ) || $sidebar == 'default' ) ? RDTheme::$options[$roofix . '_sidebar'] : $sidebar;

				RDTheme::$tr_header 		= ( empty( $tr_header ) || $tr_header == 'default' ) ? RDTheme::$options['tr_header'] : $tr_header;

				RDTheme::$top_bar = ( empty( $top_bar ) || $top_bar == 'default' ) ? RDTheme::$options['top_bar'] : $top_bar;
				RDTheme::$top_bar_style = ( empty( $top_bar_style ) || $top_bar_style == 'default' ) ? RDTheme::$options['top_bar_style'] : $top_bar_style;
				RDTheme::$header_style 		= ( empty( $header_style ) || $header_style == 'default' ) ? RDTheme::$options['header_style'] : $header_style;

				RDTheme::$header_area 		= ( empty( $header_area ) || $header_area == 'default' ) ? RDTheme::$options['header_opt'] : $header_area;

				RDTheme::$footer_style 		= ( empty( $footer_style ) || $footer_style == 'default' ) ? RDTheme::$options['footer_style'] : $footer_style;
				RDTheme::$footer_area 		= ( empty( $footer_area ) || $footer_area == 'default' ) ? RDTheme::$options['full_footer_area'] : $footer_area;

				$padding_top          		= ( empty( $padding_top ) || $padding_top == 'default' ) ? RDTheme::$options[$roofix . '_padding_top'] : $padding_top;
				RDTheme::$padding_top 		= (int) $padding_top;
				$padding_bottom          	= ( empty( $padding_bottom ) || $padding_bottom == 'default' ) ? RDTheme::$options[$roofix . '_padding_bottom'] : $padding_bottom;
				RDTheme::$padding_bottom 	= (int) $padding_bottom;
				$inner_padding_top          		= ( empty( $inner_padding_top ) || $inner_padding_top == 'default' ) ? RDTheme::$options[$roofix . '_inner_padding_top'] : $inner_padding_top;
				RDTheme::$inner_padding_top 		= (int) $inner_padding_top;

				$inner_padding_bottom          	= ( empty( $inner_padding_bottom ) || $inner_padding_bottom == 'default' ) ? RDTheme::$options[$roofix . '_inner_padding_bottom'] : $inner_padding_bottom;
				RDTheme::$inner_padding_bottom 	= (int) $inner_padding_bottom;
				RDTheme::$has_banner 		= ( empty( $has_banner ) || $has_banner == 'default' ) ? RDTheme::$options[$roofix . '_banner'] : $has_banner;
				RDTheme::$has_breadcrumb 	= ( empty( $has_breadcrumb ) || $has_breadcrumb == 'default' ) ? RDTheme::$options[$roofix . '_breadcrumb'] : $has_breadcrumb;
				RDTheme::$bgtype 			= ( empty( $bgtype ) || $bgtype == 'default' ) ? RDTheme::$options[$roofix . '_bgtype'] : $bgtype;

				RDTheme::$bgcolor 			= empty( $bgcolor ) ? RDTheme::$options[$roofix . '_bgcolor'] : $bgcolor;

				if( !empty( $bgimg ) ) {
					$attch_url      = wp_get_attachment_image_src( $bgimg, 'full', true );
					RDTheme::$bgimg = $attch_url[0];
				}
				elseif( !empty( RDTheme::$options[$roofix . '_bgimg']) ) {
					$attch_url      = wp_get_attachment_image_src( RDTheme::$options[$roofix . '_bgimg'], 'full', true );
					RDTheme::$bgimg = $attch_url[0];
				}
				else {
					RDTheme::$bgimg = Helper::get_img( 'banner.jpg' );
				}
				if ( !is_active_sidebar( 'sidebar' ) ){
					RDTheme::$layout = 'full-width';
				}
			}

			// Blog and Archive
			elseif( is_home() || is_archive() || is_search() || is_404() ) {
				if( is_search() ) {
					$roofix = 'search';
				}
				elseif( is_404() ) {
					$roofix = 'error';
					RDTheme::$options[$roofix . '_layout'] = 'full-width';
				}
				elseif( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
					$roofix = 'shop';
				}
				elseif( is_post_type_archive( "{$this->cpt}_team" ) || is_tax( "{$this->cpt}_team_category" ) ) {
					$roofix = 'team_archive';
				}
				elseif( is_post_type_archive( "{$this->cpt}_services" ) || is_tax( "{$this->cpt}_services_category" ) ) {
					$roofix = 'services_archive';
				}
				elseif( is_post_type_archive( "{$this->cpt}_projects" ) || is_tax( "{$this->cpt}_projects_category" ) ) {
					$roofix = 'project_archive';
				}
				else {
					$roofix = 'blog';
				}

				RDTheme::$layout         		= RDTheme::$options[$roofix . '_layout'];
				RDTheme::$sidebar        		= RDTheme::$options[$roofix . '_sidebar'];
				RDTheme::$tr_header      		= RDTheme::$options['tr_header'];
				RDTheme::$top_bar        		= RDTheme::$options['top_bar'];
				RDTheme::$top_bar_style  		= RDTheme::$options['top_bar_style'];
				RDTheme::$header_style   		= RDTheme::$options['header_style'];
				RDTheme::$header_area        	= RDTheme::$options[$roofix . 'header_opt'];
				RDTheme::$footer_style   		= RDTheme::$options['footer_style'];
				RDTheme::$footer_area    		= RDTheme::$options[$roofix . '_footer_area'];
				RDTheme::$padding_top    		= RDTheme::$options[$roofix . '_padding_top'];
				RDTheme::$padding_bottom 		= RDTheme::$options[$roofix . '_padding_bottom'];
				RDTheme::$has_banner     		= RDTheme::$options[$roofix . '_banner'];
				RDTheme::$has_breadcrumb 		= RDTheme::$options[$roofix . '_breadcrumb'];
				RDTheme::$bgtype         		= RDTheme::$options[$roofix . '_bgtype'];
				RDTheme::$bgcolor        		= RDTheme::$options[$roofix . '_bgcolor'];
				RDTheme::$inner_padding_top   	= RDTheme::$options[$roofix . '_inner_padding_top'];
				RDTheme::$inner_padding_bottom 	= RDTheme::$options[$roofix . '_inner_padding_bottom'];

				RDTheme::$header_area 		= ( empty( $header_area ) || $header_area == 'default' ) ? RDTheme::$options['header_opt'] : $header_area;
				RDTheme::$footer_area 		= ( empty( $footer_area ) || $footer_area == 'default' ) ? RDTheme::$options['full_footer_area'] : $footer_area;


				if( !empty( RDTheme::$options[$roofix . '_bgimg']) ) {
					$attch_url      = wp_get_attachment_image_src( RDTheme::$options[$roofix . '_bgimg'], 'full', true );
					RDTheme::$bgimg = $attch_url[0];
				} else {
					RDTheme::$bgimg = Helper::get_img( 'banner.jpg' );
				}
				if ( !is_active_sidebar( 'sidebar' ) ){
					RDTheme::$layout = 'full-width';
				}
			}
		}
	}
new Layouts;
