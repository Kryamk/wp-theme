<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
?>
<?php if ( RDTheme::$options['header_btn'] ): ?>
	<div class="header-action-btn">
		<a href="<?php echo esc_url( RDTheme::$options['header_buttonUrl'] );?>" title="Appointment" class="item-btn">
		<?php echo esc_html( RDTheme::$options['header_buttontext'] );?>		
		</a>
	</div>
<?php endif; ?>						
