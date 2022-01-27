<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

define( __NAMESPACE__ . '\NS',    __NAMESPACE__ . '\\' );

$theme_data = wp_get_theme( get_template() );
define( NS . 'ROOFIX_THEME_VERSION',     ( WP_DEBUG ) ? time() : $theme_data->get( 'Version' ) );
define( NS . 'ROOFIX_THEME_AUTHOR_URI',  $theme_data->get( 'AuthorURI' ) );
define( NS . 'ROOFIX_THEME_PREFIX',      'roofix' );
define( NS . 'ROOFIX_THEME_PREFIX_VAR',  'roofix' );
define( NS . 'ROOFIX_WIDGET_PREFIX',     'roofix' );
define( NS . 'ROOFIX_THEME_CPT_PREFIX',  'roofix' );


//define('ROOFIX_THEME_BASE_DIR',  'roofix' );

// DIR
define( NS . 'ROOFIX_THEME_BASE_DIR',    get_template_directory(). '/' );
define( NS . 'ROOFIX_THEME_INC_DIR',     ROOFIX_THEME_BASE_DIR . 'inc/' );
define( NS . 'ROOFIX_THEME_VIEW_DIR',    ROOFIX_THEME_INC_DIR . 'views/' );
define( NS . 'ROOFIX_THEME_PLUGINS_DIR', ROOFIX_THEME_BASE_DIR  . 'inc/plugin-bundle/' );