<?php 
/**
 * The Template for displaying all single posts
 */

get_header(); ?>
	
	<section id="posts">
		<?php the_post(); ?>

		<article id="single_post">	
			<h2><?php the_title(); ?></h2>				
			<time><?php the_time('M j, Y'); ?></time>
				
			<?php the_content(); ?>
			
			<?php comments_template(); ?>
		</article><!-- #single_post -->
	</section><!-- #posts -->

<?php 
		get_sidebar();
	get_footer(); 
?>
