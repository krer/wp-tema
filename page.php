<?php get_header(); ?>

<section id="content">
	<section id="posts">
				
		<?php the_post(); ?>
					
			<article id="single_post">
				<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>						
			</article>
	</section>
			
	<?php get_sidebar(); ?>
<?php get_footer(); ?>