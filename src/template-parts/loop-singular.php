<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
	    <div class="tainacan-title">
	        <div class="border-bottom border-jelly-bean tainacan-title-page" style="border-width: 2px !important;">
	            <ul class="list-inline mb-1">
	                <li class="list-inline-item text-midnight-blue font-weight-bold">
	                    <?php the_title(); ?>
	                </li>
	                <li class="list-inline-item float-right"><a href="javascript:history.go(-1)"><?php _e('Back'); ?></a></li>
	            </ul>
	        </div>
	    </div>
	    <div class="mt-3 tainacan-single-post">
	        <?php get_template_part('template-parts/single-post'); ?>
	    </div>
	<?php endwhile; ?>
<?php else: ?>
	<?php _e('Nothing found', 'tainacan-theme'); ?>
<?php endif; ?>