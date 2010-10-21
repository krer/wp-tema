<?php

if ( function_exists('register_sidebars') )
	register_sidebars();


function truecolor_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
   	<div id="comment-<?php comment_ID(); ?>"> 
		<?php if ($comment -> comment_approved ='0') : ?>
			<p>Your comment is awaiting approval</p>
		<?php endif; ?>
				
		<?php echo get_avatar($comment, 60); ?><br />
			
		<div class="comment-text">  
			<cite><?php comment_author(); ?></cite>        
			<span class="commentDate"> <?php comment_date('M j, Y'); ?></span>
			<?php comment_text(); ?>
						
            <div class="commentEdit"><?php edit_comment_link('Edit', '', ''); ?>
     		<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
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
	return '... <a href="'. get_permalink($post->ID) . '">' . '<span class="read">Read more</span>' . '</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

add_theme_support('post-thumbnails');

?>