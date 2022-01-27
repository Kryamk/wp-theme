<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
$thumb_size = 'roofix-size-3';
$id  = get_the_id();   
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
    <div class="project-box-layout2">
        <div class="item-img">
            <?php  the_post_thumbnail( $thumb_size ); ?>
        </div>
        <div class="item-content">
            <div class="item-heading">      
            <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>   
             <div class="item-subtitle"><?php echo Helper::rt_get_projects_cat($id); ?></div> 
            </div>            
            <div class="item-btn-wrap">                   
                <a href="<?php the_permalink();?>" class="item-btn"><i class="fas fa-plus"></i></a>
            </div>            
        </div>
    </div>    
</article>