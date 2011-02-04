<?php get_header(); ?>

<section id="content">
	<section id="posts">
	
		<?php $category_id = get_option('tc_portfolio_exclude') ? get_category_id('Portfolio') : "" ; ?>
		<?php query_posts('&cat=-' . $category_id) ?>
				
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
			<article class="blogpost">
				
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="thumb_image"><?php the_post_thumbnail(); ?></div>
				<?php } ?>
							
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					<time><?php the_time('M j, Y'); ?></time>
				
				<?php the_excerpt(); ?>
							
			</article>

		<?php endwhile; ?>
					
			<section id="navigation">
				<span class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></span>
				<span class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
			</section>
					
		<?php else : ?>
			<?php include_once(TEMPLATEPATH."/page-error.php"); ?>
		<?php endif; ?>
	</section>
			
	<?php get_sidebar(); ?>
<?php get_footer(); ?>