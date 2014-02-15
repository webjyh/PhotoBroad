<?php get_header(); ?>
	<div id="main" class="main clearfix">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php
				$format = get_post_format();
				if( false === $format ) { $format = 'standard'; }
			?>

			<?php get_template_part( 'content', $format ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<div class="no-result">
				<h1> <?php _e( 'No Results Found', 'PhotoBroad' ); ?></h1>
				<p><?php _e( 'The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.', 'PhotoBroad' ); ?></p>
			</div>

		<?php endif; ?>

	</div>
	<div class="navigation" id="navigation"><?php next_posts_link( '' ) ?></div>
	
<?php get_footer(); ?>