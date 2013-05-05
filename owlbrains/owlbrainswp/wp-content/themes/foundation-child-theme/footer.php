<?php
/**
 * Footer
 *
 * Displays content shown in the footer section
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

</div>
<!-- End Page -->

<!-- Footer -->
<footer class="row">

<?php if ( dynamic_sidebar('Sidebar Footer One') || dynamic_sidebar('Sidebar Footer Two') || dynamic_sidebar('Sidebar Footer Three') || dynamic_sidebar('Sidebar Footer Four')  ) : else : ?>

<div class="large-12 columns">
	<ul class="inline-list">
	<?php wp_list_pages('include=268,243,264&title_li='); ?>
	</ul>
</div>

<?php endif; ?>
 <?php wp_footer(); ?>
<div id="login-box" style="display:none;">
<h3>Log In To Owl Brains</h3><p>
<a class="btn btn-large btn-primary" href="http://owlbrains.com/owlbrainswp/wp-login.php?loginFacebook=1&redirect=http://owlbrains.com/owlbrainswp" onclick="window.location = 'http://owlbrains.com/owlbrainswp/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">
  <i class="icon-facebook-sign icon-2x"></i> Connect</a>
</p>
<?php echo do_shortcode('[wppb-login]'); ?>

</div>
<div id="lost-pass-box" style="display:none;">

<h3>Lost Password</h3>
<?php echo do_shortcode('[wppb-recover-password]'); ?>

</div>
<div id="register-box" style="display:none;">
<?php

if ( is_user_logged_in() ){  // Already logged in 
		echo "<h3>You Are Logged in!  You don't need another account.</h3>";
             }
else {
?>
<p>
<h3>Owl Brains - Registration</h3>
<?php echo do_shortcode('[wppb-register]'); ?>
</p>
<?php
	}
?>
</div>
</footer>
<!-- End Footer -->


</body>
</html>