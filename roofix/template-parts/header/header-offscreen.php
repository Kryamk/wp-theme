<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$nav_menu_args   = Helper::nav_menu_args();

$rdtheme_logo  =  empty(  RDTheme::$options['logo'] ) ? '<img width="489" height="121" class="logo-small" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo'],'full',"", array( "class" => "logo-small" ));
?>

<div class="rt-header-menu mean-container" id="meanmenu">
    <div class="mean-bar">
    	<a href="<?php echo esc_url(home_url('/'));?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) );?>"><?php echo wp_kses_post($rdtheme_logo);?></a>

		<?php if ( RDTheme::$options['header_btn_has_mobile'] ): ?>
		     <a class="header-btn-new mobile-btn" href="<?php echo esc_url( RDTheme::$options['header_buttonUrl'] );?>" title="<?php echo esc_html( RDTheme::$options['header_buttontext'] );?>"><?php echo esc_html( RDTheme::$options['header_buttontext'] );?></a>
		<?php endif; ?>

        <span class="sidebarBtn ">
            <span class="fa fa-bars">
            </span>
        </span>

    </div>

    <div class="rt-slide-nav">
        <div class="offscreen-navigation">
            <?php wp_nav_menu( $nav_menu_args );?>
        </div>
    </div>

</div>
