<?php get_header(); ?>

	<div class="main clearfix">

		<div class="primary">

			<?php while ( have_posts() ) : the_post(); ?>

			<div class="post">
				<div class="post-header clearfix">
					<div class="post-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?></div>
					<div class="post-title">
						<h1><?php the_title(); ?></h1>
						<p class="post-meta">
							<?php if(function_exists('the_views')) { ?>
							<span class="meta author"><?php _e( 'Hot', 'PhotoBroad' ); ?> (<?php echo the_views('Views', true);?>)</span>
							<?php } ?>
							<span class="meta date"><?php echo get_the_date(); ?></span>
							<span class="meta mess">
								<?php comments_popup_link( __( 'Comment (0)', 'PhotoBroad'), __( 'Comment (1)', 'PhotoBroad' ), __( 'Comment (%)', 'PhotoBroad' ) ); ?>
							</span>
							<span class="cat">Tag:&nbsp;
								<?php 
									$taglist = get_the_tag_list( '', ', ' );
									if ( $taglist ) {
										echo $taglist;
									} else {
										echo __( 'No Tags' ,'PhotoBroad' );
									}
								?>
							</span>
						</p>
					</div>
				</div>
				<div class="post-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">', 'after' => '</div>' ) ); ?>
				</div>
			</div>

			<?php comments_template( '', true ); ?>
			
			<?php endwhile; ?>

		</div>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>