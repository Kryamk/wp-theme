<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
use WP_Query;

trait CustomQueryTrait {
   
public static function rt_get_related_posts( $post_id, $related_count, $args = array() ) {
    $args = wp_parse_args( (array) $args, array(
      'orderby' => 'rand',
      'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
    ) );

    $related_args = array(
      'post_type'      => get_post_type( $post_id ),
      'posts_per_page' => $related_count,
      'post_status'    => 'publish',
      'post__not_in'   => array( $post_id ),
      'orderby'        => $args['orderby'],
      'tax_query'      => array()
    );

    $post       = get_post( $post_id );
    $taxonomies = get_object_taxonomies( $post, 'names' );

    foreach ( $taxonomies as $taxonomy ) {
      $terms = get_the_terms( $post_id, $taxonomy );
      if ( empty( $terms ) ) {
        continue;
      }
      $term_list                   = wp_list_pluck( $terms, 'slug' );
      $related_args['tax_query'][] = array(
        'taxonomy' => $taxonomy,
        'field'    => 'slug',
        'terms'    => $term_list
      );
    }

    if ( count( $related_args['tax_query'] ) > 1 ) {
      $related_args['tax_query']['relation'] = 'OR';
    }

    if ( $args['return'] == 'query' ) {
      return new WP_Query( $related_args );
    } else {
      return $related_args;
    }
  }

public static function rt_get_projects_cat($postID){  
    $roofix = ROOFIX_THEME_CPT_PREFIX;
    $terms = wp_get_post_terms( $postID, "{$roofix}_projects_category", array( 'fields' => 'all' ) );
    if(!empty($terms)){ 
      foreach($terms as $index =>  $term){  ?>   
        <a href="<?php echo get_category_link( $term->term_id); ?>"><?php echo esc_html( $term->name); ?></a> 
       <span><?php echo esc_html( self::generate_array_iterator_postfix( $terms, $index,',' ) ) ?></span>
    <?php 
      } 
    }    
  }
  
  public static function get_projects_cat_text($postID){  
    $roofix = ROOFIX_THEME_CPT_PREFIX;
    $terms = wp_get_post_terms( $postID, "{$roofix}_projects_category", array( 'fields' => 'all' ) );
    if(!empty($terms)){ 
      foreach($terms as $index =>  $term){  ?>   
        <?php echo esc_html( $term->name); ?>
        <?php echo esc_html( self::generate_array_iterator_postfix( $terms, $index,',' ) ) ?>
    <?php 
      } 
    } 
  }

  static function generate_array_iterator_postfix($array, $index, $postfix =',') {
   $length = count($array);
   if ($length) {
     $last_index = $length - 1;
     return $index < $last_index ? $postfix :'';
   }
 }


  public static function wp_set_temp_query( $query ) {
    global $wp_query;
    $temp = $wp_query;
    $wp_query = $query;
    return $temp;
  }

  public static function wp_reset_temp_query( $temp ) {
    global $wp_query;
    $wp_query = $temp;
    wp_reset_postdata();
  }



  public static function set_order_orderby($rd_field)
  {
    $orderby = '';
    $order   = 'DESC';
    switch ( RDTheme::$options[ $rd_field ] ) {
      case 'title':
      case 'menu_order':
      $orderby = RDTheme::$options[ $rd_field ];
      $order = 'ASC';
      break;
    }
    if ( $orderby ) {
      $args['orderby'] = $orderby;
      $args['order'] = $order;
    }
    return $args;
  } 

  public static function set_args_orderby($args, $rd_field)
  {
    $orderby = '';
    $order   = 'DESC';
    switch ( RDTheme::$options[ $rd_field ] ) {
      case 'title':
      case 'menu_order':
      $orderby = RDTheme::$options[ $rd_field ];
      $order = 'ASC';
      break;
    }
    if ( $orderby ) {
      $args['orderby'] = $orderby;
      $args['order'] = $order;
    }
    return $args;
  }

  /**
   * for setting up pagination for custom post type
   * we have to pass paged key
   */
  public static function set_args_paged ($args) {
    if ( get_query_var('paged') ) {
      $args['paged'] = get_query_var('paged');
    }
    elseif ( get_query_var('page') ) {
      $args['paged'] = get_query_var('page');
    }
    else {
      $args['paged'] = 1;
    }
    return $args;
  }


  /**
   * it will generate archive page for a post type
   * task breakdown -
   * 1. setting archive style,
   * 2. adding args for custom post type,
   * 3. make wp query & return
   * @param  string $post_type    - post type short name eg. project, team, service
   * @param  [type] $archive_style e.g: 1, 2, 3
   * @return [type]                it will return bool
   */
  public static function custom_query($post_type='post', $archive_style) {
    
    $roofix = ROOFIX_THEME_CPT_PREFIX;
    $full_post_type = "{$roofix}_{$post_type}";
    if ($post_type == 'post') {
      $full_post_type = 'post';
    }
    $archive_number = "{$post_type}_archive_number";
    $orderby_field  = "{$post_type}_archive_orderby";
    $args = array(
      'post_type'      => $full_post_type,
      'posts_per_page' => RDTheme::$options[$archive_number],
    );
    $args   = self::set_args_orderby( $args, $orderby_field);
    $args   = self::set_args_paged( $args );
    $query  = new WP_Query( $args );
    return $query;
  }


  /**
   * 4. showing template
   * 5. reset reset_postdata
   * @param  [type] $post_type     [description]
   * @param  [type] $archive_style [description]
   * @return [type]                [description]
   */
  public static function generate_custom_archive_page($post_type, $archive_style)
  {
    RDTheme::$options["${post_type}_arc_style"] = $archive_style;
    $query = self::custom_query($post_type, $archive_style);
    global $wp_query;
    $wp_query = NULL;
    $wp_query = $query;
    get_template_part('index');
    wp_reset_postdata();
  }



  public static function team_query() {
    $cpt = ROOFIX_THEME_CPT_PREFIX;
    $args = array(
      'post_type'      => "{$cpt}_team",
      'posts_per_page' => RDTheme::$options['team_archive_number'],
    );

    $orderby = '';
    switch ( RDTheme::$options['team_archive_orderby'] ) {
      case 'title':
      case 'menu_order':
      $orderby = RDTheme::$options['team_archive_orderby'];
      $order = 'ASC';
      break;
    }
    if ( $orderby ) {
      $args['orderby'] = $orderby;
      $args['order'] = $order;
    }

    if ( get_query_var('paged') ) {
      $args['paged'] = get_query_var('paged');
    }
    elseif ( get_query_var('page') ) {
      $args['paged'] = get_query_var('page');
    }
    else {
      $args['paged'] = 1;
    }

    $query = new WP_Query( $args );

    return $query;
  }
  
  public static function services_query() {
      $cpt = ROOFIX_THEME_CPT_PREFIX;
      $args = array(
        'post_type'      => "{$cpt}_services",
        'posts_per_page' => RDTheme::$options['services_archive_number'],
      );

      $orderby = '';
      switch ( RDTheme::$options['services_archive_orderby'] ) {
        case 'title':
        case 'menu_order':
        $orderby = RDTheme::$options['services_archive_orderby'];
        $order = 'ASC';
        break;
      }
      if ( $orderby ) {
        $args['orderby'] = $orderby;
        $args['order'] = $order;
      }
      if ( get_query_var('paged') ) {
        $args['paged'] = get_query_var('paged');
      }
      elseif ( get_query_var('page') ) {
        $args['paged'] = get_query_var('page');
      }
      else {
        $args['paged'] = 1;
      }

      $query = new WP_Query( $args );

      return $query;
    }

    public static function rt_projects_query() {
      $cpt = ROOFIX_THEME_CPT_PREFIX;
      $args = array(
        'post_type'      => "{$cpt}_projects",
        'posts_per_page' => RDTheme::$options['project_archive_number'],
      );

      $orderby = '';
      switch ( RDTheme::$options['project_archive_orderby'] ) {
        case 'title':
        case 'menu_order':
        $orderby = RDTheme::$options['project_archive_orderby'];
        $order = 'ASC';
        break;
      }
      if ( $orderby ) {
        $args['orderby'] = $orderby;
        $args['order'] = $order;
      }

      if ( get_query_var('paged') ) {
        $args['paged'] = get_query_var('paged');
      }
      elseif ( get_query_var('page') ) {
        $args['paged'] = get_query_var('page');
      }
      else {
        $args['paged'] = 1;
      }

      $query = new WP_Query( $args );

      return $query;
    }

}
