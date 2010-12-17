<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<section id="content">
	<?php $query = new WP_Query('category_name=Portfolio'); ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>

        <article class="portfolio_col">
				<?php if ( has_post_thumbnail() ) { ?>
						<div class="image-box"><?php the_post_thumbnail(array(272, 272)); ?></div>
				<?php } ?>
							
					<h2><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>	
							<?php the_content(); ?>
		</article>
       <?php endwhile; ?>
          <div class="clear"></div>
</section>

<?php get_footer(); ?>
