<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;


switch ( RDTheme::$single_services_layout  ) {
	case 'style2':
	 	get_template_part( 'template-parts/single-services/single', 'services-2');
	break;		
	case 'style3':
	 	get_template_part( 'template-parts/single-services/single', 'services-3');
	break;		
	default:
	 	get_template_part( 'template-parts/single-services/single', 'services-1');
	break;
}
?>