<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
use radiustheme\roofix\Helper;
use \WP_Query;
$roofix  = ROOFIX_THEME_PREFIX;
$cpt     = ROOFIX_THEME_CPT_PREFIX;  
wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'isotope-pkgd' );
$_additional_images     = get_post_meta( $id, "{$cpt}_additional_image", true );
$_short_detail          = get_post_meta( $id, "{$cpt}_short_detail", true );
$_client                = get_post_meta( $id, "{$cpt}_client", true );
$_start_date            = get_post_meta( $id, "{$cpt}_start_date", true );
$_end_date              = get_post_meta( $id, "{$cpt}_end_date", true );
$_website               = get_post_meta( $id, "{$cpt}_website", true );
$_rating                = get_post_meta( $id, "{$cpt}_rating", true );
$owl_data = array( 
    'nav'                => true,
    'dots'               => false,
    'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
    'autoplay'           => false,
    'autoplayTimeout'    => '5000',
    'autoplaySpeed'      => '200',
    'autoplayHoverPause' => false,
    'loop'               => false,
    'margin'             => 0,
    'responsive'         => array(
        '0'    => array( 'items' =>1),
        '480'  => array( 'items' =>1),
        '768'  => array( 'items' =>1),
        '992'  => array( 'items' =>1),
        '1200' => array( 'items' =>1),
    )
);
$owl_data = json_encode( $owl_data );
wp_enqueue_style(  'owl-carousel' );
wp_enqueue_style(  'owl-theme-default' );
wp_enqueue_script( 'owl-carousel' );
$rating             = $_rating;
$nonrating          = 5 - (int)$_rating ;
?>
<div class="single-project-slider single-project-partial">
    <div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
        <div class="single-project-slider">
            <div class="owl-theme owl-carousel rt-owl-carousel nav-control-layout3 owl-loaded owl-drag" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
            <?php if( !empty($_additional_images ) ) { ?>
                <?php   foreach ( $_additional_images as $_additional_image ):
                 $additional_image_id = $_additional_image['additional_img']; 
                ?>            
                <div class="slide-item">
                    <?php echo wp_get_attachment_image($additional_image_id, 'roofix-slider' );?>
                </div>
            <?php endforeach; ?>
            <?php  }  ?> 
            </div>
        </div>
    </div>
</div>
  <div class="row theiaStickySidebar"> 
    <div class="col-xl-8 col-12 rt-content">
        <div class="single-project-info">
            <div class="item-content mg-b-0">
                    <?php the_content();?>
                </div>
            </div>
    </div>
    <div class="col-xl-4 col-12 rt-sidebar">
        <div class="widget-project-info mg-b-30">
            <div class="heading-layout3 mg-b-15">
                <h3 class="mg-b-0"><?php esc_attr_e( 'Project Information', 'roofix' );?></h3>
            </div>
                <p><?php echo esc_attr($_short_detail);?></p>
                 <div class="project-details">
                <ul>
                    <li><span><?php esc_attr_e( 'Category:', 'roofix' );?></span>
                    <?php echo Helper::rt_get_projects_cat(get_the_id()); ?>
                    </li>
                    <li><span><?php esc_attr_e( 'Client:', 'roofix' );?></span><?php echo esc_attr($_client);?></li>
                    <li><span><?php esc_attr_e( 'Start:', 'roofix' );?></span><?php echo esc_attr($_start_date);?></li>
                    <li><span><?php esc_attr_e( 'End:', 'roofix' );?></span><?php echo esc_attr($_end_date);?></li>
                    <li><span><?php esc_attr_e( 'Website:', 'roofix' );?></span><?php echo esc_url($_website);?></li>
                    <li><span><?php esc_attr_e( 'Rating:', 'roofix' );?></span> 
                    <ul class="item-rating">
                        <?php foreach (range(1, $rating) as $key): ?>
                            <li class="has-rating"><i class="fas fa-star"></i></li>
                        <?php endforeach; ?>
                        <?php for ($i=1; $i <= $nonrating; $i++): ?>
                            <li class="nonrating"><i class="fas fa-star"></i></li>
                        <?php endfor; ?>                                 
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

