
	<div id="secondary" class="widget-area">

		<?php if ( ! dynamic_sidebar( 'sidebar-right' ) ) : ?>



			<aside id="search" class="widget widget_search">

				<?php get_search_form(); ?>

			</aside>



			<aside id="archives" class="widget">

				<h1 class="widget-title"><?php _e( 'Archives' ,'somnium'); ?></h1>

				<ul>

					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>

				</ul>

			</aside>



			<aside id="meta" class="widget">

				<h1 class="widget-title"><?php _e( 'Meta','somnium'); ?></h1>

				<ul>

					<?php wp_register(); ?>

					<li><?php wp_loginout(); ?></li>

					<?php wp_meta(); ?>

				</ul>

			</aside>



		<?php endif;  //end sidebar widget area ?>

	</div><!-- #secondary -->