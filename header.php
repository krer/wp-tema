<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset='<?php bloginfo('charset'); ?>'>
		<title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" href='<?php bloginfo('stylesheet_url'); ?>'>
		<link rel="pingback" href='<?php bloginfo( 'pingback_url' ); ?>'>
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>

	<body>
	<div id="page-wrap">
		<header>
				<h1><a href='<?php echo get_option('home'); ?>'><?php bloginfo('name'); ?></a></h1>
			<nav>
      			<?php wp_nav_menu(array('menu' => 'Main Navigation Menu')); ?>
      			<?php get_search_form(); ?>
     		</nav>
		</header>