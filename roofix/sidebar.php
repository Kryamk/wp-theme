<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
use radiustheme\roofix\Helper;
?>

<div class="<?php Helper::the_sidebar_class();?>">
	<aside class="sidebar-widget-area <?php  echo esc_attr( RDTheme::$layout ) ?>">
	<?php
	if ( RDTheme::$sidebar ) {
		if ( is_active_sidebar( RDTheme::$sidebar ) ){
			dynamic_sidebar( RDTheme::$sidebar );
		}
	}
	elseif ( Helper::is_active_rt_wc() && is_active_sidebar( 'woo-sidebar' ) ) {
		dynamic_sidebar( 'woo-sidebar' );
		} else {
		if ( is_active_sidebar( 'sidebar' ) ){
		dynamic_sidebar( 'sidebar' );
		}
	}
	?>
	</aside>
</div>