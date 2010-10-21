<aside>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
		<ul>		
			<li id="archives">
				<h2 class="widgettitle">Archives</h2>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta">
				<h2 class="widgettitle">Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; ?>
	</ul>
</aside>