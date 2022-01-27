<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-search' ); ?>>
	<div class="entry-content-area">
		<div class="entry-header">
			<h2><a href="<?php the_permalink();?>" class="entry-title" rel="bookmark"><?php the_title();?></a></h2>
		</div>
		<div class="entry-content">
			<?php the_excerpt();?>
			<a href="<?php the_permalink();?>" class="read-more-btn"><?php esc_html_e( 'READ MORE', 'roofix' );?><i class="fas fa-angle-right" aria-hidden="true"></i></a>
		</div>
	</div>
</article>