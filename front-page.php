<?php get_header(); 


$sidebar = get_theme_mod('sidebar-type','none');
$sidN = get_theme_mod('sidebarN',0);

if($sidebar == 'none'){
	echo'<div id="content" class="site-content front_p site-front">';
			$my_slider = get_theme_mod('my_slider',1);
			if($my_slider == 1 ):
				include get_template_directory() . "/parts/slider.php";
			endif;
			if ( 'posts' == get_option('show_on_front') ) {
				if(is_active_sidebar( 'sidebar-section' )){
					dynamic_sidebar( 'sidebar-section' );
					$sidN = intval($sidN);
					for($i=0;$i<$sidN; $i++){
						$iR = $i + 2;
						dynamic_sidebar( 'sidebar-section-'.$iR );
					}
				}else{
					the_widget('sc_wid');
					the_widget('postX');
					the_widget('sc_end');
					the_widget('callToAc_wid');
				}			
			}else if ( 'page' == get_option('show_on_front') ) {
				get_template_part( 'page' ); 
			}
		get_footer(); 
}else if($sidebar == 'right'){
	$my_slider = get_theme_mod('my_slider',1);
	if($my_slider == 1 ):
		include get_template_directory() . "/parts/slider.php";
	endif;
	echo'<div id="content-sidebar" class="content-sidebar front_p">';
		echo'<div class="content-container col-md-9">';
		if ( 'posts' == get_option('show_on_front') ) {
			dynamic_sidebar( 'sidebar-section' );
			$sidN = intval($sidN);
			for($i=0;$i<$sidN; $i++){
				$iR = $i + 2;
				dynamic_sidebar( 'sidebar-section-'.$iR );
			}
		}else if ( 'page' == get_option('show_on_front') ) {
				get_template_part( 'page' ); 
		}
		echo'</div>';
		echo'<div class="sidebar-container col-md-3">';
			get_sidebar();
	echo'</div>';
		echo'<div class="clearer"></div>';
	get_footer(); 
}else if($sidebar == 'left'){
	$my_slider = get_theme_mod('my_slider',1);
	if($my_slider == 1 ):
		include get_template_directory() . "/parts/slider.php";
	endif;
	echo'<div id="content-sidebar" class="sidebar-l front_p content-sidebar">';
		echo'<div class="sidebar-container col-md-3">';
			get_sidebar();
		echo'</div>';
		echo'<div class="content-container col-md-9">';
		if ( 'posts' == get_option('show_on_front') ) {
			dynamic_sidebar( 'sidebar-section' );
			$sidN = intval($sidN);
			for($i=0;$i<$sidN; $i++){
				$iR = $i + 2;
				dynamic_sidebar( 'sidebar-section-'.$iR );
			}
		}else if ( 'page' == get_option('show_on_front') ) {
				get_template_part( 'page' ); 
		}
		echo'</div>';
		echo'<div class="clearer"></div>';
	get_footer(); 		
}

	
	
?>
