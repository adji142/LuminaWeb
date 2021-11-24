<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package dustrial
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function dustrial_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'dustrial_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function dustrial_jetpack_setup
add_action( 'after_setup_theme', 'dustrial_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function dustrial_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function dustrial_infinite_scroll_render
