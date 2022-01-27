<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$rdtheme_socials = Helper::socials();
$nav_menu_args   = Helper::nav_menu_args();
$offcanvas_menu_args   = Helper::offcanvas_menu_args();
// Logo
$rdtheme_dark_logo      = empty(  RDTheme::$options['logo'] ) ? '<img width="489" height="121" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo'],'full');

$rdtheme_light_logo     = empty(  RDTheme::$options['logo_light'] ) ? '<img width="489" height="121" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-icon-light.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo_light'],'full');

$header_top_shape = empty(  Helper::rt_header_top_shape() ) ? Helper::get_img( 'logo-bg.png' ) :  Helper::rt_header_top_shape();

$rdtheme_dark_logo_off  = empty(  RDTheme::$options['logo'] ) ? '<img width="489" height="121" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark-2x.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo'],'full');

$rdtheme_logo_width = (int) RDTheme::$options['logo_width'];
$rdtheme_menu_width = 12 - $rdtheme_logo_width;
$rdtheme_logo_class = "col-sm-{$rdtheme_logo_width}";
$rdtheme_menu_class = "col-sm-{$rdtheme_menu_width}";

?>

<div id="header-menu" class="header-menu menu-layout5  rt-header-menu position-static">
    <div class="container-fluid pl-0 pr-0">
        <div class="header-wrap no-gutter">
            <div class="primary-bg-brind" style="background-image:url(<?php echo $header_top_shape; ?>)">
                <div class="site-branding">
                    <a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
                        <?php echo wp_kses_post( $rdtheme_dark_logo );?>
                    </a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
                        <?php echo wp_kses_post( $rdtheme_light_logo );?>
                    </a>
                </div>
            </div>
			<div class="d-flex justify-content-start mobile-padding-left-15px">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<div class="d-flex justify-content-end">
				<ul class="header5-icon-right">
					<li class="header5-search"><?php if ( RDTheme::$options['search_icon'] ) {
						get_template_part( 'template-parts/header/icon', 'search' );
					} ?>
					</li>
					<li>
						<?php get_template_part('template-parts/header/header', 'btn2');?>
					</li>
				</ul>
			</div>
        </div>
    </div>
</div>

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
            <div class="offscreen-navigation">
                <?php wp_nav_menu( $nav_menu_args );?>
            </div>
            <div class="off-content">
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
</div>
