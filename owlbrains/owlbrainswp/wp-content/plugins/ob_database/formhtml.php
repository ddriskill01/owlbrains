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
//check to see if they have enough points
global $wpdb;
$metakey = 'cpoints';
$meta_table = $wpdb->prefix . "usermeta";
//get old total points
$wpdb->show_errors(); 
$total_points = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $meta_table WHERE (user_id = $usr_id ) AND (meta_key = 'cpoints') ")
	); 
$total_points = (int)$total_points;
$cost = (int)$cost;
if ($total_points < $cost) {
	
	header("location:http://owlbrains.com/need-more-points");
}
else
{
	



//post to the database

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

//adds points to the log
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
//subtract points for successfully submitted question

$total_points = $total_points - $cost;
//Change points


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








//send notification email
	$from_add = "admin@owlbrains.com"; 

	$to_add = "aswens0276@gmail.com"; //<-- put your yahoo/gmail email address here

	$message = "Test Message";
	$subject = "";
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	

if ($rush !== '1') {
	$subject = "A New Question";
}
else
{
	$subject = "A New Rush Question";
}
	//this line send the email
	mail($to_add,$subject,$question,$headers); 
	
header("location:http://owlbrains.com/thank-you");
}
?>