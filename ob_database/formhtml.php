<?php 

require_once('../../../wp-config.php');

//receive the variables
		$question = $_POST['question']; 
		$usr_id = $_POST['usr_id']; 	
		$timestamp = $_POST['timestamp'];	
		$grade_lvl = $_POST['grade_lvl'];
		$subject = $_POST['subject'];
		$how_many = $_POST['how_many']; 
		$which_ones = $_POST['which_ones']; 
		$rush = $_POST['rush'];
		$answered = $_POST['answered']; 
		$who_answered = $_POST['who_answered'];

$question = trim($question);
if ($question == '') {
echo "You have not asked a question";
} 
else { 
	if(is_numeric ($how_many))
//post to the database
{
 


global $wpdb;
$table_name = $wpdb->prefix . "ob_questions";
$wpdb->insert( 
	$table_name, 
	array( 
		'question' => $_POST['question'], 
		'usr_id' => $_POST['usr_id'], 	
		'timestamp' => $_POST['timestamp'],	
		'grade_lvl' => $_POST['grade_lvl'],
		'subject' => $_POST['subject'] , 
		'how_many' => $_POST['how_many'], 
		'which_ones' => $_POST['which_ones'], 
		'rush' => $_POST['rush'],  
		'answered' => $_POST['answered'], 
		'who_answered' => $_POST['who_answered']
	), 
	array( 
		'%s',
 		'%d', 
		'%s',
		'%d',
		'%s',
		'%d',
		'%s',
		'%d',
		'%d',
		'%d'




	) 
);

	$from_add = "admin@owlbrains.com"; 
	$to_add = "aswens0276@gmail.com"; //<-- put your yahoo/gmail email address here
	$message = "Test Message";
	$subject = "";
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	
//is the question a rush?
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
else
 {echo "Please put in the number of questions asked!";}
}
?>