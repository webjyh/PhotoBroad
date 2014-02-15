	<div class="footer">
		<p>Copyright &copy; <?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ); ?>"><?php echo esc_attr( get_bloginfo( 'name') ); ?></a> All Rights Reserved </p>
		<p>Powered by <a href="http://wordpress.org/" target="_blank">WordPress <?php bloginfo('version');?></a> | Author by  <a target="_blank" href="http://webjyh.com">M.J</a></p>
		<?php
		$PhotoBroad_values = get_option('PhotoBroad_framework_values');
		if ( !is_array( $PhotoBroad_values ) ) $PhotoBroad_values = array();
		if( array_key_exists( 'general_tracking_code' , $PhotoBroad_values) && !empty( $PhotoBroad_values['general_tracking_code'] ) ){
		echo '<p>'.stripslashes( $PhotoBroad_values['general_tracking_code'] ).'</p>'."\n";
		}
		?>
	</div>
	<div class="goTop" id="goTop"><a href="javascript:;"></a></div>
	<?php 
		$bg = get_background_image();
		if ( !empty( $bg ) ){
	?>
	<div class="body-bg"></div>
	<?php 
		} 
	?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
	<?php if (is_singular()) { ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
	<?php } ?>
	<?php wp_footer(); ?>
</body>
</html>