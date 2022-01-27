<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */
namespace radiustheme\roofix;

/**
 * Maintenance Mode
 */
add_action( 'template_include', 'under_construction_mode_enable', 999 );

function under_construction_mode_enable( $template ) {


    $enable = ( isset( RDTheme::$option['under_construction_mode_enable'] ) ) ? RDTheme::$option['under_construction_mode_enable'] : 'off' ;

    $enable = isset( $_GET['emm'] ) ? '1' : $enable;

    if ( is_user_logged_in() || 'off' === $enable ) {
        return $template;
    }

    $maintenance_mode = true;

    if( !$maintenance_mode ) {
        return $template;
    }

    $new_template = locate_template( array( 'construction.php' ) );
    if ( '' != $new_template ) {
        return $new_template;
    }

    return $template;

}


