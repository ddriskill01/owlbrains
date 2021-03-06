<?php
ob_start();
/**
 * Header
 *
 * Setup the header for our theme
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?><!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width" />

<title> <?php wp_title(' | ', true, 'right'); ?></title>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<nav class="top-bar">
		<ul class="title-area">
			<li class="name"><h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1></li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<?php 
			if ( is_user_logged_in() ) {
			wp_nav_menu( array( 'theme_location' => 'loggedin-menu', 'menu_class' => 'right', 'container' => '', 'fallback_cb' => 'header-menu', 'walker' => new foundation_navigation() ) ); 
		
			} else {
			
			//redirect if not logged and and visitor trys to access ask a question page
			if (is_page(16)) {
			wp_redirect( 'http://owlbrains.com/not-registered'); 
			exit;
			}
			//redirect if not logged and and visitor trys to access my questions page
			if (is_page(14)) {
			header("location:http://owlbrains.com/not-registered");
			}
			//redirect if not logged and and visitor trys to access add points page
			if (is_page(10)) {
			header("location:http://owlbrains.com/not-registered");
			}
			wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'right', 'container' => '', 'fallback_cb' => 'foundation_page_menu', 'walker' => new foundation_navigation() ) );
			}
?>
		</section>
	</nav>

	<?php $header =  get_header_textcolor();
	if ( $header !== "blank" ) : ?>
	<header class="site-header" <?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) : ?> style="background:url('<?php echo esc_url( $header_image ); ?>');" <?php endif; ?>>
		<div class="row">
			<div class="large-12 columns">
				<h2><a style="color:#<?php header_textcolor(); ?>;" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'description' ); ?></a></h2>
			</div>
		</div>
	</header>
	<?php endif; ?>




<!-- Begin Page -->
<div class="row">
