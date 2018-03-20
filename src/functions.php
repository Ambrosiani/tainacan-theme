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

        $custom_header_support = array(// The default header text color.
            'default-text-color' => '212529',
            'wp-head-callback' => 'tainacan_header_style',
        );
        add_theme_support( 'custom-header', $custom_header_support );

        if ( ! function_exists( 'get_custom_header' ) ) {
            // This is all for compatibility with versions of WordPress prior to 3.4.
            define( 'HEADER_TEXTCOLOR', $custom_header_support['default-text-color'] );
        }
        
        add_theme_support( 'html5', array( 'comment-list' , 'comment-form') );
        add_theme_support( 'post-thumbnails' );
		
		$header_args = array(
			'default-image'      => get_template_directory_uri() . '/assets/images/capa.png',
			'default-text-color' => '000',
			'header-text'		 => true,
			'width'              => 1280,
			'height'             => 280,
			'flex-width'         => false,
			'flex-height'        => true,
		);
		add_theme_support( 'custom-header', $header_args );
		
		$logo_args = array(
			'height'      => 25,
			'width'       => 400,
			'flex-height' => false,
			'flex-width'  => true,
		);
		add_theme_support( 'custom-logo', $logo_args );
		
        /**
         * Desabilita o FTP na instalação de Plugins - Lembrar de retirar!!
         */
        define('FS_METHOD', 'direct');
		
    }

}
add_action( 'after_setup_theme', 'tainacan_setup' );

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


function tainacan_change_logo_class( $html ) {

    $html = str_replace( 'custom-logo-link', 'navbar-brand tainacan-logo', $html );
	$html = str_replace( 'custom-logo', 'logo', $html );

    return $html;
}
add_filter( 'get_custom_logo', 'tainacan_change_logo_class' );

require get_template_directory() . '/functions/enqueues.php';
require get_template_directory() . '/functions/customize.php';
require get_template_directory() . '/functions/pagination.php';
require get_template_directory() . '/functions/single-functions.php';

function wpdocs_excerpt_more( $more ) {
    return sprintf( '<p><a class="read-more float-right" href="%1$s">%2$s</a></p>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'tainacan-theme' ).'...'
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );