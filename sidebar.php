<aside>
	<ul>
		<li>
			<ul id="social">
				<li>
					<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/rss.png"></a>
					<a href="http://www.facebook.com/<?php echo get_option('tc_facebook_name'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.png"></a>
					<a href="http://www.twitter.com/<?php echo get_option('tc_twitter_name'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.png"></a>
				</li>
			</ul>
		</li>

<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
		<li>
			<h3 class="widgettitle">Archives</h3>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</li>
			
		<li>			
			<h3 class="widgettitle">Meta</h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</li>
		<?php endif; ?>
	</ul>
</aside>
	<div class="clear"></div>
</section>