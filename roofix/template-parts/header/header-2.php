<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
$nav_menu_args = Helper::nav_menu_args();
$rdtheme_socials = Helper::socials();
$offcanvas_menu_args = Helper::offcanvas_menu_args();

$rdtheme_dark_logo      = empty(  RDTheme::$options['logo'] ) ? '<img width="489" height="121" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo'],'full');

$rdtheme_light_logo     = empty(  RDTheme::$options['logo'] ) ? '<img width="489" height="121" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-light.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo_light'],'full');

$rdtheme_dark_logo_off  =empty(  RDTheme::$options['logo'] ) ? '<img width="489" height="121" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark-2x.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo'],'full');

$rdtheme_logo_width = (int) RDTheme::$options['logo_width'];
if ( RDTheme::$options['header_phone'] ){
  $rdtheme_menu_width = 9 - $rdtheme_logo_width;
  $rdtheme_logo_class = "col-sm-{$rdtheme_logo_width}";
  $rdtheme_menu_class = "col-sm-{$rdtheme_menu_width}";
}else{
  $rdtheme_menu_width = 12 - $rdtheme_logo_width;
  $rdtheme_logo_class = "col-sm-{$rdtheme_logo_width}";
  $rdtheme_menu_class = "col-sm-{$rdtheme_menu_width}";
}
?>

<div class="overly-sidebar-wrapper">
  <div class="overly-sidebar-content">
    <button id="sidebar-close" class="circle-btn primary-btn"><i class="fas fa-times"></i></button>
   <div class="offcanvas-content">
        <div class="offcanvas-content-wrp">
            <div class="sidebar-about">
               <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
                  <?php echo wp_kses_post( $rdtheme_dark_logo_off );?>
                </a>
            </div>

               <h3 class="sub-off-title"><?php echo wp_kses_post( RDTheme::$options['offcanvas_content_title'] );?></h3>
              <p class="offcanvas-short-content"><?php echo wp_kses_post( RDTheme::$options['offcanvas_content'] );?></p>
              <h3 class="sub-off-title"><?php echo wp_kses_post( RDTheme::$options['offcanvas_address_label'] );?></h3>
               <div class="offcanvas-list">
                    <span><i class="fas fa-map-marker-alt"></i> <?php echo wp_kses_post( RDTheme::$options['offcanvas_address'] );?></span>
                    <span><i class="fas fa-phone-alt"></i> <?php echo wp_kses_post( RDTheme::$options['phone'] );?></span>
                    <span><i class="fas fa-envelope"></i> <?php echo wp_kses_post( RDTheme::$options['email'] );?></span>

                      <?php if (  !empty($rdtheme_socials)): ?>
               <h3 class="sub-off-title"><?php echo wp_kses_post( RDTheme::$options['social_label'] );?></h3>
                 <div class="social-icon-off">
                    <?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
                        <a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>">
                            <i class="fab <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
             <?php endif; ?>
                </div>

          </div>
        </div>
  </div>
</div>
<div id="masthead-container" class="rt-header-menu menu-layout1 pd-header-200">
  <div class="container-fluid">
    <div class="row no-gutters d-flex align-items-center">
      <div class="<?php echo esc_html( $rdtheme_logo_class ) ;?>">
        <div class="site-branding logo-selector">
          <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
            <?php echo wp_kses_post( $rdtheme_dark_logo );?>
          </a>
          <a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
            <?php echo wp_kses_post( $rdtheme_light_logo );?>
          </a>
        </div>
      </div>
      <div class="<?php echo esc_html( $rdtheme_menu_class ) ;?>">
        <div id="site-navigation" class="main-navigation">
          <?php wp_nav_menu( $nav_menu_args );?>
        </div>
      </div>
        <?php if ( RDTheme::$options['header_phone'] || RDTheme::$options['header_phone']  ): ?>
          <div class="col-lg-3 col-md-3 d-none d-lg-block menu-1v2">
            <?php if ( RDTheme::$options['header_phone']): ?>
            <div class="header-phone-btn">
              <span><?php echo esc_attr( RDTheme::$options['phone_label'] );?></span>
                  <div class="phone-number">
                    <i class="fas fa-phone-alt"></i>
                    <?php echo esc_attr( RDTheme::$options['phone'] );?>
                  </div>
            </div>
          <?php endif; ?>
          <?php if ( RDTheme::$options['header_phone']  ): ?>
            <div class="header-two-btn text-right fadeIn">
              <button type="button" class="sidebarBtn circle-btn offcanvas-menu-btn">
                <span class="btn-icon-wrap">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
              </button>
            </div>
          <?php endif; ?>
          </div>
        <?php endif; ?>
    </div>
  </div>
</div>


