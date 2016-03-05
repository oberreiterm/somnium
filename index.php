<?php get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->



	<div id="content" class="site-content">

<div class="container">



<div class="content-left-wrap loop-page col-md-9">



	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">
		<?php if ( is_search() ) :  ?>
		<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'somnium' ), get_search_query() ); ?></h1>
		</header>
		<?php endif;  ?>
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
<div class="sidebar-wrap col-md-3 content-left-wrap">

	<?php get_sidebar(); ?>

</div><!-- .sidebar-wrap -->

</div><!-- .container -->

<?php get_footer(); ?>