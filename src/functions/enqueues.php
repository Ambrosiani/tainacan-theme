<?php
/**
 * Enqueues Theme
 */

if ( ! function_exists('tainacan_Enqueues') ) {
    /**
     * Inclui os scripts javascript e os styles necessários ao front-end do thema
     */
    function tainacan_Enqueues(){
        /**
         * Adicionando o jquery ao footer das páginas.
         */
            wp_deregister_script( 'jquery' );
            wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
            wp_enqueue_script( 'jquery' );

        /**
         * Bootstrap 4
         */
            //Style
            wp_register_style('bootstrap4CSS', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', '', '4.0.0', '');
            wp_enqueue_style('bootstrap4CSS');
            //Javascript
            wp_register_script('bootstrap4JS', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
            wp_enqueue_script('bootstrap4JS');
            //Popper
            wp_register_script('popper_bootstrap4', get_template_directory_uri() . '/assets/vendor/bootstrap/js/popper.min.js', '', '', true);
            wp_enqueue_script('popper_bootstrap4');

        /**
         * Google Charts
         
         *   wp_register_script( 'googleCharts', 'https://www.gstatic.com/charts/loader.js');
         *   wp_enqueue_script('googleCharts');
         */
        /**
         * Tainacan Theme
         */
            wp_register_style('tainacanStyle', get_stylesheet_uri(), array('bootstrap4CSS'));
            wp_enqueue_style('tainacanStyle');
            wp_register_script('tainacanJS', get_template_directory_uri() . '/assets/js/js.js', '', '1.0', true);
            wp_enqueue_script('tainacanJS');
            wp_register_script('collectionGraph_googleCharts', get_template_directory_uri() . '/assets/js/charts.js', array('googleCharts'), '1.0');
            wp_enqueue_script('collectionGraph_googleCharts');
        /**
         * Comments
         */
        if (is_singular() && comments_open() && get_option('thread_comments'))
            wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'tainacan_Enqueues');