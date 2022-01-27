<?php
/**
 * Template Name: Projects Archive 3
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

RDTheme::$options['project_arc_style'] = 'style3';

$query = Helper::rt_projects_query();

global $wp_query;
$wp_query = NULL;
$wp_query = $query;

get_template_part( 'template-parts/archive-projects/archive', 'projects' );

wp_reset_postdata(); 