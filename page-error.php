<?php 
/**
 * The template for displaying error pages.
 */
?>

<section id="posts">
		<article class="blogpost">
		<?php if (is_search()): ?>
				<h3>Search Results</h3>
					<p>Your search - <strong><?PHP echo $_GET[s]; ?></strong> - did not match any documents. </p>
					Suggestions:
					<ul>
						<li>Make sure all words are spelled correctly.</li>
						<li>Try different keywords.</li>
						<li>Try more general keywords.</li>
						<li>Try fewer keywords.</li>
					</ul>
		<?php  else: ?>
			<h3>We couldn't to find what your looking for</h3>
			<p>The page you've requested can not be displayed. It appears you've missed your intended destination, either through a bad or outdated link, or a typo in the page you were hoping to reach.</p>
		<?php endif; ?>
		</article><!-- .blogpost -->
</section><!-- #posts -->