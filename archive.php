<?php get_header(); ?>

<div class="clear"></div>

	
		<div class="bc-container-post" data-parallax="scroll" data-image-src="<?php 
		$tst = get_theme_mod('archive-bc',get_template_directory_uri ().'/images/somnium_1920.jpg');
		getImage($tst,1920,300);
		echo '"';
		if(isset($tst)){ 
			echo' style="'.call_gradient_placeholder();
		}
		?>" >
	
		<div class="top-outer-container-title container">
		<?php echo'<div class="top-container-title-x ">';?>
			<h2 class="top-container-title">
				<?php
						if ( is_category() ) :
							single_cat_title();
						elseif ( is_tag() ) :
							single_tag_title();
						elseif ( is_author() ) :
							printf( __( 'Author: %s','somnium'), '<span class="vcard">' . get_the_author() . '</span>' );
						elseif ( is_day() ) :
							printf( __( 'Day: %s','somnium' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Month: %s','somnium'), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format','somnium') ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Year: %s','somnium'), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ,'somnium') ) . '</span>' );
						else :
							_e( 'Archives','somnium' );
						endif;
					?>
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
		
		<header class="archive-header">
				
		</header>
	
		<?php 
		
		if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php

					get_template_part( 'content', get_post_format() );

				?>
			<?php endwhile; somnium_paging_nav();?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
<div class="clear-both"></div>
	</div><!-- #primary -->
	<div class="clear-both"></div>

</div><!-- .content-left-wrap -->
<div class="clear-both"></div>
<?php

	if($sidebarL =='right' || $sidebarL ==''){		
		echo'<div class="sidebar-wrap col-md-3 content-left-wrap image-post-sidebar">';
		get_sidebar(); 
		echo'</div>';
	}			
?>

</div></div>

<?php get_footer(); ?>