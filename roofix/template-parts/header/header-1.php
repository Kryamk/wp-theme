<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

$nav_menu_args          = Helper::nav_menu_args();
$offcanvas_menu_args    = Helper::offcanvas_menu_args();

$rdtheme_dark_logo      = empty(  RDTheme::$options['logo'] ) ? '<img alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo_dark']['id'],'full');

$rdtheme_light_logo     = empty(  RDTheme::$options['logo_light'] ) ? '<img src="'.Helper::get_img( 'logo-dark.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo_light']['id'],'full');


$rdtheme_logo_width     = (int) RDTheme::$options['logo_width'];

if ( RDTheme::$options['header_phone'] ){
  $rdtheme_menu_width = 12 - $rdtheme_logo_width;
  $rdtheme_logo_class = "col-sm-{$rdtheme_logo_width}";
  $rdtheme_menu_class = "col-sm-{$rdtheme_menu_width}";
}else{
  $rdtheme_menu_width = 12 - $rdtheme_logo_width;
  $rdtheme_logo_class = "col-sm-{$rdtheme_logo_width}";
  $rdtheme_menu_class = "col-sm-{$rdtheme_menu_width}";
}

$logo       = empty( RDTheme::$options['logo_dark']['url'] ) ? '<img src="'.Helper::get_img( 'logo-dark.png' ).'">' : wp_get_attachment_image(RDTheme::$options['logo_dark']['id'],'full');

?>

<div id="masthead-container" class="rt-header-menu menu-layout1 header-layout-unit">
  <div class="container">
    <div class="row no-gutters d-flex align-items-center">
      <div class="<?php echo esc_html( $rdtheme_logo_class ) ;?>">
        <div class="site-branding logo-selector">
          <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses_post( $rdtheme_dark_logo );?></a>
          <a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses_post( $rdtheme_light_logo );?></a>
        </div>
      </div>
      <div class="<?php echo esc_html( $rdtheme_menu_class ) ;?>">
        <div id="site-navigation" class="main-navigation">
          <?php wp_nav_menu( $nav_menu_args );?>
        </div>
      </div>
    </div>
  </div>
</div>