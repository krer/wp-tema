<?php if( !empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) ) : ?>
	<?php die('You can not access this page directly!'); ?>
<?php endif; ?>

<?php if ( post_password_required() ) { ?>
	<p>This post is password protected!</p>
<?php return; } ?>

<?php if( have_comments() ) : ?>
	<h3><?php comments_number('0 comments', '1 comment', '% comments'); ?></h3>
<div id="comments">
	<ol class="commentlist">
		<?php wp_list_comments('callback=truecolor_comment'); ?>
	</ol>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<?php previous_comments_link( __( '&larr; Older Comments' ) ); ?>
		<?php next_comments_link( __( 'Newer Comments &rarr;' ) ); ?>
	<?php endif; ?>

<?php else : 
	if ( ! comments_open() ) :
?>
	<p>Comments are closed.</p>
<?php endif;?>

<?php endif; ?>

<?php comment_form(); ?>
</div>