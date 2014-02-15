<?php if ( is_active_sidebar( 'sidebar-wrap' ) ) : ?>
<div class="sidebar" style="<?php echo get_main_layout( 'sidebar' ); ?>">
	<div id="sidebar-inner">
		<?php dynamic_sidebar( 'sidebar-wrap' ); ?>
	</div>
</div>
<?php endif; ?>