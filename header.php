<?php
/**
 * The header for the theme.
 *
 * Displays all of the <head> section and everything up till <section id="content">
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset='<?php bloginfo('charset'); ?>'>
		<title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?php echo get_option('tc_favicon'); ?>" title="Favicon">
		<link rel="stylesheet" href='<?php bloginfo('stylesheet_url'); ?>'>
		<link rel="pingback" href='<?php bloginfo( 'pingback_url' ); ?>'>
		<?php 
			wp_enqueue_script('jquery');
		
		/** Support for threaded comments. */
		if ( is_singular() )
			wp_enqueue_script( 'comment-reply' );

		wp_head();
	?>
	
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/script.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/js/fancybox/jquery.fancybox-1.3.4.css">

	</head>

	<body>
	<div id="page-wrap">
		<header>
			<?php if(get_option('tc_logo')) : ?>
				<img src='<?php echo get_option('tc_logo'); ?>'>
			<?php else : ?>
				<h1><a href='<?php echo get_option('home'); ?>'><?php bloginfo('name'); ?></a></h1>
			<?php endif; ?>
			<nav>
      			<?php wp_nav_menu(array('container' => '', 'theme_location' => 'primary' )); ?>
     		</nav>
		</header>
		
		<section id="content">