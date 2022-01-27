<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
$thumb_size = 'roofix-size-blog2';
$comments_number = number_format_i18n( get_comments_number() );
$comments_html  = $comments_number;
$has_entry_meta_1  = RDTheme::$options['blog_date'] || ( RDTheme::$options['blog_cats'] && has_category() ) ? true : false;
$has_entry_meta_2  = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
$content = Helper::get_current_post_content();
$content = wp_trim_words( $content,  RDTheme::$options['blog_content_number'] );
$content = "<p>$content</p>";
wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'isotope-pkgd' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-alt single-item' ); ?>>
	<?php if ( has_post_thumbnail() ){?>  
		<div class="blog-box-layout2 blog-box-wrp">
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
	  	<div class="item-content">
		<?php Helper::roofix_category_prepare();?>	
	      <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	  </div>
	</div>
	<?php }else{ ?>
		<div class="blog-box-wrp blog-box-layout2-non-img">
		  <div class="item-img">			 
				<?php if ( RDTheme::$options['blog_date'] ): ?>
				<div class="top-item">
					<div class="item-date">
						<?php the_time( get_option( 'date_format' ) );?>
					</div>
				</div>
				<?php endif; ?>	
		  </div>
		  <div class="item-content">
		      <?php Helper::roofix_category_prepare();?>
		      <h3 class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		  </div>
		</div>
	<?php } ?>	
</article>