<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;

$roofix      	= ROOFIX_THEME_PREFIX;
$cpt         	= ROOFIX_THEME_CPT_PREFIX;
$thumb_size  	= "roofix-size-5";
$id             = get_the_id();
$designation   			= get_post_meta( $id, "{$cpt}_designation", true );
$content 					= Helper::get_current_post_content();				
$socials       				= get_post_meta( $id, "{$cpt}_team_social", true );
$social_fields 				= Helper::team_socials();
?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
<div class="team-box-layout7-new">		
		<?php
		if ( has_post_thumbnail() ): ?>									    
			<div class="item-img">                           
				<?php the_post_thumbnail( $thumb_size ); ?>	  
			 <div class="item-icons item-social">
			 <div class="item-social"><i class="fas fa-share-alt"></i></div>										
			 <div class="action-share-wrap">
				<?php foreach ( $socials as $key => $social ): ?>
					<?php if ( !empty( $social ) ): ?>
						<a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a>
					<?php endif; ?>
				<?php endforeach; ?>
				</div>								
									 	  

		    </div>
		</div>
		<?php endif; ?>
	    <div class="item-content">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="377" height="114" viewBox="0 0 377 114">
		<path d="M0.000,90.000 L10.000,93.000 L21.000,96.000 L29.000,98.000 L49.000,101.000 L70.000,102.000 L114.000,100.000 L139.000,96.000 L169.000,89.000 L219.000,68.000 L258.000,47.000 L293.000,29.000 L320.000,16.000 L353.000,6.000 L364.000,3.000 L371.000,1.000 L377.000,0.000 L377.000,113.000 L0.000,114.000 L0.000,90.000 Z" class="cls-1"/>
		</svg>
		  	<div class="item-content-mid">
				<h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>		  							
	        <div class="item-subtitle"><?php echo esc_html($designation); ?></div>
	    </div>
	    </div>
	</div>
	</article>