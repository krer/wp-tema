<?php
/**
 * True colors functions and definitions
 */
 
// Theme defaults and support for various features.
function tc_setup() {
		
		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
		
		// The default size. Larger images will be auto-cropped to fit
		set_post_thumbnail_size( 190, 190, true );
		
		// The gallery size. Larger images will be auto-cropped to fit
		add_image_size( 'gallery', 268, 168, true );

		// Add default posts and comments RSS feed links
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' =>  'Primary Navigation'
		) );
	}
add_action( 'after_setup_theme', 'tc_setup' );

// Always show a home link
function page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'page_menu_args' );

// Sets the post excerpt length to 34 characters
function excerpt_length($length) {
	return 34;
}
add_filter('excerpt_length', 'excerpt_length'); 
 
// Adds a "Read more" link to excerpts
function excerpt_more($more) {
       global $post;
	return '...</p><a href="'.get_permalink().'" class="read_more">Read more</a>';
}
add_filter('excerpt_more', 'excerpt_more');

// Register widgetized sidebar
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
			'name' => 'Sidebar',
			'description'   => 'These are widgets for the sidebar',
			'before_widget' => '<li>', 
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widgettitle">', 
			'after_title' => '</h3>',
	));
}

// The template for displaying the comments
function comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
   	<div id="comment-<?php comment_ID(); ?>"> 
		<div class="image">		
			<?php echo get_avatar($comment, 60); ?>
		</div>
			
		<div class="details"> 
			<div class="name">
				<span class="author"><?php comment_author(); ?></span>
				<span class="date"><?php comment_date('F j, Y'); ?> ·
     			<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     			</span>
     		</div>
     		
     		<?php if ($comment->comment_approved == '0') : ?>
				<p>Your comment is awaiting approval</p>
			<?php endif; ?>
     		
			<?php comment_text(); ?>
		</div>
	</div> 
<?php } 

// "Read more" links directs to the top of the post
function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// Search only pages
function is_type_page() {
	global $post;
	if ($post->post_type == ‘page’) {
		return true;
	} else {
		return false;
	}
}

// Create a gallery post type
function post_type_gallery() {
	register_post_type( 'gallery',
		array(
			'labels' => array(
				'name' => 'Gallery',
				'singular_name' => 'Gallery Item',
				'add_new' => 'Add New', 'Gallery Item',
    			'add_new_item' => 'Add New Gallery Item',
    			'edit_item' => 'Edit Gallery Item',
    			'new_item' => 'New Gallery Item',
    			'view_item' => 'View Gallery Item',
    			'search_items' => 'Search Gallery Items',
    			'not_found' =>  'No Gallery Items found',
    			'not_found_in_trash' => 'No Gallery Items found in Trash', 
			),
		'public' => true,
		'show_in_nav_menus' => false,
        'menu_position' => 5,
        'rewrite' => array('slug' => '','with_front' => false),
        'supports' => array('title', 'custom-fields', 'thumbnail')
		)
	);
}
add_action( 'init', 'post_type_gallery' );

// Include admin option panel
include(TEMPLATEPATH . "/admin/index.php");

?>