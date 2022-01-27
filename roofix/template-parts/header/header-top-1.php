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
    <div id="header-topbar" class="bg-accent  pd-header-200">
        <div class="container-fluid topbar-information-selector">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-topbar-layout1">
                        <ul class="header-top-left">
                        <?php if ( RDTheme::$options['email'] ): ?>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:<?php echo esc_attr( RDTheme::$options['email'] );?>">
                            <?php echo esc_html( RDTheme::$options['email_label'] );?> &nbsp;<?php echo esc_html( RDTheme::$options['email'] );?></a>
                        </li>
                        <?php endif; ?>
                        <?php if ( RDTheme::$options['opening'] ): ?>
                            <li>
                                <i class="far fa-clock"></i> 
                                <span class="opening-label">
                                <?php echo esc_html( RDTheme::$options['opening_label'] );?> &nbsp; </span> 
                                <?php echo esc_html( RDTheme::$options['opening'] );?>
                            </li>
                        <?php endif; ?>                         
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <div class="header-topbar-layout1">
                        <ul class="header-top-right">   
                            <?php if ( RDTheme::$options['phone'] ): ?>
                            <li>
                                <i class="fas fa-phone-volume"></i>&nbsp;<a href="tel:<?php echo esc_attr( RDTheme::$options['phone'] );?>"><?php echo esc_html( RDTheme::$options['phone'] );?></a>
                            </li>
                            <?php endif; ?>     
                        <?php if ( RDTheme::$options['social_icon'] ): ?>
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
