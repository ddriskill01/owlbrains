<?php
/**
 * Plugin Name: Owl Brains - Validate From
 * Plugin URI: 
 * Description: Validate forms instantly with jQuery. Uses <a href="http://bassistance.de/jquery-plugins/jquery-plugin-validation/">jQuery Form Validation</a> plugin by Jörn Zaefferer.
 * Version: 1
 * Author: Alan Swenson
 * Author URI: http://www.owlbrains.com/
 * License: GPLv2
 */
 
/**
 * Add jQuery Validation script on posts.
 */
function pbd_vc_scripts() {
	if(is_page() ) {
		wp_enqueue_script(
			'jquery-validate',
			plugin_dir_url( __FILE__ ) . 'js/jquery.validate.min.js',
            array( 'jquery' ) 
		);
		
		wp_enqueue_style(
			'jquery-validate',
			plugin_dir_url( __FILE__ ) . 'css/style.css',
			array(),
			'1.0'
		);
        
	}
}
add_action('template_redirect', 'pbd_vc_scripts');

/**
 * Initiate the script.
 * Calls the validation options on the comment form.
 */
function pbd_vc_init() { ?>
	<script type="text/javascript">
		$(document).ready(function($) {

            /**
            * Add Custom Functions Below
            */
            	$.validator.addMethod("notEqualTo", function(value, element, param) {
            	return this.optional(element) || value != param;
            	}, "Please Choose and Option");
	
		$.validator.addMethod("enoughPoints", function(value, element) {
   		return $('#points').val() >= $('#cost').val()
		}, "You need more Points first");
			$('#myform').validate({
				ignore: [],
				rules: {
					points: {
						required: true,
						enoughPoints: true
					},
					cost: {
						required: true
					},
					question: {
						required: true,
						minlength: 2
					},
                    			type: {
                        			required: true,
                       				 notEqualTo: "0"
                    			},
                    			grade_lvl: {
                       			 	required: true,
                        			notEqualTo: "99"
                    			},
                    			subject: {
                        			required: true,
                        			notEqualTo: "0"
                    			}
				},
				
				messages: {
					question: "Please Ask A Question?",
                    			type: "Please Choose A Type Of Answer",
                    			grade_lvl: "Please Choose A Grade Level",
                    			subject: "Please Choose A Subject",
					points: "You Need More Points For This Question"
                    
				}
			});
		});
	</script>
<?php }
add_action('wp_footer', 'pbd_vc_init', 999);

?>