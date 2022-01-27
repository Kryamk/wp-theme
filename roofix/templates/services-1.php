<?php
/**
 * Template Name: Services Archive 1
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

RDTheme::$options['services_arc_style'] = 'style1';

$query = Helper::services_query();

global $wp_query;
$wp_query = NULL;
$wp_query = $query;

get_template_part( 'template-parts/archive-services/archive', 'services' );

wp_reset_postdata(); 