<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
$thumb_size = 'roofix-size-3';

RDTheme::$options['blog_content_number'] = '30';

$comments_number = number_format_i18n(get_comments_number());
$comments_html = $comments_number;
$has_entry_meta_1 = RDTheme::$options['blog_date'] || (RDTheme::$options['blog_cats'] && has_category()) ? true : false;
$has_entry_meta_2 = RDTheme::$options['blog_author_name'] || RDTheme::$options['blog_comment_num'] ? true : false;
$content = Helper::get_current_post_content();
$content = wp_trim_words($content, RDTheme::$options['blog_content_number']);
$content = "<p class='entry-content-txt'>$content</p>";
wp_enqueue_script('isotope-pkgd');
wp_enqueue_script('imagesloaded');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-each post-each-alt mg-b-20'); ?>>
    <div class="entry-content-area">     
        <?php if (has_post_thumbnail()): ?>
            <div class="row no-gutters align-items-center">
                <div class="col-md-5">
                    <div class="entry-thumbnail-area">
                        <?php
                        if (has_post_thumbnail()) { ?>
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <?php
                                the_post_thumbnail($thumb_size); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="entry-content-wrp">
                        <div class="entry-header">
                            <?php if ($has_entry_meta_1): ?>
                                <ul class="entry-meta-1">
                                    <?php if (RDTheme::$options['blog_date']): ?>
                                        <li><span class="updated published"> 
                                            <i class="far fa-calendar-alt"></i> <?php the_time(get_option('date_format')); ?></span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                            <h2>
                                <a href="<?php the_permalink(); ?>" class="entry-title"
                                   rel="bookmark"><?php the_title(); ?></a></h2>
                        </div>
                        <div class="entry-content">
                            <div class="entry-summary">
                                <?php echo wp_kses($content, 'alltext_allow'); ?>
                            </div>
                            <?php if ($has_entry_meta_2): ?>
                                <ul class="entry-meta-2">
                                    <?php if (RDTheme::$options['blog_author_name']): ?>
                                        <li class="vcard-author">
                                            <i class="fas fa-user">                                            
                                        </i>
                                        <span class="vcard author"><?php the_author_posts_link(); ?></span></li>
                                    <?php endif; ?>
                                    <?php if (RDTheme::$options['blog_comment_num']): ?>
                                        <li class="vcard-comments">
                                            <a href="<?php the_permalink(); ?>">
                                                <i class="fas fa-comments"></i>
                                                <?php echo wp_kses($comments_html, 'alltext_allow'); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?> 
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>       
        <?php else: ?>
              <div class="row no-gutters align-items-center">
                <div class="col-12">
                    <div class="entry-header"> 
                        <?php if ($has_entry_meta_1): ?>
                            <ul class="entry-meta-1">
                                <?php if (RDTheme::$options['blog_date']): ?>
                                    <li><span class="updated published"> <i
                                                      class="fas fa-calendar"></i> <?php the_time(get_option('date_format')); ?></span>
                                    </li>
                                <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                            <h2><a href="<?php the_permalink(); ?>" class="entry-title" rel="bookmark"><?php the_title(); ?></a>
                            </h2>
                        </div>
                        <div class="entry-content">
                        <div class="entry-summary">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                        <?php if ($has_entry_meta_2): ?>
                            <ul class="entry-meta-2">

                                <?php if (RDTheme::$options['blog_author_name']): ?>
                                    <li class="vcard-author"><i class="fas fa-user"></i><span
                                                class="vcard author"><?php the_author_posts_link(); ?></span></li>
                                <?php endif; ?>
                                <?php if (RDTheme::$options['blog_comment_num']): ?>
                                    <li class="vcard-comments"><a href="<?php the_permalink(); ?>"><i
                                                    class="fas fa-comments"></i> <?php echo wp_kses_post($comments_html); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</article>