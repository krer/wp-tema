<?php

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
			'before_title' => '<h3 class="widgettitle">', 
			'after_title' => '</h3>',
	));
}

function truecolor_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
   	<div id="comment-<?php comment_ID(); ?>"> 
		<?php if ($comment -> comment_approved ='0') : ?>
			<p>Your comment is awaiting approval</p>
		<?php endif; ?>
				
		<?php echo get_avatar(get_the_author_email(), 60); ?>
			
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

function new_excerpt_more($more) {
       global $post;
	return '...</p><a href="'.get_permalink().'" class="read_more">Read more</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

add_theme_support('post-thumbnails');


if (function_exists('register_nav_menus')) {
	register_nav_menus( array(
			'main_nav' => 'Main Navigation Menu'
	));
}

function new_excerpt_length($length) {
	return 40;
}

add_filter('excerpt_length', 'new_excerpt_length');

function is_type_page() { // Check if the current post is a page
	global $post;

	if ($post->post_type == 'page') {
		return true;
	} else {
		return false;
	}
}

?>