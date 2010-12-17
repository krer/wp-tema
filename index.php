<?php get_header(); ?>

<?php query_posts($query_string . '&cat=-6&offset=1'); ?>

<section id="content">
	<section id="featured">
		<?php $topPost = new WP_Query('posts_per_page=1'); ?>
	
		<?php while($topPost->have_posts()) : $topPost->the_post(); ?>
					
			<article class="featured_snippet">
				
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="featured_image"><?php the_post_thumbnail(); ?></div>
				<?php } ?>
							
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
									
				<?php the_excerpt(); ?>
							
			</article>
		<?php endwhile; ?>
	</section>

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