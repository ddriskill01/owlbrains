<?php
/**
 * Plugin Name: Owl Brains - TableSorter
 * Plugin URI: 
 * Description: Makes Tables Sortable
 * Version: 1
 * Author: Alan Swenson (editor)
 * Author URI: http://www.tablesorter.com/
 */
 
/**
 * Add jQuery Validation script on posts.
 */
function table_sorter() {
		wp_enqueue_script(
			'table-sorter',
			plugin_dir_url( __FILE__ ) . 'jquery.tablesorter.min.js'
		);
        wp_enqueue_script(
    		'table-sorter-functions',
			plugin_dir_url( __FILE__ ) . 'table_sort_functions.js'
		);
		
}
add_action('template_redirect', 'table_sorter');

/**
 * Initiate the script.
 * Calls the validation options on the comment form.
 */
 ?>
	
