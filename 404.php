<?php get_header(); ?>

<div class="clear"></div>

	
		<div class="bc-container-post" data-parallax="scroll" data-image-src="<?php 
		$tstC = get_theme_mod('404-bc',get_template_directory_uri ().'/images/somnium_1920.jpg');
		echo $tstC;
		echo '"';
		if(isset($tstC)){ 
			echo' style="'.sm_call_gradient_placeholder();
		}
		?>" >
	
		<div class="top-outer-container-title container">
		<?php echo'<div class="top-container-title-x ">';?>
			<h2 class="top-container-title">
				<?php _e(  'Oops! That page can&rsquo;t be found.','somnium'); ?>
				</h2>
			</div>
		</div>
	</div>
	
	
	<div id="content" class="site-content">

<div class="container">
<?php
	$sidebarL =get_theme_mod('cats-sidebar-type','right');
	
	if($sidebarL =='left'){		
		echo'<div class="sidebar-wrap sidebar-left-side col-md-3 content-left-wrap image-post-sidebar">';
		get_sidebar(); 
		echo'</div>';
	}			


if($sidebarL !=='none'){		
	echo'<div class="content-left-wrap loop-page col-md-9">';
}else{
	echo'<div class="content-left-wrap loop-page col-md-12">';
}

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<article>
			<header class="entry-header-error">
			<div class="frown entry-title-error"><i class="fa fa-frown-o"></i></div>
				<h2><?php _e(  'It looks like nothing was found at this location. Maybe try a search?','somnium'); ?></h2>
			
			</header>
		</article>
		</main>
	</div>
	
	</div>
<?php

	if($sidebarL =='right' || $sidebarL ==''){		
		echo'<div class="sidebar-wrap col-md-3 content-left-wrap image-post-sidebar">';
		get_sidebar(); 
		echo'</div>';
	}			
?>

</div></div>

<?php get_footer(); ?>