<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
	echo'<script>function initMap(){}</script>';
	

	wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php
	somnium_advanced_css();
	$css = get_theme_mod('css');
	echo'<style type="text/css">'.$css.'</style>';
	
	?>
	<?php
if (! function_exists('pll__')){
		function pll__($TxtToTrn){
			return $TxtToTrn;	
		}
	}
?>
	
</head>
<?php
$bodybc = get_theme_mod('body-bc-img');
$bodybc = 'url('.$bodybc.')';
$mainSlider = get_theme_mod('slider-display',1);
echo'<body id="body" ';  body_class( ); echo' style="background-image:'.$bodybc.'">';

if(is_active_sidebar( 'header' )){
	if($mainSlider==1 && is_front_page()){
		echo'<div id="fixed-header" data-front-page-slider="true">';
	}else{
		echo'<div id="fixed-header" data-front-page-slider="false">';
	}
	echo'<div id="fixed-header-inner">';
	dynamic_sidebar( 'header' );
	echo'<div id="delimiter"></div>';
echo'</div></div>';
}else{
	$fix_hdr_title = get_bloginfo( 'name' );
	if($mainSlider==1 && is_front_page()){
		echo'<div id="fixed-header" data-front-page-slider="true">';
	}else{
		echo'<div id="fixed-header" data-front-page-slider="false">';
	}
		echo'<div id="fixed-header-inner">
			<div id="fixed-header-name">
				<a id="fixed-header-title" href="'.get_site_url().'">'.$fix_hdr_title.'</a>
			</div>';		
	echo'</div></div>';
}
echo'<div class="somnium-scroll-top">
<div class="somnium-sc-inner"></div>
</div>';
?>
