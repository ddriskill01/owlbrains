<?php
/*
Plugin Name: Owl Brains - Admin
Plugin URI: http://owlbrains.com/owl-brains-questions-plugin
Description: For Admin to Answer Questions on Owl Brains
Author: Alan S
Version: 1.0
Author URI: http://owlbrains.com
*/

function owlbrains_menu()
{
    global $wpdb;
    include 'owlbrains-admin.php';
}
 
function owlbrains_admin_actions()
{
    add_options_page("Owl Brains", "Owl Brains", 1,
"Owl_Brains", "owlbrains_menu");

    add_action( 'admin_enqueue_scripts', 'my_admin_enqueue_scripts' );
}
 function my_admin_enqueue_scripts(  ) {
		wp_enqueue_script(
    		'jquery-functions',
			plugin_dir_url( __FILE__ ) . 'js/jquery-1.9.1.js'
		);
        
        wp_enqueue_script(
        	'data-tables',
			plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.js'
		);
        wp_enqueue_script(
            'datatables-scroller',
			plugin_dir_url( __FILE__ ) . 'js/dataTables.scroller.js'
		);
        wp_enqueue_script(
            'display-questions',
    		plugin_dir_url( __FILE__ ) . 'js/displayQuestion.js'
		);
        
        wp_enqueue_style(
    		'scroller-style',
			plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.css',
			array(),
			'1.0'
		);
        


       	
   
}
add_action('admin_menu', 'owlbrains_admin_actions');


?>