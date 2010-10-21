<?php get_header(); ?>
				<section id="fullContent">
					<?php if(have_posts()) : while(have_posts()) : the_post() ?>
						<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<?php edit_post_link('Edit this page...', '<strong>', '</strong>'); ?>
						<?php endwhile; else :?>
						<h2>Page not found!</h2>	
					<?php endif; ?>
				</section>
<?php get_footer(); ?>