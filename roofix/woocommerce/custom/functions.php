<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
use radiustheme\roofix\RDTheme;
use radiustheme\roofix\Helper;

class WC_Functions {

	protected static $instance = null;

	public function __construct() {
		/* Theme supports for WooCommerce */
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );

		/* ====== Shop/Archive Wrapper ====== */
		// Remove
		add_filter( 'woocommerce_show_page_title',        '__return_false' );
		remove_action( 'woo_main_before',                 'woo_display_breadcrumbs', 10 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar', 10 );
		remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
		remove_action( 'woocommerce_after_shop_loop',     'woocommerce_pagination', 10 );
		// Add
		add_action( 'woocommerce_before_main_content',     array( $this, 'wrapper_start' ), 10 );
		add_action( 'woocommerce_after_main_content',      array( $this, 'wrapper_end' ), 10 );
		add_action( 'loop_shop_per_page',                  array( $this, 'roofix_loop_shop_per_page' ), 20 );
		add_action( 'woocommerce_after_shop_loop',         array( $this, 'roofix_products_paginations' ), 10 );
		// Columns
		add_filter( 'loop_shop_columns',                    array( $this, 'loop_shop_columns' ) );
		add_filter( 'woocommerce_get_image_size_thumbnail', array( $this, 'roofix_product_imgae_size' ) );
		add_filter( 'woocommerce_get_image_size_single', array( $this, 'roofix_single_product_imgae_size' ) );
		add_filter( 'woocommerce_get_image_size_gallery_thumbnail', array( $this, 'roofix_product_thumbnail_imgae_size' ) );

		/* Yith Wishlist */
		if ( function_exists( 'YITH_WCWL_Frontend' ) && class_exists( 'YITH_WCWL_Ajax_Handler' )  ) {
			$wishlist_init = YITH_WCWL_Frontend();
			remove_action( 'wp_head',                                   array( $wishlist_init, 'add_button' ) );
			add_action( 'wp_ajax_roofix_add_to_wishlist',                array( $this, 'add_to_wishlist' ) );
			add_action( 'wp_ajax_nopriv_roofix_add_to_wishlist',         array( $this, 'add_to_wishlist' ) );
		}

		/* ====== Shop/Details ====== */
		remove_action( 'woocommerce_product_description_heading',  '__return_null' );
		remove_action( 'woocommerce_after_single_product_summary',  'woocommerce_upsell_display', 15 );
		// Single Product Layout
		add_action( 'init', array( $this, 'single_product_layout_hooks' ) );

		/* ====== Checkout Page ====== */
		add_filter( 'woocommerce_checkout_fields', array( $this, 'roofix_checkout_fields' ) );
	}


	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function theme_support() {
		add_theme_support( 'woocommerce',
			array(
				// 'gallery_thumbnail_image_width' => 150,
			)
		);
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_post_type_support( 'product', 'page-attributes' );
	}

	public function wrapper_start() {
		self::get_custom_template_part( 'shop-header' );
	}

	public function wrapper_end() {
		self::get_custom_template_part( 'shop-footer' );
	}

	public function loop_shop_columns(){
		$cols = RDTheme::$options['products_cols_width'];
		return $cols;
	}

	public function roofix_product_imgae_size( $size ) {
		return array(
			'width' => 370,
			'height' => 450,
			'crop' => 1,
		);
	}
	public function roofix_product_thumbnail_imgae_size( $size ) {
		return array(
			'width' => 155,
			'height' => 157,
			'crop' => 0,
		);
	}

	public function roofix_single_product_imgae_size( $size ) {
		return array(
			'width' => 450,
			'height' => 515,
			'crop' => 1,
		);
	}

	public function roofix_products_paginations(){
		Helper::pagination();
	}

	// Template Loader
	public static function get_template_part( $template, $args = array() ){
		extract( $args );

		$template = '/' . $template . '.php';

		if ( file_exists( get_stylesheet_directory() . $template ) ) {
			$file = get_stylesheet_directory() . $template;
		}
		else {
			$file = get_template_directory() . $template;
		}

		require $file;
	}
	public static function get_custom_template_part( $template, $args = array() ){
		$template = 'woocommerce/custom/template-parts/' . $template;
		self::get_template_part( $template, $args );
	}

	/* = Single Page
	=============================================================================*/
	public function single_product_layout_hooks() {
		// Remove Action
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
		// Add Action
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 5 );
		add_action( 'woocommerce_single_product_summary', array( $this, 'single_socials_share' ), 5 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		add_action( 'woocommerce_single_product_summary', array( $this, 'single_wishlist_compare' ), 40 );

		// Add to cart button
		add_action( 'woocommerce_before_add_to_cart_button', array( $this, 'add_to_cart_button_wrapper_start' ), 3 );
		add_action( 'woocommerce_after_add_to_cart_button',  array( $this, 'add_to_cart_button_wrapper_end' ), 90 );
	}

	public function single_socials_share(){
		echo '<div class="product-single-social-shares-btns">';
		self::roofix_product_social_share();
		echo '</div>';
	}
	public function single_wishlist_compare(){
		echo '<div class="wistlist-compare-box">';
		self::print_add_to_wishlist_icon();
		self::print_compare_icon();
		echo '</div>';
	}

	public function add_to_cart_button_wrapper_start(){
		echo '<div class="single-add-to-cart-wrapper">';
	}

	public function add_to_cart_button_wrapper_end(){
		echo '</div>';
	}

	/* = Shop Page
	=============================================================================*/
	public static function get_product_thumbnail( $product, $thumb_size = 'woocommerce_thumbnail' ) {
		$thumbnail   = $product->get_image( $thumb_size, array(), false );
		if ( !$thumbnail ) {
			$thumbnail = wc_placeholder_img( $thumb_size );
		}
		return $thumbnail;
	}

	public static function get_product_thumbnail_link( $product, $thumb_size = 'woocommerce_thumbnail' ) {
		return '<a href="'.esc_attr( $product->get_permalink() ).'">'.self::get_product_thumbnail( $product, $thumb_size ).'</a>';
	}

	public static function print_quickview_icon( $icon = true, $text = false ){
		if ( !function_exists( 'YITH_WCQV_Frontend' ) ) {
			return false;
		}

		if ( is_shop() && !RDTheme::$options['wc_shop_quickview_icon'] ) {
			return false;
		}

		if ( is_product() && !RDTheme::$options['wc_product_quickview_icon'] ) {
			return false;
		}

		global $product;

		$html = '';

		if ( $icon ) {
			$html .= '<i class="far fa-eye"></i>';
		}

		if ( $text ) {
			$html .= '<span>' . esc_html__( 'QuickView', 'roofix' ) . '</span>';
		}

		?>
		<a href="#" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>" title="<?php esc_attr_e( 'QuickView', 'roofix' ); ?>"><?php echo wp_kses_post( $html ); ?></a>
		<?php
	}

	public static function print_add_to_cart_icon( $product_id, $icon = true, $text = true ){
		global $product;
		$quantity = 1;
		$class = implode( ' ', array_filter( array(
			'action-cart',
			'product_type_' . $product->get_type(),
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
		) ) );

		$html = '';

		$product_cart_id = WC()->cart->generate_cart_id( $product_id );
	    $in_cart = WC()->cart->find_product_in_cart( $product_cart_id );

		 if ( $in_cart ) {
	    	if ( $icon ) {
				$html .= '<i class="fas fa-check"></i>';
			}
			if ( $text ) {
				$html .= '<span>Already in cart</span>';
			}
		} else {
			if ( $icon ) {
				$html .= '<i class="fas fa-shopping-cart"></i>';
			}

			if ( $text ) {
				$html .= '<span>' . $product->add_to_cart_text() . '</span>';
			}
		}

	    if ( $in_cart ) {
			echo sprintf( '<a rel="nofollow" title="%s" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s">' . $html . '</a>',
				esc_attr( $product->add_to_cart_text() ),
				esc_url( wc_get_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() )
			);
		} else {
			echo sprintf( '<a rel="nofollow" title="%s" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">' . $html . '</a>',
				esc_attr( $product->add_to_cart_text() ),
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() ),
				esc_attr( isset( $class ) ? $class : 'action-cart' )
			);
		}
	}

    public function roofix_loop_shop_per_page( $products ) {
        // Return the number of products you wanna show per page.
        $shop_posts_per_page = RDTheme::$options['products_per_page'];
        if (!empty($shop_posts_per_page)) {
           $products = $shop_posts_per_page;
        } else {
            $products = '9';
        }
        return $products;
    }

	public static function roofix_product_social_share(){

		$url   = urlencode( get_permalink() );
		$title = urlencode( get_the_title() );

		$defaults = array(
			'facebook' => array(
				'url'  => "http://www.facebook.com/sharer.php?u=$url",
				'icon' => 'fab fa-facebook-f',
				'class' => 'bg-fb'
			),
			'twitter'  => array(
				'url'  => "https://twitter.com/intent/tweet?source=$url&text=$title:$url",
				'icon' => 'fab fa-twitter',
				'class' => 'bg-twitter'
			),
			'linkedin' => array(
				'url'  => "http://www.linkedin.com/shareArticle?mini=true&url=$url&title=$title",
				'icon' => 'fab fa-linkedin-in',
				'class' => 'bg-linked'
			),
			'pinterest'=> array(
				'url'  => "http://pinterest.com/pin/create/button/?url=$url&description=$title",
				'icon' => 'fab fa-pinterest-square',
				'class' => 'bg-pinterst'
			),
		);

		foreach ( $defaults as $key => $value ) {
			if ( !$value ) {
				unset( $defaults[$key] );
			}
		}

		$sharers = apply_filters( 'rdtheme_social_sharing_icons', $defaults );

		?>
		<div class="post-share-btn">
			<h5 class="item-label"><?php esc_html_e( 'Share:', 'roofix-core' );?></h5>
			<div class="post-social-sharing">
				<ul class="item-social">
					<?php foreach ( $sharers as $key => $sharer ){ ?>
		            <li>
		            	<a href="<?php echo esc_url( $sharer['url'] );?>" class="<?php echo esc_attr( $sharer['class'] );?>">
		            		<i class="<?php echo esc_attr( $sharer['icon'] );?>"></i>
		            	</a>
		            </li>
		            <?php } ?>
		        </ul>
			</div>
		</div>

	<?php }

	public static function print_compare_icon( $icon = true, $text = true ){
		if ( !class_exists( 'YITH_Woocompare' ) ) {
			return false;
		}

		if ( is_shop() && !RDTheme::$options['wc_shop_compare_icon'] ) {
			return false;
		}

		if ( is_product() && !RDTheme::$options['wc_product_compare_icon'] ) {
			return false;
		}

		global $product;
		global $yith_woocompare;
		$id  = $product->get_id();
		$url = method_exists( $yith_woocompare->obj, 'add_product_url' ) ? $yith_woocompare->obj->add_product_url( $id ) : '';

		$html = '';

		if ( $icon ) {
			$html .= '<i class="fas fa-random"></i>';
		}

		if ( $text ) {
			$html .= '<span>' . esc_html__( 'Compare', 'roofix' ) . '</span>';
		}

		?>
		<a href="<?php echo esc_url( $url );?>" class="compare" data-product_id="<?php echo esc_attr( $id );?>" title="<?php esc_attr_e( 'Add To Compare', 'roofix' ); ?>"><?php echo wp_kses_post( $html ); ?></a>
		<?php
	}

	// Wishlist
	public static function print_add_to_wishlist_icon( $icon = true, $text = false ){
		if ( !defined( 'YITH_WCWL' ) ) {
			return false;
		}

		if ( is_shop() && !RDTheme::$options['wc_shop_wishlist_icon'] ) {
			return false;
		}

		if ( is_product() && !RDTheme::$options['wc_product_wishlist_icon'] ) {
			return false;
		}

		self::get_custom_template_part( 'wishlist-icon', compact( 'icon', 'text' ) );
	}


	public function add_to_wishlist() {
		check_ajax_referer( 'roofix_wishlist_nonce', 'nonce' );
		\YITH_WCWL_Ajax_Handler::add_to_wishlist();
		wp_die();
	}

	public static function get_stock_status() {
		global $product;
		return $product->is_in_stock() ? esc_html__( 'In Stock', 'roofix' ) : esc_html__( 'Out of Stock', 'roofix' );
	}

	// WooCommerce Checkout Fields Hook
    public function roofix_checkout_fields( $fields ) {
        $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
        $fields['billing']['billing_first_name']['label'] = false;
        $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
        $fields['billing']['billing_last_name']['label'] = false;

        $fields['billing']['billing_company']['placeholder'] = 'Company Name';
        $fields['billing']['billing_company']['label'] = false;

        $fields['billing']['billing_country']['placeholder'] = 'Country';
        $fields['billing']['billing_country']['label'] = 'Select Your Country';

        $fields['billing']['billing_address_1']['placeholder'] = 'Street Address';
        $fields['billing']['billing_address_1']['label'] = false;
        $fields['billing']['billing_address_2']['placeholder'] = 'Apartment, Unite ( optional )';
        $fields['billing']['billing_address_2']['label'] = false;

        $fields['billing']['billing_city']['placeholder'] = 'Town / City';
        $fields['billing']['billing_city']['label'] = false;

        $fields['billing']['billing_state']['placeholder'] = 'County';
        $fields['billing']['billing_state']['label'] = false;

        $fields['billing']['billing_postcode']['placeholder'] = 'Post Code / Zip';
        $fields['billing']['billing_postcode']['label'] = false;

        $fields['billing']['billing_email']['placeholder'] = 'Email Address';
        $fields['billing']['billing_email']['label'] = false;

        $fields['billing']['billing_phone']['placeholder'] = 'Phone';
        $fields['billing']['billing_phone']['label'] = false;

        return $fields;
    }


}

WC_Functions::instance();
