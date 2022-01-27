<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$roofix      = ROOFIX_THEME_PREFIX;
$cpt         = ROOFIX_THEME_CPT_PREFIX;
$thumb_size  = $cpt .'-size-md';

$id                 = get_the_id(); 
$btn_display        = "";
$category_display   = "";
$btn_txt            = "";
$btn_display        = RDTheme::$options['project_detail_button'] ;
$btn_txt            = RDTheme::$options['project_detail_button_text'];
$btn_txt            = ($btn_txt) ? $btn_txt : 'DETAILS' ;
$category_display   = RDTheme::$options['project_category_display'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
    <div class="project-box-layout4">
        <div class="item-img">
            <?php  the_post_thumbnail( $thumb_size ); ?>
        </div>
        <div class="item-content">
          <div class="item-heading">    
                <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>  
                <?php   if ( $category_display == 1 || $category_display  == 'on' ){ ?>                   
                    <div class="item-tag item-subtitle"><?php echo Helper::rt_get_projects_cat($id); ?></div>
                <?php } ?> 
          </div>
           <?php   if ( $btn_display == 1 || $btn_display  == 'on' ){ ?>
            <div class="item-btn-wrap">                   
                <a href="<?php the_permalink();?>" class="btn-fill-md bg-textprimary text-primarytext item-btn before"><?php echo esc_attr($btn_txt);?></a>
            </div> 
            <?php  } ?>
        </div>
    </div>   
</article>