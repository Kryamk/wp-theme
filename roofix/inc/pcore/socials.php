<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;
use radiustheme\Roofix\RDTheme;

class Socials {
  public static $sharers = [];
  public static $defaults = [];

  /**
   * generate all social share options
   * @return [type] [description]
   */
  public static function generate_defults() {
    $url   = urlencode( get_permalink() );
    $title = urlencode( get_the_title() );
    $defaults = [
      'facebook' => [
        'url'  => "http://www.facebook.com/sharer.php?u=$url",
        'icon' => 'fab fa-facebook-f',
      ],
      'twitter'  => [
        'url'  => "https://twitter.com/intent/tweet?source=$url&text=$title:$url",
        'icon' => 'fab fa-twitter',
      ],
      'linkedin' => [
        'url'  => "http://www.linkedin.com/shareArticle?mini=true&url=$url&title=$title",
        'icon' => 'fab fa-linkedin-in',
      ],
      'pinterest'=> [
        'url'  => "http://pinterest.com/pin/create/button/?url=$url&description=$title",
        'icon' => 'fab fa-pinterest',
      ],      
      'reddit'   => [
        'url'  => "http://www.reddit.com/submit?url=$url&title=$title",
        'icon' => 'fab fa-reddit',
      ],
      'vk'       => [
        'url'  => "http://vkontakte.ru/share.php?url=$url",
        'icon' => 'fab fa-vk',
      ],
    ];
    self::$defaults = $defaults;
  }

  public static function filter_defaults()
  {
        
  RDTheme::$options['post_share'] = array('facebook','twitter','linkedin' );

    foreach ( RDTheme::$options['post_share'] as $key => $value ) {
      if ( !$value ) {
        unset( self::$defaults[$key] );
      }
    }
    self::$sharers = apply_filters( 'rdtheme_social_sharing_icons', self::$defaults );
  }
  public static function render()
  {
    self::generate_defults();
    self::filter_defaults();
   ?> 
   <div class="item-social">      
        <ul class="item-social">
        <?php foreach ( self::$sharers as $key => $sharer ): ?>
          <li class="blog-<?php echo esc_attr( $key ); ?>">
            <a class="text-textprimary newbg-<?php echo esc_attr( $key ); ?>" href="<?php echo esc_attr( $sharer['url'] ); ?>">
              <i class="<?php echo esc_attr( $sharer['icon'] );?>"></i>
            </a>
          </li>
        <?php endforeach ?>
        </ul>
    </div>
   <?php
  }
}




