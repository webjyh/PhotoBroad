<?php get_header(); ?>

	<?php if (have_posts()) : ?>
	<!--
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h1 class="page-title"><?php printf(__('All posts in &ldquo;%s&rdquo;', 'PhotoBroad'), single_cat_title('',false)); ?></h1>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h1 class="page-title"><?php printf(__('All posts tagged &ldquo;%s&rdquo;', 'PhotoBroad'), single_tag_title('',false)); ?></h1>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h1 class="page-title"><?php _e('Archive for ', 'PhotoBroad') ?> <?php the_time('F jS, Y'); ?></h1>
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1 class="page-title"><?php _e('Archive for ', 'PhotoBroad') ?> <?php the_time('F, Y'); ?></h1>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1 class="page-title"><?php _e('Archive for', 'PhotoBroad') ?> <?php the_time('Y'); ?></h1>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h1 class="page-title"><?php _e('All posts by ', 'PhotoBroad') ?> <?php echo $curauth->display_name; ?></h1>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1 class="page-title"><?php _e('Blog Archives', 'PhotoBroad') ?></h1>
	<?php } ?>
	-->
		<div id="main" class="main clearfix">

		<?php while (have_posts()) : the_post(); ?>

			<?php
				$format = get_post_format();
				if( false === $format ) { $format = 'standard'; }
			?>

			<?php get_template_part( 'content', $format ); ?>

			<?php endwhile; ?>

		</div>

	<?php else : ?>

			<div class="no-result">
				<h1> <?php _e( 'No Results Found', 'PhotoBroad' ); ?></h1>
				<p><?php _e( 'The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.', 'PhotoBroad' ); ?></p>
			</div>

	<?php endif; ?>

	<div class="navigation" id="navigation"><?php next_posts_link( '' ) ?></div>
	
<?php get_footer(); ?>