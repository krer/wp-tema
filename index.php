<?php get_header(); ?>

<section id="content">
	<section id="posts">
				
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
			<article class="post_snippet">
				
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="thumb_image"><?php the_post_thumbnail(); ?></div>
				<?php } ?>
							
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					<span class="postmetadata">
						<?php the_time('F j, Y') ?>
					</span>	
				
				<?php the_excerpt(); ?>
							
			</article>
		<?php endwhile; ?>
					
			<p><?php previous_posts_link('Previous entries'); ?><?php next_posts_link('Older entries');?></p>
					
		<?php else : ?>
			<h3>Not found</h3>	
		<?php endif; ?>
	</section>
			
	<?php get_sidebar(); ?>
<?php get_footer(); ?>