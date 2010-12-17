<?php get_header(); ?>
	
<section id="content">
	<section id="posts">
		<?php the_post(); ?>

			<article id="single_post">	
				<h2><?php the_title(); ?></h2>				
				<span class="postInfo">Posted on <?php the_time('F j, Y'); ?> at <?php the_time(); ?></span>
				
				<?php the_content(); ?>
			</article>
			
			<?php comments_template(); ?>
			</section>

	<?php get_sidebar(); ?>
<?php get_footer(); ?>
