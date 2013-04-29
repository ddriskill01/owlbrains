<?php
 //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }
?>
<div id="message" class="updated fade">
 
Owl Brains Stats <strong>Reseted</strong>.</div>
<div class="wrap">
<h2>Owl Brains Admin</h2>

</div>