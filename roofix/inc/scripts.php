<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */

namespace radiustheme\roofix;
use \WP_Query;
use Elementor\Plugin;


	class Scripts {

		public $roofix  = ROOFIX_THEME_PREFIX;
		public $version = ROOFIX_THEME_VERSION;
		public function __construct() {

			add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 12 );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );
			add_action( 'admin_enqueue_scripts',array( $this, 'admin_conditional_scripts' ), 1 );

	}
	/**
	 * Maintenance Mode
	 */
	function under_construction_mode_enable( $template ) {
	   $new_template = locate_template( array( 'construction.php' ) );
	   if ( Helper::is_under_construction_mode()  && '' != $new_template ) {
	     return $new_template;
	   } else {
	     return $template;
	   }
	 }


	public function register_scripts(){

		/* Deregister */
		wp_deregister_style( 'font-awesome' );
		wp_deregister_style( 'layerslider-font-awesome' );

		wp_register_style( 'animate',                   		Helper::maybe_rtl( 'animate.min' ), array(), $this->version );

		// Slider
		wp_register_style( 'magnific-popup',            		Helper::get_css( 'magnific-popup' ), array(), $this->version );
		wp_register_script( 'elevatezoom',            			Helper::get_js( 'jquery.elevatezoom' ), array(), $this->version );

		/*JS*/

		// Isotope
		wp_register_script( 'isotope-pkgd',             		Helper::get_js( 'isotope.pkgd.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'imagesloaded',             		Helper::get_js( 'imagesloaded.pkgd.min' ), array( 'jquery' ), $this->version, true );
		// Counter
		wp_register_script( 'waypoints',                		Helper::get_js( 'waypoints.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'jquery-knob',                		Helper::get_js( 'jquery.knob' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'jquery-appear',                	Helper::get_js( 'jquery.appear' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'jquery-counterup',             	Helper::get_js( 'jquery.counterup.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'jquery-magnific-popup',        	Helper::get_js( 'jquery.magnific-popup.min' ), array( 'jquery' ), $this->version );
		wp_register_style(  'select2',            				Helper::get_css( 'select2.min' ), array(), $this->version );
		wp_register_script( 'select2',           				Helper::get_js( 'select2.min' ), array( 'jquery' ), $this->version );
		wp_register_script( 'countdown',              			Helper::get_js( 'jquery.countdown.min' ), array( 'jquery' ), $this->version );
	}

	public function enqueue_scripts() {
		// Bootstrap
		wp_enqueue_style( 'bootstrap',                   Helper::maybe_rtl( 'bootstrap.min' ), array(), $this->version );
		wp_enqueue_style( 'elementor-rtl',                   Helper::get_css( 'style' ), array(), $this->version );
		wp_enqueue_style( 'flaticon',                	 Helper::get_font_css( 'flaticon' ), array(), $this->version );
		wp_enqueue_style( 'roofix-rtl',                   Helper::maybe_rtl( 'style' ), array(), $this->version );
		wp_enqueue_style( 'animate');
		// Conditional Scripts
		$this->conditional_scripts();
        // Font-awesome
		wp_enqueue_style( 'roofix-font-awesome',         Helper::get_css( 'all.min' ), array(), $this->version );
		// Style
		wp_enqueue_style( $this->roofix . '-style',      Helper::get_css( 'style' ), array(), $this->version );
		if(is_rtl()){
			wp_enqueue_style( $this->roofix . '-rtlcss',      Helper::get_css( 'rtl' ), array(), $this->version );
		}
		// Dynamic style
		$this->dynamic_style();
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// popper js
		wp_enqueue_script( 'popper',                   	 Helper::get_js( 'popper' ), array(), $this->version );
		// bootstrap js
		wp_enqueue_script( 'bootstrap',                  Helper::get_js( 'bootstrap.min' ), array( 'jquery' ), $this->version, true );
		// Nav smooth scroll
		wp_enqueue_script( 'navpoints',                 Helper::get_js( 'jquery.navpoints' ), array( 'jquery' ), $this->version, true );

		wp_enqueue_script( 'js-cookie',                  Helper::get_js( 'js.cookie.min' ), array( 'jquery' ), $this->version, true );
		// sticky-sidebar js
		wp_enqueue_script( 'resizeSensor',            	Helper::get_js( 'ResizeSensor.min' ), array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'theia-sticky-sidebar',      Helper::get_js( 'theia-sticky-sidebar.min' ), array( 'jquery' ), $this->version, true );
		wp_enqueue_style(  'magnific-popup');
			wp_enqueue_script( 'jquery-magnific-popup' );
		// Main js
		wp_enqueue_script( 'slick' );
		wp_enqueue_script( $this->roofix . '-main',      Helper::get_js( 'main' ), array( 'jquery' ), $this->version, true );

		if ( Helper::is_under_construction_mode() ) {
			wp_enqueue_script('countdown');
		}
		$this->elementor_scripts();
		// Localization

		get_template_part( 'template-parts/header/mobile', 'btn' );
		$adminajax 		= esc_url( admin_url('admin-ajax.php') );
		$localize_data  = array(
			'ajaxurl'	   => $adminajax,
			'day'	       => esc_html__('Day' , 'roofix'),
			'hour'	       => esc_html__('Hour' , 'roofix'),
			'minute'       => esc_html__('Minute' , 'roofix'),
			'second'       => esc_html__('Second' , 'roofix'),
			'extraOffset'  => RDTheme::$options['sticky_menu'] ? 75 : 0,
			'extraOffsetMobile' => RDTheme::$options['sticky_menu'] ? 52 : 0,
			'rt_mobile_holder'  => '.offscreen-navigation .menu',
			'rt_offscreen_holder' => '.offscreen-navigation .menu',
			'nonce' => wp_create_nonce( 'roofix-nonce' )
		);
		wp_localize_script( $this->roofix . '-main', 'RoofixObj', $localize_data );
	}

	private function conditional_scripts(){
		wp_enqueue_style( $this->roofix . '-gfonts',     $this->fonts_url(), array(), $this->version ); // Google fonts
	}

	public function fonts_url() {

		$fonts_url 	= '';
		$bodyFont 	= 'Roboto';
		$bodyFW 	= '400,500,600,700';

		$h1Font = 'Inter';
		$h2Font = 'Inter';
		$h3Font = 'Inter';
		$h4Font = 'Inter';
		$h5Font = 'Inter';
		$h6Font = 'Inter';

		$body_font  = json_decode( RDTheme::$options['typo_body'], true );
		$bodyFont = $body_font['font'];
		$bodyFontW = $body_font['regularweight'];
		$h1_font  = json_decode( RDTheme::$options['typo_h1'], true );
		$h1Font = $h1_font['font'];
		$h1FontW = $h1_font['regularweight'];
		$h2_font  = json_decode( RDTheme::$options['typo_h2'], true );
		$h2Font = $h2_font['font'];
		$h2FontW = $h2_font['regularweight'];
		$h3_font  = json_decode( RDTheme::$options['typo_h3'], true );
		$h3Font = $h3_font['font'];
		$h3FontW = $h3_font['regularweight'];
		$h4_font  = json_decode( RDTheme::$options['typo_h4'], true );
		$h4Font = $h4_font['font'];
		$h4FontW = $h4_font['regularweight'];
		$h5_font  = json_decode( RDTheme::$options['typo_h5'], true );
		$h5Font = $h5_font['font'];
		$h5FontW = $h5_font['regularweight'];
		$h6_font  = json_decode( RDTheme::$options['typo_h6'], true );
		$h6Font = $h6_font['font'];
		$h6FontW = $h6_font['regularweight'] .',400,500,600';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'roofix' ) ) {
			$font_families = array();
			if ( 'off' !== $bodyFont )
				$font_families[] = $bodyFont.':'.$bodyFW;
			if ( 'off' !== $h1Font )
				$font_families[] = $h1Font.':'.$h1FontW;
			if ( 'off' !== $h2Font )
				$font_families[] = $h2Font.':'.$h2FontW;
			if ( 'off' !== $h3Font )
				$font_families[] = $h3Font.':'.$h3FontW;
			if ( 'off' !== $h4Font )
				$font_families[] = $h4Font.':'.$h4FontW;
			if ( 'off' !== $h5Font )
				$font_families[] = $h5Font.':'.$h5FontW;
			if ( 'off' !== $h6Font )
				$font_families[] = $h6Font.':'.$h6FontW;
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'display' => urlencode( 'fallback' ),
			);
			$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
		}

		return esc_url_raw( $fonts_url );
	}

	public function admin_conditional_scripts(){

		wp_enqueue_style( 'roofix-font-awesome',        Helper::get_css( 'all.min' ), array(), $this->version );
		wp_enqueue_style( 'flaticon',                	Helper::get_font_css( 'flaticon' ), array(), $this->version );
		$cpt = ROOFIX_THEME_CPT_PREFIX;
		wp_enqueue_style( $this->roofix . '-gfonts',     $this->fonts_url(), array(), $this->version ); // admin Google fonts
		if (is_rtl()){
			wp_enqueue_style('rttheme-rtl-admin', Helper::get_admin_css('rtl-admin'), array(), $this->version);
		}
		wp_enqueue_media();
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('rttheme-widget-color', Helper::get_admin_js('rttheme-widget-color.js'), array('jquery', 'wp-color-picker'), $this->version, true);
		wp_enqueue_script('rttheme-admin-main', Helper::get_admin_js('admin.main'), array('jquery'), $this->version, true);


	}
	public function elementor_scripts() {
		if ( !did_action( 'elementor/loaded' ) ) {
			return;
		}
		if ( Plugin::$instance->preview->is_preview_mode() ) {

			wp_enqueue_style(  'bootstrap');
			wp_enqueue_script( 'bootstrap' );
			wp_enqueue_style(  'animate');
			wp_enqueue_style(  'magnific-popup');
			wp_enqueue_script( 'jquery-magnific-popup' );
			wp_enqueue_script( 'isotope-pkgd' );
			wp_enqueue_script( 'imagesloaded' );
			wp_enqueue_script( 'jquery-counterup' );
			wp_enqueue_script( 'popper');
			wp_enqueue_script( 'sticky-kit' );
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_script( 'countdown' );
			wp_enqueue_script( 'jquery-knob' );
			wp_enqueue_script( 'jquery-appear' );
		}
	}
	private function dynamic_style(){
		$dynamic_css  = $this->template_style();
		ob_start();
		Helper::requires( 'dynamic-style.php' );
		$dynamic_css .= ob_get_clean();
		$dynamic_css  = $this->minified_css( $dynamic_css );
		wp_register_style( $this->roofix . '-dynamic', false );
		wp_enqueue_style( $this->roofix . '-dynamic' );
		wp_add_inline_style( $this->roofix . '-dynamic', $dynamic_css );
	}

	private function minified_css( $css ) {
		/* remove comments */
		$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
		/* remove tabs, spaces, newlines, etc. */
		$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $css );
		return $css;
	}

	private function template_style(){
		$style = '';

		if ( RDTheme::$bgtype == 'bgcolor' ) {
			$style .= '.entry-banner{background-color: ' . RDTheme::$bgcolor . '}';
		}
		else {
			$style .= '.entry-banner{background-image: url(' . RDTheme::$bgimg . ')}';
		}

		if ( RDTheme::$padding_top == '0px') {
			$style .= '.content-area {padding-top:'. RDTheme::$padding_top . ';}';
		}else {
			$style .= '.content-area {padding-top:'. RDTheme::$padding_top . 'px;}
			@media all and (max-width: 1199px) {.content-area {padding-top:110px;}}
			@media all and (max-width: 991px) {.content-area {padding-top:100px;}}
			@media all and (max-width: 767px) {.content-area {padding-top:90px;}}';
		}

		if ( RDTheme::$padding_bottom == '0px') {
			$style .= '.content-area {padding-bottom:'. RDTheme::$padding_bottom . ';}';
		}else {
			$style .= '.content-area {padding-bottom:'. RDTheme::$padding_bottom . 'px;}
			@media all and (max-width: 1199px) {.content-area {padding-bottom:110px;}}
			@media all and (max-width: 991px) {.content-area {padding-bottom:100px;}}
			@media all and (max-width: 767px) {.content-area {padding-bottom:80px;}}';
		}
		if ( RDTheme::$inner_padding_top) {
			$style .= '.entry-banner .inner-page-banner {padding-top:'. RDTheme::$inner_padding_top . 'px;}';
			$style .= '.trheader .entry-banner .inner-page-banner {padding-top:'. RDTheme::$inner_padding_top . 'px;}';

		}
		if ( RDTheme::$inner_padding_bottom) {
			$style .= '.entry-banner .inner-page-banner {padding-bottom:'. RDTheme::$inner_padding_bottom . 'px;}';
			$style .= '.trheader .entry-banner .inner-page-banner {padding-bottom:'. RDTheme::$inner_padding_bottom . 'px;}';
		}
		return $style;
	}

}
new Scripts;