<?php
/**
 * Template Name: Gallery
 */

get_header();

query_posts( 'post_type=gallery&posts_per_page=-1' );

while (have_posts()) : the_post(); 
?>
					
	<article class="gallery">
		<?php 
			$video = get_post_meta($post->ID, 'video', true);
			
			if ($video == "") {
				$thumbID = get_post_thumbnail_id($post->ID); ?>
         		<a href="<?php echo wp_get_attachment_url($thumbID); ?>" rel="gallery" title="<?php the_title(); ?>">  
					<div class="thumb">   
						<?php if ( has_post_thumbnail() ) : 
								the_post_thumbnail('gallery');
							else : ?>
								<img src="http://placehold.it/268x168">	
						<?php endif; ?>
					</div><!-- .thumb -->
				</a>
		<?php 	
			}
			else { ?>
         		<a href="<?php echo $video; ?>" rel="gallery" title="<?php the_title(); ?>">  
					<div class="thumb_video">   
                		<?php if ( has_post_thumbnail() ) : 
								the_post_thumbnail('gallery');
							else : ?>
								<img src="http://placehold.it/268x168">	
						<?php endif; ?>
					</div><!-- .thumb_video -->
				</a>
			<?php 
			} ?>			
	</article><!-- .gallery -->

<?php 
		endwhile;
	get_footer(); 
?>