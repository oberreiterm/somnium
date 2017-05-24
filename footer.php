<?php
	$image = get_theme_mod('footer-background');
	echo'<div class="footer_class fp-auto-height section" style="background-image:url('.$image.');">	
	<div class="footer_cont">
	<div class="footer_widgets">
	<div class="col-md-4">';

	 dynamic_sidebar( 'footer-a' );
	echo'</div>	
	<div class="col-md-4">';
		
	dynamic_sidebar( 'footer-b' );
	echo'</div>	
		<div class="col-md-4">';
		
	dynamic_sidebar( 'footer-c' );	
	echo'
	</div>	
	</div>
		<div class="under_f">';
		$theme = wp_get_theme();
		$credits= get_theme_mod('footer-theme-display',1);
		$copy = get_theme_mod('footer_copyright','Somnium');
		$copyY = get_theme_mod('footer_copyright_y');
		if(sm_NullEmpty($copy)){$copy=$theme->get( 'Name' );}
			echo'<div class="copyright">'.$copy.' | © '; if(date('Y')== $copyY || ''== $copyY){echo date('Y');} else{echo $copyY.'–'.date('Y');} echo'<br>'; 
			if($credits==1){
				esc_html_e( 'Powered by','somnium');
				echo ' <a href="http://somnium.8u.cz/">'.$theme->get( 'Name' ) . '</a> ' . $theme->get( 'Version' );
			}
			echo'</div>';
		
		echo'
		</div>	
		</div>
	</div>';
			
	
if(is_front_page()){
	echo'</div>';
}

 wp_footer(); ?>
 
 
<div class="FPcont FPstop">
	<i class="FPcont-inner fa fa-stop" aria-hidden="true"></i>
</div>
<div class="FPcont FPplay">
	<i class="FPcont-inner fa fa-play" aria-hidden="true"></i>
</div>
 
 
<script>

(function($) {
var rs = false
if(customizer.pr_enable && customizer.pr_anim_reset && customizer.pr_autoplay){
	rs=true;
} 

 var config = {
		reset:    rs,
		complete: function(el) {
			var atr = el.getAttribute("class");
			if(atr.indexOf('spinCont')>-1){spin_call($(el));}
		}	
      }
      window.sr = new scrollReveal( config );
})(jQuery);
    </script>

</body>
</html>