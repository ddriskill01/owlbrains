    <?php  
    /* 
    Plugin Name: OB Database 
    Plugin URI: http://www.owlbrains.com/ 
    Version: 1
    Author: Alan Swenson
    Description: Create Database for OWL BRAINS Questions 
    */  
 		



		function create_ob_questions(){
		global $wpdb;
		
		//create the name of the table including the wordpress prefix (wp_ etc)
		$search_table = $wpdb->prefix . "ob_questions";
		//$wpdb->show_errors(); 
		
		//check if there are any tables of that name already
		if($wpdb->get_var("show tables like '$search_table'") !== $search_table) 
		{
		//create your sql
		$sql =  "CREATE TABLE ". $search_table . " (
					  id INT NOT NULL AUTO_INCREMENT,
					  usr_id INT NOT NULL,
					  timestamp VARCHAR (20) NOT NULL, 
					  grade_lvl TINYINT NOT NULL,
					  subject VARCHAR(32) NOT NULL,
					  how_many TINYINT NOT NULL,
					  which_ones TEXT NOT NULL,
					  rush TINYINT NOT NULL,
					answered tinyint NOT NULL,
					who_answered INT NOT NULL,
					  PRIMARY KEY (id));";
		}
		
		//include the wordpress db functions
		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
		dbDelta($sql);
		
		//register the new table with the wpdb object
		if (!isset($wpdb->ob_questions)) 
		{
		$wpdb->ob_questions = $search_table; 
		//add the shortcut so you can use $wpdb->ob_questions
		$wpdb->tables[] = str_replace($wpdb->prefix, '', $search_table); 
		}
		}
		
		//add to front and backend inits
		add_action('init', 'create_ob_questions');
?>