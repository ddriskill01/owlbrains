<?php 

require_once('../../../wp-config.php');
date_default_timezone_set('America/Los_Angeles');
//receive the variables
    	$id = $_POST['radio_group']; 
		$answer = $_POST['answer']; 	
		$timestamp = date("m/d/y : H:i:s", time());
		
//initialize table
global $wpdb;
$questions_table = $wpdb->prefix . "ob_questions";
//get old total points
$wpdb->show_errors(); 
	

//update question with answer


$wpdb->update( 
	$questions_table, 
	array( 
		'answer' => $answer,	// number
		'answered' => 1
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








//send notification email
	$from_add = "admin@owlbrains.com"; 

	$to_add = "aswens0276@gmail.com"; //<-- put your yahoo/gmail email address here

	$message = "Test Message";
	$subject = "";
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	


	$subject = "Question Answered";

	//this line send the email
	mail($to_add,$subject,$question,$headers); 
	
header("location:http://owlbrains.com/thank-you");

?>