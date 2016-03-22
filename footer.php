<?php 

$image = get_theme_mod('footer-background');
echo'<footer class="footer_class" style="background-image:url('.$image.');">	
<div class="footer_cont">
<div class="footer_widgets">
<div class="col-md-4">';

 dynamic_sidebar( 'footer-a' );?>
</div>	
<div class="col-md-4">
	
	<?php dynamic_sidebar( 'footer-b' );?>
</div>	
	<div class="col-md-4">
	
	<?php dynamic_sidebar( 'footer-c' );
	
	  ?>
</div>	
</div>
	<div class="under_f">
	<?php
	$theme = wp_get_theme();
	$credits= get_theme_mod('footer-theme-display',1);
	$copy = get_theme_mod('footer_copyright','Somnium');
	$copyY = get_theme_mod('footer_copyright_y');
	if(NullEmpty($copy)){$copy=$theme->get( 'Name' );}
		echo'<div class="copyright">'.$copy.' | © '; if(date('Y')== $copyY || ''== $copyY){echo date('Y');} else{echo $copyY.'–'.date('Y');} echo'<br>'; 
		if($credits==1){
			esc_html_e( 'Powered by','somnium');
			echo ' <a href="http://somnium.8u.cz/">'.$theme->get( 'Name' ) . '</a> v' . $theme->get( 'Version' );
		}
		echo'</div>';
	?>
	
	</div>
		
	</div>
</footer>
<?php wp_footer(); ?>
<script>

(function($) {
		
 var config = {
	
      complete: function(el) {
		 
		  
		  var atr = el.getAttribute("class");
		  
		  if(atr.indexOf('spinCont')>-1){spin_call($(el));}
		  
		//  alert("dddd");
		}	
      }

      window.sr = new scrollReveal( config );
    
})(jQuery);
    </script>

</body>
</html>
