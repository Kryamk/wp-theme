<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
$rdtheme_error_img = empty( RDTheme::$options['error_bodybanner']['url'] ) ? Helper::get_img( '404.png' ) : RDTheme::$options['error_bodybanner']['url'];
?>
<?php get_header();?>
	<section class="error-page-wrap-layout1">
		  <div class="container error_add_partial">
		      <div class="error-page-box-layout1 ">
		          <div class="error-img">
		              <img src="<?php echo esc_url( $rdtheme_error_img );?>" alt="<?php esc_attr_e( '404', 'roofix' );?>">
		          </div>
		          <div class="title-text"><?php echo esc_html( RDTheme::$options['error_text1'] );?></div>
		          <div class="item-subtitle"><?php echo wp_kses_post( RDTheme::$options['error_text2'] );?></div>
				<div class="item-btn rtin-style-1">
					<a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( RDTheme::$options['error_buttontext'] );?><i class="fas fa-long-arrow-alt-right"></i></a>
				</div>	        
		      </div>
		  </div>
		  <div id="Clouds">
		      <div class="Cloud Foreground"></div>
		      <div class="Cloud Background"></div>
		  </div>
	</section>
	
<?php get_footer(); ?>