<?php

/**
 * Setup Theme
 */
if(!function_exists('tainacan_setup')) {

    /**
     * Execulta após o tema ser inicializado. 
     * Isso é usado para a configuração básica do tema, registro dos recursos do tema e init hooks. 
     * Observe que esta função está conectada ao gancho after_setup_theme, que é executado antes do gancho de init.
     */
    function tainacan_setup() {        
        /**
         * Display in gutenberg plugin the full width for image
         */
        add_theme_support( 'align-wide' );

        add_theme_support( 'html5', array( 'comment-list' , 'comment-form') );
        add_theme_support( 'post-thumbnails' );
        define('FS_METHOD', 'direct');
        /**
         * Custom header to change the banner image
         */
		$header_args = array(
            //'default-text-color' => '000',
            'width'              => 1280,
            'height'             => 280,
            'header-text'		 => false,
			'flex-width'         => false,
			'flex-height'        => true,
		);
        add_theme_support( 'custom-header', $header_args );
        
		/* register_default_headers(
            array(
                'default-image' => array(
                    'url'           => '%s/assets/images/capa.png',
                    'thumbnail_url' => '%s/assets/images/capa.png',
                    'description'   => __( 'Default Image', 'tainacan-theme' ),
                ),
            )
        ); */

        /**
         * Custom logo to change the logo image
         */
		$logo_args = array(
			'height'      => 25,
			'width'       => 400,
			'flex-height' => false,
			'flex-width'  => true,
		);
		add_theme_support( 'custom-logo', $logo_args );
        
        if (function_exists('tainacan_register_view_mode')) {
            tainacan_register_view_mode('cards', [
                'label' => 'Cards view',
                'description' => 'A cards view, flexible for metadata',
                'icon' => '<span class="icon"><i class="mdi mdi-view-list mdi-24px"></i></span>',
                'dynamic_metadata' => true,
            ]);
            tainacan_register_view_mode('grid', [
                'label' => 'Grid view',
                'description' => 'A grid view',
                'icon' => '<span class="icon"><i class="mdi mdi-view-grid mdi-24px"></i></span>',
                'dynamic_metadata' => false,
            ]);
            tainacan_register_view_mode('mosaic', [
                'label' => 'Mosaic view',
                'description' => 'A mosaic view',
                'icon' => '<span class="icon"><i class="mdi mdi-view-quilt mdi-24px"></i></span>',
                'dynamic_metadata' => false,
            ]);
            tainacan_register_view_mode('frame', [
                'label' => 'Frame view',
                'description' => 'A frame view, made for gallery expositions',
                'icon' => '<span class="icon"><i class="mdi mdi-checkbox-intermediate mdi-24px"></i></span>',
                'dynamic_metadata' => false,
            ]);
            tainacan_register_view_mode('gallery', [
                'label' => 'Gallery view',
                'description' => 'A framed view with metadata, made for gallery expositions',
                'icon' => '<span class="icon"><i class="mdi mdi-bank mdi-24px"></i></span>',
                'dynamic_metadata' => true,
            ]);
            tainacan_register_view_mode('masonry', [
                'label' => 'Masonry view',
                'description' => 'A masonry view',
                'icon' => '<span class="icon"><i class="mdi mdi-view-dashboard mdi-24px"></i></span>',
                'dynamic_metadata' => false,
            ]);
            tainacan_register_view_mode('books', [
                'label' => 'Books view',
                'description' => 'A books view, made for library visualizations',
                'icon' => '<span class="icon"><i class="mdi mdi-library-books mdi-24px"></i></span>',
                'dynamic_metadata' => false,
            ]);
            tainacan_register_view_mode('polaroid', [
                'label' => 'Polaroid view',
                'description' => 'A framed picture view, similar to polaroid photographs',
                'icon' => '<span class="icon"><i class="mdi mdi-polaroid mdi-24px"></i></span>',
                'dynamic_metadata' => true,
            ]);
        }

    }

}
add_action( 'after_setup_theme', 'tainacan_setup' );

/*
* Register Widgets SideBar
*/
function tainacan_widgets_sidebar_init() {
    register_sidebar( array(
        'name'          => __( 'Tainacan Sidebar Right', 'tainacan-theme' ),
        'id'            => 'sidebar-right',
        'before_widget' => '<aside id="%1$s" class="pb-4 px-4 widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title font-weight-bold">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'tainacan_widgets_sidebar_init' );

/*
* Register Widgets footer
*/
function tainacan_widgets_footer_init() {
    register_sidebar( array(
        'name'          => __( 'Tainacan Sidebar Footer', 'tainacan-theme' ),
        'id'            => 'footer-1',
        'before_widget' => '<li class="border-left-0 border-right-0 tainacan-side"><input type="checkbox" checked><i></i>',
        'after_widget'  => '</li>',
        'before_title'  => '<h6 class="text-white font-weight-bold mb-lg-4">',
        'after_title'   => ' <i class="material-icons mt-2 symbol"></i></h6>',
    ) );
}
add_action( 'widgets_init', 'tainacan_widgets_footer_init' );

/**
 * get Logo function
 *
 * return custom logo or the default logo
 */
function tainacan_get_logo() {
	if (has_custom_logo()) {
		return get_custom_logo();
	} else {
		$html = '<a class="navbar-brand tainacan-logo" href="' . get_bloginfo( 'url' ) . '">';
		$html .= '<img src="' . get_template_directory_uri() . '/assets/images/logo.svg" class="logo" style="width: 150px">';
		$html .= '</a>';
		return $html;
	}
}

/**
 * Change logo class function
 *
 * @param [type] $html
 * @return void
 */
function tainacan_change_logo_class( $html ) {

    $html = str_replace( 'custom-logo-link', 'navbar-brand tainacan-logo', $html );
	$html = str_replace( 'custom-logo', 'logo', $html );

    return $html;
}
add_filter( 'get_custom_logo', 'tainacan_change_logo_class' );

/**
 * Class navwalker
 */
require_once get_template_directory() . '/vendor/class-wp-bootstrap-navwalker.php';

/**
 * Register the menu for use after the banner
 */
register_nav_menus( array(
	'navMenubelowHeader' => __( 'Nav Menu Below Header', 'tainacan-theme' ),
) );

require get_template_directory() . '/functions/enqueues.php';

function tainacan_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

require get_template_directory() . '/functions/customizer.php';
require get_template_directory() . '/functions/pagination.php';
require get_template_directory() . '/functions/single-functions.php';