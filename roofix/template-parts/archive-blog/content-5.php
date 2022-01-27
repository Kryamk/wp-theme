<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
$thumb_size 		= 'roofix-size-blog1';
$post_id = get_the_ID();
$comments_number 	= number_format_i18n( get_comments_number() );
$comments_html  	= $comments_number;
$has_entry_meta_1   = RDTheme::$options['blog_date'] || ( RDTheme::$options['blog_cats'] && has_category() ) ? true : false;
$has_entry_meta_2   = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
$content 			= Helper::get_current_post_content();
$content 			= wp_trim_words( $content,  RDTheme::$options['blog_content_number'] );
$content 			= "<p>$content</p>";
wp_enqueue_script( 'imagesloaded');
wp_enqueue_script( 'isotope-pkgd' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-alt' ); ?>>
	<div class="blog-box-layout1 blog-box-wrp">				   
		<?php if ( has_post_thumbnail() ){?>
			<div class="item-img">	
			<a href="<?php the_permalink();?>">
					<?php the_post_thumbnail( $thumb_size ); ?>
			</a>
										 
				<?php if ( RDTheme::$options['blog_date'] ): ?>
					<div class="top-item">
						<div class="item-date">
							<?php 
							$date = strtotime( get_the_date() );
							$day  = date( 'j', $date );
							$month  = date( 'M', $date );
							 ?>	
							 <span class="days"><?php echo esc_attr($day) ?></span>
						<span class="month"><?php echo esc_attr($month) ?></span>
						</div>
					</div>
				<?php endif; ?>	
			</div>
		<?php } ?>
		<div class="item-content">			
		<?php Helper::roofix_category_prepare();?>	
			<h3 class="item-title"><a href="<?php the_permalink();?>" class="item-title entry-title" rel="bookmark"><?php the_title();?></a></h3>	
			<?php echo wp_kses( $content, 'alltext_allow' );?>	
		<?php echo Helper::rt_get_blog2_post_meta($post_id );?>
		</div>
	</div>
</article>