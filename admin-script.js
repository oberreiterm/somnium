(function($) {
	var sl = jQuery(".icon-select option:selected" ).val();
	console.log(sl);

	jQuery(document).on('widget-updated', function(e, widget){
    console.log('sl');
    // "widget" represents jQuery object of the affected widget's DOM element
	});

	$(document).ready(function () {
		
		 jQuery('.gwp-input').fontselect();
				jQuery('.gwp-input').siblings('.button-primary').click(function(){
					location.reload();
		})
			
		
		
	});

var counterX = false;	

})( jQuery );

	var counterX = false;	
