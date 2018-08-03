<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
    <header class="mb-4">
        <div class="header-meta text-muted mb-5">
            <?php tainacan_post_date(); ?> <?php printf(__('by %s', 'tainacan-theme'), get_the_author_posts_link()); ?>
        </div>
        <?php the_post_thumbnail(); ?>
    </header>
    <section class="tainacan-content text-black margin-two-column">
        <?php
            the_content();
            wp_link_pages();
        ?>
    </section>
    <footer class="mt-5 border-top pt-3">
        <p>
            <?php 
                _e('Category: ', 'tainacan-theme'); 
                the_category(', ') ?> | 
                <?php if (has_tag()) { 
                    the_tags('Tags: ', ', '); ?> | 
                <?php } 
                _e('Comments', 'tainacan-theme'); echo ':'; ?> 
                <?php comments_popup_link(__('None', 'tainacan-theme'), '1', '%'); ?>
        </p>
    </footer>
</article>
<div class="row">
	<!-- Container -->
	<div class="col mt-3 mx-auto">
        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif; ?>
    </div>
</div>