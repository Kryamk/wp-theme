<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
use radiustheme\roofix\Socials;
$thumb_size = 'roofix-size-1';
$item_tag_area = "";
if ( RDTheme::$options['post_tags'] && has_tag() ){
 	$item_tag_area = "post-has-tag";
 }else{
 	$item_tag_area = "post-has-no-tag";
 }
$thumb_class = has_post_thumbnail() ? '' : ' nothumb';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-single' ); ?>>
	<?php
		if ( has_post_thumbnail() ){ ?>		
		<div class="entry-thumbnail-area <?php echo esc_attr( $thumb_class );?>">
			<?php the_post_thumbnail( $thumb_size );?>	

			<?php if ( RDTheme::$options['post_date'] ): ?>
				<div class="post-item-date">
					<i class="fas fa-calendar"></i><span class="updated published"> <?php the_time( get_option( 'date_format' ) );?></span>
				</div>
			<?php endif; ?> 

		</div>	
	<?php } ?>
	<div class="entry-content-area single-blog-wrapper single-blog-box-layout1 single-article-selector">			   
		<?php echo Helper::rt_get_blog_single_post_meta(get_the_ID());?>
		<div class="entry-content  item-content"><?php the_content();?></div>
		<?php wp_link_pages( array(
		'before'      => '<div class="roofix-page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'roofix' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		) );		
 
		?>
		<?php 
			$post_social = RDTheme::$options['post_social']  ;
			$social_class_exists = class_exists( Socials::class );
			$has_social = $post_social && $social_class_exists;
			$col_class  = $has_social ? 'col-md-6' : 'col-12';
			?>
		<?php if ( RDTheme::$options['post_tags'] &  RDTheme::$options['post_social'] & has_tag() ): ?>
	
		<div class="single-article-selector item-tag-area <?php echo esc_attr( $item_tag_area );?>">
			<?php if ( RDTheme::$options['post_tags'] && has_tag() ): ?>
				<div class="tag entry-tags">
					<?php echo get_the_term_list( get_the_ID(), 'post_tag','','' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( RDTheme::$options['post_social'] == "1"  ): ?>
			  <?php if ($has_social): ?>
			    <?php Socials::render(); ?>
			  <?php endif ?>
			<?php endif; ?>
		</div>

		<?php endif; ?>
		<?php
			$post_author_social = RDTheme::$options['post_author_social'];
			$author_social_class_exists = class_exists(Author_Social::class);
			$has_author_social = $post_author_social && $author_social_class_exists;
			?>
			<?php
			$about_author = get_the_author_meta( 'description' );
			$has_author_info = RDTheme::$options['post_about_author'] && $about_author ;
		?>

		<?php if ($has_author_info): ?>
		  <?php
		  $author_id = get_post_field( 'post_author', get_the_ID() );
		  $author_id = get_the_author_meta( 'ID' );
		  ?>
		  <div class="blog-author">
		    <div class="media media-none--sm media-none-md">
		      <div class="item-img">
		        <?php echo get_avatar( $author_id, null, null, 'blog author', ['class' => 'media-img-auto'] ) ?>
		      </div>
		      <div class="media-body media-none-sm">
		        <h4 class="item-title"><?php the_author(); ?></h4>
		        <div class="item-subtitle"><?php esc_html_e( 'Author', 'roofix' );?></div>
		        <p><?php echo esc_html( $about_author ); ?></p>
		        <?php if ($has_author_social): ?>
		          <?php Author_Social::render( $author_id ); ?>
		        <?php endif ?>
		      </div>
		    </div>
		  </div>
		<?php endif ?>
		<?php
		if ( RDTheme::$options['post_pagination'] ) {
			get_template_part( 'template-parts/content-single-pagination' );
		}
		?>
	</div>
</article>