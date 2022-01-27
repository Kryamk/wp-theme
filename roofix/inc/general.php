<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

class General_Setup {

	public function __construct() {

		add_action( 'after_setup_theme',                       		array( $this, 'theme_setup' ) );
		add_action( 'widgets_init',                            		array( $this, 'register_sidebars' ) );
		add_filter( 'body_class',                              		array( $this, 'body_classes' ) );
		add_action( 'wp_head',                                 		array( $this, 'noscript_hide_preloader' ), 1 );
		add_action( 'wp_footer',                               		array( $this, 'scroll_to_top_html' ), 1 );
		add_filter( 'get_search_form',                         		array( $this, 'search_form' ) );
		add_filter( 'comment_form_fields',                     		array( $this, 'move_textarea_to_bottom' ) );
		add_filter( 'excerpt_more',                            		array( $this, 'excerpt_more' ) );
		add_filter( 'elementor/widgets/wordpress/widget_args', 		array( $this, 'elementor_widget_args' ) );
		add_action( 'pre_get_posts',                           		array( $this, 'wp_team_query' ), 999);
		add_action( 'pre_get_posts',                           		array( $this, 'wp_projects_query' ), 999);
		add_action( 'pre_get_posts',                           		array( $this, 'wp_services_query' ), 999);
		add_action( 'wp_head',                                 		array( $this, 'roofix_pingback_header' ), 999);
		add_filter( 'wp_kses_allowed_html', 				   		array( $this, 'roofix_kses_allowed_html' ), 10, 2);
		add_action( 'template_redirect',                       		array( $this, 'w3c_validator' ) );
		add_action( 'elementor/theme/register_locations',           array( $this, 'elementor_register_locations' ) );

	}


public function rt_hex_to_rgb( $color, $opacity = false ) {

	  if ( empty( $color ) ) {
	    return false;
	  }

	  if ( '#' === $color[0] ) {
	    $color = substr( $color, 1 );
	  }

	  if ( 6 === strlen( $color ) ) {
	    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	  } elseif ( 3 === strlen( $color ) ) {
	    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	  } else {
	    $default                 = \Go\Core\get_default_color_scheme();
	    $avaliable_color_schemes = get_available_color_schemes();
	    if ( isset( $avaliable_color_schemes[ $default ] ) && isset( $avaliable_color_schemes[ $default ]['primary'] ) ) {
	      $default = $avaliable_color_schemes[ $default ]['primary'];
	    }
	    return $default;
	  }

	  $rgb = array_map( 'hexdec', $hex );

	  if ( $opacity ) {
	    if ( abs( $opacity ) > 1 ) {
	      $opacity = 1.0;
	    }

	    $output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';

	  } else {

	    $output = 'rgb(' . implode( ',', $rgb ) . ')';

	  }
	  return esc_attr( $output );
}



public function w3c_validator() {
/*----------------------------------------------------------------------------------------------------*/
/*  W3C validator passing code
/*----------------------------------------------------------------------------------------------------*/
   ob_start( function( $buffer ){
       $buffer = str_replace( array( '<script type="text/javascript">', "<script type='text/javascript'>" ), '<script>', $buffer );
       return $buffer;
   });
   ob_start( function( $buffer2 ){
       $buffer2 = str_replace( array( "<script type='text/javascript' src" ), '<script src', $buffer2 );
       return $buffer2;
   });
   ob_start( function( $buffer3 ){
       $buffer3 = str_replace( array( 'type="text/css"', "type='text/css'", 'type="text/css"', ), '', $buffer3 );
       return $buffer3;
   });
   ob_start( function( $buffer4 ){
       $buffer4 = str_replace( array( '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"', ), '<iframe', $buffer4 );
       return $buffer4;
   });
	ob_start( function( $buffer5 ){
       $buffer5 = str_replace( array( 'aria-required="true"', ), '', $buffer5 );
       return $buffer5;
   });
}


  /*Allow HTML for the kses post*/
	public function roofix_kses_allowed_html($tags, $context) {
		switch($context) {
			case 'social':
				$tags = array(
					'a' => array('href' => array()),
					'b' => array()
				);
				return $tags;
			case 'alltext_allow':
				$tags = array(
					'a' => array(
						'class' => array(),
						'href'  => array(),
						'rel'   => array(),
						'title' => array(),
						'target' => array(),
					),
					'abbr' => array(
						'title' => array(),
					),
					'b' => array(),
					'br' => array(),
					'blockquote' => array(
						'cite'  => array(),
					),
					'cite' => array(
						'title' => array(),
					),
					'code' => array(),
					'del' => array(
						'datetime' => array(),
						'title' => array(),
					),
					'dd' => array(),
					'div' => array(
						'class' => array(),
						'title' => array(),
						'style' => array(),
						'id' 	=> array(),
					),
					'dl' => array(),
					'dt' => array(),
					'em' => array(),
					'h1' => array(),
					'h2' => array(),
					'h3' => array(),
					'h4' => array(),
					'h5' => array(),
					'h6' => array(),
					'i' => array(),
					'img' => array(
						'alt'    => array(),
						'class'  => array(),
						'height' => array(),
						'src'    => array(),
						'srcset' => array(),
						'width'  => array(),
					),
					'li' => array(
						'class' => array(),
					),
					'ol' => array(
						'class' => array(),
					),
					'p' => array(
						'class' => array(),
					),
					'q' => array(
						'cite' => array(),
						'title' => array(),
					),
					'span' => array(
						'class' => array(),
						'title' => array(),
						'style' => array(),
					),
					'strike' => array(),
					'strong' => array(),
					'ul' => array(
						'class' => array(),
					),
				);
				return $tags;
			default:
				return $tags;
		}
	}

	/**
	* Add a pingback url auto-discovery header for single posts, pages, or attachments.
	*/

	public function roofix_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );

		}
	}

	public function wp_team_query( $query ) {
		if ( ! is_admin() ) {
				if ( is_post_type_archive( "roofix_team" ) || is_tax( "roofix_team_category" ) ) {
				 $query->set( 'posts_per_page', RDTheme::$options['team_archive_number']);
				}
			}
		}

	public function wp_projects_query( $query ) {
		if ( ! is_admin() ) {
				if ( is_post_type_archive( "roofix_projects" ) || is_tax( "roofix_projects_category" ) ) {
				 $query->set( 'posts_per_page', RDTheme::$options['project_archive_number']);
				}
			}
		}
	public function wp_services_query( $query ) {
		if ( ! is_admin() ) {
			if ( is_post_type_archive( "roofix_services" ) || is_tax( "roofix_services_category" ) ) {
			 $query->set( 'posts_per_page', RDTheme::$options['services_archive_number']);
			}
		}
	}

	public function theme_setup() {
		$roofix = ROOFIX_THEME_PREFIX;

		// Theme supports
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'wp-block' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'woocommerce' );
		add_editor_style();

		// for gutenberg support
		add_theme_support( 'align-wide' );


		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => __( 'Primary to Secondary', 'roofix' ),
					'gradient' => 'linear-gradient(135deg, ' . esc_attr( General_Setup::rt_hex_to_rgb( '#ee212b' ) ) . ' 0%, ' .  General_Setup::rt_hex_to_rgb( '#082c4b' ) . ' 100%)',
					'slug'     => 'primary-to-secondary',
				),
				array(
					'name'     => __( 'Primary to Tertiary', 'roofix' ),
					'gradient' => 'linear-gradient(135deg, ' . esc_attr( General_Setup::rt_hex_to_rgb( '#ee212b' ) ) . ' 0%, ' .  General_Setup::rt_hex_to_rgb( '#ee212b' ) . ' 100%)',
					'slug'     => 'primary-to-tertiary',
				),
				array(
					'name'     => __( 'Secondary to Tertiary', 'roofix' ),
					'gradient' => 'linear-gradient(135deg, ' . esc_attr( General_Setup::rt_hex_to_rgb( '#082c4b' ) ) . ' 0%, ' .  General_Setup::rt_hex_to_rgb( '#ee212b' ) . ' 100%)',
					'slug'     => 'secondary-to-tertiary',
				),
				array(
					'name'     => __( 'Tertiary to Primary', 'roofix' ),
					'gradient' => 'linear-gradient(135deg, ' . esc_attr( General_Setup::rt_hex_to_rgb( '#ee212b' ) ) . ' 0%, ' .  General_Setup::rt_hex_to_rgb('#ee212b' ) . ' 100%)',
					'slug'     => 'tertiary-to-primary',
				),
			)
		);


		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Primary', 'roofix' ),
				'slug'  => 'roofix-primary',
				'color' => '#ee212b',
			),
			array(
				'name'  => esc_html__('Secondary', 'roofix' ),
				'slug'  => 'roofix-secondary',
				'color' => '#082c4b',
			),
			array(
				'name'  => esc_html__('Gray', 'roofix' ),
				'slug'  => 'roofix-gray',
				'color'  => '#646464',
			),
			array(
				'name'  => esc_html__('Dark', 'roofix' ),
				'slug'  => 'roofix-dark',
				'color'  => '#111111',
			),
			array(
				'name'  => esc_html__('Light', 'roofix' ),
				'slug'  => 'roofix-light',
				'color' => '#fff',
			),
		) );
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__('Small', 'roofix' ),
				'size'  => 12,
				'slug'  => 'small'
			),
			array(
				'name'  => esc_html__('Normal', 'roofix' ),
				'size'  => 16,
				'slug'  => 'normal'
			),
			array(
				'name'  => esc_html__('Large', 'roofix' ),
				'size'  => 30,
				'slug'  => 'large'
			),
			array(
				'name'  => esc_html__('Huge', 'roofix' ),
				'size'  => 36,
				'slug'  => 'huge'
			)
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles');

	    add_image_size( "roofix-size-1", 			    1200,   700, true );  // blog single (large)
	    add_image_size( "roofix-size-2", 			    952,   	460, true );  // Icon image
		add_image_size( "roofix-size-3", 			    475,   	460, true );
		add_image_size( "roofix-size-3b", 			    920,   	484, true );  // blog
		add_image_size( "roofix-size-4", 			    230,   	224, true );  // Related Project
		add_image_size( "roofix-size-5", 			    570,   	706, true );  // Related Project
		add_image_size( "roofix-size-6", 			    520,   	350, true );  // blog

		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'roofix' ),
			'topright' => esc_html__( 'Header Right', 'roofix' ),
			'offcanvas' => esc_html__( 'Offcanvas Menu', 'roofix' ),
		) );
	}

	public function register_sidebars() {
			$footer_widget_titles = array(
			'1' => esc_html__( 'Footer 1', 'roofix' ),
			'2' => esc_html__( 'Footer 2', 'roofix' ),
			'3' => esc_html__( 'Footer 3', 'roofix' ),
			'4' => esc_html__( 'Footer 4', 'roofix' ),
			'6' => esc_html__( 'Footer 6', 'roofix' ),
		);
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'roofix' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s single-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'MailChimp', 'roofix' ),
			'id'            => 'footer-mailchimp',
			'before_widget' => '<div id="%1$s" class="widgets %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Shop Sidebar', 'roofix' ),
				'id'            => 'woo-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>',
			) );
		}

		for ( $i = 1; $i <= RDTheme::$options['footer_column']; $i++ ) {
			if (isset($footer_widget_titles[$i])) {
				register_sidebar( array(
					'name'          => $footer_widget_titles[$i],
					'id'            => 'footer-'. $i,
					'before_widget' => '<div id="%1$s" class="widgets footer-box-layout1 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="footer-title"><h3 class="widget-title ">',
					'after_title'   => '</h3></div>',
				) );
			}
		}
	}


	public function body_classes( $classes ) {
    	// Header
		$classes[] = 'non-stick';
	    $blogtemplates = array( 'blog-1', 'blog-2', 'blog-3', 'blog-4' ); // add your custom template in array

	    if ( is_page_template('templates/blog.php' ) ) {
	        $classes[] = 'manik-templates-class'; // add your class here
	    }

		if ( RDTheme::$options['sticky_header'] == '1' && RDTheme::$options['sticky_header'] != 'off' ) {
			$classes[] = 'has-sticky-menu';
		}else{
			$classes[] = 'non-sticky-menu';
		}

		$classes[] = 'header-style-'. RDTheme::$header_style;

		if ( RDTheme::$tr_header == '1'  && RDTheme::$tr_header != 'off' ){
			$classes[] = 'trheader';
		}else{
			$classes[] = 'non-trheader';
		}

		if (RDTheme::$options['search_icon'] && RDTheme::$options['cart_icon'] ) {
			$classes[] = 'cartoff';
		}else{
			$classes[] = 'carton';

		}
        // Sidebar
		$classes[] = ( RDTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';

        // WooCommerce
		if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
			$classes[] = 'product-list-view';
		} else {
			$classes[] = 'product-grid-view';
		}

		return $classes;
	}




	public function noscript_hide_preloader(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}

	public function scroll_to_top_html(){
		// Back-to-top link
		if ( RDTheme::$options['back_to_top'] ){
		echo '<a href="#wrapper" data-type="section-switch" class="scrollup back-top">
			<i class="fas fa-angle-double-up"></i>
		</a>';
		}
	}

	public function search_form(){
		$output = '
		<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<div class="widget widget-search-box">
			<div class="input-group stylish-input-group">
			    	<input type="text" class="search-query form-control" placeholder="' . esc_attr__( 'Search Keywords ...', 'roofix' ) . '" value="' . get_search_query() . '" name="s" />
			    <span class="input-group-addon">
			        <button class="btn" type="submit">
			            <span class="fas fa-search" aria-hidden="true"></span>
			        </button>
			    </span>
			</div>
		</div>
		</form>
		';
		return $output;
	}

	public function move_textarea_to_bottom( $fields ) {
		$temp = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $temp;
		return $fields;
	}

	public function excerpt_more() {
		return esc_html__( '...', 'roofix' ) ;
	}

	function elementor_widget_args( $args ) {
		$args['before_widget'] = '<div class="widget single-sidebar padding-bottom1">';
		$args['after_widget']  = '</div>';
		$args['before_title']  = '<h3>';
		$args['after_title']   = '</h3>';
		return $args;
	}

	function elementor_register_locations( $elementor_theme_manager ) {
		$elementor_theme_manager->register_location( 'header' );
		$elementor_theme_manager->register_location( 'footer' );
	}

}
new General_Setup;