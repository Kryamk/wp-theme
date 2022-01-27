<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$comments_number = number_format_i18n( get_comments_number() );
$comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'roofix' ) : esc_html__( 'Comments' , 'roofix' );
$comments_html  .= ': '. $comments_number;
$has_entry_meta_1  = RDTheme::$options['blog_date'] || ( RDTheme::$options['blog_cats'] && has_category() ) ? true : false;
$has_entry_meta_2  = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
$content = Helper::get_current_post_content();
$content = wp_trim_words( $content,  RDTheme::$options['blog_content_number'] );
$content = "<p class='entry-content'>$content</p>";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-alt' ); ?>>
	<div class="entry-thumbnail-area">
		<?php
		if ( has_post_thumbnail() ){ ?>
		<a href="<?php the_permalink();?>" rel="bookmark">
		<?php	
		the_post_thumbnail(); ?>		
		</a>
		<?php 
		}	
		?>
	</div>
	<div class="entry-content-area">
		<div class="entry-header">
			<?php if ( $has_entry_meta_1 ): ?>
			<ul class="entry-meta-1">
				<?php if ( RDTheme::$options['blog_date'] ): ?>
					<li><a href="<?php the_permalink();?>" rel="bookmark"><span class="updated published"> <i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time( get_option( 'date_format' ) );?></span></a></li>
				<?php endif; ?>				
			</ul>
		<?php endif; ?>
            <h2><a href="<?php the_permalink();?>" class="entry-title" rel="bookmark"><?php the_title();?></a></h2>
        </div>
        <div class="entry-content">
			<div class="entry-summary">
			 	<?php echo wp_kses_post( $content );?>
			</div>
			<?php if ( $has_entry_meta_2 ): ?>
				<ul class="entry-meta-2">					
					<?php if ( RDTheme::$options['blog_author_name'] ): ?>
						<li class="vcard-author"><i class="fas fa-user" aria-hidden="true"></i><span class="vcard author"><?php the_author_posts_link();?></span></li>
					<?php endif; ?>					
					<?php if ( RDTheme::$options['blog_comment_num']): ?>
						<li class="vcard-comments"> <a href="<?php the_permalink();?>"><i class="fas fa-comments" aria-hidden="true"></i> <?php echo wp_kses_post( $comments_html );?></a></li>
					<?php endif; ?>		
				</ul>
			<?php endif; ?>
		</div>
	</div>
</article>