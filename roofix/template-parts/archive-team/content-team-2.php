<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;

$roofix      = ROOFIX_THEME_PREFIX;
$cpt         = ROOFIX_THEME_CPT_PREFIX;
$thumb_size  = "roofix-size-3";
$id            = get_the_id();
$_appointmnet_schedules   = get_post_meta( $id, "{$cpt}_appointmnet_schedules", true );
$_designation   		  = get_post_meta( $id, "{$cpt}_designation", true );
$_degree   				  = get_post_meta( $id, "{$cpt}_degree", true );
$socials                    = get_post_meta( $id, "{$cpt}_team_social", true );
$social_fields              = Helper::team_socials();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="team-box-layout4">
        <?php
            if ( has_post_thumbnail() ){ ?>                                     
                <div class="item-img">                           
                    <?php the_post_thumbnail( $thumb_size ); ?>                             
                </div>
            <?php } ?>
            <div class="item-content">
                <div class="item-heading">
                    <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>     
                    <div class="item-subtitle"><?php echo esc_html($_designation); ?></div>                  
                </div>           
                <ul class="item-social">
                    <?php foreach ( $socials as $key => $social ): ?>
                        <?php if ( !empty( $social ) ): ?>
                            <li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>

            </div>
         </div>
</article>