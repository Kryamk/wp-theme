<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
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

<div class="roofix-product-details-page">
    <div class="container">
        <div class="row gutters-40">
			<?php
                if (RDTheme::$layout == 'left-sidebar') {
                    get_sidebar();
                }
                ?>
            <div class="<?php echo esc_attr($layout_class); ?>">
                <main id="main" class="site-main">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; ?>
				</main>
       		</div>
			<?php
                if (RDTheme::$layout == 'right-sidebar') {
                    get_sidebar();
                }
                ?>
    	</div>
    </div>
</div>

<?php
get_footer( 'shop' );

