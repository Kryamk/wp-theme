<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\roofix;

if (!class_exists(NS . 'RDTheme')) {

    class RDTheme
    {

        protected static $instance = null;

        // Sitewide static variables
        public static $options = null;

        // Template specific variables
        public static $layout = null;
        public static $sidebar = null;
        public static $tr_header = null;
        public static $top_bar = null;
        public static $top_bar_style = null;
        public static $header_style = null;
        public static $footer_style = null;
        public static $padding_top = null;
        public static $padding_bottom = null;
        public static $has_banner = null;
        public static $has_breadcrumb = null;
        public static $bgtype = null;
        public static $bgimg = null;
        public static $bgcolor = null;

        public static $inner_padding_top = null;
        public static $inner_padding_bottom = null;
        public static $single_services_layout = null;
        public static $single_project_layout = null;
        public static $header_area = null;
        public static $footer_area = null;

        private function __construct()
        {

            add_action('after_setup_theme', array($this, 'set_options'));
            add_action('customize_preview_init', array($this, 'set_options'));

        }

        public static function instance()
        {
            if (null == self::$instance) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function set_options()
        {
            $defaults  = rttheme_generate_defaults();
            $newData = [];
            foreach ($defaults as $key => $dValue) {
                $value = get_theme_mod($key, $defaults[$key]);
                $newData[$key] = $value;
            }
            self::$options  = $newData;
        }

    }
}

RDTheme::instance();

