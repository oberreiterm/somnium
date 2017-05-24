<?php
/**
 * Template for all single posts.
*/

	get_header(); 
	while ( have_posts() ){
		the_post(); 
?>
<div class="clear"></div>

<div id="content" class="site-content">
<?php 		if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
			$pS = get_post_meta(get_the_ID(), 'p_style', true);
			if(sm_NullEmpty($pS)){$pS ='select-default';}
			$genPS = get_theme_mod('pStyle2','pageLike');
			if($pS=='select-page' || $pS == '' || $genPS=='pageLike' && $pS=='select-default'){
				echo'<style scoped>
						.bc-image-post {
							height: 200px;
						}
						.outer-container-title{
							height: 200px;
							padding-bottom: 5px;
						}
						.container-title{
							padding-bottom:0px;
						}
						.article-image-content{
							margin-top:0px;
						}
						.entry-title-cst{
							margin-bottom:10px;
						}
						</style>';	
				}
				?>
	<div class="bc-image-post" data-parallax="scroll" data-image-src="<?php 
	
	$tst = get_post_meta(get_the_ID(), 'bck_image', true);
		echo sm_getImage($tst,1920,1080);
		echo '"';
		echo '" style="background-image:url('.sm_getImage($tst,480,270).')"';

	?>" >
		<div class="outer-container-title container">
		<?php if(is_front_page()){echo '<div class="container-title front-padding">'; }else{echo'<div class="container-title ">';}?>
			
				<h1 class="entry-title-cst"><?php the_title(); ?></h1>
				<?php 
				$meta = get_post_meta(get_the_ID(), 'meta_info', true);
				if(sm_NullEmpty($meta  )){$meta ='select-default';}
				$genMeta = get_theme_mod('dMeta2','yes');
				if($meta=='select-yes' || $meta == '' || $genMeta=='yes' && $meta=='select-default' ){
				echo'<hr class="entry-hr">
				<div class="entry-meta">';
					sm_post_meta(false);
				echo'</div>';	
				}
				?>
			</div>
		</div>
	</div><?php
	
	$pS = get_post_meta(get_the_ID(), 'p_style', true);
	if(sm_NullEmpty($pS  )){$pS ='select-default';}
	$oLay = get_post_meta(get_the_ID(), 'overlay', true);
	if(sm_NullEmpty($oLay  )){$oLay ='select-default';}
	$genOLay = get_theme_mod('oLay2','yes');
	$genPS = get_theme_mod('pStyle2','pageLike');
	
		if($oLay=='select-yes' && $pS=='select-post' || $oLay=='select-default' && $genOLay == 'yes' && $pS=='select-post' || $oLay=='select-default' && $genOLay == 'yes' && $genPS=='postLike' && $pS=='select-default'){
			echo'<div class="post-overlay">
			<div class="post-overlay-top"></div>
			<div class="post-overlay-bottom"></div>
		</div>';
		}else if($oLay=='select-yes' && $pS=='select-page' || $oLay=='select-default' && $genOLay == 'yes' && $pS =='select-page' || $oLay =='select-default' && $genOLay == 'yes' && $genPS =='pageLike' && $pS=='select-default'){
			echo'<div class="post-overlay post-overlay-p-style">
			<div class="post-overlay-page"></div>
			</div>';
		}
		
	
	
		echo'<div class="container container_post container_image_post">';
			
		
	}
			$toIF = get_post_meta(get_the_ID(), 'content_width', true);
			if(sm_NullEmpty($toIF  )){$toIF ='select-sidebar';}
			$sidebar = get_theme_mod('page-sidebar-type', 'right' );
			
			if(($toIF =='select-sidebar' && $sidebar =='left' && !is_front_page()) || $toIF=='select-sidebar-l' && !is_front_page()){
				echo'<div class="sidebar-wrap sidebar-left-side col-md-3 content-left-wrap image-post-sidebar">';
				get_sidebar(); 
				echo'</div>';
			}
	while ( have_posts() ){
		the_post();
			$sidebarFront = get_theme_mod('sidebar-type','none');
			if( $toIF =='select-sidebar' && $sidebar != 'none' && !is_front_page() || $toIF =='select-sidebar-r' && !is_front_page() ||  $toIF =='select-sidebar-l' && !is_front_page() ){
				echo'<div class="content-left-wrap col-md-9 image-post-cont">';
			}else if($toIF =='select-sidebar' && $sidebar == 'none' || $toIF =='select-full-width' || is_front_page() && $sidebarFront == 'none'  ){
				echo'<div class="content-left-wrap col-md-12 image-post-cont">';
			}
		
		?>
		<div id="primary" class="content-area">
			<div id="main" class="site-main article-image-content" role="main">
				<?php
				$genDate = get_theme_mod('dDate2', 'yes');
				
				$Date = get_post_meta(get_the_ID(), 'date_show', true);
				if(sm_NullEmpty($Date )){$Date ='select-default';}
				if( $Date =='select-yes' || $Date == '' || $genDate =='yes' && $Date =='select-default' ){
					echo'<div class="date">
							<h2>'.get_the_date('j').'</h2>
							<p>'.get_the_date('M, Y').'</p>
						</div>';
				}else{echo'<style scoped>.article-image-content{padding-right:20px !important;}</style>';}
				
				$genInit = get_theme_mod('initial2','no');
				$init = get_post_meta(get_the_ID(), 'initial', true);
				if(sm_NullEmpty($init)){$init='select-default';}
				echo'<div id="post-'; the_ID(); echo'" '; if(($init=='select-default' && $genInit=='yes') || $init=='select-yes' ){post_class(array('initial','entry-content'));}else{post_class('entry-content');} echo'>';

						wpautop( the_content());
					?>
				</div>
				<div class="clearfix" style="width:100%"></div>
			</div>
			<?php
				if(!sm_NullEmpty(the_tags())){echo'<h4>'; the_tags(); echo'</h4>';}
				wp_link_pages(); 
				$postNav = get_post_meta(get_the_ID(), 'posts_unav', true);
				if(sm_NullEmpty($postNav )){$postNav ='select-default';}
				$genNav = get_theme_mod('pNav2','yes');
				
				if($postNav=='select-yes' || $genNav=='yes' && $postNav=='select-default' ){
					sm_prev_next_navigation('page');
				}				
				$authBox = get_post_meta(get_the_ID(), 'author_sel', true);
				if(sm_NullEmpty($authBox )){$authBox='select-default';}
				$genABox = get_theme_mod('ABoxs2','yes');
				
				if($authBox=='select-yes' || $genABox=='yes' && $authBox=='select-default' ){
					sm_author_box();
				}
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ){
					comments_template();
				}
	} // end of the loop. 
			?>
		</div>
		</div>
		<?php
			$toIF2 = get_post_meta(get_the_ID(), 'content_width', true);
			if(sm_NullEmpty($toIF2  )){$toIF2 ='select-sidebar';}
			$sidebar2 =get_theme_mod('page-sidebar-type','right');
			
			if($toIF2 =='select-sidebar' && $sidebar2 =='right' && !is_front_page() || $toIF2=='select-sidebar-r' && !is_front_page() ){
				
					echo'<div class="sidebar-wrap col-md-3 content-left-wrap image-post-sidebar">';
					get_sidebar(); 
					echo'</div>';
			}
				
		?>
		
	</div></div>
<?php if(!is_front_page()){get_footer(); }?> 