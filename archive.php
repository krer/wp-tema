<?php 
/*
 * The template for displaying archive pages
 */

get_header(); ?>

	<section id="posts">
		
		<!-- Loop through and display the posts -->
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
			<article class="blogpost">
							
				<div class="thumb-box">
					<?php if ( has_post_thumbnail() ) : 
							the_post_thumbnail(); 
						else : ?>
							<img src="http://placehold.it/190x190">	
						<?php endif; ?>
				</div>
							
				<div class="post-text">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					<div class="post-details">
						<time><?php the_time('M j, Y'); ?></time>
						<span class="cat-details">Posted in: <?php echo get_the_category_list( ', ' ); ?></span>
						<span class="comment-details"><?php comments_popup_link('No comments', '1 comment', '% Comments'); ?></span>
					</div>
				
					<!-- Display an excerpt instead of full content -->
					<?php the_excerpt(); ?>
				</div>								
			</article>
			
		<?php endwhile;	
			else :
				// Include the error page
				include_once(TEMPLATEPATH . "/page-error.php");
			endif; ?>
	</section>
			
<?php 
		get_sidebar();
	get_footer(); 
?>