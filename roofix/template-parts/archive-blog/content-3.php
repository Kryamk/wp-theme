<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

$thumb_size = 'roofix-size-2';
$post_id = get_the_ID();
$comments_number = number_format_i18n( get_comments_number() );
$comments_html  = $comments_number;
$has_entry_meta_1  = RDTheme::$options['blog_date'] || ( RDTheme::$options['blog_cats'] && has_category() ) ? true : false;
$has_entry_meta_2  = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
$content = Helper::get_current_post_content();
$content = wp_trim_words( $content,  RDTheme::$options['blog_content_number'] );
$content = "<p>$content</p>";
$title = get_the_title();
$title = wp_trim_words( $title, RDTheme::$options['blog_title_number'] );
wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'isotope-pkgd' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-alt single-item' ); ?>>
	<div class="blog-box-layout3new blog-box-wrp">		

		<?php if ( has_post_thumbnail() ){?>  
			<div class="item-img">
				<a href="<?php the_permalink();?>" rel="bookmark">
						<?php the_post_thumbnail( $thumb_size );?>								
				</a>								 
				<?php if ( RDTheme::$options['blog_date'] ): ?>
					<div class="top-item">
						<div class="item-date">
							<i class="far fa-calendar-alt"></i><span class="updated published"> <?php the_time( get_option( 'date_format' ) );?></span>
						</div>
					</div>
				<?php endif; ?>	
			</div>
			<?php } ?>
			<div class="item-content">
				<h3 class="item-title"><a href="<?php the_permalink();?>"><?php echo esc_attr($title) ?></a></h3>	
				<?php echo Helper::rt_get_blog_single_post_meta($post_id); ?>
				<?php if ( RDTheme::$options['blog_cotent_show'] ): ?>						
					<?php echo wp_kses( $content, 'alltext_allow' );?>				
				<?php endif; ?>	
				<?php if ( RDTheme::$options['read_more_show'] ): ?>
					<a href="<?php the_permalink();?>" class="non-ghost-btn-md"><?php esc_attr_e( 'Read More', 'roofix' );?><span><i class="fas fa-caret-right"></i></span></a>
				<?php endif; ?>	
		</div>
	</div>
</article>