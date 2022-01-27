<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
?>
<?php get_header(); ?>
<div id="primary" class="content-area customize-content-selector">
	<div class="container">
		<div class="row">
			<?php Helper::left_sidebar(); ?>
			<div class="<?php echo esc_attr( Helper::the_layout_class() ); ?>">
				<main id="main" class="site-main page-content-main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php
						if ( comments_open() || get_comments_number() ){
							comments_template();
						}
						?>
					<?php endwhile; ?>
				</main>
			</div>
			 <?php Helper::right_sidebar();?>
		</div>
	</div>
</div>
<?php get_footer(); ?>