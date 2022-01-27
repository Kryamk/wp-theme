<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$roofix = ROOFIX_THEME_PREFIX_VAR;

if ( is_404() ) {
	$rdtheme_title = RDTheme::$options['error_title'];
	$rdtheme_title = esc_html__( '404 Error Page ', 'roofix' ) . get_search_query();
}
elseif ( is_search() ) {
	$rdtheme_title = esc_html__( 'Search Results for : ', 'roofix' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$rdtheme_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$rdtheme_title = apply_filters( "{$roofix}_blog_title", esc_html__( 'All Posts', 'roofix' ) );
	}
}
elseif ( is_archive() ) {
	$cpt = ROOFIX_THEME_CPT_PREFIX;	
	if ( is_post_type_archive( "{$cpt}_team" ) ) {
		$rdtheme_title = esc_html__( 'All Team', 'roofix' );
	}
	elseif ( is_post_type_archive( "{$cpt}_team" ) ) {
		$rdtheme_title = esc_html__( 'All Team Member', 'roofix' );
	}
	else {
		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			$rdtheme_title = esc_html__( 'Shop', 'roofix' );
		}else {
			$rdtheme_title = get_the_archive_title();
		}
	}
}elseif (is_single()) {
	$id        = $post->ID;
	$rdtheme_title      = get_post_meta($id, 'roofix_custom_page_title', true);

	if (!empty($rdtheme_title)) {
		$rdtheme_title      = $rdtheme_title;
	 } else { 
		$rdtheme_title = get_the_title();	                   
 	}
	

}else{
	$id                     = get_the_ID();
	$custom_page_title      = get_post_meta($id, 'roofix_custom_page_title', true);

	if (!empty($custom_page_title)) {
		$rdtheme_title      = get_post_meta($id, 'roofix_custom_page_title', true);
	 } else { 
		$rdtheme_title = get_the_title();	                   
 	}
}

if ( RDTheme::$bgtype == 'bgcolor' ) { ?>
	<?php if ( RDTheme::$has_banner == '1' || RDTheme::$has_banner != "off" ): ?>
		<div class="entry-banner inner-page-banner bg-common inner-page-top-margin">
			<?php if( function_exists( 'bcn_display') ){ 
					 echo '<div class="inner-page-banner">';
				 } else{
				 	echo '<div class="inner-page-banner breadcrumbs-off">';
				 } ?>	
			<div class="container">
				<div class="entry-banner-content breadcrumbs-area">
					<h1 class="entry-title"><?php echo wp_kses( $rdtheme_title, 'alltext_allow' );?></h1>
					<?php if ( RDTheme::$has_breadcrumb == '1' || RDTheme::$has_breadcrumb == 'on' ): ?>
						<?php 
						get_template_part( 'template-parts/content', 'breadcrumb' );?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		</div>
		<?php endif; 
	} else { ?>
		<?php 	
		if ( RDTheme::$has_banner == "1" || RDTheme::$has_banner != "off" ): ?>
			<div class="entry-banner entry-banner-after inner-page-banner bg-common inner-page-top-margin">			
			<?php if( function_exists( 'bcn_display') ){ 
					 echo '<div class="inner-page-banner">';
				 } else{
				 	echo '<div class="inner-page-banner breadcrumbs-off">';
				 } ?>	
			<div class="container">
				<div class="entry-banner-content breadcrumbs-area">
					<h1 class="entry-title"><?php echo wp_kses( $rdtheme_title, 'alltext_allow' );?></h1>					
					<?php if ( RDTheme::$has_breadcrumb == '1' || RDTheme::$has_breadcrumb  != "off" ): ?>
						<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		</div>
	<?php endif; 
	}
?>