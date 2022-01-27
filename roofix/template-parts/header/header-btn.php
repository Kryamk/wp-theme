<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
?>

<?php if ( RDTheme::$options['header_btn'] ): ?>       
    <div class="header-action-layout1">
        <ul>
            <li class="header-action-btn">
             <a href="<?php echo esc_url( RDTheme::$options['header_buttonUrl'] );?>" title="<?php echo esc_html( RDTheme::$options['header_buttontext'] );?>" class="item-btn"><span class="far fa-envelope"></span><?php echo esc_html( RDTheme::$options['header_buttontext'] );?>
                <i class="fas fa-long-arrow-alt-right"></i></a>
            </li>
        </ul>
    </div>
<?php endif; ?>