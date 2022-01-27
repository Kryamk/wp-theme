<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
switch ( RDTheme::$single_project_layout ) {
	case 'style2':
	get_template_part( 'template-parts/single-projects/single', 'projects-2');
	break;	
	case 'style3':
	get_template_part( 'template-parts/single-projects/single', 'projects-3');
	break;			
	default:
	 get_template_part( 'template-parts/single-projects/single', 'projects-1');
	break;
}
?>