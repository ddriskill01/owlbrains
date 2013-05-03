<?php
 //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }
//access questions database
global $wpdb;
/* wpdb class should not be called directly.global $wpdb variable is an instantiation of the class already set up to talk to the WordPress database */ 
$search_table = $wpdb->prefix . "ob_questions";
//$wpdb->show_errors(); 
$result = $wpdb->get_results( "SELECT * FROM $search_table WHERE (answered = 0) ORDER BY id "); 


?>
<div class="wrap">
<h2>Owl Brains Admin</h2>

</div>
<div>
<form name ="adminForm" id="adminForm" action="http://owlbrains.com/owlbrainswp/wp-content/plugins/owlbrains-admin/adminf
orm.php" method="post">
<div id="costBox"></div>
<div id="user_idBox"></div>
<div id="questionBox"></div>

<label for='answer'><h3>Answer</h3></label><textarea name="answer" id="answer" rows="10" cols="100"> </textarea>
<p>
<button type="submit" name="button" value="1">Submit Answer</button>
<button type="submit" name="button" value="2">Refund Question</button></p>
<table id="adminTable" name="adminTable" class="dataTable"> 
<thead> 
<tr> 
    <th>Radio</th> 
    <th>Points</th> 
    <th>Grade</th> 
    <th>Subject</th> 
    <th>Type</th> 
    <th>Time</th>
 	<th>User_id</th>
</tr> 
</thead> 
<tbody> 


<?php
foreach($result as $row)
 {?>

<tr> 
    <td><input type="radio" name="radio_group" value="<?php
echo $row->id;?>
" onchange="displayQuestion()"></td> 
	<td>
<input type="text" value="<?php
echo $row->cost;?>
" id="cost<?php
echo $row->id;?>
" name="cost<?php
echo $row->id;?>
">
	</td> 
    <td>
<?php
echo $row->grade_lvl;
?>
	</td>
    <td>
<?php
echo $row->subject;
?>
	</td>
   <td>
<?php
echo $row->type;
?>
	</td>
<td>
<?php
echo $row->timestamp;
?>
<input type="hidden" value="<?php
echo $row->question;?>
" id="question<?php
echo $row->id;?>
" name="question<?php
echo $row->id;?>
">
	</td>
<td>
<input type="text" value="<?php
echo $row->usr_id;?>
" id="user_id<?php
echo $row->id;?>
" name="user_id<?php
echo $row->id;?>
">
	</td> 
</tr> 

<?php
} 
?>
</tbody> 
</table>


</form>
</div>