<?php
/*
 * The template for displaying comments
 */
?>

<section id="comments">
	<!-- Don't show the post if it's protected -->
	<?php if ( post_password_required() ) : ?>
		<p>This post is password protected!</p>
	<?php
		return;
	endif;
	?>

	<!-- If there are comments -->
	<?php if( have_comments() ) : ?>
		<h3 id="content_number"><?php comments_number('0 comments', '1 comment', '% comments'); ?></h3>

		<ol>
			<!-- Display the comments -->
			<?php wp_list_comments( array( 'callback' => 'comments' ) ); ?>
		</ol>
	
		<!-- Display comments navigation -->
		<?php 
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				previous_comments_link( '&larr; Older Comments' );
				next_comments_link( 'Newer Comments &rarr;' );
			endif; 
	else : 
		// Show a message if the comments are closed
		if ( ! comments_open() ) :
	?>
	
	<p>Comments are closed.</p>
	
	<?php 
		endif;
	endif; 
	?>

	<section id="comment-form">
		<section id="respond">

			<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>

			<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
			</div>

			<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
				<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>

				<form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" method="post" id="commentform">

				<?php if ( is_user_logged_in() ) : ?>

					<p>Logged in as <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

				<?php else : ?>
					<p>
						<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
						<label for="author">Name <small><?php if ($req) echo "(required)"; ?></small></label>
					</p>
				
					<p>
						<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
						<label for="email">Mail <small><?php if ($req) echo "(required)"; ?></small></label>
					</p>

					<p>
						<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
						<label for="url">Website</label>
					</p>

				<?php endif; ?>
	
				<p>
					<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
				</p>

				<input name="submit" type="submit" id="commentSubmit" tabindex="5" value="Submit">
				
				<?php 
					comment_id_fields();
					do_action( 'comment_form', $post->ID );
				?>

				</form>

			<?php endif; ?>
			
		</section><!-- #comment-form -->
	</section><!-- #respond -->
</section><!-- #comments -->