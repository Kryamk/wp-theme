<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
?>

<?php if ( RDTheme::$options['header_btn'] ): ?>   
     <a class="header-btn-new item-btn" href="<?php echo esc_url( RDTheme::$options['header_buttonUrl'] );?>" title="<?php echo esc_html( RDTheme::$options['header_buttontext'] );?>">
     	<span class="far fa-file-alt"> &nbsp;</span> <?php echo esc_html( RDTheme::$options['header_buttontext'] );?>
     </a>
<?php endif; ?>