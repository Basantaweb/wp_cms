<?php
/**
 * Plugin Name: MVC CRUD
 * Version: 1.0
 * Description: Create Update Delete
 * Author: Basanta
 */

 
 require_once __DIR__ . '/vendor/autoload.php';


 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define('CMS_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('CMS_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
 
// Plugin constants, (Just to look a little smarter)
define( 'POC_VERSION', '1.0.0' );
define( 'POC_MAIN_FILE', __FILE__ );

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


require_once plugin_dir_path(__FILE__) . 'app/Admin/AcitveDeactive.php';
require_once plugin_dir_path(__FILE__) . 'app/Admin/AddRemove.php';

    function load_custom_css_js() {
        wp_register_style( 'my_custom_css', CMS_PLUGIN_URL.'/css/style.css', false, '1.0.0' );
        wp_enqueue_style( 'my_custom_css' );
        wp_enqueue_script( 'my_custom_script1', CMS_PLUGIN_URL. '/js/custom.js' );
        wp_enqueue_script( 'my_custom_script2', CMS_PLUGIN_URL. '/js/jQuery.min.js' );
        wp_localize_script( 'my_custom_script1', 'ajax_var', array( 'ajaxurl' => admin_url('admin-ajax.php') ));
    }
    add_action( 'admin_enqueue_scripts', 'load_custom_css_js' );
  

 use App\Admin\MenuController;

 ( new MenuController);

 

 