<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$thumb_size = 'full';
$comments_number = number_format_i18n( get_comments_number() );
$comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'roofix' ) : esc_html__( 'Comments' , 'roofix' );
$comments_html  .= ': '. $comments_number;
$has_entry_meta_1  = RDTheme::$options['blog_date'] || ( RDTheme::$options['blog_cats'] && has_category() ) ? true : false;
$has_entry_meta_2  = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
$content = Helper::get_current_post_content();
$content = wp_trim_words( $content,  RDTheme::$options['blog_content_number'] );
$content = "<p>$content</p>";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-alt' ); ?>>
	<div class="blog-layout2 blog-section">
		    <div class="media align-items-center media-none--sm">
		        <div class="item-img">
		        	<a href="<?php the_permalink();?>">
		           	<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size );
						}						
					?></a>				
					<?php if ( RDTheme::$options['blog_date'] ): ?>
						 <div class="item-date updated published"><?php the_time( get_option( 'date_format' ) );?></div>
					<?php endif; ?>		
						
		        </div>
		        <div class="media-body media-body-box">
		            <div class="item-title">
		                <h2 class="entry-title title size-blog title-semibold color-dark hover-primary">
		                      <a href="<?php the_permalink();?>"><?php the_title();?></a>
		                </h2>
		            </div>
		            <div class="item-deccription entry-summary">
		               <?php echo wp_kses( $content, 'alltext_allow' );?>
		                 <a href="<?php the_permalink();?>" class="rdtheme-button-blog"><?php esc_html_e( 'Read More', 'roofix' );?> &nbsp; <i class="fas fa-angle-right" aria-hidden="true"></i></a>
		            </div>
		        </div>
		    </div>
		</div>
</article>