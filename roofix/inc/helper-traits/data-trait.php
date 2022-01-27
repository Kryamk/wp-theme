<?php

namespace radiustheme\roofix;

trait DataTrait {
  
  public static function socials(){
    $rdtheme_socials = array(
      'social_facebook' => array(
        'icon' => 'fa-facebook-f',
        'url'  => RDTheme::$options['social_facebook'],
      ),
      'social_twitter' => array(
        'icon' => 'fa-twitter',
        'url'  => RDTheme::$options['social_twitter'],
      ),     
      'social_linkedin' => array(
        'icon' => 'fa-linkedin-in',
        'url'  => RDTheme::$options['social_linkedin'],
      ),
      'social_youtube' => array(
        'icon' => 'fa-youtube',
        'url'  => RDTheme::$options['social_youtube'],
      ),
      'social_pinterest' => array(
        'icon' => 'fa-pinterest',
        'url'  => RDTheme::$options['social_pinterest'],
      ),
      'social_instagram' => array(
        'icon' => 'fa-instagram',
        'url'  => RDTheme::$options['social_instagram'],
      ),
      
    );
    return array_filter( $rdtheme_socials, array( __CLASS__ , 'filter_social' ) );
  } 

  public static function filter_social( $args ){
    return ( $args['url'] != '' );
  }


  public static function team_socials(){
    $team_socials = array(
      'facebook' => array(
        'label' => esc_html__( 'Facebook', 'roofix' ),
        'type'  => 'text',
        'icon'  => 'fa-facebook',
      ),
      'twitter' => array(
        'label' => esc_html__( 'Twitter', 'roofix' ),
        'type'  => 'text',
        'icon'  => 'fa-twitter',
      ),
      'linkedin' => array(
        'label' =>esc_html__( 'Linkedin', 'roofix' ),
        'type'  => 'text',
        'icon'  => 'fa-linkedin',
      ),      
      'youtube' => array(
        'label' =>esc_html__( 'Youtube', 'roofix' ),
        'type'  => 'text',
        'icon'  => 'fa-youtube',
      ),
      'pinterest' => array(
        'label' =>esc_html__( 'Pinterest', 'roofix' ),
        'type'  => 'text',
        'icon'  => 'fa-pinterest-p',
      ),
      'instagram' => array(
        'label' =>esc_html__( 'Instagram', 'roofix' ),
        'type'  => 'text',
        'icon'  => 'fa-instagram',
      ),
      'github' => array(
        'label' =>esc_html__( 'Github', 'roofix' ),
        'type'  => 'text',
        'icon'  => 'fa-github',
      ),
      'stackoverflow' => array(
        'label' =>esc_html__( 'Stackoverflow', 'roofix' ),
        'type'  => 'text',
        'icon'  => 'fa-stack-overflow',
      ),
    );
    
    return apply_filters( 'team_socials', $team_socials );
  } 



  public static function team_social_infos() {
    return [
      [
        'key' => 'facebook',
        'icon' => 'fa fa-facebook-f',
      ],
      [
        'key' => 'twitter',
        'icon' => 'fa fa-twitter',
      ],
      [
        'key' => 'linkedin',
        'icon' => 'fa fa-linkedin',
      ],
      [
        'key' => 'instagram',
        'icon' => 'fa fa-instagram',
      ],
      [
        'key' => 'youtube',
        'icon' => 'fa fa-youtube',
      ],
      [
        'key' => 'github',
        'icon' => 'fa fa-github',
      ],
        
    ];
  }

}

