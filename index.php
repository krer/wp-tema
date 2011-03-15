<?php 
/**
 * The main template file
 */

get_header(); ?>

	<section id="posts">
				
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
			<article class="blogpost">
				
					<div class="thumb-box">
						<?php the_post_thumbnail(); ?>
					</div><!-- .thumb-box -->
							
					<div class="post-text">
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
						<div class="post-details">
							<time><?php the_time('M j, Y'); ?></time>
							<span class="cat-details">Posted in: <?php echo get_the_category_list( ', ' ); ?></span>
							<span class="comment-details"><?php comments_popup_link('No comments', '1 comment', '% comments'); ?></span>
						</div><!-- .post-details -->
				
						<?php the_excerpt(); ?>
					</div><!-- .post-text -->		
			</article><!-- .blogpost -->

			<?php endwhile; ?>
		
			<section class="blogpost">
				<?php 
					if(function_exists('wp_pagenavi')) :
            			wp_pagenavi();
					else :
				?>
						<span class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></span>
						<span class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
				<?php endif; ?>	
			</section><!-- .blogpost -->
					
		<?php 
			else :
				include_once(TEMPLATEPATH . "/page-error.php");
			endif; 
		?>
	</section><!-- #posts -->
			
<?php 
		get_sidebar();
	get_footer(); 
?>