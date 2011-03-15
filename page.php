<?php 
/**
 * The template for all pages
 */

get_header(); ?>

	<section id="posts">
				
		<?php the_post(); ?>
					
			<article id="single_post">
				<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>						
			</article><!-- #single_post -->
	</section><!-- #posts -->
			
<?php 
		get_sidebar();
	get_footer(); 
?>