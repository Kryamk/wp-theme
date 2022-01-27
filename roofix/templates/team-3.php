<?php
/**
 * Template Name: Team archive 3
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
RDTheme::$options['team_arc_style'] = 'style3';
$query = Helper::team_query();
global $wp_query;
$wp_query = NULL;
$wp_query = $query;

get_template_part( 'template-parts/archive-team/archive', 'team' );

wp_reset_postdata(); 