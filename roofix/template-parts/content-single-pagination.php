<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
use radiustheme\Roofix\RDTheme;
$previous = get_previous_post();
$next = get_next_post();

$single_pagination      = ' previous-next';

$previous_pagination    = '';
$next_pagination        = '';
if( $previous ){
    $previous_pagination = ' previous';
}
if( $next ){
    $next_pagination = ' next';
}

?>
<div class="single-post-pagination <?php echo esc_attr( $single_pagination ); echo esc_attr( $previous_pagination ); echo esc_attr( $next_pagination ); ?>">
	<div class="rtin-left rtin-item">
		<?php if ( $previous ): ?>			
			<?php if ( has_post_thumbnail( $previous ) ): ?>	
				<?php if ( RDTheme::$options['post_pagination_img'] ): ?>
					<div class="rtin-thumb">
						<a href="<?php echo esc_url( get_permalink( $previous ) ); ?>">
							<?php echo get_the_post_thumbnail( $previous, 'thumbnail' ); ?>
							<div class="rtin-icon"><i class="fas fa-plus"></i></div>
						</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<div class="rtin-content">
				<a class="rtin-link" href="<?php echo esc_url( get_permalink( $previous ) ); ?>">
					<i class="fas fa-long-arrow-alt-left"></i><?php echo esc_html_e( 'Previous Post', 'roofix' );?></a>
				<h3 class="rtin-title"><a href="<?php echo esc_url( get_permalink( $previous ) ); ?>"><?php echo get_the_title( $previous ); ?></a></h3>
				<?php if ( RDTheme::$options['post_pagination_date'] ): ?>	
					<div class="rtin-date">
						<i class="far fa-calendar-alt"></i>
						<?php echo esc_html( get_post_time( get_option( 'date_format' ), false, $previous ) ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="rtin-right rtin-item">
		<?php if ( $next ): ?>
			<div class="rtin-content">
				<a class="rtin-link" href="<?php echo esc_url( get_permalink( $next ) ); ?>"><?php echo esc_html_e( 'Next Post', 'roofix' );?>
					<i class="fas fa-long-arrow-alt-right"></i>
				</a>
				<h3 class="rtin-title"><a href="<?php echo esc_url( get_permalink( $next ) ); ?>"><?php echo get_the_title( $next ); ?></a></h3>
				<?php if ( RDTheme::$options['post_pagination_date'] ): ?>					
					<div class="rtin-date">
						<i class="far fa-calendar-alt"></i>
						<?php echo esc_html( get_post_time( get_option( 'date_format' ), false, $next ) ); ?>
					</div>	
				<?php endif; ?>			
			</div>
			<?php if ( has_post_thumbnail( $next ) ): ?>
				<?php if ( RDTheme::$options['post_pagination_img'] ): ?>
				<div class="rtin-thumb"><a href="<?php echo esc_url( get_permalink( $next ) ); ?>"><?php echo get_the_post_thumbnail( $next, 'thumbnail' ); ?><div class="rtin-icon"><i class="fas fa-plus"></i></div></a></div>
			<?php endif; ?>
		<?php endif; ?>
		<?php endif; ?>
	</div>
</div>