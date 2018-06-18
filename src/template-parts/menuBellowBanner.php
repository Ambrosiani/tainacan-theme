<?php
    /* $bread = "<ol class='breadcrumb pb-0 mb-1' style='background: transparent'>";
    $bread .= "<li class='breadcrumb-item'><a href='#'>Home</a></li>";
    $bread .= "<li class='breadcrumb-item'><a href='#'>Site</a></li>";
    $bread .= "<li class='breadcrumb-item active' aria-current='page'>Blog</li>";
    $bread .= "</ol>"; */
?>
<?php if(has_nav_menu('navMenubelowHeader')) : ?>
    <nav class="navbar navbar-expand-md navbar-light bg-white px-0 border-bottom menu-belowheader" role="navigation">
        <div class="container-fluid max-large px-0 margin-one-column">
            <?php /* if(wp_is_mobile()) echo $bread; */ ?>
                <?php
                    wp_nav_menu( array(
                        'theme_location'	=> 'navMenubelowHeader',
                        'depth'				=> 2, // 1 = with dropdowns, 0 = no dropdowns.
                        'container'			=> 'div',
                        'container_class'	=> 'collapse navbar-collapse',
                        'container_id'		=> 'menubelowHeader',
                        'menu_class'		=> 'navbar-nav mr-auto',
                        'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                        'walker'			=> new WP_Bootstrap_Navwalker()
                    ) );
                ?>
        </div>
    </nav>
<?php endif; ?>
<!-- <nav aria-label="breadcrumb" class="d-none d-md-flex">
    <?php //echo $bread; ?>
</nav> -->