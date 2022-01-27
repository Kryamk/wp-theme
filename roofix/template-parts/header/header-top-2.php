<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$rdtheme_socials = Helper::socials();
 if ( RDTheme::$header_style == '2' ){
	$fullwidth_compress = 'full-width-left-compress pd-header-200';
	$container = 'container-fluid';
}elseif( RDTheme::$header_style == '5' ){
	$fullwidth_compress = 'full-width-left-compress pd-header-200';
	$container = 'container-fluid';
}else{
	$container = 'container';
	$fullwidth_compress = 'full-width-compress-none';
}	
?>
<div class="header-top-bar layout-2 d-none d-md-block <?php echo esc_attr( $fullwidth_compress );?>" id="tophead">
	<div class="<?php echo esc_attr( $container );?> topbar-information-selector"> 
		<div class="row d-flex align-items-center">
			<div class="col-sm-12">
				<div class="tophead-contact header-contact-layout2">
					<ul>
						<?php if ( RDTheme::$options['address'] ): ?>
							<li>
								<i class="fas fa-map"></i><span><?php echo wp_kses_post( RDTheme::$options['address'] );?></span>
							</li>					
						<?php endif; ?>	

						<?php if ( RDTheme::$options['email'] ): ?>
	                        <li>
	                            <i class="fas fa-envelope"></i>
	                            <a href="mailto:<?php echo esc_attr( RDTheme::$options['email'] );?>">
	                           <?php echo esc_html( RDTheme::$options['email'] );?></a>
	                        </li>
                        <?php endif; ?>						
					</ul>
				</div>
				<div class="tophead-right header-social-layout1">
					<?php if ( $rdtheme_socials ): ?>
						<ul class="tophead-social">
							<?php foreach ( $rdtheme_socials as $rdtheme_social ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $rdtheme_social['url'] );?>"><i class="fab <?php echo esc_attr( $rdtheme_social['icon'] );?>"></i></a></li>
							<?php endforeach; ?>					
						</ul>						
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>