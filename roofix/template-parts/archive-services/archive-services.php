<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
if ( RDTheme::$layout 			== 'full-width' ) {
	$layout_class 				= 'col-lg-12 archive-services-add_partial';
	$col_class    				= 'col-lg-4 col-md-6';
}
else{
	$layout_class 				= 'col-md-8 archive-services-add_partial';
	$col_class    				= 'col-lg-6 col-md-6';
}
$layout_bg_class 	= "";
$row 				= '';
switch ( RDTheme::$options['services_arc_style'] ) {
	case 'style1':
		$template 			= 'services-1';
		$row 				= 'gutters-2';
		$container 			= 'container';
		$layout_bg_class 	= "services-bg";
	break;	
	case 'style3':
		$template 			= 'services-3';
		$container 			= 'container';
	break;
	case 'style4':
		$template 			= 'services-4';
		$layout_bg_class 	= "services-bg";
		$container 			= 'container-fluid plr60';
	break;	
	default:
		$template 			= 'services-2';
		$container 			= 'container';
		$row 				= '';
		$layout_bg_class 	= "services-bg-def";
	break;
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area <?php echo esc_attr( $layout_bg_class );?>">
	<div class="<?php echo esc_attr( $container );?>">
		<div class="row">
			<?php
				if ( RDTheme::$layout == 'left-sidebar' ) {
					get_sidebar();
				}
			?>
			<div class="<?php echo esc_attr( $layout_class );?>">
				<main id="main" class="site-main rt-services-archive">
					<?php if ( have_posts() ) :?>
						<div class="row auto-clear <?php echo esc_attr( $row );?>">
							<?php $i = 1;  ?>
                            <?php while ( have_posts() ) : the_post(); ?>

								<div class="<?php echo esc_attr( $col_class );?>">
									<?php get_template_part( 'template-parts/archive-services/content', $template, ['i'=>$i]); ?>
								</div>
						<?php $i++; ?>
							<?php endwhile; ?>
						</div>
						<?php Helper::pagination();?>
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
				</main>
			</div>
			<?php
			if ( RDTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>