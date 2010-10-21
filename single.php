<?php get_header(); ?>
	
		<section id="content">
			<?php the_post(); ?>
			
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<article id="single_post">					
				<span class="postInfo">Posted on <?php the_time('F j, Y'); ?> at <?php the_time(); ?></span>
				
				<?php the_content(); ?>
			</article>
			
			<?php comments_template(); ?>
		</section>
			
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
