<?php

/**
 * Show list of comments.
 * callback: tainacan_Comments_Callback
 * param: @comment, @args, @depth
 */
function tainacan_Comments_Callback($comment, $args, $depth) {
    //get comment to determine type
    $GLOBALS['comment'] = $comment;
    global $post; ?>
    <div <?php comment_class( $args['has_children'] ? ' has-children media' : ' media' ); ?>>
        <?php 
            $arg = array('class' => 'img-fluid rounded-circle mr-sm-3', );
            echo get_avatar($comment, 60, '', '', $arg);
        ?>
        <div class="media-body">
            <h5 class="media-heading comment-author vcard">
                <?php printf('<cite class="fn">%1$s %2$s</cite>',
                    get_comment_author_link(),
                    // If current post author is also comment author, make it known visually.
                    ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __(
                    'Post author',
                    'tainacan-theme'
                    ) . '</span> ' : ''); 
                ?>   
                <?php 
                    printf('<p class="comment-time text-oslo-gray my-sm-1">%s às %s.</p>', get_comment_date(), get_comment_time()); 
                ?>
            </h5>
            <?php if ('0' == $comment->comment_approved) : ?>
                <p class="comment-awaiting-moderation">
                    <?php _e('Your comment is awaiting moderation.','tainacan-theme'); ?>
                </p>
            <?php endif; ?>
            <?php comment_text(); ?>
            <p class="reply">
                <?php comment_reply_link( array_merge($args, array(
                            //'reply_text' => __('Reply <span>&darr;</span>', 'tainacan-theme'),
                            'reply_text' => __('Reply', 'tainacan-theme'),
                            'depth'      => $depth,
                            'max_depth'  => $args['max_depth'],
                            'before'    => '<li class="reply-link list-inline-item">',
                            'after'     => '</li>'
                        )
                    )); 
                    edit_comment_link( __( 'Edit' ), '<li class="edit-link list-inline-item">', '</li>' ); 
                ?>
            </p>

        </div>
    </div>
<?php }

  /**
 * Display date of post.
 */
if ( ! function_exists( 'tainacan_post_date' ) ) {
	function tainacan_post_date() {
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">(updated %4$s)</time>';
			}
			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date(),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date()
			);
			echo $time_string;
		}
	}
}