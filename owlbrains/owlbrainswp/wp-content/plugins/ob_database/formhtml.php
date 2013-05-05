<?php 

require_once('../../../wp-config.php');
date_default_timezone_set('America/Los_Angeles');
//receive the variables
		$question = $_POST['question']; 
		$usr_id = $_POST['usr_id']; 	
		$timestamp = date("m/d/y : H:i:s", time());
		$grade_lvl = $_POST['grade_lvl'];
		$subject = $_POST['subject'];
		$how_many = $_POST['how_many']; 
		$which_ones = $_POST['which_ones']; 
		$rush = $_POST['rush'];
		$answered = $_POST['answered']; 
		$who_answered = $_POST['who_answered'];
        	$type = $_POST['type']; 
		$cost = $_POST['cost'];


//Do stuff

$total_points = validate_points($usr_id);

if ($total_points < $cost)
	{
	//user didn't have enough points for the question -- this is the second check
	header("location:http://owlbrains.com/need-more-points");
	}
else if ($total_points >= $cost)
	{
	//points are valid -- do more stuff

	$message_subject = "Your Question Has Been Received - Owl Brains";
	$message = "We we answer it shortly! \r\n";
	$to_add = get_user_email($usr_id);

	post_to_obquestions($timestamp);
	log_points2($cost);
	subtract_points($total_points, $cost, $usr_id);
	send_notification($message_subject, $message, $to_add);

	$message_subject = "A User Has Submitted A Question";
	$message = $question;
	$to_add = "aswens0276@gmail.com";

	send_notification($message_subject, $message, $to_add);



	}


	//check to see if they have enough points
	function validate_points($usr_id){

		global $wpdb;
		$metakey = 'cpoints';
		$meta_table = $wpdb->prefix . "usermeta";

		//get old total points
		$wpdb->show_errors(); 
		$total_points = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $meta_table WHERE (user_id = $usr_id ) AND (meta_key = 'cpoints') ")
		); 
		$total_points = (int)$total_points;
		return $total_points;
	}


	//post to the database
    function post_to_obquestions($timestamp){
		global $wpdb;
		$table_name = $wpdb->prefix . "ob_questions";
		$wpdb->insert( 
			$table_name, 
			array( 
				'question' => $_POST['question'], 
				'usr_id' => $_POST['usr_id'], 	
				'timestamp' => $timestamp,	
				'grade_lvl' => $_POST['grade_lvl'],
				'subject' => $_POST['subject'] , 
				'how_many' => $_POST['how_many'], 
				'which_ones' => $_POST['which_ones'], 
				'rush' => $_POST['rush'],  
				'answered' => $_POST['answered'], 
				'who_answered' => $_POST['who_answered'],
        			'type' => $_POST['type'],
				'cost' => $_POST['cost']
			), 
			array( 
				'%s',
 				'%d', 
				'%s',
				'%s',
				'%s',
				'%d',
				'%s',
				'%d',
				'%d',
				'%d',
        			'%s',
				'%d'




			) 
		);
	}

	function log_points2($cost){
		$neg_cost = -1 * abs($cost);
		cp_log('Question Asked', cp_currentUser(), $neg_cost, 1);
	}


	//adds points to the log
	function log_points($cost){

		global $wpdb;
		$points_table = $wpdb->prefix . "cp";
		$neg_cost = -1 * abs($cost);
		$datatype = 'Question';
		$wpdb->insert( 
			$points_table, 
			array( 
				'points' => $neg_cost,	// number
				'uid' => $_POST['usr_id'],
				'type' => $datatype,
				'data' => 1
			), 
	
			array( 
				'%d', // value1
				'%d',
				'%s',
				'%d'
		
			)
		);
	}


	//subtract points for successfully submitted question
	function subtract_points($total_points, $cost, $usr_id){

		global $wpdb;
		$metakey = 'cpoints';
		$meta_table = $wpdb->prefix . "usermeta";
		$total_points = $total_points - $cost;
		
		$wpdb->update( 
			$meta_table, 
			array( 
				'meta_value' => $total_points	// number
		
			), 
			array( 'user_id' => $usr_id,
				'meta_key' => $metakey

	 		), 
			array( 
				'%d'	// value1
		
			), 
			array( '%d',
				'%s'
	 		) 
		);

	}

	//get the email address of a user
	function get_user_email($user_id)
	{
	global $wpdb;
	/* wpdb class should not be called directly.global $wpdb variable is an instantiation of the class already set up to talk to the WordPress database */ 
	$search_table = $wpdb->prefix . "users";
	//$wpdb->show_errors(); 
	$result = $wpdb->get_results( "SELECT * FROM $search_table WHERE (ID = $user_id) ");

	foreach($result as $row)
		{
			$user_email=$row->user_email;
		} 
	return $user_email;
	}




	//send notification email
	function send_notification($subject, $message, $to_add)
	{
		//send notification email
		$from_add = "admin@owlbrains.com"; 

		$headers = "From: $from_add \r\n";
		$headers .= "Reply-To: $from_add \r\n";
		$headers .= "Return-Path: $from_add\r\n";
		$headers .= "X-Mailer: PHP \r\n";

		//this line send the email
		mail($to_add,$subject,$message,$headers); 
	
	header("location:http://owlbrains.com/thank-you");
}
	


?>