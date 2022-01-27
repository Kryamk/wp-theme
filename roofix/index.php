<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
?>
<?php get_header(); ?>
<?php 
$rtroofix = ROOFIX_THEME_CPT_PREFIX;

$post_types = ['projects', 'services', 'team'];

foreach ($post_types as $post_type) {
  if ( is_post_type_archive( "{$rtroofix}_{$post_type}" ) || is_tax( "{$rtroofix}_{$post_type}_category" ) ) {
    get_template_part( "template-parts/archive-{$post_type}/archive", $post_type );
    return;
  }
}

$post_class 			= '';
$masonry_grid 			= '';
$post_archive_style 	= RDTheme::$options['blog_style'];

if ($post_archive_style == 1) {
	$masonry_grid 	= 'rt-masonry-grid clearfix';
	$post_class 	= Helper::has_sidebar() ? 'col-lg-12 col-md-12 col-sm-12 no-equal-item' : 'col-lg-6 col-md-6 col-sm-12 no-equal-item';
	$post_class .= ' rt-grid-item';
}
if ($post_archive_style == 2) {
	$masonry_grid = 'rt-masonry-grid clearfix';
	$post_class 	= Helper::has_sidebar() ? 'col-lg-6 col-md-6 col-sm-6 no-equal-item' : 'col-lg-4 col-md-6 col-sm-6 no-equal-item';
	$post_class .= ' rt-grid-item';
}
if ($post_archive_style == 3) {  
	$masonry_grid = 'rt-masonry-grid clearfix';
	$post_class 	= Helper::has_sidebar() ? 'col-lg-12 no-equal-item' : 'col-lg-6 col-md-6 col-sm-6 no-equal-item';
	$post_class .= ' rt-grid-item';
}
if ($post_archive_style == 4) {
	$masonry_grid = 'rt-masonry-grid clearfix';
	$post_class 	= Helper::has_sidebar() ? 'col-lg-6 col-md-6 col-sm-6 no-equal-item' : 'col-lg-4 col-md-6 col-sm-6 no-equal-item';
	$post_class .= ' rt-grid-item';
}
?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row theiaStickySidebar">
		 <?php Helper::left_sidebar(); ?> 			
				<div class="<?php echo esc_attr( Helper::the_layout_class() ); ?>">
				<main id="main" class="site-main site-index">
					<?php if ( have_posts() ) :?>
						<div class="row  <?php echo esc_attr( $masonry_grid ); ?> customize-content-selector">
							<?php while ( have_posts() ) : the_post(); ?>
							<div class="<?php echo esc_attr( $post_class ); ?>">
								<?php get_template_part( 'template-parts/archive-blog/content',  $post_archive_style ); 
							?>
							</div>
						<?php endwhile;	?>
						</div>					
					<div class=" row mt50">
						<?php Helper::pagination();?>
					</div>
					<?php else:?>
						<?php get_template_part( 'template-parts/blog/content', 'none' );?>
					<?php endif;?>
				</main>
			</div>	
			 <?php Helper::right_sidebar() ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
