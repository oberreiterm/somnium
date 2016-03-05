<?php get_header(); 

$my_slider = get_theme_mod('my_slider',1);
if($my_slider == 1 ):
	include get_template_directory() . "/parts/slider.php";
endif;
	


$sidebar = get_theme_mod('sidebar-type','none');
$sidN = get_theme_mod('sidebarN',0);

if($sidebar == 'none'){
	echo'<div id="content" class="site-content">';
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
	get_footer(); 
}else if($sidebar == 'right'){
	echo'<div id="content-sidebar" class="content-sidebar">';
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
	echo'</div>';
	get_footer(); 
}else if($sidebar == 'left'){
	echo'<div id="content-sidebar" class="sidebar-l content-sidebar">';
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
	echo'</div>';
	get_footer(); 
}
	
	
	
?>