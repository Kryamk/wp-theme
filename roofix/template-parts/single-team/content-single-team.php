<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
use radiustheme\roofix\Helper;

global $post;
$roofix                         = ROOFIX_THEME_PREFIX;
$cpt                            = ROOFIX_THEME_CPT_PREFIX;
$thumb_size                     = "roofix-single-team";
$id                             = get_the_id();   
$about_title                   = get_post_meta( $id, "{$cpt}_about_title", true );
$designation                   = get_post_meta( $id, "{$cpt}_designation", true );
$about                         = get_post_meta( $id, "{$cpt}_about", true );
$phone                         = get_post_meta( $id, "{$cpt}_phone", true );
$email                         = get_post_meta( $id, "{$cpt}_email", true );
$social_fields                  = Helper::team_socials();
$team_social                        = get_post_meta( $id, "{$cpt}_team_social", true );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single single-team-partial' ); ?>>
<section class="single-team-wrap-layout1">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="single-team-box-layout1">
                    <div class="item-img">
                         <?php the_post_thumbnail( $thumb_size );?>
                    </div>   
                      <ul class="item-social">                        
                            <?php foreach ( $team_social as $key => $social ): ?>
                                <?php if ( !empty( $social ) ): ?>
                                    <li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a>
                                    </li>
                                <?php endif; ?>
                        <?php endforeach; ?>
                     </ul>                  
                </div>
            </div>

            <div class="col-xl-7 col-lg-6">
                <div class="single-team-box-layout1">
                    <div class="item-content">      
                         <h2 class="item-title"><?php the_title();; ?></h2>                        
                        <?php if ($designation) { ?>
                            <h3 class="item-subtitle"><?php echo esc_html($designation); ?></h3>
                        <?php }  ?>  
                          <div class="item-mail">
                              <div class="item-list">
                                <i class="far fa-envelope"></i><?php echo esc_html($email); ?> 
                              </div>
                              <div class="item-list">
                                <i class="fas fa-phone"></i><?php echo esc_html($phone); ?>
                              </div>
                        </div>
                                                    
                        <?php $allowed_tags = wp_kses_allowed_html( 'post' ); ?>
                         <div class= "item-info"><?php echo wp_kses( $about, $allowed_tags );?></div> 
                          
                        
                    </div>
                </div>
            </div>

            
        </div>
        <?php the_content();?>
    </div>
</section>
</div>