<?php 

require_once('../../../wp-config.php');
date_default_timezone_set('America/Los_Angeles');
//receive the variables
    		$id = $_POST['radio_group'];
		$user_id = $_POST['user_idArea']; 
		$answer = $_POST['answer']; 
		$button = $_POST['button']; 
		$cost = $_POST['costArea'];
		$question = $_POST['questionArea'];
		$timestamp = date("m/d/y : H:i:s", time());
		

	
//check if button is pressed for submit answer or refund question
if ($button == 1) {
		$subject = "Your Question Has Been Answered! - Owl Brains";
		$message = "The answer to your question: \r\n";
		$message .= $question . "\r\n";
		$message .= "is: \r\n";
		$message .= $answer . "\r\n"; 
		update_answer($answer, $id, 1);
		$to_add = get_user_email($user_id);
		send_notification($subject, $message, $to_add);
	}
//refund question
else if ($button == 2) {
		$answer = "Question Has Been Refunded";
		$subject = "Your Points have Been Refunded - Owl Brains";
		$message = "Unfortunately we were unable to answer this question.  All the points for this question have been refunded to your account."; 
		refund_points($cost);
		update_answer($answer, $id, 2);
		$to_add = get_user_email($user_id);
		send_notification($subject, $message, $to_add);
		
	}
//refund points spent on a question
	function refund_points($cost) 
		{

			cp_alterPoints(cp_currentUser(), $cost);
			//add to log
			//still not logging the description
			cp_log("Points Refunded", cp_currentUser(), $cost, 2);
		}




//update question with answer
	function update_answer($answer, $id, $answered) 
		{
	//initialize table
	global $wpdb;
	$questions_table = $wpdb->prefix . "ob_questions";
	$wpdb->show_errors(); 
	$wpdb->update( 
	$questions_table, 
	array( 
		'answer' => $answer,	// number
		'answered' => $answered
	), 
	array( 'id' => $id
		

	 ), 
	array( 
		'%s',	// value1
		'%d'
	), 
	array( '%d'
	
	 ) 
);
}

//get the email address of a user
function get_user_email($user_id)
	{
	global $wpdb;
	/* wpdb class should not be called directly.global $wpdb variable is an instantiation of the class already set up to talk to the WordPress database */ 
	$search_table = $wpdb->prefix . "users";
	$wpdb->show_errors(); 
	$result = $wpdb->get_results( "SELECT * FROM $search_table WHERE (ID = $user_id) ");

	foreach($result as $row)
		{
			$user_email=$row->user_email;
		} 
	return $user_email;
	}



function send_notification($subject, $message, $to_add)
	{
		//send notification email
		$from_add = "admin@owlbrains.com"; 

		$headers = "From: $from_add \r\n";
		$headers .= "Reply-To: $from_add \r\n";
		$headers .= "Return-Path: $from_add\r\n";
		$headers .= "X-Mailer: PHP \r\n";

		$message .= "Thank you for using Owl Brains.  When you have ";
		$message .= "another question we hope you will use Owl Brains again.";

		//this line send the email
		mail($to_add,$subject,$message,$headers); 
	
	header("location:http://owlbrains.com/owlbrainswp/wp-admin/options-general.php?page=Owl_Brains");
}
?>