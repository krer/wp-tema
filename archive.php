<?php 
/*
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<section id="posts">
		
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
			<article class="blogpost">
							
				<div class="thumb-box">
					<?php the_post_thumbnail(); ?>
				</div>
							
				<div class="post-text">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					<div class="post-details">
						<time><?php the_time('M j, Y'); ?></time>
						<span class="cat-details">Posted in: <?php echo get_the_category_list( ', ' ); ?></span>
						<span class="comment-details"><?php comments_popup_link('No comments', '1 comment', '% Comments'); ?></span>
					</div>
				
					<?php the_excerpt(); ?>
				</div>								
			</article>
			
		<?php endwhile;	
			else :
				include_once(TEMPLATEPATH."/page-error.php");
			endif; ?>
	</section>
			
<?php 
		get_sidebar();
	get_footer(); 
?>