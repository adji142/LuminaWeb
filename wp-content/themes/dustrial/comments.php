<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package dustrial
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>

<?php if ( have_comments() ) : ?>

	<div class="blog-comment-area col-md-12 p-0 mt-xl-5">
		<h4 class="comment-title">
			<?php
				$comment_count = get_comments_number();
				if ( 1 === $comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html_e( 'Comment', 'dustrial' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s Comment', '%1$s Comments', $comment_count, 'comments title', 'dustrial' ) ),
						number_format_i18n( $comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}
			?>
		</h4>
		<div class="comment-reply viewer-comment">
			<ul id="submited-comment" class="nd-allcommentes">
				<?php
					wp_list_comments( array(
						'style'       => 'li',
						'short_ping'  => true,
						'callback' => 'dustrial_comment',
						'avatar_size' => 100
					) );
				?>
			</ul><!-- .comment-list -->
		</div>
	</div>

	<?php 
		// are there comments to navigate through 
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav id="comment-nav-above" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'dustrial' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'dustrial' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'dustrial' ) ); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dustrial' ); ?></p>
	<?php endif; ?>

<?php endif; // have_comments() ?>

	<?php if ( comments_open() ) { ?>
		<div class="clearfix"></div>

		<div class="blog-comment-area col-md-12 p-0 mt-xl-5">
			<div id="leave-comment" class="nd-post-comment">

				<?php
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );
				$fields =  array(
					'<div class="row">
						<div class="form-group col-md-6">',
							'author' => '
							<input id="author" class="form-control rounded-0" name="author" type="text" placeholder="'.esc_attr__( 'Name *', 'dustrial' ).'" size="30"' . $aria_req . '/>
						</div>
						<div class="form-group col-md-6">',
							'email'  => '
							<input id="email" class="form-control rounded-0" name="email" type="email" placeholder="'.esc_attr__( 'Email *', 'dustrial' ).'" size="30"' . $aria_req . '/>
						</div>
					</div>
					<div class="form-group">',
						'website'  => '
						<input id="website" class="form-control rounded-0" name="website" type="text" placeholder="'.esc_attr__( 'Website', 'dustrial' ).'" size="30"' . $aria_req . '/>
					</div>
					',
				);

				$comments_args = array(
					
					'id_form'          		=> 'add-comment',
					'class_form'			=> 'validate-form formcomment-box',
					'title_reply_before'	=> '<h3 class="comment-title">',
					'title_reply'       	=> esc_html__( 'Leave a Reply', 'dustrial' ),
					'title_reply_after'		=> '</h3>',
					'title_reply_to'    	=> '',
					'cancel_reply_link' 	=> esc_html__( 'Cancel Comment', 'dustrial' ),
					'label_submit'      	=> esc_html__( 'Post Comment', 'dustrial' ),
					'comment_notes_before'  => '',
					'comment_notes_after'   => '',
					'fields' 				=>  $fields,
					'comment_field'        	=> '<div class="form-group">
												<textarea id="message" class="form-control rounded-0" name="comment" rows="6" cols="30" placeholder="'.esc_attr__( 'Comment', 'dustrial' ).'" required></textarea>
												</div>',
					'submit_button'         => '<button type="submit" class="btn btn-primary">'.esc_attr__( 'Post Comment', 'dustrial' ).'</button>',
		    		'submit_field'          => '<input type="hidden" name="form_botcheck" class="form-control" value=""> %1$s %2$s',
		    		'format'                => 'xhtml'
				);
				ob_start();
				comment_form($comments_args);
				?>

			</div><!-- #comments -->
		</div>  

<?php } ?>