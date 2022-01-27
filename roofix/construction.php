<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;

$rdtheme_light_logo  = empty( RDTheme::$options['under_construction_page_logo']['url'] ) ? Helper::get_img( 'logo-large.png' ) : RDTheme::$options['under_construction_page_logo']['url'];
$rdtheme_socials                = Helper::socials();
$under_construction_title_text  = RDTheme::$options['under_construction_title_text'];
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php echo esc_attr(get_bloginfo('charset')) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="wrapper">
        <?php
        // Preloader
        if (RDTheme::$options['preloader']) {
            if (!empty(RDTheme::$options['preloader_image']['url'])) {
                $preloader_img = RDTheme::$options['preloader_image']['url'];
                echo '<div id="preloader" style="background-image:url(' . esc_url($preloader_img) . ');"></div>';
            }else{
                echo '<div id="preloader" style="background-image:url(' . Helper::get_img( 'preloader.gif' ) . ');"></div>';
            }
        }
        ?>
        <section class="comingsoon-page">
            <div class="comingsoon-bg">
                <div class="comingsoon-back-img">
                    <img src="<?php echo esc_url(RDTheme::$options['under_construction_page_image']['url']); ?>" alt="<?php esc_attr_e( 'Coming Soon', 'roofix' );?>">
                </div>
            </div>
            <div class="comingsoon-content-wrap">
                <div class="comingsoon-content">
                    <div class="comingsoon-logo">
                        <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $rdtheme_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
                    </div>
                    <h1><?php  echo wp_kses_post($under_construction_title_text);?></h1>
                    <div class="countdown-layout1">
                        <?php
                            $countdown_time             = strtotime( '1/1/2022' );
                            $options_countdown_time     = strtotime( RDTheme::$options['under_construction_tc_date'] );
                            $countdown_time        = empty($options_countdown_time)? $countdown_time : $options_countdown_time;
                            $date                       = date('Y/m/d', $countdown_time);
                        ?>
                        <div class="idcountdown" data-countdown="<?php echo esc_attr( $date ) ?>"></div>
                    </div>
                    <div class="comingsoon-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="comingsoon-social">
                                        <ul>
                                        <?php if ( RDTheme::$options['social_icon'] ): ?>
                                            <?php if (  !empty($rdtheme_socials)): ?>
                                                     <li class="social-icon">
                                                            <?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
                                                                <a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>"><i class="fab <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i></a>
                                                            <?php endforeach; ?>
                                                        </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="comingsoon-copy-right">
                                        <p><?php echo wp_kses_post( RDTheme::$options['copyright_text'] );?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Coming Soon Page Area End Here -->
    </div>
<?php wp_footer();?>
</body>
</html>