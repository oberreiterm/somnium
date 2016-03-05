<?php


if (function_exists('pll_the_languages')){
	echo '<div class="lang_sw"><ul>';
	pll_the_languages(array('show_flags'=>1,'show_names'=>0, 'hide_current'=>1));
	echo'</ul></div>';
	echo'<div class="hide_but butt"><img alt="arrow-right" src="'.get_template_directory_uri().'/images/left-arrow-right-hi.png"></div>
	<div class="show_but butt"><img alt="arrow-left" src="'.get_template_directory_uri().'/images/left-arrow-right-hi.png"></div>';
}

$slider_display2=get_theme_mod('slider-display',1);



if($slider_display2 == 1){
	echo'<section class="slider-custom" id="slider-custom" >
		<div class="button-hoSec button-hoSecNext">
			<div class="cst-next cst-button"></div>
		</div>
		<div class="button-hoSec button-hoSecPrev">
			<div class="cst-prev cst-button"></div>
		</div>
		<div class="cst-container" id="cst-container">';
		


	if(is_active_sidebar( 'sidebar-slider' )){
		dynamic_sidebar( 'sidebar-slider' );
	}else{
		echo'<div class="cst-sl" style="background-image:url('.get_template_directory_uri().'/images/somnium_1920.jpg)">
				<h1 style="color:white" class="slider-title">Welcome!</h1>
				<h3 style="color:white"  class="slider-descr">Somnium</h3>
				<div class="buttons">
					<a href="'.get_site_url().'/wp-admin/customize.php" class=" custom-button" style="color:white; border-color:white">Explore</a>
				</div>
			</div>
			<div class="cst-sl" style="background-image:url('.get_template_directory_uri().'/images/somnium_1920.jpg)">
				<h1 style="color:white" class="slider-title">Customize</h1>
				<h3 style="color:white"  class="slider-descr">Go to Theme Customizer and Edit This Slider</h3>
				<div class="buttons">
					<a href="'.get_site_url().'/wp-admin/customize.php" class=" custom-button" style="color:white; border-color:white">Go to Customizer</a>
				</div>
			</div>';	
	}
		


	echo '</div><div class="clear"></div></section>';
} 