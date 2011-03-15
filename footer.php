<?php
/*
 * The template for displaying the footer.
 *
 * Contains the clearfix and closing of the content section and all content
 * after.
 */
?>

		<div class="clear"></div>
	</section><!-- #content -->

	<footer>
		<!-- Display the custom copyright text -->
		<?php 
			if(get_option('tc_copytext')) :
				echo get_option('tc_copytext');
			else :
		?>
 				&copy; <?php echo date('Y'); ?> <?php bloginfo('name');
			endif;

		wp_footer(); 
		?>	
			
	</footer><!-- footer -->
</div><!-- #page-wrap -->
</body>
</html>