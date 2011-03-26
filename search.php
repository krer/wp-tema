<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

	<section id="posts">
				
		<?php if(have_posts()) : while(have_posts()) : the_post();
				if (is_type_page()) continue; ?>
					
			<article class="blogpost">
				
				<div class="thumb-box">
					<?php if ( has_post_thumbnail() ) : 
							the_post_thumbnail(); 
						else : ?>
							<img src="http://placehold.it/190x190">	
						<?php endif; ?>
				</div><!-- .thumb-box -->
							
				<div class="post-text">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					<div class="post-details">
						<time><?php the_time('M j, Y'); ?></time>
						<span class="cat-details">Posted in: <?php echo get_the_category_list( ', ' ); ?></span>
						<span class="comment-details"><?php comments_popup_link('No comments', '1 comment', '% Comments'); ?></span>
					</div><!-- .post-details -->
				
					<?php the_excerpt(); ?>
				</div><!-- .post-text -->		
			</article><!-- .blogpost -->
		<?php endwhile; ?>
					
			<p><?php previous_posts_link('Previous entries'); ?><?php next_posts_link('Older entries');?></p>
					
		<?php else :
				include_once(TEMPLATEPATH."/page-error.php");
			endif; ?>
	</section><!-- #posts -->
			
<?php 
		get_sidebar();
	get_footer(); 
?>