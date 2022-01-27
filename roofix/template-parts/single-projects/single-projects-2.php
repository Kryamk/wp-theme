<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
$template = 'single-projects-2';
?>
<?php get_header(); ?>
<div id="primary" class="content-area single-project-wrap-layout1">
	<div class="container">
		<div class="row">			
			<div class="col-sm-12 col-xs-12">
				<main id="main" class="site-main single-project-box-layout1">
				
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
							 get_template_part( 'template-parts/single-projects/content', $template );
							if ( comments_open() || get_comments_number() ){
								comments_template();
							}
							?>
						<?php endwhile; ?>
								
				</main>					
			</div>			
		</div>
	</div>
</div>
<?php get_footer(); ?>