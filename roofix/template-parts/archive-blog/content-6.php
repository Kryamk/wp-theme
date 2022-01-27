<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
$thumb_size 		= 'roofix-project-slider';
$post_id = get_the_ID();

$comments_number 		= number_format_i18n( get_comments_number($post_id) );
$comments_html   		= $comments_number < 2 ? esc_html__( 'Comment' , 'roofix' ) : esc_html__( 'Comments' , 'roofix' );
$comments_html  		.= ': '. $comments_number; 
$has_entry_meta_1   	= RDTheme::$options['blog_date'] || ( RDTheme::$options['blog_cats'] && has_category() ) ? true : false;
$has_entry_meta_2   	= RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
$content 				= Helper::get_current_post_content();
$content 				= wp_trim_words( $content,  '44' );
$content 				= "<p>$content</p>";
wp_enqueue_script( 'imagesloaded');
wp_enqueue_script( 'isotope-pkgd' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-alt' ); ?>>
	<div class="blog-box-layout4">
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
			<?php echo Helper::rt_get_blog3_post_meta($post_id );?>
			<h3 class="item-title"><a href="<?php the_permalink();?>" class="item-title entry-title" rel="bookmark"><?php the_title();?></a></h3>		  
		 	<?php echo wp_kses( $content, 'alltext_allow' );?>
		    <ul class="btn-area">
		        <li>
		            <a href="<?php the_permalink();?>" class="item-btn"> <?php esc_attr_e( 'Continue Reading', 'roofix' );?> <i class="fas fa-long-arrow-alt-right"></i></a>
		        </li>
		        <li><i class="far fa-comment"></i><?php echo wp_kses_post( $comments_html );?></li>
		    </ul>
		</div>
	</div>
</article>