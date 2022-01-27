<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$rdtheme_socials = Helper::socials();
?>

	<div class="header-top-bar layout-3">
		<div class="container topbar-information-selector">
			<div class="row">
				<div class="col-sm-12">
					<div class="tophead-contact header-contact-layout1">
						<ul>
							<?php if ( RDTheme::$options['phone'] ): ?>
								<li>
									<i class="fas fa-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( RDTheme::$options['phone'] );?>"><?php echo esc_html( RDTheme::$options['phone'] );?></a>
								</li>
							<?php endif; ?>		
							<?php if ( RDTheme::$options['address'] ): ?>
							<li>
								<i class="fas fa-map-marker-alt" aria-hidden="true"></i><span><?php echo wp_kses_post( RDTheme::$options['address'] );?></span>
							</li>
						<?php endif; ?>										
							<?php if ( RDTheme::$options['opening'] ): ?>
								<li>
									<i class="far fa-clock" aria-hidden="true"></i><?php echo esc_html( RDTheme::$options['opening_label'] );?><?php echo esc_html( RDTheme::$options['opening'] );?>
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
