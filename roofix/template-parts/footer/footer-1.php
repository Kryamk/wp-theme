<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$rdtheme_footer_column = RDTheme::$options['footer_column'];
switch ( $rdtheme_footer_column ) {
	case '1':
	$rdtheme_footer_class = 'col-md-12 single-item';
	break;
	case '2':
	$rdtheme_footer_class = 'col-md-6 single-item';
	break;
	case '3':
	$rdtheme_footer_class = 'col-md-4 single-item';
	break;
	case '6':
	$rdtheme_footer_class = 'col-md-2 single-item';
	break;
	default:
	$rdtheme_footer_class = 'col-md-6 col-md-6 col-lg-3 single-item';
	break;
}
$rdtheme_socials = Helper::socials();
$rdtheme_footer_logo = empty(  RDTheme::$options['footer_logo'] ) ? '<img width="489" height="121" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-light.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['footer_logo'],'full');
?>
</div> 

<footer class="footer-wrap-layout1-new footer-wrap-fix-off">	
	<?php if ( RDTheme::$options['footer_top_area'] ): ?>
		<div class="top-footer-layout1 footer-top-information-selector">
	        <div class="container">
				<div class="row d-flex align-items-center footer-logo-wrp">
					<div class="col-lg-4 col-md-6">
						<a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
						<?php echo wp_kses_post( $rdtheme_footer_logo );?>
						</a>	
					</div>
					<div class="col-lg-4 col-md-6 ">
						<div class="text-center">
							<div class="media footer-contact-phone">
							    <i class="fas fa-phone"></i>
							    <div class="media-body space-sm">
							        <div class="title"><?php echo esc_attr( RDTheme::$options['footer_phone_lable'] );?></div>
							        <div class="info"><?php echo esc_attr( RDTheme::$options['footer_phone'] );?></div>
							    </div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12">
						<?php if ( $rdtheme_socials ): ?>					
						<div class="footer-social">
						    <ul>					    	
								<?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
									<li>
										<a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>">
											<i class="fab <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i>
										</a>
									</li>
								<?php endforeach; ?>
						    </ul>
						</div>
						<?php endif; ?>
					</div>				
	        	</div>
	        </div>
	    </div>
  	<?php endif; ?>

	<?php if ( Helper::has_footer() ): ?>
	    <div class="footer-top-wrap-layout1">
	        <div class="container">
	              <div class="row">
					<?php if ( RDTheme::$options['active_footer_column'] ): ?>
						<?php
						for ( $i = 1; $i <= $rdtheme_footer_column; $i++ ) {
							echo '<div class="' . esc_attr($rdtheme_footer_class) . '">';
									dynamic_sidebar( 'footer-'. $i );
							echo '</div>';
						}
						?>	
					<?php else: ?>						
						<div class="col-lg-4 col-md-4 active_footer">
							<?php dynamic_sidebar( 'footer-1' );?>
						</div>
						<div class="col-lg-5 col-md-4 active_footer">
							<?php dynamic_sidebar( 'footer-2' );?>
						</div>
						<div class="col-lg-3 col-md-4 active_footer active_footer_last">
							<?php dynamic_sidebar( 'footer-3' );?>
						</div>						
					<?php endif; ?>
	            </div>
	        </div>
	         <?php endif; ?>
	    </div>
	<?php if ( RDTheme::$options['copyright_area'] ): ?>
		<div class="footer-bottom-wrap-layout1">
	    	<div class="copyright"><?php echo wp_kses_post( RDTheme::$options['copyright_text'] );?></div>
		</div>		  
	<?php endif; ?>

</footer>


