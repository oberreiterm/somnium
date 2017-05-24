<?php
echo'<article id="post-'; echo the_ID(); echo'" '; post_class('article_cat'); echo'>';
	
		 if ( has_post_thumbnail()){
			echo'<div class="post-img-wrap col-md-4">
			<a href="'; echo the_permalink(); echo'" title="'; echo the_title_attribute(); echo'" >';
			the_post_thumbnail(array(310,270)); 
			echo'</a></div>
			<div class="listpost-content-wrap col-md-8">';
		}else{
			echo'<div class="post-img-wrap  col-md-4" >
			<a href="'; echo the_permalink(); echo'" title="'; echo the_title_attribute(); echo'" >
			 <div style="'.sm_call_gradient_placeholder().'" class="post-gradient"></div>';
			echo'</a></div>
			<div class="listpost-content-wrap col-md-8">';
		}

	echo'<div class="date">
							<h2>'.get_the_date('j').'</h2>
							<p>'.get_the_date('M, Y').'</p>
						</div>';
		echo'<div class="article-sticky">
								<i class="article-sticky-icon fa fa-thumb-tack"></i>
							</div>';

	echo'<div class="list-post-top">

	<header class="entry-header-cat">

		<h2 class="entry-title-cat"><a href="'; echo the_permalink(); echo'" rel="bookmark">'; echo the_title(); echo'</a></h2>';

		if ( 'post' == get_post_type() ){

			echo'<div class="entry-meta-cat">';
				sm_post_meta();
			echo'</div>';

		}
		$excLN=get_theme_mod('pgsExLn',50);
		
		echo'<div class="entry-summary">';
		echo sm_field_excerpt(get_the_ID() , get_the_excerpt(), $excLN,'<a class="moretag" href="'. get_permalink(get_the_ID()) . '"> '.__('[Read more...]','somnium').'</a>');
		
		
	echo'</div>';
	echo'</header>';
echo'</div></div></article>';






