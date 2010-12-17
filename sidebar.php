<aside>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
		
		<ul>
			<li>
				<h2 class="widgettitle">Recent posts</h2>
				<ul>
					<?php 
						query_posts($query_string . '&cat=-6');
						$recent_posts = wp_get_recent_posts(); 
					
					  foreach($recent_posts as $post){
        				echo '<li><a href="' . get_permalink($post["ID"]) . '" title="Look '.$post["post_title"].'" >' .   $post["post_title"].'</a> </li> ';
      				  }
					?> 
				</ul>
			</li>
					
			<li>
				<h2 class="widgettitle">Archives</h2>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li>
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
<div class="clear"></div>
</section>