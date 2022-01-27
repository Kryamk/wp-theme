<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;

$cpt         = ROOFIX_CORE_CPT;
$thumb_size = "roofix-size-blog3";
$thumb_icon_size = 'roofix-size-xs';
$post_id        = get_the_id(); 
$content        = Helper::get_current_post_content();
$content        = wp_trim_words( $content,  RDTheme::$options['services_archive_content_number'] );
$content        = "<p>$content</p>";

$service_icon = get_post_meta($post_id, "{$cpt}_service_icon", true);
$service_image_id = get_post_meta($post_id, "{$cpt}_service_image", true);
$service_image_url = wp_get_attachment_image_src($service_image_id, $thumb_icon_size, true);
$service_image_attr = trim( strip_tags( get_post_meta( $service_image_id, '_wp_attachment_image_alt', true ) )) ;

if ($service_image_id) {
    $tabs_icon = '<img class="icon-image non-hover" src=" ' . esc_url($service_image_url[0]) . '" alt="' . esc_attr($image_alt) . '">';
} elseif ($service_icon) {
    $tabs_icon = '<i class="' . esc_attr($service_icon) . '"></i> ';
} else {
    $tabs_icon = get_the_post_thumbnail($post_id, $thumb_icon_size);
}
?>
<div class="rtin-item">
    <div class="service-box-layout6-new">
        <?php if (has_post_thumbnail()) { ?>
            <div class="item-img">
                <?php the_post_thumbnail($thumb_size); ?>
                <div class="item-icon">
                    <?php echo wp_kses_post($tabs_icon); ?>                    
                </div>
            </div>
        <?php } ?>
        <div class="item-content">
            <div class="svg-content">
                <svg class="top-svg"
                     xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     width="374px" height="63px">
                    <path fill-rule="evenodd" fill="rgb(184, 0, 0)"
                          d="M0.000,13.000 C0.000,13.000 72.000,77.250 159.000,59.000 C246.000,40.750 324.750,14.750 370.000,30.000 L370.000,19.000 C370.000,19.000 355.000,-4.750 164.000,47.000 C164.000,47.000 73.250,71.000 0.000,-0.000 L0.000,13.000 Z"/>
                </svg>
                <svg class="bottom-svg"
                     xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     width="374px" height="63px">
                    <path fill-rule="evenodd" fill="rgb(231, 3, 3)"
                          d="M0.000,13.000 C0.000,13.000 72.000,77.250 159.000,59.000 C246.000,40.750 324.750,14.750 370.000,30.000 L370.000,19.000 C370.000,19.000 355.000,-4.750 164.000,47.000 C164.000,47.000 73.250,71.000 0.000,-0.000 L0.000,13.000 Z"/>
                </svg>

                <svg class="bottom-svgw"
                     xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     width="374px" height="57px">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                          d="M0.000,0.000 C0.000,0.000 58.000,66.000 150.000,51.000 C150.000,51.000 325.000,1.667 370.000,21.000 L370.000,57.000 L0.000,57.000 "/>
                </svg>
            </div>
            <h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="title-style"></div>          
             <?php echo wp_kses($content, 'alltext_allow'); ?>
            <a href="<?php the_permalink(); ?>" class="non-ghost-btn-md">
                <?php esc_html_e('READ MORE', 'roofix'); ?>
                <span>
                        <i class="fas fa-caret-right"></i>
                      </span>
            </a>
        </div>
    </div>
</div>