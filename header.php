<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset='<?php bloginfo('charset'); ?>' />
		<title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
		<link rel="stylesheet" href='<?php bloginfo('stylesheet_url'); ?>' />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>

	<body>
	<div id="page-wrap">
		<header>
				<h1><a href='<?php echo get_option('home'); ?>'><?php bloginfo('name'); ?></a></h1>
				<span id="search"><?php get_search_form(); ?></span>
			<nav>
				<ul>
      				<?php wp_list_pages('title_li='); ?>
      			</ul>
     		</nav>
		</header>