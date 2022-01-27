<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */

namespace radiustheme\roofix;
use \WP_Query;
use radiustheme\roofix\IconTrait;
use radiustheme\roofix\CustomQueryTrait;
use radiustheme\roofix\ImageTrait;
use radiustheme\roofix\ResourceLoadTrait;
use radiustheme\roofix\UtilityTrait;
use radiustheme\roofix\DataTrait;
use radiustheme\roofix\LayoutTrait;
use \WooCommerce;

class Helper {
  use IconTrait;
  use CustomQueryTrait;
  use ResourceLoadTrait;
  use ImageTrait;
  use UtilityTrait;
  use DataTrait;
  use LayoutTrait;

	public static function rt_the_custom_logo() {
			$logo_title = wp_get_attachment_image_url( RDTheme::$options['logo'], 'full');
		return $logo_title;
	}
	public static function rt_the_custom_light_logo() {
			$logo_title = wp_get_attachment_image_url( RDTheme::$options['logo_light'], 'full');
		return $logo_title;
	}
	public static function rt_footer_custom_logo() {
			$logo_title = wp_get_attachment_image_url( RDTheme::$options['footer_logo'], 'full');
		return $logo_title;
	}

	public static function rt_header_top_shape() {
			$header_shape = wp_get_attachment_image_url( RDTheme::$options['header_top_shape'], 'full');
		return $header_shape;
	}


  public static function roofix_generate_excerpt($post, $length = 55, $dot = false)
  {
    if ( has_excerpt($post) ) {
      $final_content =  wp_trim_words( get_the_excerpt($post->ID), $length, '');
    }

    $post = get_post($post);
    $content = wp_strip_all_tags($post->post_content);
    $final_content = wp_trim_words( $content, $length, '' );

    if ($dot) {
      $final_content = "$final_content $dot";
    }
    return $final_content;
  }

public static function roofix_get_attachment_alt( $attachment_ID ) {
	// Get ALT
	$thumb_alt = get_post_meta( $attachment_ID, '_wp_attachment_image_alt', true );

	// No ALT supplied get attachment info
	if ( empty( $thumb_alt ) )
		$attachment = get_post( $attachment_ID );

	// Use caption if no ALT supplied
	if ( empty( $thumb_alt ) )
		$thumb_alt = $attachment->post_excerpt;

	// Use title if no caption supplied either
	if ( empty( $thumb_alt ) )
		$thumb_alt = $attachment->post_title;

	// Return ALT
	return esc_attr( trim( strip_tags( $thumb_alt ) ) );

}



  public static function generate_elementor_anchor($anchor, $anchor_text="", $classes='') {
   if ( ! empty( $anchor['url'] ) ) {
     $class_attribute = '';
     if ( $classes ) {
       $class_attribute = "class='{$classes}'";
     }

     $target_attribute = "";
     if ( $anchor['is_external'] ) {
       $target_attribute = 'target="_blank"';
     }

     $rel_attribute = "";
     if ( $anchor['nofollow'] ) {
       $rel_attribute = 'rel="nofollow"';
     }
     $anchor_url = $anchor['url'];
     $href_attributes = "href='{$anchor_url}'";

     $all_attributes = "$class_attribute $target_attribute $rel_attribute $href_attributes";

     $a   = sprintf( '<%1$s %2$s>%3$s</%1$s>', 'a', $all_attributes, $anchor_text );
     return $a;
   };
   return null;
 }

public static function custom_sidebar_fields() {
		$roofix = ROOFIX_THEME_PREFIX_VAR;
		$sidebar_fields = array();

		$sidebar_fields['sidebar'] = esc_html__( 'Sidebar', 'roofix' );
		$sidebar_fields['sidebar-project'] = esc_html__( 'Project Sidebar ', 'roofix' );

		$sidebars = get_option( "{$roofix}_custom_sidebars", array() );
		if ( $sidebars ) {
			foreach ( $sidebars as $sidebar ) {
				$sidebar_fields[$sidebar['id']] = $sidebar['name'];
			}
		}

		return $sidebar_fields;
	}

	public static function is_active_rt_wc() {
		if( class_exists('WooCommerce') ) {
			if( is_shop() || is_product() ) {
				return true;
			}
		}

		return false;
	}

	public static function roofix_get_primary_category() {
		if( get_post_type() != 'post' ) {
			return;
		}
		# Get the first assigned category ----------
			$get_the_category = get_the_category();
			$primary_category = array( $get_the_category[0] );

		if( ! empty( $primary_category[0] )) {
			return $primary_category;
		}
	}

	public static function roofix_category_prepare() {	?>
		<?php if ( self::roofix_get_primary_category()  ): ?>
			<a class="item-tag" href="<?php echo get_category_link( self::roofix_get_primary_category()[0]->term_id ); ?>">

				<?php echo esc_html( self::roofix_get_primary_category()[0]->name ); ?>
			</a>
		<?php endif ?>
	<?php
	}
	public static function filter_content( $content ){
		// wp filters
		$content = wptexturize( $content );
		$content = convert_smilies( $content );
		$content = convert_chars( $content );
		$content = wpautop( $content );
		$content = shortcode_unautop( $content );

		// remove shortcodes
		$pattern= '/\[(.+?)\]/';
		$content = preg_replace( $pattern,'',$content );

		// remove tags
		$content = strip_tags( $content );

		return $content;
	}

	public static function get_current_post_content( $post = false ) {
		if ( !$post ) {
			$post = get_post();
		}
		$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
		$content = self::filter_content( $content );
		return $content;
	}

	public static function pagination( $max_num_pages = false ) {
		global $wp_query;

		$max = $max_num_pages ? $max_num_pages : $wp_query->max_num_pages;
		$max = intval( $max );

		/** Stop execution if there's only 1 page */
		if( $max <= 1 ) return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		include ROOFIX_THEME_VIEW_DIR . 'pagination.php';
	}

	public static function comments_callback( $comment, $args, $depth ){
		include ROOFIX_THEME_VIEW_DIR . 'comments-callback.php';
	}


	public static function pagination_ing( $max_num_pages = false ) {
		global $wp_query;

		$max = $max_num_pages ? $max_num_pages : $wp_query->max_num_pages;
		$max = intval( $max );

		/** Stop execution if there's only 1 page */
		if( $max <= 1 ) return;

		$pageing = get_query_var( 'pageing' ) ? absint( get_query_var( 'pageing' ) ) : 1;

		/**	Add current page to the array */
		if ( $pageing >= 1 )
			$links[] = $pageing;

		/**	Add the pages around the current page to the array */
		if ( $pageing >= 3 ) {
			$links[] = $pageing - 1;
			$links[] = $pageing - 2;
		}

		if ( ( $pageing + 2 ) <= $max ) {
			$links[] = $pageing + 2;
			$links[] = $pageing + 1;
		}
		include ROOFIX_THEME_VIEW_DIR . 'pagination-pageing.php';
	}



	public static function nav_menu_args(){
		$roofix   = ROOFIX_THEME_PREFIX_VAR;
		$pagemenu = false;
		if ( ( is_single() || is_page() ) ) {
			$menuid = get_post_meta( get_the_id(), "{$roofix}_page_menu", true );
			if ( !empty( $menuid ) && $menuid != 'default' ) {
				$pagemenu = $menuid;
			}
		}
		if ( $pagemenu ) {
			$nav_menu_args = array( 'menu' => $pagemenu,'container' => 'nav' );
		}
		else {
				$nav_menu_args = array( 'theme_location' => 'primary','container' => 'nav' );
		}
		return $nav_menu_args;
	}

	public static function header_3_nav_menu_args(){
		$roofix   = ROOFIX_THEME_PREFIX_VAR;
		$pagemenu = false;
		if ( ( is_single() || is_page() ) ) {
			$menuid = RDTheme::$option['under_construction_mode_enable'] ;

			if ( !empty( $menuid ) && $menuid != 'default' ) {
				$pagemenu = $menuid;
			}
		}
		if ( $pagemenu ) {
			$nav_menu_args = array( 'menu' => $pagemenu,'container' => 'nav' );
		}
		else {
				$nav_menu_args = array( 'theme_location' => 'primary','container' => 'nav' );
		}
		return $nav_menu_args;
	}



	public static function offcanvas_menu_args(){
		$nav_menu_args = array(
	        'menu_class'      => 'offcanvas-menu',
	        'theme_location'  => 'offcanvas',
	    );
			return $nav_menu_args;
	}



	public static function has_footer(){
		if ( !RDTheme::$options['footer_area'] ) {
			return false;
		}
		$footer_column = RDTheme::$options['footer_column'];
		for ( $i = 1; $i <= $footer_column; $i++ ) {
			if ( is_active_sidebar( 'footer-'. $i ) ) {
				return true;
			}
		}
		return false;
	}

  public static function requires( $filename, $dir = false ){
    if ( $dir) {
      $child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;

      if ( file_exists( $child_file ) ) {
        $file = $child_file;
      }
      else {
        $file = get_template_directory() . '/' . $dir . '/' . $filename;
      }
    }
    else {
      $child_file = get_stylesheet_directory() . '/inc/' . $filename;

      if ( file_exists( $child_file ) ) {
        $file = $child_file;
      }
      else {
        $file = ROOFIX_THEME_INC_DIR . $filename;
      }
    }

    require_once $file;
  }


}