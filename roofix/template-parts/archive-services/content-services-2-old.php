<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
$roofix             = ROOFIX_THEME_PREFIX;
$cpt                = ROOFIX_THEME_CPT_PREFIX;
$thumb_size         = "roofix-size-blog3";
$thumb_icon_size    = 'roofix-size-xs';

$post_id            = get_the_id(); 
$content            = Helper::get_current_post_content();
$content            = wp_trim_words( $content,  RDTheme::$options['services_content_number'] );
$content            = "<p>$content</p>";    

$service_icon                = get_post_meta( $post_id, "roofix_service_icon", true );  
$service_image_id            = get_post_meta( $post_id, "roofix_service_image", true ); 
$service_image_url           = wp_get_attachment_image_src( $service_image_id, $thumb_icon_size, true );
$image_alt                   = Helper::roofix_get_attachment_alt($service_image_id );

  if ( $service_image_id) {
      $tabs_icon                   = '<img class="icon-image non-hover" src=" '.esc_url($service_image_url[0]) .'" alt="'.esc_attr($image_alt ).'">'; 
    } elseif($service_icon) { 
      $tabs_icon                   = '<i class="'.esc_attr($service_icon).'"></i> ';
    }else{
      $tabs_icon                   = get_the_post_thumbnail( $post_id, $thumb_icon_size );  
    }

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="service-box-layout6">          
      <?php if ( has_post_thumbnail() ){ ?>   
        <div class="item-img">
           <?php  the_post_thumbnail( $thumb_size ); ?> 
            <div class="item-icon">
              <?php  echo wp_kses_post( $tabs_icon ); ?>
            </div>             
        </div>
      <?php } ?>
        <div class="item-content">
            <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>                
            <div class="title-style width-50"></div>      
           <?php echo wp_kses( $content, 'alltext_allow' );?>
              <a href="<?php the_permalink();?>" class="ghost-btn-md primary-border text-Primary"><?php esc_attr_e( 'READ MORE', 'roofix' );?> <i class="fas fa-angle-right"></i></a>                     
        </div>        
    </div>
</article>