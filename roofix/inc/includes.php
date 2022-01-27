<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

require_once ROOFIX_THEME_INC_DIR . 'helper-traits/utility-trait.php';
require_once ROOFIX_THEME_INC_DIR . 'helper-traits/layout-trait.php';
require_once ROOFIX_THEME_INC_DIR . 'helper-traits/layout-trait.php';

require_once ROOFIX_THEME_INC_DIR . 'helper-traits/lc-helper.php';
require_once ROOFIX_THEME_INC_DIR . 'helper-traits/lc-utility.php';

require_once ROOFIX_THEME_INC_DIR . 'helper-traits/data-trait.php';
require_once ROOFIX_THEME_INC_DIR . 'helper-traits/image-trait.php';
require_once ROOFIX_THEME_INC_DIR . 'helper-traits/resource-load-trait.php';
require_once ROOFIX_THEME_INC_DIR . 'helper-traits/custom-query-trait.php';
require_once ROOFIX_THEME_INC_DIR . 'helper-traits/icon-trait.php';
require_once ROOFIX_THEME_INC_DIR . 'pcore/socials.php';
require_once ROOFIX_THEME_INC_DIR . 'pcore/author-social.php';
require_once ROOFIX_THEME_INC_DIR . 'helper.php';

Helper::requires( 'class-tgm-plugin-activation.php' );
Helper::requires( 'tgm-config.php' );
Helper::requires( 'rdtheme.php' );
Helper::requires( 'general.php' );
Helper::requires( 'scripts.php' );
Helper::requires( 'layout-settings.php' );
Helper::requires( 'customizer/customizer-int.php' );


if ( class_exists( 'WooCommerce' ) ) {
  Helper::requires( 'custom/functions.php', 'woocommerce' );
}

