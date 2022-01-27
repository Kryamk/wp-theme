<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;

trait ImageTrait {
  public static function generate_comment_meta($comment_count) {
    $comments = __('No Comments', 'roofix');
    $comment_label = __('Comments', 'roofix');
    if ($comment_count) {
      $comments = sprintf(
        _n( '%s comment', '%s comments', $comment_count, 'roofix'),
        number_format_i18n($comment_count)
      );
    }
    return "{$comment_label}:<span>{$comments}</span>";
  }

  public static function get_width_height_from_thumb_size($thumb_size)
  {
    
    $rtroofix = ROOFIX_THEME_CPT_PREFIX;
    $width_height = [
      "{$rtroofix}-size1" => [ 'width' => 1200, 'height' => 600, ],
      "{$rtroofix}-size2" => [ 'width' => 490,  'height' =>  330, ],
      "{$rtroofix}-size3" => [ 'width' => 500,  'height' =>  400, ],
      "{$rtroofix}-size4" => [ 'width' => 320,  'height' =>  320, ],
      "{$rtroofix}-size5" => [ 'width' => 590,  'height' =>  845, ],
      "{$rtroofix}-size6" => [ 'width' => 230,  'height' =>  350, ],
      "{$rtroofix}-size7" => [ 'width' => 320,  'height' =>  340, ],
    ];
    $width = 320;
    $height = 320;

    if ( array_key_exists($thumb_size, $width_height ) ) {
      $width = $width_height[$thumb_size]['width'];
      $height = $width_height[$thumb_size]['height'];
    }
    return [
      'width' => $width,
      'height' => $height,
    ];

  }
  public static function get_no_image_file($thumb_size)
  {
    $no_image_width_height = self::get_width_height_from_thumb_size($thumb_size);
    $no_image_width = $no_image_width_height['width'];
    $no_image_height = $no_image_width_height['height'];
    return Helper::get_img( "noimage/noimage_{$no_image_width}x{$no_image_height}.jpg" );
  }

  public static function generate_thumbnail_image($post, $thumb_size, $return_null = false)
  {

    if ($img = get_the_post_thumbnail_url( $post, $thumb_size ) ) {
      return $img;
    }

    if ($return_null) {
      return null;
    }

    if( !empty( RDTheme::$options['no_preview_image']['id'] ) ) {
      $img = wp_get_attachment_image_src( RDTheme::$options['no_preview_image']['id'], $thumb_size, true );
      return $img[0];
    }
    return self::get_no_image_file($thumb_size);
  }
  public static function generate_thumbnail_image_by_attachment_id($id, $thumb_size)
  {

    $img = wp_get_attachment_image_src( $id, $thumb_size);
    if ($img) {
      return $img[0];
    }
    return self::get_no_image_file($thumb_size);
  }

  public static function generate_thumbnail_image_by_attachment_id_elementor($image, $thumb_size)
  {
    $id = $image['id'];
    if (!$id) {
      return $image['url'];
    }
    return self::generate_thumbnail_image_by_attachment_id($id, $thumb_size);
  }
}