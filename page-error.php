<?php 
/**
 * The template for displaying error pages
 */
?>

<section id="posts">
		<article class="blogpost">
		<?php if (is_search()): ?>
				<h3>Search Results</h3>
					<p>Your search - <strong><?PHP echo $_GET[s]; ?></strong> - did not match any documents. </p>
		<?php  else: ?>
			<h3>We couldn't to find what you're looking for</h3>
			<p>The page you've requested can not be displayed.</p>
		<?php endif; ?>
		</article><!-- .blogpost -->
</section><!-- #posts -->