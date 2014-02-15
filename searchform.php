<form method="get" action="<?php echo home_url(); ?>/">
	<input type="text" onblur="if(this.value==''){this.value='<?php _e( 'search', 'PhotoBroad' ); ?>';}" onfocus="if(this.value=='<?php _e( 'search', 'PhotoBroad' ); ?>'){this.value='';}" name="s" value="">
</form>