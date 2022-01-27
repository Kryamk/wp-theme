<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
use radiustheme\roofix\Helper;



?>
<?php get_header();

$roofix  = ROOFIX_THEME_PREFIX;
$cpt     = ROOFIX_THEME_CPT_PREFIX; 
$services_image     = get_post_meta( get_the_id(), "roofix_services_image", true );

wp_enqueue_style('owl-carousel');
wp_enqueue_script('owl-carousel');

$owl_data = array(
    'nav'                => true,
    'dots'               => false,
    'navText'            => array("<i class='fas fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"),
    'autoplay'           => false,
    'autoplayTimeout'    => '5000',
    'autoplaySpeed'      => '200',
    'autoplayHoverPause' => false,
    'loop'               => false,
    'margin'             => 0,
    'responsive'         => array(
        '0'    => array('items' => 1),
        '480'  => array('items' => 1),
        '768'  => array('items' => 1),
        '992'  => array('items' => 1),
        '1200' => array('items' => 1),
    )
);

$owl_data = json_encode($owl_data);
 ?>
<div id="primary" class="content-area single-service-wrap-layout1">
	<div class="container">		
		<div class="row">			
		 <?php Helper::left_sidebar(); ?> 			
				<div class="<?php echo esc_attr( Helper::the_layout_class() ); ?>">
					<main id="main" class="site-main single-project-box-layout1  single-service-partial">				
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="single-service-box-layout1">								
								<div class="item-content">
									<?php if( !empty($services_image ) ) { ?>
									<div class="single-services-info mg-b-30">    
										<div class="owl-theme owl-carousel rt-owl-carousel nav-control-layout4 owl-loaded owl-drag"
										     data-carousel-options="<?php echo esc_attr($owl_data); ?>">
										    <?php if (!empty($services_image)) { 

									    	?>
										        <?php foreach ($services_image as $additional_image):
										            $additional_image_id = $additional_image['service_additional_img'];
										            ?>
										            <div class="slide-item">
										                <?php echo wp_get_attachment_image($additional_image_id, 'roofix-size-1'); ?>
										            </div>
										        <?php endforeach; ?>
										    <?php } ?>
										</div>    
									</div>
									<?php  }else{ ?>
										<?php if ( has_post_thumbnail() ){ ?>
											<div class="main-img mg-b-50 img-border-radius">
													<?php the_post_thumbnail( 'full'); ?>
											</div>
										<?php } ?>
									<?php }  ?> 
									<?php the_content();?>
								</div>
							</div>
					<?php endwhile; ?>								
				</main>					
			</div>		
			 <?php Helper::right_sidebar() ?>	
		</div>
	</div>
</div>	
<?php get_footer(); ?>