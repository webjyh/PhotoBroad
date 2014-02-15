<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>

	<div class="main clearfix">

		<div class="primary">

			<?php while ( have_posts() ) : the_post(); ?>

			<div class="post">
				
				<div class="post-header clearfix">
					<div class="post-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?></div>
					<div class="post-title">
						<h1>
							<span class="single-navigation clearfix">
								<div class="prev-single"><?php previous_post_link( '%link', '' ); ?></div>
								<div class="next-single"><?php next_post_link( '%link', '' ); ?></div>
							</span>
							<?php the_title(); ?>
						</h1>
						<p class="post-meta">
							<?php if(function_exists('the_views')) { ?>
							<span class="meta author"><?php _e( 'Hot', 'PhotoBroad' ); ?> (<?php echo the_views('Views', true);?>)</span>
							<?php } ?>
							<span class="meta date"><?php echo get_the_date(); ?></span>
							<span class="meta mess">
								<?php comments_popup_link( __('Comment (0)','PhotoBroad'), __('Comment (1)','PhotoBroad'), __('Comment (%)','PhotoBroad') ); ?>  
							</span>
							<span class="cat">Tag:&nbsp;
								<?php 
									$taglist = get_the_tag_list( '', ', ' );
									if ( $taglist ) {
										echo $taglist;
									} else {
										echo __( 'No Tags', 'PhotoBroad' );
									}
								?>
							</span>
						</p>
					</div>
				</div>
				<div class="post-content">
					
					<div class="archive-lists">
						
						<h4><?php _e('Last 30 Posts', 'PhotoBroad') ?></h4>
						<ul>
							<?php 
								$archive_30 = get_posts('numberposts=30');
								foreach($archive_30 as $post) : ?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
							<?php endforeach; ?>
						</ul>

						<h4><?php _e('Archives by Month:', 'PhotoBroad') ?></h4>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>

						<h4><?php _e('Archives by Subject:', 'PhotoBroad') ?></h4>
						<ul>
					 		<?php wp_list_categories( 'title_li=' ); ?>
						</ul>

					</div>

				</div>

			</div>
			
			<?php endwhile; ?>

		</div>

		<?php get_sidebar(); ?>

	</div>

 <?php get_footer(); ?>