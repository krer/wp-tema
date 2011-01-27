<?php get_header(); ?>
	
<section id="content">
	<section id="posts">
		<?php the_post(); ?>

		<article id="single_post">	
			<h2><?php the_title(); ?></h2>				
			<time><?php the_time('M j, Y'); ?></time>
				
			<?php the_content(); ?>
			
			<?php comments_template(); ?>
		</article>
	</section>

	<?php get_sidebar(); ?>
<?php get_footer(); ?>
