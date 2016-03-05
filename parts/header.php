<?php
		
$fix_hdr_settings = get_theme_mod( 'fixed-header-menu-logo');


if (!filter_var($fix_hdr_settings, FILTER_VALIDATE_URL) === false) {
	$fix_hdr_title= '<img src="' . esc_attr( $fix_hdr_settings ) . '" alt="' . esc_attr( get_bloginfo( 'description' ) ) . '" />';
}else{
	$fix_hdr_title = get_bloginfo( 'name' );
}





echo'<div id="fixed-header">
	<div id="fixed-header-inner">
		<div id="fixed-header-name">
			<a id="fixed-header-title" href="'.get_site_url().'">'.$fix_hdr_title.'</a>
		</div>';		

echo'<div id="fixed-header-menu-image-div"><img  id="fixed-header-menu-image-image" src="'.get_template_directory_uri().'/images/menu-alt.png"></div>';

$menu_sel = get_theme_mod( 'fixed-header-menu-selection');		
$lang = get_bloginfo('language');
$lang = mb_substr($lang, 0, 2);
$lang = $menu_sel .'_'. $lang;

$menu_args = array(
				'menu'			=> $lang,
				'depth'			=> 1,
				'menu_id'		=> 'fixed-header-menu',
				'container'		=> '',
				'fallback_cb'	=> '',
				'menu_class' => 'active',
			);
wp_nav_menu( $menu_args );

echo'</div></div>';