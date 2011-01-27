<aside>
	<ul>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
		<li>
			<h3 class="widgettitle">Archives</h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
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