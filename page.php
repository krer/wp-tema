<?php get_header(); ?>
				<section id="content">
					<?php the_post(); ?>
					<article id="full_page">
						<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<?php edit_post_link('Edit this page...', '<strong>', '</strong>'); ?>
					</article>
				</section>
<?php get_footer(); ?>