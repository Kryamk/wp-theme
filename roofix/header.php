<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="wrapper" class="wrapper">
        <?php
		if( !empty( RDTheme::$options['preloader_image'] ) ) {
			$f1_bg = wp_get_attachment_image_src( RDTheme::$options['preloader_image'], 'full', true );
			$footer_bg_img = $f1_bg[0];
		}else {
			$footer_bg_img = Helper::get_img( 'preloader.gif' );
		}

        if (RDTheme::$options['preloader']) {
            if (!empty($footer_bg_img)) {
                echo '<div id="preloader" style="background-image:url(' . esc_url($footer_bg_img) . ');"></div>';
            }else{
                echo '<div id="preloader" style="background-image:url(' . $footer_bg_img . ');"></div>';
            }
        }
        ?>
        <div id="page" class="site site-wrp">
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e('Skip to content', 'roofix'); ?></a>
            <?php get_template_part('template-parts/content', 'menu');?>
            <div id="content" class="site-content">
                <?php get_template_part('template-parts/content', 'banner');?>
