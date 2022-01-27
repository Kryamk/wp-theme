<?php

namespace radiustheme\roofix;

trait UtilityTrait {
  
  public static function rt_get_post_meta($data, $post_id ) { 
   $post_meta_holder= "";
      $comments_number = number_format_i18n( get_comments_number($post_id) );
      $comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'roofix' ) : esc_html__( 'Comments' , 'roofix' );
      $comments_html  .= ': '. $comments_number;  
    ?>
   
    <?php 
  
      if ( $data['meta']  == 'yes' ): 
        ?>   
          <?php if ( RDTheme::$options['blog_date'] ):      
           ?>         
          <ul class="entry-meta">
            <li><?php echo esc_html__( 'by' , 'roofix' ); ?> <span class="vcard author"><?php the_author_posts_link();?></span></li>
            <li><?php echo wp_kses_post( $comments_html );?></li>
          </ul>
          

      <?php endif; ?>   
    <?php endif ;
  
     return $post_meta_holder;
  }

  public static function rt_get_blog_post_meta($post_id ) { 
      $post_meta_holder= "";
      $comments_number = number_format_i18n( get_comments_number($post_id) );
      $comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'roofix' ) : esc_html__( 'Comments' , 'roofix' );
      $comments_html  .= ': '. $comments_number;  
    ?>
          
      <?php if ( RDTheme::$options['blog_date'] ):      
           ?>         
          <ul class="entry-meta">
            <li><?php echo esc_html__( 'by' , 'roofix' ); ?> <span class="vcard author"><?php the_author_posts_link();?></span></li>
            <li><?php echo wp_kses_post( $comments_html );?></li>
          </ul>
      <?php endif;  
     return $post_meta_holder;
  } 

  public static function rt_get_blog2_post_meta($post_id ) { 
      $post_meta_holder= "";
      $comments_number = number_format_i18n( get_comments_number($post_id) );
      $comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'roofix' ) : esc_html__( 'Comments' , 'roofix' );
      $comments_html  .= ': '. $comments_number;  
      $user = wp_get_current_user($post_id);
 
        ?>
          
      <?php if ( RDTheme::$options['blog_date'] ):      
           ?>         
              <ul class="entry-meta">
                <li><span class="author-img"> <img src="<?php echo esc_url( get_avatar_url($user->ID, ['size' => '50'])); ?>" /></span> <?php echo esc_html__( 'by' , 'roofix' ); ?> <span class="vcard author"><?php the_author_posts_link();?></span></li>
                <li> <span class="item-icon"><i class="far fa-comment"></i></span><?php echo wp_kses_post( $comments_html );?></li>
            </ul>
          
      <?php endif;  
     return $post_meta_holder;
  }

  public static function rt_get_blog3_post_meta($post_id ) { 
      $post_meta_holder= "";
      $comments_number = number_format_i18n( get_comments_number($post_id) );
      $comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'roofix' ) : esc_html__( 'Comments' , 'roofix' );
      $comments_html  .= ': '. $comments_number;  
      $user = wp_get_current_user($post_id); 
        ?>          
      <?php if ( RDTheme::$options['blog_date'] ):      
           ?>    
       <ul class="entry-meta">
            <li><i class="fas fa-user"></i><?php echo esc_html__( 'by' , 'roofix' ); ?> <span class="vcard author"><?php the_author_posts_link();?></span></li>
            <li><i class="fas fa-tag"></i><?php the_category( ', ' );?></li>
       </ul>
          
      <?php endif;  
     return $post_meta_holder;
  }

public static function rt_get_blog_single_post_meta($post_id ) { 
      $post_meta_holder= "";

      $comments_number  = number_format_i18n( get_comments_number($post_id) );
      $comments_html    = "<span class='cnumber'>".$comments_number . " </span>";  
      $comments_html   .= $comments_number < 2 ? esc_html__( 'Comment' , 'roofix' ) : esc_html__( 'Comments' , 'roofix' );
      $user = wp_get_current_user($post_id); 
        ?>          
      <?php if ( RDTheme::$options['post_author_name'] ||  RDTheme::$options['post_cats'] || RDTheme::$options['post_comment_num'] ):?> 
          <ul class="news-meta-info mar20-ul">      
          
          <?php if ( RDTheme::$options['post_author_name'] ): ?>
              <li class="vcard-author"><i class="fas fa-user"></i>
                <span class="vcard author"><?php echo esc_html__( 'By' , 'roofix' ); ?> 
                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="fn"><?php the_author(); ?></a>
              </span>
              </li>
            <?php endif; ?>          
            <?php if ( RDTheme::$options['post_cats'] && has_category() ): ?>
              <li><i class="fas fa-tags"></i><?php the_category( ', ' );?></li>
            <?php endif; ?>

            <?php if ( RDTheme::$options['post_comment_num']): ?>
              <li><i class="far fa-comment"></i><?php echo wp_kses_post( $comments_html );?></li>
            <?php endif; ?>
     
          </ul>           
      <?php endif;  
     return $post_meta_holder;
  }

  public static function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
    }
    $rgb = "$r, $g, $b";
    return $rgb;
  }



  public function rt_loadmore_single_department() {
    $html = null;
    $remaining = true;
    $roofix      = ROOFIX_CORE_THEME;
    $cpt         = ROOFIX_CORE_CPT;
    $thumb_size  = "{$roofix}-size3";   
  
    $args = array(
    'post_type'       => "{$cpt}_departments",
    'post_status'     => 'publish',
    'p'             => 42,    
    );        
    $query = new WP_Query( $args );
    $temp = Helper::wp_set_temp_query( $query );

    if ( $query->have_posts() ) :
      if($query->max_num_pages == $page){
        $remaining = false;
      }
    ob_start();     
    
    else:
      $remaining = false;
    endif;
    $html = ob_get_clean();
    $var = $_POST;
         
    wp_send_json( compact('html', 'page', 'remaining', 'query'));
  }

  public static function get_departments(){
    $roofix = ROOFIX_THEME_PREFIX_VAR;
    $departments = array();
    $args = array(
      'posts_per_page'   => -1,
      'orderby'          => 'title',
      'order'            => 'ASC',
      'post_type'        => "{$roofix}_departments",
    );  
    $posts = get_posts( $args );      
    foreach ( $posts as $post ) {
      $departments[$post->ID] = $post->post_title;
    }
    return $departments;
  }
   static function is_under_construction_mode () {     
     $mode   = RDTheme::$options['under_construction_mode_enable'] ;
     if ( is_user_logged_in() || 'off' === $mode ) {
       return false;
     }
     return true;
   }
}

