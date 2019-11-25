<?php
/**
 * Plugin Name: Divine Post Navigation for Elementor
 * Description: Basic Boilerplate for Custom widgets added to Elementor
 * Developer: Eyal Ron
 */
if ( ! defined( 'ABSPATH' ) ) exit;
define('dpn_PLUGIN_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define( 'dpn_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

// plug it in
add_action('plugins_loaded', 'dpn_require_files');
function dpn_require_files() {
    require_once dpn_PLUGIN_PLUGIN_PATH.'modules.php';
}
