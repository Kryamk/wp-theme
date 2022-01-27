<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
use radiustheme\roofix\RDTheme;
use radiustheme\roofix\Helper;
use radiustheme\roofix\WC_Functions;

global $product;

$product_id  = $product->get_id();

?>
<div class="rt-product-block rt-product-block-1">

	<div class="rtin-thumb-wrapper">
		<div class="rtin-thumb">
			<?php woocommerce_template_loop_product_thumbnail(); ?>
		</div>
		<?php woocommerce_show_product_loop_sale_flash();?>
		<div class="rtin-buttons-area">
			<div class="rtin-buttons">
				<div class="btn-title">
					<?php WC_Functions::print_add_to_cart_icon( $product_id, true, true ); ?>
				</div>
				<div class="btn-icons">
					<?php
						if ( RDTheme::$options['quickview'] ) WC_Functions::print_quickview_icon();
						if ( RDTheme::$options['wishlist'] ) WC_Functions::print_add_to_wishlist_icon();
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="price-title-box">
		<div class="rtin-title-area">
			<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		</div>
		<div class="rtin-price-area">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<div class="rtin-price"><?php echo wp_kses_post( $price_html ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div>