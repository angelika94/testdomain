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
	}

	wp_enqueue_script( 'popup', get_theme_file_uri( '/assets/js/popup.js' ), array( 'jquery' ), '1.0' );

}
add_action( 'wp_enqueue_scripts', 'twentyseventeenchild_scripts' );
