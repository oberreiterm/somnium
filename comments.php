<?php 
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
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
	<?php 
</div>