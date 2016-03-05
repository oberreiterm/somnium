<?php if ( post_password_required() )	return;?><div id="comments" class="comments-area">	<?php // You can start editing here -- including this comment! ?>	<?php if ( have_comments() ) : ?>		<h2 class="comments-title">			<?php				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'somnium' ),					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );			?>		</h2>				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>		<nav id="comment-nav-above" class="comment-navigation" role="navigation">			<div class="nav-previous"><?php previous_comments_link( __('&larr; Older Comments' ,'somnium')); ?></div>			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;' ,'somnium')); ?></div>		</nav>		<?php endif; ?>		<ul class="comment-list">			<?php				wp_list_comments( array(					'style'      => 'ul',					'short_ping' => true,				) );			?>		</ul>		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>		<nav id="comment-nav-below" class="navigation" role="navigation">			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'somnium' ) ); ?></div>			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'somnium' ) ); ?></div>		</nav>		<?php endif; // check for comment navigation ?>		<?php		/* If there are no comments and comments are closed, let's leave a note.		 * But we only want the note on posts and pages that had comments in the first place.		 */		if ( ! comments_open() && get_comments_number() ) : ?>		<p class="nocomments"><?php _e( 'Comments are closed.' , 'somnium' ); ?></p>		<?php endif; ?>	<?php endif; // have_comments() ?>	<?php comment_form(); ?></div><!-- #comments .comments-area --><?php/*
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php			 printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'somnium' ),			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );						
			?>
		</h2>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation' ,'somnium');?></h1>
			<div class="nav-previous"><?php previous_comments_link( _e('&larr; Older Comments' ,'somnium')); ?></div>
			<div class="nav-next"><?php next_comments_link( _e( 'Newer Comments &rarr;' ,'somnium')); ?></div>
		</nav>
		<?php endif; ?>
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
				) );
			?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation' ,'somnium'); ?></h1>
			<div class="nav-previous"><?php  previous_comments_link( _e( '&larr; Older Comments','somnium')); ?></div>
			<div class="nav-next"><?php next_comments_link( _e('Newer Comments &rarr;' ,'somnium')); ?></div>
		</nav>
		<?php endif; ?>
	<?php endif;  ?>
	<?php
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?><p class="no-comments"><?php _e('Comments are closed.' ,'somnium'); ?></p>
	<?php endif; ?>
	<?php 	comment_form();?>
</div>*/
