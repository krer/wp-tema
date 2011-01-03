<aside>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
		<h3 class="widgettitle">Archives</h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>
						
				<h3 class="widgettitle">Meta</h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
		<?php endif; ?>
</aside>
	<div class="clear"></div>
</section>