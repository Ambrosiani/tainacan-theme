<?php if (have_posts()):  ?>

    <div class="tainacan-frame-container">

        <div class="row no-gutters">
        <?php while (have_posts()): the_post(); ?>
            <div class="col">
                <div class="tainacan-frame">
                    <div class="frame">
                        <div class="mat">
                            <div class="art">
                                <?php if ( tainacan_current_view_displays('thumbnail') ): ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php if ( tainacan_current_view_displays('title') ): ?>
                        <p class="metadata-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>            
            
        <?php endwhile; ?>
        </div>
    </div>

<?php else: ?>
    <div class="tainacan-cards-container">
        Nenhum item encontrado
    </div>
<?php endif; ?>
