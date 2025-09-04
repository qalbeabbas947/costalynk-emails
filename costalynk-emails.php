<?php
/*
Plugin Name: Coastalynk Emails
Description: This plugin provides the email related functions of the coastalynk.
Author: Qalb-e-Abbas
Version: 1.0
Text Domain: coastalynk-emails
Author URI: http://netizenssoft.com/
*/

if( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Coastalynk_Emails
 */
class Coastalynk_Emails {

    const VERSION = '1.0';

    /**
     * @var self
     */
    private static $instance = null;

    /**
     * @since 1.0
     * @return $this
     */
    public static function instance() {

        if ( is_null( self::$instance ) && ! ( self::$instance instanceof Coastalynk_Emails ) ) {
            self::$instance = new self;

            load_plugin_textdomain( 'coastalynk-emails' );
            self::$instance->setup_constants();
            self::$instance->includes();
        }

        return self::$instance;
    }

    /**
     * defining constants for plugin
     */
    public function setup_constants() {

        /**
         * Directory
         */
        define( 'CEM_DIR', plugin_dir_path ( __FILE__ ) );
        define( 'CEM_DIR_FILE', CEM_DIR . basename ( __FILE__ ) );
        define( 'CEM_INCLUDES_DIR', trailingslashit ( CEM_DIR . 'includes' ) );
        define( 'CEM_TEMPLATES_DIR', trailingslashit ( CEM_DIR . 'templates' ) );
        define( 'CEM_BASE_DIR', plugin_basename(__FILE__));

        /**
         * URLs
         */
        define( 'CEM_URL', trailingslashit ( plugins_url ( '', __FILE__ ) ) );
        define( 'CEM_ASSETS_URL', trailingslashit ( CEM_URL . 'assets/' ) );

        /**
         * plugin Version
         */
        define( 'CEM_VERSION', self::VERSION );
    }

    /**
     * Plugin requiered files
     */
    public function includes() {

        /**
         * Required all files 
         */

        if( file_exists( CEM_INCLUDES_DIR.'admin.php' ) ) {
            require_once CEM_INCLUDES_DIR . 'admin.php';
        }

        if( file_exists( CEM_INCLUDES_DIR.'settings.php' ) ) {
            require_once( CEM_INCLUDES_DIR . 'settings.php' );
        }
    }
}

/**
 * @return bool
 */
function Coastalynk_Email_Load() {
    
    return Coastalynk_Emails::instance();
}
add_action( 'plugins_loaded', 'Coastalynk_Email_Load' );