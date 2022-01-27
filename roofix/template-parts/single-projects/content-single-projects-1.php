<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

use radiustheme\roofix\Helper;

$cpt = ROOFIX_THEME_CPT_PREFIX;
wp_enqueue_script('imagesloaded');
wp_enqueue_script('isotope-pkgd');

$short_detail_title     = get_post_meta(get_the_ID(), "{$cpt}_short_detail_title", true);
$additional_images      = get_post_meta(get_the_ID(), "{$cpt}_additional_image", true);
$short_detail           = get_post_meta(get_the_ID(), "{$cpt}_short_detail", true);
$client                 = get_post_meta(get_the_ID(), "{$cpt}_client", true);
$start_date             = get_post_meta(get_the_ID(), "{$cpt}_start_date", true);
$end_date               = get_post_meta(get_the_ID(), "{$cpt}_end_date", true);
$website                = get_post_meta(get_the_ID(), "{$cpt}_website", true);
$rating                 = get_post_meta(get_the_ID(), "{$cpt}_rating", true);
$projects_category      = wp_get_post_terms( get_the_ID(), "{$cpt}_projects_category", array( 'fields' => 'all' ) );
$full_content           = get_the_content();


$owl_data_related = array(
    'nav'                => true,
    'dots'               => false,
    'navText'            => array("<span><i class='fas fa-caret-left'></i></span>", "<span><i class='fas fa-caret-right'></i></span>"),
    'autoplay'           => false,
    'autoplayTimeout'    => '5000',
    'autoplaySpeed'      => '200',
    'autoplayHoverPause' => false,
    'loop'               => false,
    'margin'             => 30,
    'responsive'         => array(
        '0'    => array('items' => 1),
        '480'  => array('items' => 1),
        '768'  => array('items' => 1),
        '992'  => array('items' => 1),
        '1200' => array('items' => 2),
    )
);
$owl_data_related = json_encode($owl_data_related);

wp_enqueue_style('owl-carousel');
wp_enqueue_style('owl-theme-default');
wp_enqueue_script('owl-carousel');

$rating = $rating;
$nonrating = 5 - (int)$rating;
$thumb_size_full = 'roofix-size-5';
?>
    <div class="row single-project-partial">
        <div class="col-lg-6 col-12">
            <div class="single-project-img">
                <div class="item-image">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <?php the_post_thumbnail($thumb_size_full); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="widget-project-info mg-b-30">
                <div class="heading-layout3 mg-b-15">
                    <?php if (!empty($short_detail_title)) { ?>
                        <h3 class="project-info-title"><?php echo esc_attr($short_detail_title); ?></h3>
                    <?php } else { ?>
                        <h3 class="project-info-title"><?php esc_attr_e('Project Information', 'roofix'); ?></h3>
                    <?php } ?>
                </div>
                <div class="project-details">
                    <ul>
                        <?php if (!empty($client)) { ?>
                            <li><span><?php esc_attr_e('Client', 'roofix'); ?></span><?php echo esc_attr($client); ?>
                            </li>
                        <?php } ?>

                        <?php if (!empty($projects_category)) { ?>
                            <li>
                                <span><?php esc_attr_e('Category', 'roofix'); ?></span>
                                <div class="cat-bin"><?php Helper::rt_get_projects_cat(get_the_id()); ?></div>
                            </li>
                        <?php } ?>

                        <?php if (!empty($start_date)) { ?>
                            <li>
                                <span><?php esc_attr_e('Start', 'roofix'); ?></span><?php echo esc_attr($start_date); ?>
                            </li>
                        <?php } ?>

                        <?php if (!empty($end_date)) { ?>
                            <li><span><?php esc_attr_e('End', 'roofix'); ?></span><?php echo esc_attr($end_date); ?>
                            </li>
                        <?php } ?>

                        <?php if (!empty($website)) { ?>
                            <li><span><?php esc_attr_e('Website', 'roofix'); ?></span><?php echo esc_url($website); ?>
                            </li>
                        <?php } ?>

                        <?php if (!empty($rating)) { ?>
                            <li><span><?php esc_attr_e('Rating', 'roofix'); ?></span>
                                <ul class="item-rating">
                                    <?php foreach (range(1, $rating) as $key): ?>
                                        <li class="has-rating"><i class="fas fa-star"></i></li>
                                    <?php endforeach; ?>
                                    <?php for ($i = 1; $i <= $nonrating; $i++): ?>
                                        <li class="nonrating"><i class="fas fa-star"></i></li>
                                    <?php endfor; ?>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <p class="project-short-detail"><?php echo esc_attr($short_detail); ?></p>
                <?php if (RDTheme::$options['project_single_btn']): ?>
                    <div class="btn-holder">
                                        <a href="<?php echo esc_url(RDTheme::$options['project_single_btn_url']); ?>" class="rt-button-lg">
                                <span><?php echo esc_attr(RDTheme::$options['project_single_btn_txt']); ?></span> 
                            </a>

                      
                        </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if( !empty( $full_content ) ){ ?>
        <div class="single-project-info row ">
        <div class="col-12 item-content">
            <?php the_content(); ?>
        </div>
    </div>
    <?php } ?>

    <?php if (RDTheme::$options['related_project']): ?>
    <div class="single-project-related">
        <?php
        $thumb_size = 'roofix-size-4';
        $related_count = RDTheme::$options['related_project_count'];
        $related = Helper::rt_get_related_posts(get_the_ID(), $related_count);
        if ($related->have_posts()):
            ?>
            <div class="related-posts">
                <h3 class="related-title"><?php echo esc_attr(RDTheme::$options['related_project_title']); ?> </h3>
                <div class="owl-carousel rt-owl-carousel nav-control-layout1w owl-loaded owl-drag"
                     data-carousel-options="<?php echo esc_attr($owl_data_related); ?>">
                    <?php while ($related->have_posts()): $related->the_post();
                        $id = get_the_id();
                        $content = Helper::get_current_post_content();
                        $content = wp_trim_words($content, 14);
                        ?>
                        <div class="related-wrp">
                            <div class="media">
                                <div class="item-image">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php the_post_thumbnail($thumb_size); ?>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="item-body-wrp">
                                        <div class="item-heading">
                                            <h3 class="item-title"><a
                                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="item-subtitle"><?php echo Helper::rt_get_projects_cat($id); ?></div>
                                        </div>
                                        <p><?php echo wp_kses($content, 'alltext_allow'); ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php
        endif;
        wp_reset_postdata(); ?>
    </div>
<?php endif; ?>