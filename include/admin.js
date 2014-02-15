jQuery(document).ready(function($){ 

    // Initial load Page Switcher
    var hash = window.location.hash;
    if(hash != ''){
		$('#page-' + hash.replace(/#/, '')).show();
        $('#PhotoBroad-framework .nav li a[href="'+ hash +'"]').addClass('active');
	} else {
        $('#PhotoBroad-framework .page:first').show();
        $('#PhotoBroad-framework .nav li a:first').addClass('active');
    }
    
    // Page Switcher
    $('#PhotoBroad-framework .nav li a').bind('click', function(){
        $('#PhotoBroad-framework .page').hide();
        var loc = $(this).attr('href');
        $('#page-' + loc.replace(/#/, '')).show();
        $('#PhotoBroad-framework .nav li a').removeClass('active');
        $(this).addClass('active');
    });
    
    // AJAX Save
    $('#PhotoBroad-framework form').submit(function(){
        var form = $(this);
        form.trigger('PhotoBroad-before-save');
        var button = $('#PhotoBroad-framework #save-button');
        var buttonVal = button.val();
        button.val('Saving...');
		$.post(form.attr("action"), form.serialize(), function(data){
            button.val(buttonVal);
			//$('#PhotoBroad-framework-messages').html(data.message);
			if(data.error){
				$.jGrowl(data.message, { header:'Error' });
			} else {
				$.jGrowl(data.message);
			}
            form.trigger('PhotoBroad-saved');
		}, 'json');
		return false;
    });
    
    // Reset Button
    $('#PhotoBroad-framework #reset-button').live('click', function(){
    	if(confirm('Click to reset. Any settings will be lost!')){
    		$(this).val('Reseting...');
	    	$.post(ajaxurl, { action:'PhotoBroad_framework_reset', nonce:$('#PhotoBroad_noncename').val() }, function(data){
				if(data.error){
					$.jGrowl(data.message, { header:'Error' });
				} else {
					window.location.reload(true);
				}
			}, 'json');
		}
		return false;
    });
    
    // Custom Layout Switcher
    $('#PhotoBroad-framework .main-layout br').remove();
    $('#PhotoBroad-framework .main-layout input[type="radio"]').each(function(){
    	var label = $(this).parent();
    	label.addClass($(this).val());
    	if($(this).is(':checked')) label.addClass('checked');
    });
    $('#PhotoBroad-framework .main-layout label').live('click', function(){
    	$('#PhotoBroad-framework .main-layout label').removeClass('checked');
    	$('#PhotoBroad-framework .main-layout input[type="radio"]').attr('checked', false);
    	var id = $(this).attr('for');
    	$(this).addClass('checked');
    	$('#PhotoBroad-framework .main-layout #'+ id).attr('checked', true);
    });
    
});