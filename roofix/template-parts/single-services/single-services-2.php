<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
?>
    <?php get_header(); ?>
    <div id="primary" class="content-area single-service-wrap-layout1">
        <div class="container">
            <div class="row">
                <?php Helper::left_sidebar(); ?>
                <div class="<?php echo esc_attr(Helper::the_layout_class()); ?>">
                    <main id="main" class="site-main single-project-box-layout1  single-service-partial">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="single-service-box-layout1">
                                <div class="item-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </main>
                </div>
                <?php Helper::right_sidebar() ?>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>