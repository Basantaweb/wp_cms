<?php

namespace App\Admin; 

class ActiveDeactive{
  public function __construct( ) {
    register_activation_hook( POC_MAIN_FILE, array( $this, 'active' ) );
         

    register_deactivation_hook( POC_MAIN_FILE, array( $this, 'deactive' ) );
    
  }
  public static function active()
  {
      // Get database helper
      global $wpdb;
         
      // Get Database Charset (To be consistent with our current database configuration)
      $charset_collate = $wpdb->get_charset_collate();
       
      // Create the table name using the WordPress prefix to be consistent with our database configuration
         $table_name = 'wp_contacts';
    
         $sql = "CREATE TABLE $table_name (
           `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
           `email` varchar(255),
           `first_name` varchar(255),
           `last_name` varchar(255),
           `phone_number` varchar(255),
           `address` varchar(500),
           `created_at` varchar(255),
           `updated_at` varchar(255),
           PRIMARY KEY  (id)
         ) $charset_collate;";
      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );
  }

  public static function deactive(){
      global $wpdb;
      $table_name = 'wp_contacts';
      $sql = "DROP TABLE IF EXISTS $table_name";
      $wpdb->query($sql);
  }
}

new ActiveDeactive();