<?php
/**
 * Widget Areas
 *
 * @package      Wellington Studio Theme
 * @since        1.0
 * @link         http://wellington-studio.com
 * @author       Chris Parsons <wellington-studio.com>
 * @copyright    Copyright (c) 2015, Chris Parsons
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
*/

// Register Sidebar Function
add_action( 'init', 'bfg_register_sidebars' );
function bfg_register_sidebars() {
	// Register Custom Sidebars
	/*genesis_register_sidebar( array(
		'id' => 'home-featured',
		'name' => __( 'Home Featured', 'bootstrap-for-genesis' ),
		'description' => __( 'This is the home featured area. It uses the jumbotron bootstrap section.', 'bootstrap-for-genesis' )
	) );*/

	genesis_register_sidebar( array(
		'id' => 'after-entry',
		'name' => __( 'After Entry', 'theme-prefix' ),
		'description' => __( 'This is the after entry section.', 'theme-prefix' ),
	) );

	genesis_register_sidebar( array(
		'id' => 'frontpage-one',
		'name' => __( 'Front Page One', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content to the 1st widgetized area.', 'bootstrap-for-genesis' )
	));

	genesis_register_sidebar( array(
		'id' => 'frontpage-one-mobile',
		'name' => __( 'Front Page One Mobile', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content to the 1st widgetized area.', 'bootstrap-for-genesis' )
	));

	genesis_register_sidebar( array(
		'id' => 'frontpage-two',
		'name' => __( 'Front Page Two', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content to the 2nd widgetized area.', 'bootstrap-for-genesis' )
	));

	genesis_register_sidebar( array(
		'id' => 'frontpage-two-mobile',
		'name' => __( 'Front Page Two Mobile', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content to the 2nd mobile widgetized area.', 'bootstrap-for-genesis' )
	));

	genesis_register_sidebar( array(
		'id' => 'frontpage-news',
		'name' => __( 'Front Page News', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content next to the NEWS title.', 'bootstrap-for-genesis' )
	));

	genesis_register_sidebar( array(
		'id' => 'frontpage-news-mobile',
		'name' => __( 'Front Page News Mobile', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content next to the Mobile NEWS title.', 'bootstrap-for-genesis' )
	));

	genesis_register_sidebar( array(
		'id' => 'frontpage-three',
		'name' => __( 'Front Page Three', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content to the 3rd widgetized area.', 'bootstrap-for-genesis' )
	));

	genesis_register_sidebar( array(
		'id' => 'frontpage-three-mobile',
		'name' => __( 'Front Page Three Mobile', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content to the 3rd mobile widgetized area.', 'bootstrap-for-genesis' )
	));

	genesis_register_sidebar( array(
		'id' => 'frontpage-four',
		'name' => __( 'Front Page Four', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content to the 4th widgetized area.', 'bootstrap-for-genesis' )
	));

	genesis_register_sidebar( array(
		'id' => 'frontpage-four-mobile',
		'name' => __( 'Front Page Four Mobile', 'bootstrap-for-genesis' ),
		'description' => __( 'Adds content to the 4th mobile widgetized area.', 'bootstrap-for-genesis' )
	));
}
