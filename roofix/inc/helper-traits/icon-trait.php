<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;


trait IconTrait {

  public static function get_icons()
  {

    $flaticons_service = self::get_flaticon_service_icons();  
    return array_merge( $flaticons_service );
  } 

  public static function get_flaticon_service_icons()
  {
    return [
        
      "flaticon-roof-1"             => "flaticon-roof-1",
      "flaticon-joist"              => "flaticon-joist",
      "flaticon-roof"               => "flaticon-roof",
      "flaticon-3d"                 => "flaticon-3d",
      "flaticon-broken-house"       => "flaticon-broken-house",
      "flaticon-roof-2"             => "flaticon-roof-2",
      "flaticon-joist-1"            => "flaticon-joist-1",
      "flaticon-roof-3"             => "flaticon-roof-3",
      "flaticon-home"               => "flaticon-home",
      "flaticon-clipboard"          => "flaticon-clipboard",
      "flaticon-calculator"         => "flaticon-calculator",
      "flaticon-clock"              => "flaticon-clock",
      "flaticon-chill"              => "flaticon-chill",
      "flaticon-roof-4"             => "flaticon-roof-4",
      "flaticon-roof-5"             => "flaticon-roof-5",
      "flaticon-roof-6"             => "flaticon-roof-6"
    ];
  }
}
