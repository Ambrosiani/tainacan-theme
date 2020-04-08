<?php get_header(); ?>

<?php
if (get_theme_mod('tainacan_single_item_collection_header', false))  {
	echo ('<style>
	nav.menu-belowheader #menubelowHeader ul.dropdown-menu {
		min-width: 10rem !important;
	}');

	$background_color = esc_attr( get_post_meta( tainacan_get_collection_id(), 'tainacan_theme_collection_background_color', true ) );
	$text_color = esc_attr( get_post_meta( tainacan_get_collection_id(), 'tainacan_theme_collection_color', true ) );
	if ( $background_color ) {
		echo ".t-bg-collection {
			background-color: " . esc_attr($background_color) . " !important;
		}";
		echo ".t-bg-collection h1, .t-bg-collection h2, .t-bg-collection p {
			color: " . esc_attr($text_color) . " !important;
		}";

		echo ".t-bg-collection a {
			color: " . esc_attr($text_color) . " !important;
			opacity: 1;
		}";
	}

	echo '</style>';
}
?>


<main class="mt-5 max-large margin-one-column">
	<div class="row">
		<div class="col col-sm mx-sm-auto">
			<?php if ( have_posts() ) : ?>
				<?php do_action( 'tainacan-interface-single-item-top' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( get_theme_mod('tainacan_single_item_collection_header', false) ): ?>
						<div class="single-item-collection-banner tainacan-single-post">
							<div class="t-bg-collection">
								<div class="collection-name aside-thumbnail">
									<div class="title-page">
										<p><?php echo __('Collection', 'tainacan-interface') ?></p>
										<h1><?php tainacan_the_collection_name(); ?></h1> 
									</div>
								</div>
							</div>
							<div class="collection-thumbnail">
								<?php if ( has_post_thumbnail( tainacan_get_collection_id() ) ) : 
									$thumbnail_id = get_post_thumbnail_id( $post->ID );
									$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
									<img src="<?php echo get_the_post_thumbnail_url( tainacan_get_collection_id() ); ?>" class="t-collection--info-img rounded-circle img-fluid border border-white position-absolute text-left" alt="<?php echo esc_attr($alt); ?>">
								<?php else : ?>
									<div class="image-placeholder rounded-circle border border-white position-absolute">
										<h4 class="text-center">
										<?php
											echo esc_html( tainacan_get_initials( tainacan_get_the_collection_name() ) );
										?>
										</h4>
									</div>
								<?php endif; ?>
							</div>
							<?php 
								global $wp; 
								if (get_theme_mod( 'tainacan_single_item_display_share_buttons', true )) : ?>
								<div class="collection-header--share">
									<div class="btn trigger">
										<span class="tainacan-icon tainacan-icon-share"></span>
									</div>

									<div class="icons">
										<?php if ( true == get_theme_mod( 'tainacan_facebook_share', true ) ) : ?> 
											<div class="rotater">
												<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
													<div class="btn btn-icon">
														<i class="tainacan-icon tainacan-icon-facebook"></i>
													</div>
												</a>
											</div>
										<?php endif; ?>
										<?php if ( true == get_theme_mod( 'tainacan_twitter_share', true ) && get_theme_mod( 'tainacan_twitter_user' ) ) : ?> 
											<div class="rotater">
												<?php
													$twitter_option = get_theme_mod( 'tainacan_twitter_user' );
													$via = ! empty( $twitter_option ) ? '&amp;via=' . esc_attr( get_theme_mod( 'tainacan_twitter_user' ) ) : '';
												?>
												<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title_attribute(); ?><?php echo $via; ?>"  target="_blank">
													<div class="btn btn-icon">
														<i class="tainacan-icon tainacan-icon-twitter"></i>
													</div>
												</a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
							<div class="item-title aside-thumbnail">
								<div class="title-page">
									<p><?php echo __('Item', 'tainacan-interface') ?></p>
									<h1><?php the_title(); ?></h1> 
								</div>
								<!--<div class="title-back">
									<a href="javascript:history.go(-1)"><?php _e( 'Back', 'tainacan-interface' ); ?></a>
								</div>-->
							</div>
						</div>
					<?php else: ?>

						<div class="tainacan-title">
							<div class="border-bottom border-jelly-bean tainacan-title-page" style="border-width: 2px !important;">
								<ul class="list-inline mb-1">
									<li class="list-inline-item text-midnight-blue font-weight-bold title-page">
										<h1><?php the_title(); ?></h1> 
									</li>
									<li class="list-inline-item float-right title-back">
										<a href="javascript:history.go(-1)"><?php _e( 'Back', 'tainacan-interface' ); ?></a>
									</li>
								</ul>
							</div>
						</div>

					<?php endif; ?>
					
					<?php do_action( 'tainacan-interface-single-item-after-title' ); ?>
					
					<?php if ( get_theme_mod('tainacan_single_item_collection_header', false) ): ?>
						<div class="mt-2 tainacan-single-post collection-single-item aside-thumbnail">
					<?php else : ?>
						<div class="mt-3 tainacan-single-post collection-single-item">
					<?php endif; ?>
						<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
							<header class="mb-4 tainacan-content">
								<div class="header-meta text-muted mb-5">
									<span class="time"><?php tainacan_meta_date_author(); ?></span>
									<?php if( function_exists('tainacan_the_item_edit_link') ) {
										echo '<span class="tainacan-edit-item-collection">';
											tainacan_the_item_edit_link(null, ' - ');
										echo '</span>';
									} ?>
								</div>
							</header>
							<?php if ( tainacan_has_document() && !get_theme_mod( 'tainacan_single_item_gallery_mode', false )) : ?>
								<h2 class="title-content-items"><?php _e( 'Document', 'tainacan-interface' ); ?></h2>
								<section class="tainacan-content single-item-collection margin-two-column">
									<div class="single-item-collection--document">
										<?php tainacan_the_document(); ?>
										<?php if( function_exists('tainacan_the_item_document_download_link') && tainacan_the_item_document_download_link() != '' ) {
											echo '<span class="tainacan-item-document-download">';
											echo tainacan_the_item_document_download_link();
											echo '</span>';
										} ?>
									</div>
								</section>
							<?php endif; ?>
						</article>
					</div>

					<?php if ( get_theme_mod('tainacan_single_item_collection_header', false) ): ?>
						<br>
					<?php endif; ?>

					<?php do_action( 'tainacan-interface-single-item-after-document' ); ?>

					<?php if ( tainacan_has_document() && !get_theme_mod( 'tainacan_single_item_gallery_mode', false )) : ?>
						<div class="tainacan-title my-5">
							<div class="border-bottom border-silver tainacan-title-page" style="border-width: 1px !important;">
							</div>
						</div>
					<?php endif; ?>

					<?php
						if (function_exists('tainacan_get_the_attachments')) {
							$attachments = tainacan_get_the_attachments();
						} else {
							// compatibility with pre 0.11 tainacan plugin
							$attachments = array_values(
								get_children(
									array(
										'post_parent' => $post->ID,
										'post_type' => 'attachment',
										'post_mime_type' => 'image',
										'order' => 'ASC',
										'numberposts'  => -1,
									)
								)
							);
						}
						
					?>

					<?php if ( !empty( $attachments )  || ( get_theme_mod( 'tainacan_single_item_gallery_mode', false) && tainacan_has_document() )) : ?>

						<div class="mt-3 tainacan-single-post">
							<article role="article">
								<h2 class="title-content-items">
									<?php 
										if (get_theme_mod( 'tainacan_single_item_gallery_mode', false )) {
											_e( 'Documents', 'tainacan-interface' ); 
										} else {
											_e( 'Attachments', 'tainacan-interface' ); 
										}
									?>
								</h2>

								<section class="tainacan-content single-item-collection margin-two-column">
									<?php if (get_theme_mod( 'tainacan_single_item_gallery_mode', false )): ?>
										<div class="single-item-collection--gallery">
											<?php if ( tainacan_has_document() ) : ?>
												<section class="tainacan-content single-item-collection margin-two-column">
													<div class="single-item-collection--document">
														<?php tainacan_the_document(); ?>
													</div>
												</section>
											<?php endif; ?>
											<?php foreach ( $attachments as $attachment ) { ?>
												<section class="tainacan-content single-item-collection margin-two-column">
													<div class="single-item-collection--document">
														<?php 
															if ( function_exists('tainacan_get_single_attachment_as_html') ) {
																tainacan_get_single_attachment_as_html($attachment->ID);
															}
														?>
													</div>
												</section>	
											<?php } ?>
										</div>
										<?php if ( (tainacan_has_document() && $attachments && sizeof($attachments) > 0 ) || (!tainacan_has_document() && $attachments && sizeof($attachments) > 1 ) ) : ?>	
											<div class="single-item-collection--gallery-items">
												<?php if ( tainacan_has_document() ) : ?>
													<div class="single-item-collection--attachments-file">
														<?php
															tainacan_the_document(); 
															echo __( 'Document', 'tainacan-interface' );
														?>
													</div>
												<?php endif; ?>
												<?php foreach ( $attachments as $attachment ) { ?>
													<div class="single-item-collection--attachments-file">
														<a class="<?php if (!wp_get_attachment_image( $attachment->ID, 'tainacan-interface-item-attachments')) echo'attachment-without-image'; ?>">
															<?php
																echo wp_get_attachment_image( $attachment->ID, 'tainacan-interface-item-attachments', true );
																echo get_the_title( $attachment->ID );
															?>
														</a>
													</div>
												<?php } ?>
											</div>
										<?php endif; ?>
									<?php else : ?>
										<div class="single-item-collection--attachments">
											<?php foreach ( $attachments as $attachment ) { ?>
												<?php
												if ( function_exists('tainacan_get_attachment_html_url') ) {
													$href = tainacan_get_attachment_html_url($attachment->ID);
												} else {
													$href = wp_get_attachment_url($attachment->ID, 'large');
												}
												?>
												<div class="single-item-collection--attachments-file">
													<a 
														class="<?php if (!wp_get_attachment_image( $attachment->ID, 'tainacan-interface-item-attachments')) echo'attachment-without-image'; ?>"
														href="<?php echo $href; ?>"
														data-toggle="lightbox"
														data-gallery="example-gallery">
														<?php
															echo wp_get_attachment_image( $attachment->ID, 'tainacan-interface-item-attachments', true );
															echo get_the_title( $attachment->ID );
														?>
													</a>
												</div>
											<?php }
											?>
										</div>
									<?php endif; ?>
								</section>
							</article>
						</div>

						<div class="tainacan-title my-5">
							<div class="border-bottom border-silver tainacan-title-page" style="border-width: 1px !important;">
							</div>
						</div>

					<?php endif; ?>

					<?php do_action( 'tainacan-interface-single-item-after-attachments' ); ?>

					<div class="mt-3 tainacan-single-post">
						<article role="article">
							<!-- <h2 class="title-content-items"><?php _e( 'Information', 'tainacan-interface' ); ?></h2> -->
							<section class="tainacan-content single-item-collection margin-two-column">
								<div class="single-item-collection--information justify-content-center">
									<div class="row">
										<div class="col s-item-collection--metadata">
											<?php if (has_post_thumbnail() && get_theme_mod( 'tainacan_single_item_display_thumbnail', true )): ?>
												<div class="card border-0 mb-3">
													<div class="card-body bg-white border-0 pl-0 pt-0 pb-1">
														<h3><?php _e( 'Thumbnail', 'tainacan-interface' ); ?></h3>
														<?php the_post_thumbnail('tainacan-medium-full', array('class' => 'item-card--thumbnail mt-2')); ?>
													</div>
												</div>
											<?php endif; ?>
											<?php if (!get_theme_mod('tainacan_single_item_collection_header', false) && get_theme_mod( 'tainacan_single_item_display_share_buttons', true )): ?>
												<div class="card border-0 mb-3">
													<div class="card-body bg-white border-0 pl-0 pt-0 pb-1">
														<h3><?php _e( 'Share', 'tainacan-interface' ); ?></h3>
														<div class="btn-group" role="group">
															<?php if ( true == get_theme_mod( 'tainacan_facebook_share', true ) ) : ?> 
																<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="item-card-link--sharing" target="_blank">
																	<img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/facebook-circle.png'; ?>" alt="<?php esc_attr_e('Share this on facebook', 'tainacan-interface') ?>">
																</a>
															<?php endif; ?>
															<?php if ( true == get_theme_mod( 'tainacan_twitter_share', true ) ) : ?> 
																<?php
																$twitter_option = get_theme_mod( 'tainacan_twitter_user' );
																$via = ! empty( $twitter_option ) ? '&amp;via=' . esc_attr( get_theme_mod( 'tainacan_twitter_user' ) ) : '';
																?>
																<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title_attribute(); ?><?php echo $via; ?>" target="_blank" class="item-card-link--sharing">
																	<img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/twitter-circle.png'; ?>" alt="<?php esc_attr_e('Share this on twitter', 'tainacan-interface') ?>">
																</a>
															<?php endif; ?>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<?php do_action( 'tainacan-interface-single-item-metadata-begin' ); ?>
											<?php
												$args = array(
													'before_title' => '<div><h3>',
													'after_title' => '</h3>',
													'before_value' => '<p>',
													'after_value' => '</p></div>',
												);
												//$field = null;
												tainacan_the_metadata( $args );
											?>
											<?php do_action( 'tainacan-interface-single-item-metadata-end' ); ?>
										</div>
									</div>
								</div>
							</section>
						</article>
					</div>

					<?php do_action( 'tainacan-interface-single-item-after-metadata' ); ?>

					<div class="tainacan-title my-5">
						<div class="border-bottom border-silver tainacan-title-page" style="border-width: 1px !important;">
						</div>
					</div>
					<div class="mt-3 tainacan-single-post">
						<div class="row">
							<!-- Container -->
							<div class="col mt-3 mx-auto">
								<?php
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php do_action( 'tainacan-interface-single-item-bottom' ); ?>
			<?php else : ?>
				<?php _e( 'Nothing found', 'tainacan-interface' ); ?>
			<?php endif; ?>
		</div>
	</div><!-- /.row -->
</main>
<?php get_footer(); ?>
<script>
	jQuery('#topNavbar').addClass('b-bottom-top');
	jQuery('nav.menu-belowheader').removeClass('border-bottom');
	jQuery('nav.menu-belowheader .max-large').addClass('b-bottom-bellow');
</script>
