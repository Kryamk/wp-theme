<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
$thumb_size     = "roofix-size-md";
$content        = Helper::get_current_post_content();
$content        = wp_trim_words( $content,  RDTheme::$options['services_content_number'] );
$content        = "<p>$content</p>";    
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>     
        <div class="service-box-layout4">
            <?php if ( has_post_thumbnail() ){ ?>
            <div class="item-img">
                <?php  the_post_thumbnail( $thumb_size ); ?>
            </div>
        <?php } ?>
            <div class="item-content">
                <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>         
              
               <?php echo wp_kses( $content, 'alltext_allow' );?>
            </div>
        </div>  
</article>