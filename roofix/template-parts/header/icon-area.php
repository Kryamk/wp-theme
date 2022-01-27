<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
if (RDTheme::$options['vertical_menu_icon'] &  RDTheme::$options['cart_icon'] & RDTheme::$options['search_icon'] & RDTheme::$options['search_icon'] ) {
?>
<div class="header-icon-area header-action-items-layout2">
	<?php
	if ( RDTheme::$options['vertical_menu_icon'] && has_nav_menu( 'topright' ) ){
		get_template_part( 'template-parts/header/icon', 'menu' );
	}
	if ( RDTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ){
		get_template_part( 'template-parts/header/icon', 'cart' );
	}
	if ( RDTheme::$options['search_icon'] && RDTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ){
		echo '<div class="header-icon-seperator">|</div>';
	}
	if ( RDTheme::$options['search_icon'] ) {
		get_template_part( 'template-parts/header/icon', 'search' );
	}
	?>
	<div class="clear"></div>								
</div>
<?php } ?>