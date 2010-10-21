<?php get_header(); ?>

<?php query_posts($query_string . '&cat=-6'); ?>

				<section id="content">
				
					<?php if(have_posts()) : while(have_posts()) : the_post() ?>
					
						<article class="post_snippet">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="thumb_image"><?php the_post_thumbnail(); ?></div>
							<?php } ?>
							
							<h2><?php the_title(); ?><span class="arrow"></span></h2>
							<span class="post-box">
								Posted on <?php the_time('F j, Y'); ?>
								<span class="numberComments"><?php comments_popup_link('0 comments', '1 comment', '% comments', 'comments-link', 'Comments are closed'); ?></span>
							</span>
							
							<?php the_excerpt(); ?>
						</article>
						<?php endwhile; ?>
					
						<p><?php previous_posts_link('Previous entries'); ?><?php next_posts_link('Older entries');?></p>
					
					<?php else : ?>
						<h2>We couldn't find any entries</h2>	
					<?php endif; ?>
				</section>
			
	<?php get_sidebar(); ?>
<?php get_footer(); ?>