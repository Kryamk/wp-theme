<?php
//namespace radiustheme\roofix;

/**
 * Set our Customizer default options
 *
 * @return array    Customizer defaults
 * @since Roofix 1.0
 *
 */
use radiustheme\roofix\Helper;
Helper::requires( 'customizer/customizer-defaults.php' );
Helper::requires( 'customizer/customizer-color.php' );
Helper::requires( 'customizer/custom-controls.php');
Helper::requires( 'customizer/customizer.php');
Helper::requires( 'customizer/sanitization.php');
Helper::requires( 'customizer/typography/typography-controls.php');
Helper::requires( 'customizer/typography/typography-customizer.php');