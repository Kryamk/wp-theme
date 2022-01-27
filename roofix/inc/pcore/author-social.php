<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
use radiustheme\Roofix\RDTheme;

class Author_Social {
  const author_socials = [
    [
      'key'   => 'facebook',
      'icon'  => 'fab fa-facebook-f',
    ],
    [
      'key'   => 'twitter',
      'icon'  => 'fab fa-twitter',
    ],
    [
      'key'   => 'linkedin',
      'icon'  => 'fab fa-linkedin-in',
    ],
    [
      'key'   => 'instagram',
      'icon'  => 'fab fa-Instagram',
    ],
    [
      'key'   => 'pinterest',
      'icon'  => 'fab fa-pinterest',
    ],
    [
      'key'   => 'tumblr',
      'icon'  => 'fab fa-tumblr',
    ],
    [
      'key'   => 'reddit',
      'icon'  => 'fab fa-reddit',
    ],
  ];
  
  public static function render($author_id) {
    ?>
    <ul class="item-social">
      <?php foreach (self::author_socials as $social): ?>
        <?php $single_social_profile = get_the_author_meta( $social['key'], $author_id ) ; ?>
        <?php if ($single_social_profile): ?>
          <li><a href="<?php echo esc_attr( $single_social_profile ); ?>" class="newbg-<?php echo esc_attr( $social['key'] ); ?>"><i class="<?php echo esc_attr( $social['icon'] ); ?>"></i></a></li>
        <?php endif; ?>
      <?php endforeach ?>
    </ul>
    <?php
  }
}