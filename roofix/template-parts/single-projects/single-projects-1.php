<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$template = 'single-projects-1';
?>
    <?php get_header(); ?>
    <div id="primary" class="content-area single-project-wrap-layout1">
        <div class="container">
            <div class="row">
                <?php Helper::left_sidebar(); ?>
                <div class="<?php echo esc_attr(Helper::the_layout_class()); ?>">
                    <main id="main" class="site-main single-project-box-layout1">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php
                            get_template_part('template-parts/single-projects/content', $template);
                            if (comments_open() || get_comments_number()) {
                                comments_template();
                            }
                            ?>
                        <?php endwhile; ?>

                    </main>


                </div>
                <?php Helper::right_sidebar() ?>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>