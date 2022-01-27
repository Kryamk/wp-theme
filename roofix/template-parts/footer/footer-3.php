<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$rdtheme_socials = Helper::socials();
$rdtheme_footer_column = RDTheme::$options['footer_column'];
switch ( $rdtheme_footer_column ) {
	case '1':
	$rdtheme_footer_class = 'col-sm-12 single-item';
	break;
	case '2':
	$rdtheme_footer_class = 'col-sm-6 single-item';
	break;
	case '3':
	$rdtheme_footer_class = 'col-sm-4 single-item';
	break;
	case '6':
	$rdtheme_footer_class = 'col-sm-2 single-item';
	break;
	default:
	$rdtheme_footer_class = 'col-sm-6 col-md-6 col-lg-3 single-item';
	break;
}
?>
</div><!-- #content -->
	<!-- Footer Area Start Here -->
	<footer class="footer-wrap-layout1-new footer-wrap-fix">
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
						
						<div class="col-lg-4">
							<?php dynamic_sidebar( 'footer-1' );?>
						</div>
						<div class="col-lg-2">
							<?php dynamic_sidebar( 'footer-2' );?>
						</div>
						<div class="col-lg-3">
							<?php dynamic_sidebar( 'footer-3' );?>
						</div>
						<div class="col-lg-3">
							<?php dynamic_sidebar( 'footer-4' );?>
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
	<!-- Footer Area End Here -->

