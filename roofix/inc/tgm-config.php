<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

class TGM_Config {

	public $roofix = ROOFIX_THEME_PREFIX;
	public $path   = ROOFIX_THEME_PLUGINS_DIR;
	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );
	}
	public function register_required_plugins(){
		$plugins = array(
			// Bundled
			array(
				'name'         => 'Roofix Core',
				'slug'         => 'roofix-core',
				'source'       => 'roofix-core.zip',
				'required'     =>  true,
				'version'      => '1.5.3'
			),
			array(
				'name'         => 'RT Framework',
				'slug'         => 'rt-framework',
				'source'       => 'rt-framework.zip',
				'required'     =>  true,
				'version'      => '2.4'
			),
			array(
				'name'         => 'RT Demo Importer',
				'slug'         => 'rt-demo-importer',
				'source'       => 'rt-demo-importer.zip',
				'required'     =>  false,
			    'version'      => '4.1'
			),
			array(
				'name'         => 'Slider Revolution',
				'slug'         => 'revslider',
				'source'       => 'revslider.zip',
				'required'     => false,
				'version'      => '6.5.4'

			),
			// Repository
			array(
				'name'     => 'Breadcrumb NavXT',
				'slug'     => 'breadcrumb-navxt',
				'required' => true,
			),

			array(
				'name'     => 'Elementor Page Builder',
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce',
				'required' => false,
			),
			array(
				'name'     => 'YITH WooCommerce Quick View',
				'slug'     => 'yith-woocommerce-quick-view',
				'required' => false,
			),
			array(
				'name'     => 'YITH WooCommerce Compare',
				'slug'     => 'yith-woocommerce-compare',
				'required' => false,
			),
			array(
				'name'     => 'YITH WooCommerce Wishlist',
				'slug'     => 'yith-woocommerce-wishlist',
				'required' => false,
			),
			array(
				'name'     => 'MailChimp for WordPress',
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			),
			array(
				'name'     => 'Contact Form 7',
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => 'WP Retina 2x',
				'slug'     => 'wp-retina-2x',
				'required' => false,
			),

		);

		$config = array(
			'id'           => $this->roofix,            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => $this->path,              // Default absolute path to bundled plugins.
			'menu'         => $this->roofix . '-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}
new TGM_Config;