<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

/*-------------------------------------
INDEX
=======================================
#. Defaults
-------------------------------------*/
$roofix 				  = ROOFIX_THEME_PREFIX_VAR;
$typo_body  			  = json_decode( RDTheme::$options['typo_body'], true );
$typo_h1                  = json_decode( RDTheme::$options['typo_h1'], true );
$typo_h2                  = json_decode( RDTheme::$options['typo_h2'], true );
$typo_h3                  = json_decode( RDTheme::$options['typo_h3'], true );
$typo_h4                  = json_decode( RDTheme::$options['typo_h4'], true );
$typo_h5                  = json_decode( RDTheme::$options['typo_h5'], true );
$typo_h6                  = json_decode( RDTheme::$options['typo_h6'], true );

/*-------------------------------------
#. Typography
---------------------------------------*/
?>

body, ul li {
	font-family: '<?php echo esc_html( $typo_body['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( RDTheme::$options['typo_body_size'] ) ?>;
	line-height: <?php echo esc_html( RDTheme::$options['typo_body_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_body['regularweight'] ) ?>;
	font-style: normal;

}

h1 {
	font-family: '<?php echo esc_html( $typo_h1['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( RDTheme::$options['typo_h1_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h1_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_h1['regularweight'] ); ?>;
	font-style: normal;
}

h2 {
	font-family: '<?php echo esc_html( $typo_h2['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( RDTheme::$options['typo_h2_size'] ); ?>;
	line-height: <?php echo esc_html( RDTheme::$options['typo_h2_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_h2['regularweight'] ); ?>;
	font-style: normal;
}

h3 {
	font-family: '<?php echo esc_html( $typo_h3['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( RDTheme::$options['typo_h3_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h3_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_h3['regularweight'] ); ?>;
	font-style: normal;
}

h4 {
	font-family: '<?php echo esc_html( $typo_h4['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( RDTheme::$options['typo_h4_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h4_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_h4['regularweight'] ); ?>;
	font-style: normal;
}
h5 {
	font-family: '<?php echo esc_html( $typo_h5['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( RDTheme::$options['typo_h5_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h5_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_h5['regularweight'] ); ?>;
	font-style: normal;
}
h6 {
	font-family: '<?php echo esc_html( $typo_h6['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( RDTheme::$options['typo_h6_size'] ); ?>;
	line-height: <?php echo esc_html(  RDTheme::$options['typo_h6_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_h6['regularweight'] ); ?>;
	font-style: normal;
}
