<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<section id="fullContent">
    <?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>

        <?php $my_query = new WP_Query('category_name=Portfolio'); ?>
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

        <article class="portfolio_col">
				<?php if ( has_post_thumbnail() ) { ?>
						<div class="image-box"><?php the_post_thumbnail(array(265, 265)); ?></div>
				<?php } ?>
							
					<h2><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>	
							<?php the_content(); ?>
		</article>
       <?php endwhile; ?>
</section>

<?php get_footer(); ?>
