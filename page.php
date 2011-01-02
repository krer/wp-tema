<?php get_header(); ?>

<section id="content">
	<section id="posts">
				
		<?php the_post(); ?>
					
			<article class="post_snippet">
				<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<?php edit_post_link('Edit this page...', '<p>', '</p>'); ?>							
			</article>
	</section>
			
	<?php get_sidebar(); ?>
<?php get_footer(); ?>