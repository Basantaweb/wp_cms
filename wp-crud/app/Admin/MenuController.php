<?php

namespace App\Admin;

class MenuController{

    public function __construct()
    {
        // global $wpdb;
		    add_action( 'admin_menu', [$this, 'addMenus'] );
        
        register_activation_hook( __FILE__, array( $this, 'activate_CMS_plugin_function') );
        register_deactivation_hook( __FILE__, array( $this,  'deactivate_CMS_plugin_function') );
	}

    public function intMenus()
    {
        return [
			'wp-crud' => [
				'page_title' => 'MVC CRUD',
				'menu_title' => 'MVC CRUD',
				'capability' => 'administrator',
				'function' => [$this, 'menuView'],
				'icon_url' => '',
				'priority' => 90,
			],
		];
    }

    public function menuView()
    {
      require_once plugin_dir_path(__FILE__) . '../view/new_entry.php';
    }

    function my_submenu_output() {
      global $wpdb;
      require_once plugin_dir_path(__FILE__) . '../Admin/ViewTableController.php';
      $table->prepare_items();
      $message = '';
      if ('delete' === $table->current_action()) {
        $message = '<div class="div_message" id="message"><p>' . sprintf('Items deleted: %d', count($_REQUEST['id'])) . '</p></div>';
      }
      ob_start();
    ?>
      <div class="wrap wqmain_body">
        <h3>View Entries</h3>
        <?php echo $message; ?>
        <form id="entry-table" method="GET">
          <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
          <?php $table->search_box( 'search', 'search_id' ); $table->display() ?>
        </form>
      </div>
    <?php
      $wq_msg = ob_get_clean();
      echo $wq_msg;
    }

    public function addMenus()
    {
      foreach ( $this->intMenus() as $menuSlug => $menu ) {
        add_menu_page( $menu['page_title'], $menu['menu_title'], $menu['capability'], $menuSlug, $menu['function'], $menu['icon_url'], $menu['priority'] );
      
          add_submenu_page('wp-crud', $menu['page_title'], 'View', 'manage_options', 'view-entries', [$this, 'my_submenu_output'] );
          }
          
          
    }
  


}

