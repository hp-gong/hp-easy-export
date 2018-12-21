<?php
/**
 * Easy Export
 *
 * Plugin Name: Easy Export
 * Plugin URI: https://wordpress.org/plugins/easy-export/
 * Description: Easy Export export reports.
 * Version: 1.2.0
 * Author: H.P. Gong
 * Author URI: https://github.com/hp-gong/
 * GitHub Plugin URI: https://github.com/hp-gong/hp-easy-export
 * GitHub Branch: master
 * License: GPL-3.0+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 *
 */

// Exit if accessed directly.
if(! defined('ABSPATH')){exit;}

// Define urls
define('hp_easy_export_report_url_p', plugin_dir_url( __FILE__ ));

// Check is HP_Easy_Export exists
if(!class_exists('HP_Easy_Export')){

// Class HP Easy Export
  class HP_Easy_Export{

   // Function __construct
   public function __construct(){
	  add_action('admin_menu', array($this, 'add_admin_menu'));
	  add_action('admin_init', array($this, 'create_export_scripts'));
	  add_action('init', array($this, 'check_if_woo_install'));
	  add_action('init', array($this, 'check_versions'));
	  add_action('init', array($this, 'validate_form'));
	  }

	   // Activation Function
	  public function activate_hp_easy_export_report(){
	   }

	   // Deactivation Function
	  public function deactivate_hp_easy_export_report(){
	   }

	   // Uninstall Function
	  public function uninstall_hp_easy_export_report(){
	   }

	  // Check if WooCommerce plugin is install and activated
	  // in order for Easy Export plugin to run
	  public function check_if_woo_install(){
	   if (! class_exists('WooCommerce')){
	   $url = admin_url('/plugins.php');
	   require_once(ABSPATH . 'wp-admin/includes/plugin.php');
	   deactivate_plugins( plugin_basename( __FILE__ ));
	   wp_die( __('Easy Export requires WooCommerce to run. <br>Please install WooCommerce and activate before attempting to activate again.<br><a href="'.$url.'">Return to the Plugins section</a>'));
	   }
       }

       // Check if WooCommerce plugin has the current version and
	   // activated in order for Easy Export plugin to run
	   public function check_versions(){
	    global $woocommerce;
	    if (version_compare($woocommerce->version, '3.5.2', '<')){
	    $url = admin_url('/plugins.php');
	    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
	    deactivate_plugins( plugin_basename( __FILE__ ));
	    wp_die( __('Easy Export is disabled.<br>Easy Export requires a minimum of WooCommerce v3.5.2.<br><a href="'.$url.'">Return to the Plugins section</a>'));
	    }
	    }

	   // Add Menu Button/Menu Page & Submenu Buttons/Submenu Pages
	   public function add_admin_menu(){
		add_menu_page('Easy Export', 'Easy Export', 'administrator', 'hp_easy_export_report', array($this, 'plugin_settings'), hp_easy_export_report_url_p . 'img/icon.png', 59);
		add_submenu_page('hp_easy_export_report', 'Order List', 'Order List', 'manage_options', 'hp_easy_export_report', 'hp_easy_export_report', 'hp_easy_export_report1');
		add_submenu_page('hp_easy_export_report', 'Sale List', 'Sale List', 'manage_options', 'hp_easy_sale_list', 'hp_easy_sale_list', 'hp_easy_export_report2');
		add_submenu_page('hp_easy_export_report', 'Customer List', 'Customer List', 'manage_options', 'hp_easy_customer_list', 'hp_easy_customer_list', 'hp_easy_export_report3');
        add_submenu_page('hp_easy_export_report', 'Product List', 'Product List', 'manage_options', 'hp_easy_product_list', 'hp_easy_product_list', 'hp_easy_export_report4');
		}

		// Only Administrator have permissions to access this page
	   public static function plugin_settings() {
	    if (!current_user_can('administrator')){
	    wp_die('You do not have sufficient permissions to access this page.');
	    }
	    }

	   // Verify Nonce Form
	   public function validate_form() {
        if(isset($_POST['btn_grey1'])){
        if (!isset($_POST['hp_display_export_report_nonce1']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce1'], 'hp_easy_export_report_e2')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray1'])){
        if (!isset($_POST['hp_display_export_report_nonce2']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce2'], 'hp_easy_export_report_e1')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey2'])){
        if (!isset($_POST['hp_display_export_report_nonce3']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce3'], 'hp_easy_export_report_e4')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray2'])){
        if (!isset($_POST['hp_display_export_report_nonce4']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce4'], 'hp_easy_export_report_e3')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey3'])){
        if (!isset($_POST['hp_display_export_report_nonce5']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce5'], 'hp_easy_export_report_e6')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray3'])){
        if (!isset($_POST['hp_display_export_report_nonce6']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce6'], 'hp_easy_export_report_e5')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey4'])){
        if (!isset($_POST['hp_display_export_report_nonce7']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce7'], 'hp_easy_export_report_e8')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray4'])){
        if (!isset($_POST['hp_display_export_report_nonce8']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce8'], 'hp_easy_export_report_e7')){
        wp_die('You do not have access to this page.');
        }
        }
	    if(isset($_POST['btn_grey5'])){
        if (!isset($_POST['hp_display_export_report_nonce9']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce9'], 'hp_easy_export_report_e10')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray5'])){
        if (!isset($_POST['hp_display_export_report_nonce10']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce10'], 'hp_easy_export_report_e9')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey6'])){
        if (!isset($_POST['hp_display_export_report_nonce11']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce11'], 'hp_easy_export_report_e12')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray6'])){
        if (!isset($_POST['hp_display_export_report_nonce12']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce12'], 'hp_easy_export_report_e11')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_grey7'])){
        if (!isset($_POST['hp_display_export_report_nonce13']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce13'], 'hp_easy_export_report_e14')){
        wp_die('You do not have access to this page.');
        }
        }
		if(isset($_POST['btn_gray7'])){
        if (!isset($_POST['hp_display_export_report_nonce14']) || !wp_verify_nonce($_POST['hp_display_export_report_nonce14'], 'hp_easy_export_report_e13')){
        wp_die('You do not have access to this page.');
        }
        }
	    }

	   // Register the jQuery & CSS scripts and link the files
	   public function create_export_scripts(){
	   // jQuery
	    wp_enqueue_script('jquery');
	   // jQuery scripts for Easy Export
	    wp_register_script('export', hp_easy_export_report_url_p .'js/export.js', array('jquery'));
		wp_register_script('easy_export', hp_easy_export_report_url_p .'js/easy_export.js', array('jquery'));
	    wp_register_script('printPreview', hp_easy_export_report_url_p .'js/printPreview.js', array('jquery'));
		wp_register_script('jquery.multipurpose_tabcontent', hp_easy_export_report_url_p .'js/jquery.multipurpose_tabcontent.js', array('jquery'));
	    wp_register_script('jspdf.debug', hp_easy_export_report_url_p .'js/jspdf.debug.js', array('jquery'));
        wp_register_script('jspdf.plugin.autotable', hp_easy_export_report_url_p .'js/jspdf.plugin.autotable.js', array('jquery'));
		wp_enqueue_script('export');
		wp_enqueue_script('easy_export');
		wp_enqueue_script('printPreview');
		wp_enqueue_script('jquery.multipurpose_tabcontent');
		wp_enqueue_script('jspdf.debug');
		wp_enqueue_script('jspdf.plugin.autotable');
	   // CSS scripts for export
	    wp_register_style('export', hp_easy_export_report_url_p . 'css/export.css');
	    wp_enqueue_style('export');
		wp_register_style('animate', hp_easy_export_report_url_p . 'css/animate.css');
	    wp_enqueue_style('animate');
	    wp_register_style('style', hp_easy_export_report_url_p . 'css/style.css');
	    wp_enqueue_style('style');
	    }
  }

	   // The hp_easy_export_report function will export the Order List in PDF, CSV and Print
       function hp_easy_export_report(){

	    echo '<div class="tab_wrapper first_tab">
               <ul class="tab_list">
                <li class="active">Order List</li>
              </ul>';
		echo '<div class="content_wrapper">';
        echo '<div class="tab_content active">';
	    echo '<form method="POST" action="">';
	    echo wp_nonce_field('hp_easy_export_report_e1', 'hp_display_export_report_nonce2');
        echo '<div id="dvData1">
	    <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport1">
	    <thead>
	    <tr>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">ID</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Order Date</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">First Name</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Last Name</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Phone Number</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Email</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Status</th>
		<th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Total Items Purchase</th>
	    <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Order Total</th>
	    </tr>
	    </thead>
	    <tbody>';
	    global $woocommerce;
	    $query1 = array('post_type' => 'shop_order', 'post_status' => array('wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending'), 'posts_per_page' => -1);
	    $loop1 = new WP_Query($query1);
	    if($loop1->have_posts()){
	    while ($loop1->have_posts() ){
	    $loop1->the_post();
	    $order_id1 = $loop1->post->ID;
	    $order1 = new WC_Order($order_id1);
	    echo '<tr>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_order_number()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_date_created()->date_i18n(__('m-d-Y', 'woocommerce' ))).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_billing_first_name()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_billing_last_name()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_billing_phone()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_billing_email()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field(ucfirst(str_replace("wc-","", $order1->get_status()))).'</td>
		<td style="border: 1px solid black;">'.sanitize_text_field($order1->get_item_count()).'</td>
	    <td style="border: 1px solid black;">'.sanitize_text_field($order1->get_formatted_order_total()).'</td>
	    </tr>';
	    }
	    }
	    echo '</tbody>
	    </table>
	    </div>
	    <br>';
	    include 'pdf/pdf1.php';
        include 'csv/csv1.php';
        echo wp_nonce_field('hp_easy_export_report_e2', 'hp_display_export_report_nonce1');
        include 'print/print1.php';
        echo '</form></div></div></div>';
        }
	
	   // The hp_easy_sale_list function will export the Sale List in PDF, CSV and Print
	   function hp_easy_sale_list(){
				
	    echo '<div class="tab_wrapper first_tab">
               <ul class="tab_list">
               <li class="active">Sales Summary List</li>
              </ul>';
		 echo '<div class="content_wrapper">';
         echo '<div class="tab_content active">';
		 echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e3', 'hp_display_export_report_nonce4');
		 echo '
         <div id="dvData2">
	     <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport2">
		 <thead>
         <tr>
         <th style="border: 1px solid black; background-color: #e8e5fa;">Summary</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;">Amount</th>
         </tr>
         </thead>
		 <tbody>';
		 global $wpdb;
		
		 $today_date = date_i18n("Y-m-d");	
				    
		 $query2a = "SELECT SUM(pm1.meta_value) AS 'order_total', 'Yesterday' AS 'summary'
				     FROM {$wpdb->prefix}postmeta AS pm1 
				     LEFT JOIN  {$wpdb->prefix}posts AS p1 ON p1.ID = pm1.post_id					
				     WHERE meta_key='_order_total' 
				     AND DATE(p1.post_date)= DATE(DATE_SUB(NOW(), INTERVAL 1 DAY))
				     UNION
				     SELECT SUM(pm2.meta_value)AS 'order_total', 'Today' AS 'summary'
				     FROM {$wpdb->prefix}postmeta AS pm2
				     LEFT JOIN  {$wpdb->prefix}posts AS p2 ON p2.ID = pm2.post_id
				     WHERE meta_key='_order_total' 
				     AND DATE(p2.post_date) = '".$today_date."' 
				     AND p2.post_type IN ('shop_order')
				     UNION
				     SELECT SUM(pm3.meta_value) AS 'order_total', 'This Week' AS 'summary'
				     FROM {$wpdb->prefix}postmeta AS pm3 
				     LEFT JOIN  {$wpdb->prefix}posts AS p3 ON p3.ID=pm3.post_id 
				     WHERE meta_key='_order_total' AND WEEK(CURDATE()) = WEEK(DATE(p3.post_date))
				     AND YEAR(CURDATE()) = YEAR(p3.post_date) 
				     AND p3.post_type IN ('shop_order')
				     UNION
				     SELECT SUM(pm4.meta_value) AS 'order_total', 'This Month' AS 'summary'
				     FROM {$wpdb->prefix}postmeta AS pm4 
				     LEFT JOIN  {$wpdb->prefix}posts AS p4 ON p4.ID = pm4.post_id
				     WHERE meta_key='_order_total' 
				     AND MONTH(DATE(CURDATE())) = MONTH( DATE(p4.post_date)) 
				     AND YEAR(DATE(CURDATE())) = YEAR( DATE(p4.post_date))
				     UNION
				     SELECT SUM(pm5.meta_value) AS 'order_total','This Year' AS 'summary'
				     FROM {$wpdb->prefix}postmeta AS pm5
				     LEFT JOIN  {$wpdb->prefix}posts AS p5 ON p5.ID = pm5.post_id					
				     WHERE meta_key='_order_total' 
				     AND YEAR(DATE(CURDATE())) = YEAR( DATE(p5.post_date)) 
				     AND p5.post_type IN ('shop_order')";
				
	     $loop2a = $wpdb->get_results($query2a);
	     if(count($loop2a)){	
         foreach ($loop2a as $order2a) {
	     echo ' 
		 <tr>
		 <td style="border: 1px solid black; background-color: #ffffff;" scope="col">'.$order2a->summary.'</td>
	     <td style="border: 1px solid black; background-color: #ffffff;" scope="col">'.wc_price($order2a->order_total).'</td>
	     </tr>';
	     }  
		 }
		   
         $query2b = "SELECT 
		             SUM(pm6.meta_value) AS 'total_amount', DATE(p6.post_date) AS 'group_date'	
			         FROM {$wpdb->prefix}posts AS p6
			         LEFT JOIN  {$wpdb->prefix}postmeta AS pm6 ON pm6.post_id = p6.ID
			         WHERE  post_type = 'shop_order' 
					 AND pm6.meta_key = '_order_total'";
				
	  	 $loop2b = $wpdb->get_results($query2b);
		 if(count($loop2b)){	
         foreach ($loop2b as $order2b) {
	     echo ' 
		 <tr>
		 <td style="border: 1px solid black; background-color: #ffffff;" scope="col">Overall Amount</td>
	     <td style="border: 1px solid black; background-color: #ffffff;" scope="col">'.wc_price($order2b->total_amount).'</td>
	     </tr>';
	     }  
		 }
	     echo '</tbody>
	     </table>
	     </div>
	     <br>';
	     include 'pdf/pdf2.php';
         include 'csv/csv2.php';
	     echo wp_nonce_field('hp_easy_export_report_e4', 'hp_display_export_report_nonce3');
         include 'print/print2.php';
         echo '</form></div></div></div>';
		 }
        
       // The hp_easy_customer_list function will export the Customer List in PDF, CSV and Print
        function hp_easy_customer_list(){
		   
         echo '<div class="tab_wrapper first_tab">
               <ul class="tab_list">
               <li class="active">Billing List</li>
               <li>Shipping List</li> 
			   <li>Mailing List</li> 
              </ul>';
		 echo '<div class="content_wrapper">';
         echo '<div class="tab_content active">';
		 echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e5', 'hp_display_export_report_nonce6');
		 echo '
         <div id="dvData3">
	     <table style="border-collapse: collapse; width: 100%; border: 0px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport3">
         <thead>
         <tr>
         <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">First Name</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Last Name</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Email</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Phone Number</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Address</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">City</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">State</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Zip</th>
         <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Country</th>
         </tr>
         </thead>
         <tbody>';
	     global $woocommerce;
	     $query3 = array('post_type' => 'shop_order', 'post_status' => array('wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending'), 'posts_per_page' => -1);
	     $loop3 = new WP_Query($query3);
	     if($loop3->have_posts()){
	     while ($loop3->have_posts() ){
	     $loop3->the_post();
	     $order_id3 = $loop3->post->ID;
	     $order3 = new WC_Order($order_id3);
	     echo '<tr>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_first_name()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_last_name()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_email()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_phone()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_address_1()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_city()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_state()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_postcode()).'</td>
	     <td style="border: 1px solid black;">'.sanitize_text_field($order3->get_billing_country()).'</td>
	     </tr>';
	     }
	     }   
	     echo '</tbody>
	     </table>
	     </div>
	     <br>';
	     include 'pdf/pdf3.php';
         include 'csv/csv3.php';
	     echo wp_nonce_field('hp_easy_export_report_e6', 'hp_display_export_report_nonce5');
         include 'print/print3.php';
         echo '</form></div>';
	     
		 echo '<div class="tab_content">';
         echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e7', 'hp_display_export_report_nonce8');
		 echo'
         <div id="dvData4">
	     <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport4">
         <thead>
         <tr>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">First Name</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Last Name</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Address</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">City</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">State</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Zip</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Country</th>
         </tr>
         </thead>
         <tbody>';
		 global $woocommerce;
		 $query4 = array('post_type' => 'shop_order', 'post_status' => array('wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending'), 'posts_per_page' => -1);
		 $loop4 = new WP_Query($query4);
		 if($loop4->have_posts()){
		 while ($loop4->have_posts() ){
		 $loop4->the_post();
		 $order_id4 = $loop4->post->ID;
		 $order4 = new WC_Order($order_id4);
		 echo '<tr>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_first_name()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_last_name()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_address_1()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_city()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_state()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_postcode()).'</td>
         <td style="border: 1px solid black;">'.sanitize_text_field($order4->get_shipping_country()).'</td>
         </tr>';
	     }
         }  
	     echo '</tbody>
	     </table>
	     </div>
	     <br>';
	     include 'pdf/pdf4.php';
         include 'csv/csv4.php';
	     echo wp_nonce_field('hp_easy_export_report_e8', 'hp_display_export_report_nonce7');
         include 'print/print4.php';
         echo '</form></div>';
	
	     echo '<div class="tab_content">';
         echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e9', 'hp_display_export_report_nonce10');
		 echo'
         <div id="dvData5">
	     <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport5">
		 <thead>
		 <tr>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">First Name</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Last Name</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Email</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Country</th>
		 </tr>
		 </thead>
		 <tbody>';
		 global $woocommerce;
		 $query5 = array('post_type' => 'shop_order', 'post_status' => array('wc-completed', 'wc-processing', 'wc-on-hold', 'wc-pending'), 'posts_per_page' => -1);
		 $loop5 = new WP_Query($query5);
		 if($loop5->have_posts()){
		 while ($loop5->have_posts() ){
		 $loop5->the_post();
		 $order_id5 = $loop5->post->ID;
		 $order5 = new WC_Order($order_id5);
		 echo '<tr>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order5->get_billing_first_name()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order5->get_billing_last_name()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order5->get_billing_email()).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order5->get_billing_country()).'</td>
		 </tr>';
		 }
		 }
		 echo '</tbody>
		 </table>
	     </div>
	     <br>';
	     include 'pdf/pdf5.php';
         include 'csv/csv5.php';
	     echo wp_nonce_field('hp_easy_export_report_e10', 'hp_display_export_report_nonce9');
         include 'print/print5.php';
         echo '</form></div></div></div>';
         }   

        // The hp_easy_product_list function will export the Product List in PDF, CSV and Print
        function hp_easy_product_list(){
         
		 echo '<div class="tab_wrapper first_tab">
               <ul class="tab_list">
                <li class="active">Product List</li>
				<li>Category List</li>
               </ul>';
		 echo '<div class="content_wrapper">';
         echo '<div class="tab_content active">';
         echo '<form method="POST" action="">';
	     echo wp_nonce_field('hp_easy_export_report_e11', 'hp_display_export_report_nonce12');
	     echo'
         <div id="dvData6">
      	 <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport6">
         <thead>
         <tr>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">SKU</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Category</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Product Name</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Regular Price</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Total Stock</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Total Products Sold</th>
		 <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Total Amount per Products</th>
         </tr>
         </thead>
         <tbody>';
         global $wpdb;
         $query6 = $wpdb->get_results("SELECT
									   wp1.meta_value AS sku,
									   wp2.meta_value AS price,
									   wp3.meta_value AS stock,
									   wp4.meta_value AS total_sales,
									   p1.post_title AS product,
									   GROUP_CONCAT(wpt.name ORDER BY wpt.name SEPARATOR ', ') AS category
									   FROM {$wpdb->prefix}posts AS p1
									   LEFT JOIN {$wpdb->prefix}postmeta AS wp1 
									   ON wp1.post_id = p1.ID AND wp1.meta_key = '_sku'
									   LEFT JOIN {$wpdb->prefix}postmeta AS wp2 
									   ON wp2.post_id = p1.ID AND wp2.meta_key = '_regular_price'
									   LEFT JOIN {$wpdb->prefix}postmeta AS wp3 
									   ON wp3.post_id = p1.ID AND wp3.meta_key = '_stock' 
									   LEFT JOIN {$wpdb->prefix}postmeta AS wp4 
									   ON wp4.post_id = p1.ID AND wp4.meta_key = 'total_sales'
									   LEFT JOIN {$wpdb->prefix}term_relationships AS tr1 
									   ON tr1.object_id = p1.ID
									   LEFT JOIN {$wpdb->prefix}term_taxonomy AS tt1 
									   ON tr1.term_taxonomy_id = tt1.term_taxonomy_id AND tt1.taxonomy = 'product_cat'
									   LEFT JOIN {$wpdb->prefix}terms AS wpt 
									   ON tt1.term_id = wpt.term_id
									   WHERE p1.post_type = 'product' 
									   AND p1.post_status = 'publish'
									   GROUP BY p1.ID
									   ORDER BY p1.post_title ASC");
		 if(count($query6)){
		 foreach($query6 as $order6){
		 echo '<tr>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->sku).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->category).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order6->product).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order6->price)).'</td>
		 <td style="border: 1px solid black;" class="st">'.sanitize_text_field($order6->stock).'</td>
		 <td style="border: 1px solid black;" class="ts">'.sanitize_text_field($order6->total_sales).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order6->price * $order6->total_sales)).'</td>
		 </tr>';
		 }
		 }
		 echo '</tbody>
		 </table>
		 </div>
		 <br>';
		 include 'pdf/pdf6.php';
         include 'csv/csv6.php';
		 echo wp_nonce_field('hp_easy_export_report_e12', 'hp_display_export_report_nonce11');
	     include 'print/print6.php';
         echo '</form></div>';
	
		 echo '<div class="tab_content">';
         echo '<form method="POST" action="">';
         echo wp_nonce_field('hp_easy_export_report_e13', 'hp_display_export_report_nonce14');
	     echo'
         <div id="dvData7">
     	 <table style="border-collapse: collapse; width: 100%; border: 1px solid black; background-color: white; text-align: center;" cellspacing="0" cellpadding="0" id="printReport7">
         <thead>
         <tr>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Category Name</th>
	     <th style="border: 1px solid black; background-color: #e8e5fa;" id="col">Total Amount per Category</th>
         </tr>
         </thead>
         <tbody>';
		 global $wpdb;
		 $query7 = "SELECT 
		            SUM(woo_op_qty.meta_value) AS quantity,
				    SUM(woo_op_line_total.meta_value) AS total_amount, terms_p_id.term_id AS cat_id,
				    terms_p_id.name AS category_name, tax_p_id.parent AS parent_cat_id
				    FROM {$wpdb->prefix}woocommerce_order_items AS woo_order_items
				    LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woo_order_p_id 
					ON woo_order_p_id.order_item_id = woo_order_items.order_item_id
				    LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woo_op_qty 
					ON woo_op_qty.order_item_id = woo_order_items.order_item_id
				    LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woo_op_line_total 
					ON woo_op_line_total.order_item_id = woo_order_items.order_item_id
				    LEFT JOIN {$wpdb->prefix}term_relationships AS rel_p_id 
					ON rel_p_id.object_id = woo_order_p_id.meta_value 
				    LEFT JOIN {$wpdb->prefix}term_taxonomy AS tax_p_id 
					ON tax_p_id.term_taxonomy_id = rel_p_id.term_taxonomy_id
				    LEFT JOIN {$wpdb->prefix}terms AS terms_p_id 
					ON terms_p_id.term_id = tax_p_id.term_id
				    LEFT JOIN {$wpdb->prefix}posts AS p 
					ON p.id=woo_order_items.order_id
				    WHERE 1*1 
				    AND woo_order_items.order_item_type = 'line_item'
				    AND woo_order_p_id.meta_key = '_product_id'
				    AND woo_op_qty.meta_key = '_qty'
				    AND woo_op_line_total.meta_key = '_line_total'
				    AND tax_p_id.taxonomy = 'product_cat'
				    AND p.post_type = 'shop_order'	
				    GROUP BY cat_id
				    ORDER BY total_amount DESC";
					
		 $loop7 = $wpdb->get_results($query7);
		 if(count($loop7)){	
		 foreach($loop7 as $order7){
		 echo '<tr>
		 <td style="border: 1px solid black;">'.sanitize_text_field($order7->category_name).'</td>
		 <td style="border: 1px solid black;">'.sanitize_text_field(wc_price($order7->total_amount)).'</td>
		 </tr>';
		 }
		 }  
		 echo '</tbody>
		 </table>
		 </div>
		 <br>';
	     include 'pdf/pdf7.php';
         include 'csv/csv7.php';
	     echo wp_nonce_field('hp_easy_export_report_e14', 'hp_display_export_report_nonce13');
         include 'print/print7.php';
         echo '</form></div></div></div>';
		 }
        } 
	  
		// Check if HP_Easy_Export exists then
		// the plugin will activate or deactivate
		if(class_exists('HP_Easy_Export')){
		 register_activation_hook( __FILE__, array('hp_easy_export_report', 'activate_hp_easy_export_report'));
		 register_deactivation_hook( __FILE__, array('hp_easy_export_report', 'deactivate_hp_easy_export_report'));
		 register_uninstall_hook(__FILE__, array('hp_easy_export_report', 'uninstall_hp_easy_export_report'));
		 $HP_Easy_Export = new HP_Easy_Export();
		}
  ?>
