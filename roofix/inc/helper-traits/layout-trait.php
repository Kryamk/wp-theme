<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
trait LayoutTrait {
  public static function has_sidebar() {
    return ( self::has_full_width() ) ? false : true;
  }

  /**
   * It will determine whether content will take full width or not 
   * this is determine by 2 parameters - redux theme option and active sidebar
   * @return boolean [description]
   */
  public static function has_full_width() {
    $theme_option_full_width = ( RDTheme::$layout == 'full-width' ) ? true : false;
    $not_active_sidebar = ! is_active_sidebar('sidebar') ;
    $bool = $theme_option_full_width || $not_active_sidebar;
    return  $bool;
  }

  public static function the_layout_class() {
    $layout_class = self::has_sidebar() ? 'col-lg-8 rt-content' : 'col';
    echo apply_filters( 'roofix_layout_class', $layout_class );
  }

  public static function the_sidebar_class() {
    echo apply_filters( 'roofix_sidebar_class', 'col-lg-4 rt-sidebar' );
  }

  public static function left_sidebar() {
    if ( RDTheme::$layout == 'left-sidebar' && ! self::has_full_width() ) {
      get_sidebar();
    }
  }

  public static function right_sidebar() {
    if ( RDTheme::$layout == 'right-sidebar' && ! self::has_full_width() ) {
      get_sidebar();
    }
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
  public static function has_footer_widget()
  {
    return is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ;
  }

}
