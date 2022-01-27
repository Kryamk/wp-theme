<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

use radiustheme\roofix\RDTheme;
use radiustheme\roofix\Helper;

get_header( 'shop' );

$col_lg = get_post_meta($post->ID, "roofix_col_lg", true);
$col_md = get_post_meta($post->ID, "roofix_col_md", true);
$col_sm = get_post_meta($post->ID, "roofix_col_sm", true);

$col_class = "col-lg-{$col_lg} col-md-{$col_md} col-{$col_sm}";

if (RDTheme::$layout == 'full-width') {
    $layout_class = 'col-lg-12 archive-shop-add-partial';
    $col_class = 'col-lg-4';
} else {
    $layout_class = 'col-lg-8 archive-shop-add-partial';
    $col_class = 'col-lg-6';
}

?>

<div id="primary" class="content-area customize-content-selector roofix-products-page">
	<div class="container">
		<div class="row gutters-40">
			<?php
                if (RDTheme::$layout == 'left-sidebar') {
                    get_sidebar();
                }
                ?>
			<div class="<?php echo esc_attr($layout_class); ?>">
				<?php
				if ( woocommerce_product_loop() ) {
					echo '<div class="shop-page-top">';
					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
					echo '</div>';
					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
				
				?>
			</div>
			<?php
                if (RDTheme::$layout == 'right-sidebar') {
                    get_sidebar();
                }
                ?>
		</div>
	</div>
</div>
<?php get_footer( 'shop' );
