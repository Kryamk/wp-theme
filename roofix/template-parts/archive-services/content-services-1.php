<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 *
 * @var $args array
 */
namespace radiustheme\roofix;
$thumb_size = "roofix-size-md";
$thumb_icon_size = "roofix-size-xs";

$post_id        = get_the_id(); 
$content        = Helper::get_current_post_content();
$content        = wp_trim_words( $content,  RDTheme::$options['services_archive_content_number'] );
$content        = "<p>$content</p>";

$service_icon = get_post_meta($post_id, "roofix_service_icon", true);
$service_image_id = get_post_meta($post_id, "roofix_service_image", true);
$service_image_url = wp_get_attachment_image_src($service_image_id, $thumb_icon_size, true);

$image_alt = Helper::roofix_get_attachment_alt($service_image_id);

if ($service_image_id) {
    $tabs_icon = '<img class="icon-image non-hover" src=" ' . esc_url($service_image_url[0]) . '" alt="' . esc_attr($image_alt) . '">';
} elseif ($service_icon) {
    $tabs_icon = '<i class="' . esc_attr($service_icon) . '"></i> ';
} else {
    $tabs_icon = get_the_post_thumbnail($post_id, $thumb_icon_size);
}
$img = get_the_post_thumbnail_url($post_id, $thumb_size);

?>
<div style="background-image: url('<?php echo esc_url($img); ?>');" class="service-box-layout7-new">
    <div class="box-layout7-content">
        <h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php echo wp_kses($content, 'alltext_allow'); ?>
        <ul class="item-icon">
            <li><?php //echo wp_kses_post($tabs_icon); ?></li>
            <li><span><?php echo esc_attr($args['i']); ?></span></li>
        </ul>
    </div>
</div>

