<?php
/**
 * Tema para exibir Comments.
 *
 * A área da página que contém os comentários atuais
 * E o formulário de comentário. A exibição real dos comentários é
 * Manipulado por um callback em tainacan_Comments_Callback() que é
 * Localizado no arquivo functions.php.
 *
 * @package WordPress
 * @subpackage Tainacan Theme
 */
global $current_user;
if (post_password_required()) {
    return;
} ?>
<div id="comments">
	<!--show the form-->
	<?php if('open' == $post->comment_status) : ?>
		<div id="respond" class="clearfix">  
			<?php if(get_option('comment_registration') && !$user_ID) : ?>
				<p>
				<?php printf( __( 'You must be %slogged%s in to post a comment.', 'tainacan-theme'), "<a href='" . get_option('home') . "/wp-login.php'>", "</a>" ); ?>
				</p>        
			<?php else : ?>      
				<div for="comment" class="d-block">
					<span class="text-jelly-bean"><?php _e('Leave your comment', 'tainacan-theme'); ?></span>
					<span class="text-oslo-gray authenticated ml-sm-3 d-none d-sm-block">
						<?php 
							_e('Authenticated as', 'tainacan-theme'); echo ': '; 
							echo '<a href="'. get_author_posts_url($current_user->ID) .'">' . $current_user->display_name . '</a>'; 
						?>
					</span>
				</div>

				<form autocomplete="off" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="form-comment" class="form-inline px-sm-5 clearfix">
					<div class="row mx-sm-auto p-3">
						<div class="form-group">
							<?php 
								comment_id_fields(); 
								$args = array('class' => 'img-fluid rounded-circle mr-sm-3', );
								echo get_avatar( $current_user->ID, 60, '', $current_user->display_name, $args );
							?>
							<span class="text-oslo-gray authenticated ml-3 d-inline d-sm-none">
								<?php 
									_e('Authenticated as', 'tainacan-theme'); echo ': '; 
									echo '<a href="'. get_author_posts_url($current_user->ID) .'" class="font-weight-light">' . $current_user->display_name . '</a>'; 
								?>
							</span>
							<textarea name="comment" id="comment" tabindex="1" required class="form-control mr-sm-3" rows="2" placeholder="<?php _e('Enter your comment here.', 'tainacan-theme'); ?>"></textarea>
						</div>
						<button id="submit" class="btn btn-info bg-jungle-green align-self-center ml-auto " type="submit" name="submit"><?php _e('Send', 'tainacan-theme') ?></button>
					</div>
					
					<?php cancel_comment_reply_link('Cancel'); ?>
					<?php do_action('comment_form', $post->ID); ?>
				</form>
			<?php endif; ?>
		</div>
		<?php if (have_comments()) : ?>
			<div class="row px-sm-4">
				<div class="col col-sm-10 mt-4 list-comments mx-sm-auto pl-3">
					<?php wp_list_comments('type=comment&callback=tainacan_Comments_Callback'); ?>
				</div>
			</div>

			<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
				<nav id="comment-nav-below" class="navigation" role="navigation">
					<div class="nav-previous">
						<?php echo '&larr; '; previous_comments_link( _e('Newer', 'tainacan-theme')); ?>
					</div>
					<div class="nav-next">
						<?php next_comments_link(_e('Older', 'tainacan-theme')); echo ' &rarr;'; ?>
					</div>
				</nav>
			<?php endif; // check for comment navigation ?>

			<?php elseif (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
				<p class="nocomments"><?php _e('Comments are closed.', 'tainacan-theme'); ?></p>
		<?php endif; ?>
	<?php endif; ?>
</div>