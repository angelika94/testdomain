<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Enqueue scripts and styles.
 */
function twentyseventeenchild_scripts() {

	if ( is_rtl() ) {
		wp_enqueue_style( 'style-rtl', get_theme_file_uri( '/assets/css/style-rtl.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_enqueue_script( 'script-rtl', get_theme_file_uri( '/assets/js/script-rtl.js' ), array( 'jquery' ),  '1.0' );
	}

	wp_enqueue_script( 'popup', get_theme_file_uri( '/assets/js/popup.js' ), array( 'jquery' ), '1.0' );

}
add_action( 'wp_enqueue_scripts', 'twentyseventeenchild_scripts' );

function my_custom_post_books() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name' ),
		'singular_name'      => _x( 'Book', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Book' ),
		'edit_item'          => __( 'Edit Book' ),
		'new_item'           => __( 'New Book' ),
		'all_items'          => __( 'All Books' ),
		'view_item'          => __( 'View Books' ),
		'search_items'       => __( 'Search Books' ),
		'not_found'          => __( 'No books found' ),
		'not_found_in_trash' => __( 'No books found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Books'
		);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our books and book specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
		);
	register_post_type( 'books', $args ); 
}
add_action( 'init', 'my_custom_post_books' );

function my_taxonomies_books() {
	$labels = array(
		'name'              => _x( 'Book Genres', 'taxonomy general name' ),
		'singular_name'     => _x( 'Book Genre', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Book Genres' ),
		'all_items'         => __( 'All Book Genres' ),
		'parent_item'       => __( 'Parent Book Genre' ),
		'parent_item_colon' => __( 'Parent Book Genre:' ),
		'edit_item'         => __( 'Edit Book Genre' ), 
		'update_item'       => __( 'Update Book Genre' ),
		'add_new_item'      => __( 'Add New Book Genre' ),
		'new_item_name'     => __( 'New Book Genre' ),
		'menu_name'         => __( 'Book Genre' ),
		);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		);
	register_taxonomy( 'book_genre', 'books', $args );
}
add_action( 'init', 'my_taxonomies_books', 0 );


/**
 * Reorder single product hooks.
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 50 );
