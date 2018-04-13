<?php if(have_posts()): ?>
    <div class="tainacan-title">
        <div class="border-bottom border-jelly-bean tainacan-title-page" style="border-width: 2px !important;">
            <ul class="list-inline mb-1">
                <li class="list-inline-item text-midnight-blue font-weight-bold">
                    <?php 
                        if(is_home()) echo 'Blog'; 
                        elseif(is_single() || is_page()) the_title(); 
                        elseif(is_search()){ 
                            _e('Search Results for', 'tainacan-theme'); 
                            echo ' ' . the_search_query();
                        }
                        elseif(is_archive()){
                            echo ' ' . get_the_archive_title();
                        }
                    ?>
                </li>
                <li class="list-inline-item float-right"><a href="javascript:history.go(-1)"><?php _e('Back'); ?></a></li>
            </ul>
        </div>
    </div>
    <div class="<?php if(is_home() || is_search() || is_category() || is_archive()) echo 'mt-5 tainacan-list-post'; elseif(is_single() || is_page()) echo 'mt-3 tainacan-single-post'; ?>">
        <?php while(have_posts()): 
            the_post();
            //List Post
            if(is_home() || is_search() || is_category() || is_archive()){
                get_template_part('template-parts/list-post');
            }
            //View Post
            elseif(is_single() || is_page()){
                get_template_part('template-parts/single-post');
            } else {
                printf('<p>%2</p>', __('Sorry, no posts matched your criteria.', 'tainacan-theme'));
            }
        endwhile; ?>
    </div>
    <?php echo tainacan_pagination(3); ?>
<?php else: ?>
	<?php _e('Nothing found', 'tainacan-theme'); ?>
<?php endif; ?>