<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
// Layout class

$col_lg = get_post_meta($post->ID, "roofix_col_lg", true);
$col_md = get_post_meta($post->ID, "roofix_col_md", true);
$col_sm = get_post_meta($post->ID, "roofix_col_sm", true);

$col_class = "col-lg-{$col_lg} col-md-{$col_md} col-{$col_sm}";

if (RDTheme::$layout == 'full-width') {
    $layout_class = 'col-lg-12 archive-project-add_partial';
    $col_class = 'col-lg-4';
} else {
    $layout_class = 'col-lg-8 archive-project-add_partial';
    $col_class = 'col-lg-6';
}
$layout_bg_class = "";

switch (RDTheme::$options['project_arc_style']) {
    case 'style2':
        $template = 'project-2';
        $container = 'container';
         $gutters = ' gutters-15';
        break;
    case 'style3':
        $template = 'project-3';
        $container = 'container';
        $gutters = ' gutters-2';
        $gutters = ' gutters-30';
        break;
    case 'style4':
        $template = 'project-4';
        $layout_bg_class = "project-bg";
        $container = 'container-fluid plr60';
         $gutters = ' gutters-2';
        break;
    default:
        $template = 'project-1';
        $container = 'container';
        $gutters = ' gutters-2';
        break;
}

?>
    <?php get_header(); ?>
    <div id="primary" class="content-area <?php echo esc_attr($layout_bg_class); ?>">
        <div class="<?php echo esc_attr($container); ?>">
            <div class="row">
                <?php
                if (RDTheme::$layout == 'left-sidebar') {
                    get_sidebar();
                }
                ?>
                <div class="<?php echo esc_attr($layout_class); ?>">
                    <main id="main" class="site-main rt-departments-archive">
                        <?php if (have_posts()) : ?>
                            <div class="row auto-clear <?php echo esc_attr($gutters); ?>">
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="<?php echo esc_attr($col_class); ?>">
                                        <?php get_template_part('template-parts/archive-projects/content', $template); ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <?php Helper::pagination(); ?>
                        <?php else: ?>
                            <?php get_template_part('template-parts/content', 'none'); ?>
                        <?php endif; ?>
                    </main>
                </div>
                <?php
                if (RDTheme::$layout == 'right-sidebar') {
                    get_sidebar();
                }
                ?>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>