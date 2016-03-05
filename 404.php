<?php

get_header(); ?>
<div class="clear"></div>
</header> 
<div id="content" class="site-content">
<div class="container">
<div class="content-left-wrap col-md-9">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<article>
			<header class="entry-header">
				<h1 class="entry-title"><?php _e(  'Oops! That page can&rsquo;t be found.','somnium'); ?></h1>
			</header>
			<div class="entry-content">
				<p><?php _e(  'It looks like nothing was found at this location. Maybe try one of the links below or a search?','somnium'); ?></p>		
			</div>
		</article>
		</main>
	</div>
</div>
<div class="sidebar-wrap col-md-3 content-left-wrap">
	<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>