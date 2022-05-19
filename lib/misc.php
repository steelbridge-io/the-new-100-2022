<?php
/**
 * Miscellaneous
 *
 * @package      Wellington Studio Theme
 * @since        1.0
 * @link         http://wellington-studio.com
 * @author       Chris Parsons <wellington-studio.com>
 * @copyright    Copyright (c) 2015, Chris Parsons
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
*/

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );


// Custom Image Function
function bfg_post_image() {
	global $post;
	$image = '';
	$image_id = get_post_thumbnail_id( $post->ID );
	$image = wp_get_attachment_image_src( $image_id, 'full' );
	$image = $image[0];
	if ( $image ) return $image;
	return bfg_get_first_image();
}

// Get the First Image Attachment Function
function bfg_get_first_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
	$first_img = "";
	if ( isset( $matches[1][0] ) )
		$first_img = $matches[1][0];
	return $first_img;
}

// Custom Meta
add_action( 'genesis_meta', 'bfg_do_meta' );
function bfg_do_meta() {
	// Jumbotron
	if ( is_front_page() && is_active_sidebar( 'home-featured' ) ) add_action( 'genesis_header', 'bfg_do_home_featured' );
	if ( is_front_page() && is_active_sidebar( 'frontpage-one' ) ) add_action( 'genesis_before_content', 'wst_do_frontpage_one' );
	if ( is_front_page() && is_active_sidebar( 'frontpage-one-mobile' ) ) add_action( 'genesis_before_content', 'wst_do_frontpage_one_mobile' );
	//if ( is_front_page() && is_active_sidebar( 'frontpage-two' ) ) add_action( 'genesis_after_content', 'wst_do_frontpage_two', 10 );
	if ( is_front_page() && is_active_sidebar( 'frontpage-two' ) ) add_action( 'loop_start', 'wst_do_frontpage_two', 5 );
	if ( is_front_page() && is_active_sidebar( 'frontpage-two-mobile' ) ) add_action( 'loop_start', 'wst_do_frontpage_two_mobile', 5 );
	if ( is_front_page() && is_active_sidebar( 'frontpage-three' ) ) add_action( 'genesis_after_content', 'wst_do_frontpage_three', 15 );
	if ( is_front_page() && is_active_sidebar( 'frontpage-three-mobile' ) ) add_action( 'genesis_after_content', 'wst_do_frontpage_three_mobile', 15 );
	if ( is_front_page() && is_active_sidebar( 'frontpage-four' ) ) add_action( 'genesis_after_content', 'wst_do_frontpage_four', 20 );
	if ( is_front_page() && is_active_sidebar( 'frontpage-four-mobile' ) ) add_action( 'genesis_after_content', 'wst_do_frontpage_four_mobile', 20 );

	// Body Class
	add_filter( 'body_class', 'bfg_body_class' );
}

// Jumbotron
function bfg_do_home_featured() {
	genesis_markup( array(
		'open' => '<div %s>',
		'context' => 'home-featured'
	) );

	genesis_structural_wrap( 'home-featured' );

	genesis_widget_area( 'home-featured', array(
		'before' => '',
		'after' => ''
	) );

	genesis_structural_wrap( 'home-featured', 'close' );

	genesis_markup( array(
		'close' => '</div>',
		'context' => 'home-featured'
	) );
}

// Front Page Widget One
function wst_do_frontpage_one() {
	genesis_markup( array(
		'open' => '<div id="front-page-one-open" %s>',
		'context' => 'frontpage-one'
	) );

	genesis_structural_wrap( 'frontpage-one' );

	genesis_widget_area( 'frontpage-one', array(
		'before' => '<div class="container">',
		'after' => '</div>'
	) );

	genesis_structural_wrap( 'frontpage-one', 'close' );

	genesis_markup( array(
		'close' => '</div>',
		'context' => 'frontpage-one'
	) );
}

// Front Page Widget One - Mobile
function wst_do_frontpage_one_mobile() {
	genesis_markup( array(
		'open' => '<div id="front-page-one-mobile-open" %s>',
		'context' => 'frontpage-one-mobile'
	) );

	genesis_structural_wrap( 'frontpage-one-mobile' );

	genesis_widget_area( 'frontpage-one-mobile', array(
		'before' => '<div class="container-fluid">',
		'after' => '</div>'
	) );

	genesis_structural_wrap( 'frontpage-one-mobile', 'close' );

	genesis_markup( array(
		'close' => '</div>',
		'context' => 'frontpage-one-mobile'
	) );
}

// Front Page Widget Two
function wst_do_frontpage_two() {
	genesis_markup( array(
		'open' => '<div id="front-page-two-open" %s>',
		'context' => 'frontpage-two'
	) );

	genesis_structural_wrap( 'frontpage-two' );

	genesis_widget_area( 'frontpage-two', array(
		'before' => '<div class="container">',
		'after' => '</div>'
	) );

	genesis_structural_wrap( 'frontpage-two', 'close' );

	genesis_markup( array(
		'close' => '</div>',
		'context' => 'frontpage-two'
	) );
}

// Front Page Widget Two - Mobile
function wst_do_frontpage_two_mobile() {
	genesis_markup( array(
		'open' => '<div id="front-page-two-mobile-open" %s>',
		'context' => 'frontpage-two-mobile'
	) );

	genesis_structural_wrap( 'frontpage-two-mobile' );

	genesis_widget_area( 'frontpage-two-mobile', array(
		'before' => '<div class="container">',
		'after' => '</div>'
	) );

	genesis_structural_wrap( 'frontpage-two-mobile', 'close' );

	genesis_markup( array(
		'close' => '</div>',
		'context' => 'frontpage-two-mobile'
	) );
}

// Front Page Widget Three
function wst_do_frontpage_three() {
	genesis_markup( array(
		'open' => '<div id="front-page-three-open" %s>',
		'context' => 'frontpage-three'
	) );

	genesis_structural_wrap( 'frontpage-three' );

	genesis_widget_area( 'frontpage-three', array(
		'before' => '<div class="container-fluid">',
		'after' => '</div>'
	) );

	genesis_structural_wrap( 'frontpage-three', 'close' );

	genesis_markup( array(
		'close' => '</div>',
		'context' => 'frontpage-three'
	) );
}

// Front Page Widget Three - Mobile
function wst_do_frontpage_three_mobile() {
	genesis_markup( array(
		'open' => '<div id="front-page-three-mobile-open" %s>',
		'context' => 'frontpage-three-mobile'
	) );

	genesis_structural_wrap( 'frontpage-three-mobile' );

	genesis_widget_area( 'frontpage-three-mobile', array(
		'before' => '<div class="container-fluid">',
		'after' => '</div>'
	) );

	genesis_structural_wrap( 'frontpage-three-mobile', 'close' );

	genesis_markup( array(
		'close' => '</div>',
		'context' => 'frontpage-three-mobile'
	) );
}

// Front Page Widget Four
function wst_do_frontpage_four() {
	genesis_markup( array(
		'open' => '<div id="front-page-four-open" %s>',
		'context' => 'frontpage-four'
	) );

	genesis_structural_wrap( 'frontpage-four' );

	genesis_widget_area( 'frontpage-four', array(
		'before' => '<div class="container-fluid">',
		'after' => '</div>'
	) );

	genesis_structural_wrap( 'frontpage-four', 'close' );

	genesis_markup( array(
		'close' => '</div>',
		'context' => 'frontpage-four'
	) );
}

// Front Page Widget Four - Mobile
function wst_do_frontpage_four_mobile() {
	genesis_markup( array(
		'open' => '<div id="front-page-four-mobile-open" %s>',
		'context' => 'frontpage-four-mobile'
	) );

	genesis_structural_wrap( 'frontpage-four-mobile' );

	genesis_widget_area( 'frontpage-four-mobile', array(
		'before' => '<div class="container-fluid">',
		'after' => '</div>'
	) );

	genesis_structural_wrap( 'frontpage-four-mobile', 'close' );

	genesis_markup( array(
		'close' => '</div>',
		'context' => 'frontpage-four-mobile'
	) );
}

// Body Class
function bfg_body_class( $args ) {
	if ( is_page_template( 'page_blog.php' ) )
		$args[] = 'blog';

	return $args;
}
