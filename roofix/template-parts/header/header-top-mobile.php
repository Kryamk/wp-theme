<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

$rdtheme_socials = Helper::socials();

 if ( RDTheme::$options['social_icon'] ){
    $rdtheme_top_class = "col-sm-9 col-md-9 col-lg-10";
 }else{
    $rdtheme_top_class = "col-sm-12";
 }
 if ( RDTheme::$header_style == '2' ){
    $fullwidth_compress = 'full-width-left-compress';
    $container = 'container-fluid';
}elseif( RDTheme::$header_style == '5' ){
    $fullwidth_compress = 'full-width-left-compress';
    $container = 'container-fluid';
}else{
    $container = 'container';
    $fullwidth_compress = 'full-width-compress-none';
}   
?>
<?php if( RDTheme::$options['phone_has_email'] || RDTheme::$options['phone_has_opening'] || RDTheme::$options['phone_has_mobile'] || RDTheme::$options['phone_has_social'] ) { ?>
<div id="mobile-header-topbar" class="mobile-header-topbar">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="mobile-topbar-layout1">
					<ul class="mobile-top">

					<?php if ( RDTheme::$options['phone_has_email'] ): ?>
					<li>
						<i class="fas fa-envelope"></i>
						<a href="mailto:<?php echo esc_attr( RDTheme::$options['email'] );?>">
						<?php echo esc_html( RDTheme::$options['email'] );?></a>
					</li>
					<?php endif; ?>

					<?php if ( RDTheme::$options['phone_has_opening'] ): ?>
						<li>
							<i class="far fa-clock"></i>                               
							<?php echo esc_html( RDTheme::$options['opening'] );?>
						</li>
					<?php endif; ?>
			   
						<?php if ( RDTheme::$options['phone_has_mobile'] ): ?>
						<li class="mobile-phone">
							<i class="fas fa-phone-volume"></i><a href="tel:<?php echo esc_attr( RDTheme::$options['phone'] );?>"><?php echo esc_html( RDTheme::$options['phone'] );?></a>
						</li>
						<?php endif; ?> 
					<?php if ( RDTheme::$options['phone_has_social'] ): ?>
						<?php if (  !empty($rdtheme_socials)): ?>                   
							 <li class="social-icon">
								<?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
									<a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>">
										<i class="fab <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i>
									</a>
								<?php endforeach; ?>                    
							</li>       
						<?php endif; ?>
						<?php endif; ?>                    
					</ul>
			  
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>