<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-selector"></div>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="page-thumbnail"><?php the_post_thumbnail( 'rdtheme-size1' );?></div>
	<?php endif; ?>
	<div class="entry-content page-content-main">
		<?php the_content();?>
		<?php wp_link_pages( array(
			'before'      => '<div class="roofix-page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'roofix' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			) );
		?>
	</div>
</article>