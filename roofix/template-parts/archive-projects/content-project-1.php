<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;

$id = get_the_id();
$col_lg = get_post_meta(get_the_id(), "roofix_col_lg", true);
$col_md = get_post_meta(get_the_id(), "roofix_col_md", true);
$col_sm = get_post_meta(get_the_id(), "roofix_col_sm", true);
$thumb_size3 = 'roofix-size-3';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="project-box-layout6">
        <div class="item-excerpt">
            <div class="item-heading">
                <div class="item-tag item-subtitle"><?php echo Helper::rt_get_projects_cat($id); ?></div>
                      <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>

            </div>
        </div>
        <div class="item-img">
           <?php  the_post_thumbnail( $thumb_size3 ); ?>
        </div>
        <div class="item-content">
            <div class="item-heading">
                <div class="item-tag item-subtitle"><?php echo Helper::rt_get_projects_cat($id); ?></div>
                <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>    
            </div>
        </div>
    </div>
</article>