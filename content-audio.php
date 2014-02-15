	<div class="enpty-home">
	<?php 
		$img = get_the_post_thumbnail( $post->ID, 'thumbnail' );
		if ( empty( $img ) ){ 
			$audio_img = get_post_meta( $post->ID, "PhotoBroad_audio_upimg", true );
			if ( empty( $audio_img ) ){
				$imgResult = get_post_thumb();
				if ( !empty( $imgResult ) ) {
					$strlen = get_text_length( 'image' );
	?>
					<div class="pic">
						<a href="<?php the_permalink(); ?>">

							<?php 
								echo $imgResult; 
								$format = get_post_format();
								if( false === $format ) { $format = 'standard'; }
							?>
							<span class="<?php echo $format; ?>"></span>
						</a>
					</div>
	<?php
				} else {
					$strlen = get_text_length( 'text' );
	?>
					<h2 class="enpty-home-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php
				}
			} else {
				$strlen = get_text_length( 'image' );
	?>
				<div class="pic">
					<a href="<?php the_permalink(); ?>">
						<?php 
							echo '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$audio_img.'&amp;q=100&amp;w=210" alt="" />';
							$format = get_post_format();
							if( false === $format ) { $format = 'standard'; }
						?>
						<span class="<?php echo $format; ?>"></span>
					</a>
				</div>
	<?php
			}
		} else {
			$strlen = get_text_length( 'image' );
	?>
			<div class="pic">
				<a href="<?php the_permalink(); ?>">
					<?php 
						echo $img; 
						$format = get_post_format();
						if( false === $format ) { $format = 'standard'; }
					?>
					<span class="<?php echo $format; ?>"></span>
				</a>
			</div>
	<?php
		}
	?>
		<div class="text"><p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, $strlen,"&nbsp;[...]");?></p></div>
		<div class="info">
			<?php if(function_exists('the_views')) { ?>
			<div class="itm hot"><a href="<?php the_permalink(); ?>"><?php _e('Hot','PhotoBroad'); ?> (<?php echo the_views('Views', true);?>)</a></div>
			<?php } ?>
			<div class="itm mess"><?php comments_popup_link( __( 'Comment', 'PhotoBroad' ).'( 0 )', __( 'Comment', 'PhotoBroad' ).'( 1 )', __( 'Comment', 'PhotoBroad' ).'( % )'); ?></div>
			<div class="itm date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></div>
			<a href="<?php the_permalink(); ?>" class="audio icon"><?php _e( 'Read More', 'PhotoBroad' ); ?></a>
		</div>
	</div>
