<?php
ob_start();
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_enqueue_script("jquery"); ?>
<script src="http://owlbrains.com/js/jquery.validate.js" type="text/javascript"></script>
<script src="http://owlbrains.com/js/owlform.js" type="text/javascript"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="div-2">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
<div id-"div-nav">
<div id="div-nav-ico3">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
</div>
<div id="div-nav-ico">

		


<?php  
if (is_user_logged_in()){
global $current_user; get_currentuserinfo();
global $wpdb;
/* wpdb class should not be called directly.global $wpdb variable is an instantiation of the class already set up to talk to the WordPress database */ 
$search_table = $wpdb->prefix . "cp";
$wpdb->show_errors(); 
$points = $wpdb->get_results( "SELECT * FROM $search_table WHERE (uid = $current_user->ID ) "); 

echo("    Welcome, " . $current_user->user_login." You Have <font size=5>");
cp_displayPoints($current_user->ID);
echo(" </font>Points " );
}

else {
?>


<div id="login" align="right">

<form name="loginform" id="loginform" action="<?php echo wp_login_url( home_url() ); ?>" method="post">
<table id="table-4"><tr><td rowspan="2" style="width: 30%;"></td>
<td>
<label>Email </td><td><input type="text" name="log" id="log" value="" size="20" tabindex="1" /></label></td><td>
<label>Password </td><td><input type="password" name="pwd" id="pwd" value="" size="20" tabindex="2" /></label></td><td><input type="submit" name="submit" id="submit" value="Login &raquo;" tabindex="3" />
<input type="hidden" name="redirect_to" value="http://owlbrains.com" /></td></tr></form>
<tr><td></td><td>
<a href="http://owlbrains.com/owlbrainswp/wp-login.php?action=register">Register</a></td><td></td><td>
<a href="http://owlbrains.com/owlbrainswp/wp-login.php?action=lostpassword" title="Password Lost and Found">Lost your password?</a></td>
</table>
</div>
<?
};
?></div>
</hgroup>
<div id="div-4">
<div id="div-nav-ico2"><a href="http://owlbrains.com" title="Home"><img src="http://owlbrains.com/images/home.png" /></a></div><div id="div-nav-ico2"><a href="http://owlbrains.com/about" title="About Owl Brains"><img src="http://owlbrains.com/images/about.png" /></a></div><div id="div-nav-ico2"><a href="http://owlbrains.com/ask-a-question" title="Ask A Question"><img src="http://owlbrains.com/images/ask.png" /></a></div><div id="div-nav-ico2"><a href="http://owlbrains.com/my-questions-answers" title="My Questions and Answers"><img src="http://owlbrains.com/images/myquestions.png" /></a></div><div id="div-nav-ico2"><a href="http://owlbrains.com/get-some-points" title="Get Some Points"><img src="http://owlbrains.com/images/points.png" /></a></div><div id="div-nav-ico2"><a href="http://owlbrains.com/contact" title="Contact Us"><img src="http://owlbrains.com/images/contact.png" /></a></div><div id="div-nav-ico2">
<?php 
if (is_user_logged_in()){
?>

<a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout"><img src="http://owlbrains.com/images/logout.png" /></a>
<?php
}
else {
?>
<a href="http://owlbrains.com/owlbrainswp/wp-signup.php" title="Sign up!"><img src="http://owlbrains.com/images/register.png" /></a>
<?php
}
?>
</div>

</div>
		<!-- #site-navigation above this -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
</div>
</div>
<div id="page" class="hfeed site">

	</header><!-- #masthead -->

	<div id="main" class="wrapper">