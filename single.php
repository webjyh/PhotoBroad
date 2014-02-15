<?php get_header(); ?>

	<div class="main clearfix">

		<div class="primary" style="<?php echo get_main_layout( 'primary' ); ?>">

			<?php while ( have_posts() ) : the_post(); ?>

			<div class="post">
				
				<?php
					$format = get_post_format();
					if( false === $format ) { $format = 'standard'; }
				?>

				<?php get_template_part( 'single', $format ); ?>

			</div>

			<?php comments_template( '', true ); ?>
			
			<?php endwhile; ?>

		</div>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>