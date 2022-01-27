<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;

$rdtheme_socials = Helper::socials();
$nav_menu_args   = Helper::offcanvas_menu_args();

// Logo
$rdtheme_dark_logo  = empty(  Helper::rt_the_custom_logo() ) ? Helper::get_img( 'logo-dark.png' ) :  Helper::rt_the_custom_logo();
$rdtheme_light_logo = empty(  Helper::rt_the_custom_logo() ) ? Helper::get_img( 'logo-light.png' ) :  Helper::rt_the_custom_logo();

$rdtheme_dark_logo_off  = empty(  Helper::rt_the_custom_logo() ) ? Helper::get_img( 'dark-logo-off.png' ) :  Helper::rt_the_custom_logo();

$rdtheme_logo_width = (int) RDTheme::$options['logo_width'];
$rdtheme_menu_width = 12 - $rdtheme_logo_width;
$rdtheme_logo_class = "col-sm-{$rdtheme_logo_width}";
$rdtheme_menu_class = "col-sm-{$rdtheme_menu_width}";
?>
<div class="overly-sidebar-wrapper">
  <div class="overly-sidebar-content">
    <button id="sidebar-close" class="circle-btn primary-btn"><i class="fas fa-times"></i></button>
   <div class="offcanvas-content">
        <div class="offcanvas-content-wrp">
            <div class="sidebar-about">
               <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
                  <img class="img-fluid" src="<?php echo esc_url( $rdtheme_dark_logo_off );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>">
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
               <h3 class="sub-off-title"><?php echo esc_html( RDTheme::$options['social_label'] );?></h3>
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

<!-- Offcanvas Menu End -->
<div id="header-menu" class="header-menu menu-layout2 rt-header-menu">
    <div class="container-fluid">
        <div class="row d-flex align-items-center mobile-aline-fix">
              <div class="col-3 col-md-4 d-flex justify-content-center order-md-2">
          			<div class="site-branding">
          			<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img class="img-fluid" src="<?php echo esc_url( $rdtheme_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
          			<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img class="img-fluid" src="<?php echo esc_url( $rdtheme_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
          			</div>
              </div>
              <div class="col-9 col-md-4 d-flex justify-content-start  order-md-1">
              <div class="header-action-layout1">
                  <div class="header-two-btn text-right fadeIn">
                    <button type="button" class="sidebarBtn circle-btn offcanvas-menu-btn">
                      <span class="btn-icon-wrap">
                          <span></span>
                          <span></span>
                          <span></span>
                      </span>
                    </button>
                  </div>
              </div>
            </div>
              <div class="col-12 col-md-4 d-flex justify-content-end order-md-3">
                <div class="header-action-layout1 mobile-fix">
                  <?php if (RDTheme::$options['phone']) { ?>
                    <ul>
                      <li class="header-action-number"><i class="fas fa-phone-alt"></i>
                        <a href="tel:<?php echo esc_attr( RDTheme::$options['phone'] );?>"> <?php echo esc_attr( RDTheme::$options['phone'] );?></a>
                      </li>
                    </ul>
                  <?php } ?>
                </div>
              </div>
        </div>
    </div>
</div>
