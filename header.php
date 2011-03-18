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
		
		<!--[if lte IE 7]>
   			 <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie7.css">
        <![endif]-->
		
		<!--[if lte IE 8]>
   			 <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie8.css">
        <![endif]-->
		
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<?php if (get_option('tc_favicon')) : ?>
			<link rel="shortcut icon" href="<?php echo get_option('tc_favicon'); ?>" title="Favicon">
		<?php endif; ?>
		
		<link rel="stylesheet" href='<?php bloginfo('stylesheet_url'); ?>'>
		<link rel="pingback" href='<?php bloginfo( 'pingback_url' ); ?>'>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
		<?php 
			wp_enqueue_script('jquery');
		
		// Support for threaded comments
		if ( is_singular() )
			wp_enqueue_script( 'comment-reply' );

		wp_head();
	?>
	
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/script.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/js/prettyPhoto/css/prettyPhoto.css">
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>

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