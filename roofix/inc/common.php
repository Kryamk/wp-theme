<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

$roofix 			= ROOFIX_THEME_PREFIX_VAR;
$primary_color    	= apply_filters( "{$roofix}_primary_color", RDTheme::$options['primary_color'] ); 
$primary_rgb      	= Helper::hex2rgb( $primary_color ); // 255,190,0

$typo_body  			  = json_decode( RDTheme::$options['typo_body'], true );
$typo_h1                  = json_decode( RDTheme::$options['typo_h1'], true );
$typo_h2                  = json_decode( RDTheme::$options['typo_h2'], true );
$typo_h3                  = json_decode( RDTheme::$options['typo_h3'], true );
$typo_h4                  = json_decode( RDTheme::$options['typo_h4'], true );
$typo_h5                  = json_decode( RDTheme::$options['typo_h5'], true );
$typo_h6                  = json_decode( RDTheme::$options['typo_h6'], true );
?>
