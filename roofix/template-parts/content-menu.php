<?php
/**
 * @author  RadiusTheme
 * @since   1.3.4
 * @version 1.3.4
 */

namespace radiustheme\roofix;

if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'header' ) ) {
	return;
}

 if ( RDTheme::$header_area == 1 || RDTheme::$header_area === 'on' ){ ?>
    <?php
    if (RDTheme::$header_style != '3') {
        if (RDTheme::$options['mobile_header_style'] == 2) {
            get_template_part('template-parts/header/header-top', 'mobile');
        }
    }
    ?>
    <?php
        if ( RDTheme::$header_style == '2' ) {
            if ( RDTheme::$top_bar != '0' && RDTheme::$top_bar != 'off' ) {
                get_template_part('template-parts/header/header-top', RDTheme::$top_bar_style);
            }
        }
        ?>
    <header id="masthead" class="site-header header">
        <?php
        if ( RDTheme::$header_style != '1' && RDTheme::$header_style != '2' ) {
            if ( RDTheme::$top_bar != '0' && RDTheme::$top_bar != 'off' ) {
                get_template_part('template-parts/header/header-top', RDTheme::$top_bar_style);
            }
        }
        get_template_part('template-parts/header/header', RDTheme::$header_style);
        ?>
    </header>
    <?php get_template_part('template-parts/header/header', 'offscreen');?>

<?php } ?>