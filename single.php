<?php
$toCheck = get_post_meta(get_the_ID(), 'content_type', true);
if(NullEmpty($toCheck )){$toCheck='select-default';}
$genStyle = get_theme_mod('pMCStyle', 'select-modern');
if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 


if( $toCheck =='select-modern' ||  $toCheck =='' ||  $toCheck =='select-default' && $genStyle=='select-modern'){
/**
 * Template for all single posts.
*/
	get_header(); 
	while ( have_posts() ){
		the_post(); 
?>

<div class="clear"></div>

<div id="content" class="site-content">

	<?php
	$pS = get_post_meta(get_the_ID(), 'p_style', true);
	if(NullEmpty($pS )){$pS='select-default';}
	$genPS = get_theme_mod('pStyle','postLike');
	$tst = get_post_meta(get_the_ID(), 'bck_image', true); 
	
	if(($pS=='select-page' || $pS == '' || $genPS=='pageLike' && $pS=='select-default') || is_attachment() || NullEmpty($tst)){
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
	<div class="bc-image-post" data-parallax="scroll" data-image-src="
	<?php 
		$tst = get_post_meta(get_the_ID(), 'bck_image', true); 
		
		getImage($tst,1920,1080);
		echo '"';
		if(isset($tst)){ 
			echo' style="'.call_gradient_placeholder();
		}
	?>" >
		<div class="outer-container-title container">
			<div class="container-title ">
				<h1 class="entry-title-cst"><?php the_title(); ?></h1>
				<?php 
				$meta = get_post_meta(get_the_ID(), 'meta_info', true);
				if(NullEmpty($meta )){$meta='select-default';}
				$genMeta = get_theme_mod('dMeta','yes');
				
				if($meta=='select-yes' || $meta == '' || $genMeta=='yes' && $meta=='select-default' ){
				echo'<hr class="entry-hr">
				<div class="entry-meta">';
					post_meta();
				echo'</div>';	
				}
				?>
			</div>
		</div>
	</div>
	<?php
	$pS = get_post_meta(get_the_ID(), 'p_style', true);
	if(NullEmpty($pS )){$pS='select-default';}
	$oLay = get_post_meta(get_the_ID(), 'overlay', true);
	if(NullEmpty($oLay )){$oLay='select-default';}
	$genOLay = get_theme_mod('oLay','yes');
	$genPS = get_theme_mod('pStyle','postLike'); 
	$tst = get_post_meta(get_the_ID(), 'bck_image', true); 
	
		if((($oLay=='select-yes' && $pS=='select-post' || $oLay=='select-default' && $genOLay == 'yes' && $pS=='select-post' || $oLay=='select-default' && $genOLay == 'yes' && $genPS=='postLike' && $pS=='select-default') && !NullEmpty($tst)) && !is_attachment()){
			echo'<div class="post-overlay">
			<div class="post-overlay-top"></div>
			<div class="post-overlay-bottom"></div>
		</div>';
		}else if($oLay=='select-yes' && $pS=='select-page' || $oLay=='select-default' && $genOLay == 'yes' && $pS =='select-page' || $oLay =='select-default' && $genOLay == 'yes' && $genPS =='pageLike' && $pS=='select-default' ||  NullEmpty($tst) || is_attachment() ){
			echo'<div class="post-overlay post-overlay-p-style">
			<div class="post-overlay-page"></div>
			</div>';
		}
	?>
	<div class="container_post container_image_post container">
		<?php
	}
			$toIF = get_post_meta(get_the_ID(), 'content_width', true);
			if(NullEmpty($toIF )){$toIF='select-sidebar';}
			$sidebar = get_theme_mod('post-sidebar-type' ,'right');
			
			if($toIF =='select-sidebar' && $sidebar =='left' || $toIF=='select-sidebar-l'){
				echo'<div class="sidebar-wrap sidebar-left-side col-md-3 content-left-wrap image-post-sidebar">';
				get_sidebar(); 
				echo'</div>';
			}
	while ( have_posts() ){
		the_post(); 
			if( $toIF =='select-sidebar' && $sidebar != 'none' || $toIF =='select-sidebar-r' ||  $toIF =='select-sidebar-l' ){
				echo'<div class="content-left-wrap col-md-9 image-post-cont">';
			}else if($toIF =='select-sidebar' && $sidebar == 'none' || $toIF =='select-full-width'){
				echo'<div class="content-left-wrap col-md-12 image-post-cont">';
			}
		?>
		<div id="primary" class="content-area">
			<div id="main" class="site-main article-image-content" role="main">
				<?php
				$genDate = get_theme_mod('dDate','yes');
				
				$Date = get_post_meta(get_the_ID(), 'date_show', true);
				if(NullEmpty($Date )){$Date='select-default';}
				if( $Date =='select-yes' ||  $genDate =='yes' && $Date =='select-default' ){
					echo'<div class="date">
							<h2>'.get_the_date('j').'</h2>
							<p>'.get_the_date('M, Y').'</p>
						</div>';
				}else{
					echo'<style>.article-image-content{padding-right:20px !important;}</style>';
				}
				$genInit = get_theme_mod('initial','no');
				$init = get_post_meta(get_the_ID(), 'initial', true);
				if(NullEmpty($init)){$init='select-default';}
				echo'<div id="post-'; the_ID(); echo'" '; if($init=='select-default' && $genInit=='yes' || $init=='select-yes' ){post_class(array('initial','entry-content'));}else{post_class('entry-content');} echo'>';
					
						echo wpautop(the_content());
					
				echo'</div>
				<div class="clearfix" style="width:100%"></div>
			</div>';
				if(!NullEmpty(the_tags())){echo'<h4>'; the_tags(); echo'</h4>';}wp_link_pages();
				$postNav = get_post_meta(get_the_ID(), 'posts_unav', true);
				if(NullEmpty($postNav )){$postNav='select-default';}
				$genNav = get_theme_mod('pNav','yes');
				if($postNav=='select-yes' || $genNav=='yes' && $postNav=='select-default' ){
					prev_next_navigation('post');
				}
				
				$authBox = get_post_meta(get_the_ID(), 'author_sel', true);
				if(NullEmpty($authBox )){$authBox='select-default';}
				$genABox = get_theme_mod('ABoxs', 'yes');
				
				if($authBox=='select-yes' || $genABox=='yes' && $authBox=='select-default' ){
					author_box();
				}
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ){
					comments_template();
				}

			?>
		</div>
		</div>
		<?php
			$toIF2 = get_post_meta(get_the_ID(), 'content_width', true);
			if(NullEmpty($toIF2 )){$toIF2='select-sidebar';}
			$sidebar2 =get_theme_mod('post-sidebar-type', 'right');
			
			if($toIF2 =='select-sidebar' && $sidebar2 =='right' || $toIF2=='select-sidebar-r'){
				
					echo'<div class="sidebar-wrap col-md-3 content-left-wrap image-post-sidebar">';
					get_sidebar(); 
					echo'</div>'; 
			}
				
		?>
		
	</div>
	</div>
	
<?php
		} // end of the loop. 
		get_footer();

}else{

	get_header(); 
?>

<div class="clear"></div>

<div id="content" class="site-content">

	<div class="container_post container_image_post container">
		<?php
		
			$toIF = get_post_meta(get_the_ID(), 'content_width', true);
			if(NullEmpty($toIF )){$toIF='select-sidebar';}
			$sidebar = get_theme_mod('page-sidebar-type','right' );
			
			if($toIF =='select-sidebar' && $sidebar =='left' || $toIF=='select-sidebar-l'){
				echo'<div class="sidebar-wrap sidebar-left-side sidebar-classic col-md-3 content-left-wrap image-post-sidebar">';
				get_sidebar(); 
				echo'</div>';
			}
			
		?>
		<?php
		while ( have_posts() ){
			the_post(); 
			if( $toIF =='select-sidebar' && $sidebar != 'none' || $toIF =='select-sidebar-r' ||  $toIF =='select-sidebar-l' ){
				echo'<div class="content-left-wrap col-md-9 image-post-cont">';
			}else if($toIF =='select-sidebar' && $sidebar == 'none' || $toIF =='select-full-width'){
				echo'<div class="content-left-wrap col-md-12 image-post-cont">';
			}
		?>
		<div id="primary" class="content-area">
			<div id="main" class="site-main article-image-content article-classic" role="main">
				<header class="entry-header-classic">
					<h1 class="entry-title-cst title-classic"><?php the_title(); ?></h1>
					<?php 
					$meta = get_post_meta(get_the_ID(), 'meta_info', true);
					if(NullEmpty($meta )){$meta='select-default';}
					$genMeta = get_theme_mod('dMeta', 'yes');
					
					if($meta=='select-yes' || $meta == '' || $genMeta=='yes' && $meta=='select-default' ){
						echo'
						<div class="entry-meta">';
						post_meta();
						echo'</div>';	
					}
					?>
					<?php
						$genDate = get_theme_mod('dDate','yes');
						
						$Date = get_post_meta(get_the_ID(), 'date_show', true);
						if(NullEmpty($Date )){$Date='select-default';}
						if( $Date =='select-yes' || $Date == '' || $genDate =='yes' && $Date =='select-default' ){
							echo'<div class="date">
							<h2>'.get_the_date('j').'</h2>
							<p>'.get_the_date('M, Y').'</p>
							</div>';
						}else{echo'<style>.title-classic{margin-right:0px !important;}</style>';}
					?>
					
					<div class="entry-header-BCimage"><img alt="intro_image" class="lightbox wp-image-447 size-full aligncenter" src="<?php 
					$tst = get_post_meta(get_the_ID(), 'bck_image', true);
					getImage($tst,1280,500);
					
					?>"></div>
				</header>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php 
								echo wpautop(the_content());
							?>
				</div>
			</div>
		<?php	if(!NullEmpty(the_tags())){echo'<h4>'; the_tags(); echo'</h4>';}wp_link_pages();
				$postNav = get_post_meta(get_the_ID(), 'posts_unav', true);
				if(NullEmpty($postNav  )){$postNav ='select-default';}
				$genNav = get_theme_mod('pNav', 'yes');
				
				if($postNav=='select-yes' || $postNav == '' || $genNav=='yes' && $postNav=='select-default' ){
					prev_next_navigation('post');
				}	
				$authBox = get_post_meta(get_the_ID(), 'author_sel', true);
				if(NullEmpty($authBox  )){$authBox ='select-default';}
				$genOBox = get_theme_mod('pNav','yes');
				
				if($authBox=='select-yes'|| $genOBox=='yes' && $authBox=='select-default' ){
					author_box();
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
			if(NullEmpty($toIF2  )){$toIF2 ='select-sidebar';}
			$sidebar2 =get_theme_mod('page-sidebar-type','right');
			
			if($toIF2 =='select-sidebar' && $sidebar2 =='right' || $toIF2=='select-sidebar-r'){
				
					echo'<div class="sidebar-wrap sidebar-classic col-md-3 content-left-wrap image-post-sidebar">';
					get_sidebar(); 
					echo'</div>';
			}
		?>
</div>
</div>
<?php get_footer(); 
}
?>
