<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;

/**
 * this traits method having html and php mixture  
 */
trait ImpureTrait {

  public static function generate_single_project_details_for_full_width_layout($post)
  {
    $rtroofix = ROOFIX_THEME_CPT_PREFIX;
    $fields  = get_post_meta( $post->ID, "{$rtroofix}_project_fields", true );
    $fields  = $fields ? $fields : array();
    ?>
      <ul class="single-project-item-details">
        <li><?php esc_html_e( 'Project Name', 'roofix' );?>: <span><?php echo esc_html( $post->post_title ); ?></span> </li>
        <?php foreach ( $fields as $field ):?>
          <?php if ( isset( $field['project_label'] ) && isset( $field['project_value'] ) ): ?>
            <li><?php echo esc_html( $field['project_label'] );?>: <span><?php echo wp_kses_post( $field['project_value'] );?></span></li>
          <?php endif; ?>
        <?php endforeach;?>
      </ul>
  <?php
  } 
  
  public static function generate_single_project_info_sidebar()
  {
   
    $rtroofix = ROOFIX_THEME_CPT_PREFIX;
    if (is_singular( "{$rtroofix}_project" ) ):
      While(have_posts()):
        the_post();
        $fields        = get_post_meta( get_the_ID(), "{$rtroofix}_project_fields", true );
        $fields        = $fields ? $fields : array();

    ?>
      <div class="widget widget-project-info">
        <h3 class="title title-bar-xl1">Project Info</h3>
        <ul class="item-details">
            <li><?php esc_html_e( 'Project Name', 'roofix' );?>: <span><?php the_title(); ?></span> </li>
            <?php foreach ( $fields as $field ):?>
              <?php if ( isset( $field['project_label'] ) && isset( $field['project_value'] ) ): ?>
                <li><?php echo esc_html( $field['project_label'] );?>: <span><?php echo wp_kses_post( $field['project_value'] );?></span></li>
              <?php endif; ?>
            <?php endforeach;?>
        </ul>
      </div>
      <?php
      endwhile;
    endif;
  }
}