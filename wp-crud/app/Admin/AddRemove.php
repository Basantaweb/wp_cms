<?php

class Classentry {

    public function __construct( $action ) {
      add_action( "wp_ajax_nopriv_$action", 'wqnew_entry_callback_function' );
      add_action( "wp_ajax_$action",    'wqnew_entry_callback_function' );
  
      add_action( "wp_ajax_nopriv_$action", 'wqedit_entry_callback_function' );
      add_action( "wp_ajax_$action",    'wqedit_entry_callback_function' );
    
  }
  
  function wqnew_entry_callback_function() {
    global $wpdb;
    $wpdb->get_row( "SELECT * FROM `wp_contacts` WHERE `email` = '".$_POST['digi_email']."' AND `first_name` = '".$_POST['digi_fname']."' ORDER BY `id` DESC" );
    if($wpdb->num_rows < 1) {
      $wpdb->insert("wp_contacts", array(
        "email" => $_POST['digi_email'],
        "first_name" => $_POST['digi_fname'],
        "last_name" => $_POST['digi_lname'],
        "phone_number" => $_POST['digi_pnumber'],
        "address" => $_POST['digi_address'],
        "created_at" => time(),
        "updated_at" => time()
      ));
  
      $response = array('message'=>'Data Has Inserted Successfully', 'rescode'=>200);
    } else {
      $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
    }
    echo json_encode($response);
    exit();
    wp_die();
  }
  
  
  
  function wqedit_entry_callback_function() {
    global $wpdb;
    $wpdb->get_row( "SELECT * FROM `wp_contacts` WHERE `email` = '".$_POST['digi_email']."' AND `first_name` = '".$_POST['digi_fname']."' AND `id`!='".$_POST['wqentryid']."' ORDER BY `id` DESC" );
    if($wpdb->num_rows < 1) {
      $wpdb->update( "wp_contacts", array(
        "email" => $_POST['digi_email'],
        "first_name" => $_POST['digi_fname'],
        "last_name" => $_POST['digi_lname'],
        "phone_number" => $_POST['digi_pnumber'],
        "address" => $_POST['digi_address'],
        "updated_at" => time()
      ), array('id' => $_POST['wqentryid']) );
  
      $response = array('message'=>'Data Has Updated Successfully', 'rescode'=>200);
    } else {
      $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
    }
    echo json_encode($response);
    exit();
    wp_die();
  }
   }
  
  if($_REQUEST['action'] == 'wqnew_entry' ){
   $add = new Classentry($_REQUEST['action']);
   $add->wqnew_entry_callback_function();
  }
   else if( $_REQUEST['action'] == 'wqedit_entry' )
  {
    $add = new Classentry($_REQUEST['action']);
    $add->wqedit_entry_callback_function();
  }
