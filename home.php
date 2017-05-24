


<?php get_header(); ?>

<div class="clear"></div>

<div id="content" class="site-content">
<?php echo'<style scoped>		.site-content > .container{
							padding-top:0px;
							
						}
	
						.bc-image-post {
							height: 200px;
							    margin-bottom: 30px;
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
							margin-bottom:20px;
						}
						</style>';	
		?>

		<div class="bc-image-post" data-parallax="scroll" data-image-src="
		
		<?php 
		$tst = get_theme_mod('blog-bc',get_template_directory_uri ().'/images/somnium_1920.jpg');
		echo sm_getImage($tst,1920,300);
		echo '"';
		if(isset($tst)){ 
			echo' style="'.call_gradient_placeholder();
		}
		?>" >
		<div class="outer-container-title container">
		<?php if(is_front_page()){echo '<div class="container-title front-padding">'; }else{echo'<div class="container-title ">';}?>
			<h2 class="entry-title-blog"><?php $blgna = __('Blog','somnium'); echo get_theme_mod('blog-txt', $blgna); ?></h2>
			</div>
		</div>
		</div>


<div class="container ">



<div class="content-left-wrap loop-page col-md-9">



	<div id="primary" class="content-area">

		<main id="main" class="site-main">
			
	
		<?php 
		$queryPosts=get_theme_mod('query_posts',10);
		query_posts( array(
        'posts_per_page' => $queryPosts,
    ) );
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
<div class="sidebar-wrap col-md-3 content-left-wrap">

	<?php get_sidebar(); ?>

</div><!-- .sidebar-wrap -->

</div></div>

<?php get_footer(); ?>