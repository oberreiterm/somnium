<?php
	function call_gradient_placeholder(){
	    $thiss = 'background: linear-gradient(to left top, rgb(194, 194, 194), rgb(242, 242, 242));';
		return $thiss;
	}	
	function field_excerpt($id, $text, $words, $more='...') {
		global $post;
		if(''==$words){$words=20;}
		if ( '' != $text ) {
			//$text = strip_shortcodes( $text );
			$text = apply_filters('the_content', $text);
			$excerpt_length = $words;
			$text = wp_trim_words( $text, $words, $more);
			if(!strpos($text,$more)){
				$text=$text.$more; 
			}
		}
		apply_filters('the_excerpt', $text);
		$tags = array("<p>", "</p>");
		$text = str_replace($tags, "", $text);
		return $text;
	}
	
	function custom_excerpt_length( $length ) {
	return 100;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	
	add_filter('pre_get_posts', 'mytheme_blogpostcount_filter');
	// Set the posts per page on the home page
	function mytheme_blogpostcount_filter($query) {
		$Ppages = get_theme_mod('query_posts',10);
		if ( $query->is_search() && $query->is_main_query() ) {
			$query->set('posts_per_page', $Ppages);
		}
		if ( $query->is_archive() && $query->is_main_query() ) {
			$query->set('posts_per_page', $Ppages);
		}
		if ( $query->is_category() && $query->is_main_query() ) {
			$query->set('posts_per_page', $Ppages);
		}
		return $query;
	}
	

function somnium_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'somnium' ),
		'next_text' => __( 'Next &rarr;', 'somnium' ),
	) );

	if ( $links ){

	?>
	<nav class="navigation paging-navigation" >
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'somnium' ); ?></h2>
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div>
	</nav>
	<?php
	}
}


	function theme_setup(){
		// Various sizes of thumbnails
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post-thumbnaiXX', 1920, 1080, true);
		add_image_size( 'post-thumbnaiXXX', 1920, 300, true);
		add_image_size( 'post-thumbnaiX', 1280, 500, true);
		add_image_size( 'post-thumbnail2', 960, 400, true);
		add_image_size('post-thumbnail', 432, 360, true);
		add_image_size('post-thumbnail3', 300, 300, true);
		add_image_size('post-thumbnail4', 255, 300, true);
		add_image_size('post-thumbnail5', 900, 300, true);
		add_image_size('post-thumbnail8', 310, 270, true);
		add_image_size('post-thumbnail6', 253, 253, true);
		add_image_size('post-thumbnail7', 60, 60, true);
		// Use of HTML5
		add_theme_support('html5', array( 'comment-list','search-form','comment-form','gallery',));
		// Loading languages in .mo format
		load_theme_textdomain('somnium', get_template_directory() . '/languages/');
	}
	add_action('after_setup_theme', 'theme_setup');

	// Replaces the excerpt "more" text by a link
	function new_excerpt_more($more) {
		global $post;
		return '<a class="moretag" href="'. get_permalink(get_the_ID()) . '">... '.__('[More]','somnium').'</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	
	//Custom fields for content page
	function getCustomField($theField) {
		global $post;
		$block = get_post_meta($post->ID, $theField);
		if($block){
			foreach(($block) as $blocks) {
				echo $blocks;
			}
		}
	}
	
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	// Enqueueing stylesheets and scripts
	function somnium_scripts(){
		wp_enqueue_style( 'font-awesome',   get_template_directory_uri(). '/fonts/font-awesome.css' );
		wp_enqueue_style( 'libs-style',   get_template_directory_uri(). '/css/libs.min.css' );
		
	
		
		wp_enqueue_script( 'main-script',  get_template_directory_uri(). '/js/script.min.js', array('jquery'), false, true  );
		
		wp_enqueue_script( 'libs-script',  get_template_directory_uri(). '/js/libs.min.js',  array('jquery') );
		
		

	
	}
	add_action('wp_enqueue_scripts', 'somnium_scripts');

	function somnium_admin_scripts(){
		
		
		wp_enqueue_script( 'admin-script',  get_template_directory_uri(). '/admin-script.js', array('jquery'));
	
		wp_enqueue_style( 'admin-style',   get_template_directory_uri(). '/admin-styles.css' );
		
	
	}
	add_action('admin_enqueue_scripts', 'somnium_admin_scripts');	
	
	// Loading various parts of theme
	require_once dirname( __FILE__ ) . '/tgm-init.php';
	require( get_template_directory() . '/color_picker/codestar-wp-color-picker.php' );
	require( get_template_directory() . '/color_picker/widget-image-field.php' );
	require get_template_directory() . '/inc/customizer.php';
	require get_template_directory() . '/admin-functions.php';
	
	 $uri        = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : NULL;
     $file       = basename( parse_url( $uri, PHP_URL_PATH ) );

    if ( $uri && in_array( $file, array( 'widgets.php' ) ) && is_admin() ) {
		 hook_pickers();
	}
	if ( $uri && in_array( $file, array( 'customize.php' ) ) && is_admin() ) {
		 hook_pickers();
	}
	
	function somnium_widgets_init() {
	// Registering sidebars, widget areas
	
	register_sidebar(array(

			'name' => __('Section Editor','somnium'),

			'id' => 'sidebar-section',

			'before_widget' => '',

			'after_widget' => '',
		));
		
	$sidN = get_theme_mod('sidebarN',0);
	$sidN = intval($sidN-1); 
	for($i=0;$i<$sidN; $i++){
		$iR = $i + 2;
		$nameS = sprintf(__('Section Editor n. %d','somnium'),$iR);
		register_sidebar(array(

			'name' => $nameS,

			'id' => 'sidebar-section-'.$iR,

			'before_widget' => '',

			'after_widget' => '',
		));
	}
	register_sidebar(array(

        'name' => __('Sidebar','somnium'),

        'id' => 'sidebar-right',

        'before_widget' => '',

        'after_widget' => ''

        

    ));
	
	
	 register_sidebar(array(

        'name' => __('Slider Editor','somnium'),

        'id' => 'sidebar-slider',

        'before_widget' => '',

        'after_widget' => ''

        

    ));

	register_sidebar(array(

        'name' => __('Footer n.1','somnium'),

        'id' => 'footer-a',

        'before_widget' => '',

        'after_widget' => ''

        

    ));

	register_sidebar(array(

        'name' => __('Footer n.2','somnium'),

        'id' => 'footer-b',

        'before_widget' => '',

        'after_widget' => ''

        

    ));

	register_sidebar(array(

        'name' => __('Footer n.3','somnium'),

        'id' => 'footer-c',

        'before_widget' => '',

        'after_widget' => ''

       
    ));
	
	register_sidebar(array(

        'name' => __('Header','somnium'),

        'id' => 'header',

        'before_widget' => '',

        'after_widget' => ''

       
    ));

	}
	add_action( 'widgets_init', 'somnium_widgets_init' );
	
	

