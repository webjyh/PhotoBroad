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
					<?php 
						$file = get_post_meta( $post->ID, 'PhotoBroad_File', true );
						if ( !empty( $file ) ){
					?>
					<div class="audio clearfix">
						<div class="audio-image">
							<?php
								$audio_img = get_post_meta( $post->ID, "PhotoBroad_audio_upimg", true );
								if ( !empty( $audio_img ) ){
									$audioImage = get_bloginfo("template_url").'/timthumb.php?src='.$audio_img.'&q=100&w=150&h=150';
								}
							?>
							<a href="<?php echo $audio_img; ?>" title="<?php the_title(); ?>" class="phzoom"><img src="<?php echo $audioImage; ?>" /></a>
						</div>
						<div class="audio-content">
							<h3><?php the_title(); ?></h3>
							<p class="author">
								<strong><?php _e( 'Singer', 'PhotoBroad' ); ?>&nbsp;:&nbsp;</strong>
								<?php
									$audio_author = get_post_meta( $post->ID, "PhotoBroad_Author", true );
									if ( empty( $audio_author ) ){
										_e( 'Unknown' , 'PhotoBroad' );
									} else {
										echo $audio_author;
									}
									echo '<span>&nbsp;&nbsp;&nbsp;&nbsp;'.get_post_meta( $post->ID, "PhotoBroad_Level", true ).'</span>';
								?>
							</p>
							<p class="musicablum">
								<strong><?php _e( 'Music Album', 'PhotoBroad' ); ?>&nbsp;:&nbsp;</strong>
								<?php
									$audio_album = get_post_meta( $post->ID, "PhotoBroad_Album", true );
									if ( empty( $audio_album ) ){
										_e( 'Unknown' , 'PhotoBroad' );
									} else {
										echo $audio_album;
									}
								?>
							</p>
							<p class="music-player">
								<embed src="<?php bloginfo('template_url'); ?>/images/player.swf?url=<?php echo $file; ?>&amp;autoplay=0" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" width="265" height="25">
							</p>
						</div>
					</div>
					<?php } ?>
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">', 'after' => '</div>' ) ); ?>
				</div>