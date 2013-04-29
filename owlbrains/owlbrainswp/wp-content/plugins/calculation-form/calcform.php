<?php
/**
 * Plugin Name: Owl Brains - Live Form Calcualtions
 * Plugin URI: 
 * Description: Calculates Form Data Totals Live
 * Version: 1
 * Author: Alan Swenson
 * Author URI: http://www.owlbrains.com/
 */
 
/**
 * Add jQuery Validation script on posts.
 */
function form_calculations() {
    if(is_page() ) {
		wp_enqueue_script(
			'form-calculations',
			plugin_dir_url( __FILE__ ) . 'js/formcalculations.js'
		);
		
	}
}
add_action('template_redirect', 'form_calculations');

/**
 * Initiate the script.
 * Calls the validation options on the comment form.
 */

?>