<?php get_header(); ?>
				<section id="content">
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?> /* if have posts */

					<div class="post" id="post-<?php the_ID(); ?>">
	<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <em><?php the_title(); ?></em></h2>

	<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p> /* the medium size image */
        <div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div> /* the photo caption */

	<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

	<div class="navigation"> /* image navigation for the gallery */
		<div class="alignleft"><?php previous_image_link() ?></div>
		<div class="alignright"><?php next_image_link() ?></div>
	</div>
			
	<?php get_sidebar(); ?>
<?php get_footer(); ?>