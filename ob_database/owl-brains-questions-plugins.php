<?php
/*
Plugin Name: Owl Brains Questions
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
}
 
add_action('admin_menu', 'owlbrains_admin_actions');
?>