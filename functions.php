<?php

/* Register Widgets */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
			'name' => 'Sidebar Widget',
			'before_title' => '<h3 class="widgettitle">', 
			'after_title' => '</h3>',
	));
}

/* Add comments */
function truecolor_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
   	<div id="comment-<?php comment_ID(); ?>"> 
		<?php if ($comment->comment_approved == '0') : ?>
			<p>Your comment is awaiting approval</p>
		<?php endif; ?>
				
		<?php echo get_avatar($comment, 60); ?>
			
		<div class="comment-text">  
			<cite><?php comment_author(); ?></cite>        
			<span class="commentDate"> <?php comment_date('M j, Y'); ?></span>
			<?php comment_text(); ?>
						
            <div class="commentEdit"><?php edit_comment_link('Edit', '', ''); ?>
     			<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     		</div>
		</div>
	</div> 
<?php } 

/* Read more directs to top of the post */
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

/* Read more link */
function new_excerpt_more($more) {
       global $post;
	return '...</p><a href="'.get_permalink().'" class="read_more">Read more</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

/* Add thumbnail support */
add_theme_support('post-thumbnails');

/* Add support for custom menus */
if (function_exists('register_nav_menus')) {
	register_nav_menus( array(
			'main_nav' => 'Main Navigation Menu'
	));
}

/* New excerpt length */
function new_excerpt_length($length) {
	return 45;
}

add_filter('excerpt_length', 'new_excerpt_length');

/* Get the Category ID */
function get_category_id($cat_name) {
	$categories = get_categories();
	foreach($categories as $category){ //loop through categories
		if($category->name == $cat_name){
			$cat_id = $category->term_id;
			break;
		}
	}

	if (empty($cat_id)) { return 0; }
			return $cat_id;
}

/* Include Admin Option Panel File */
include(TEMPLATEPATH . "/admin/index.php");

?>