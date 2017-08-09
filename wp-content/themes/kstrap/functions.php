<?php
/**
 * @package KMA
 * @subpackage kstrap
 * @since 1.0
 * @version 1.2
 */

require ( 'vendor/autoload.php' );
require ( 'inc/bootstrap-wp-navwalker.php' );
require ( 'inc/cpt.php' );
require ( 'inc/loadmodules.php' );

if ( ! function_exists( 'kstrap_setup' ) ) :

function kstrap_setup() {

	load_theme_textdomain( 'kstrap', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'mobile-menu'    => esc_html__( 'Mobile Menu', 'kstrap' ),
		'footer-menu'    => esc_html__( 'Footer Menu', 'kstrap' ),
		'main-menu'      => esc_html__( 'Main Navigation', 'kstrap' )
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	) );

	function kstrap_inline() {?>
		<style type="text/css">
			<?php echo file_get_contents(get_template_directory() . '/style.css'); ?>
		</style>
	<?php }
	add_action( 'wp_head', 'kstrap_inline' );

	wp_register_script( 'scripts', get_template_directory_uri() . '/app.js', array(), '0.0.1', true );

	//Add meta boxes for contact info to home page
    $frontpage_id = get_option('page_on_front');
    if ( isset( $_GET['post'] ) ) {
        $post_id = intval( $_GET['post'] );
    } elseif (isset( $_POST['post_ID'] ) ) {
        $post_id = intval( $_POST['post_ID'] );
    } else {
        $post_id = 0;
    }

    if ( is_admin() && $post_id != 0 ) {

        if ($post_id == $frontpage_id) {

            $page = new Custom_Post_Type('Page');
            $page->add_meta_box(
                'Contact Information',
                array(
                    'Phone Number' => 'text',
                    'Address' => 'longtext',
                    'FAIA Logo' => 'image',
                    'Trusted Choice Logo' => 'image'
                )
            );
        }
    }

}
endif;
add_action( 'after_setup_theme', 'kstrap_setup' );

function kstrap_scripts() {
	wp_enqueue_script( 'scripts' );
	//wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'kstrap_scripts' );


