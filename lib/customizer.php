<?php
/**
 * Customizer
 *
 * @package      Wellington Studio Theme
 * @since        1.0
 * @link         http://wellington-studio.com
 * @author       Chris Parsons <wellington-studio.com>
 * @copyright    Copyright (c) 2017, Chris Parsons
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
 */

add_action( 'customize_register', function( $wp_customize ) {

 include 'customizer-sections/hero-video-options.php';
 include 'customizer-sections/portrait-slider-options.php';
 include 'customizer-sections/fp-hero-slider-options.php';
 include 'customizer-sections/sub-nav-options.php';
 include 'customizer-sections/fp-mid-slider-options.php';
 include 'customizer-sections/modal-options.php';
 include 'customizer-sections/side-nav-logo.php';


 // Add Default Settings
 $wp_customize->add_setting( 'bootstrap-for-genesis', array(
	 'capability' => 'edit_theme_options',
	 'type' => 'theme_mod'
 ) );

 // Add Wellington Studio Panel
 $wp_customize->add_panel( 'wellington-studio-theme', array(
	 'title' => __( '100 Black Men Theme', 'bootstrap-for-genesis' ),
	 'priority' => 100
 ) );



 // Add Navigation Section
 $wp_customize->add_section( 'navigation', array(
	 'title' => __( 'Top Navigation Settings', 'bootstrap-for-genesis' ),
	 'priority' => 10,
	 'panel' => 'wellington-studio-theme'
 ) );

 //* Add Navigation Controls
 $wp_customize->add_setting( 'navposition', array(
	 'default' => ''
 ) );

 $wp_customize->add_control( 'navposition', array(
	 'type' => 'select',
	 'priority' => 10,
	 'label' => __( 'Top Navigation Position', 'bootstrap-for-genesis' ),
	 'section' => 'navigation',
	 'choices' => array(
		 '' => __( 'Default', 'bootstrap-for-genesis' ),
		 'sticky-top' => __( 'Sticky Top', 'bootstrap-for-genesis' ),
		 'fixed-top' => __( 'Fixed Top', 'bootstrap-for-genesis' ),
		 'fixed-bottom' => __( 'Fixed Bottom', 'bootstrap-for-genesis' ),
	 )
 ) );

 $wp_customize->add_setting( 'navcontainer', array(
	 'default' => 'lg'
 ) );

 // Navigation Container
 $wp_customize->add_control( 'navcontainer', array(
	 'type' => 'select',
	 'priority' => 20,
	 'label' => __( 'Top Navigation Container', 'bootstrap-for-genesis' ),
	 'section' => 'navigation',
	 'choices' => array(
		 'sm' => __( 'Small', 'bootstrap-for-genesis' ),
		 'md' => __( 'Medium', 'bootstrap-for-genesis' ),
		 'lg' => __( 'Large', 'bootstrap-for-genesis' ),
		 'xl' => __( 'Extra Large', 'bootstrap-for-genesis' )
	 )
 ) );

 // Navigation Color
 $wp_customize->add_setting( 'navcolor', array(
	 'default' => 'dark'
 ) );

 $wp_customize->add_control( 'navcolor', array(
	 'type' => 'select',
	 'priority' => 30,
	 'label' => __( 'Top Navigation Background', 'bootstrap-for-genesis' ),
	 'section' => 'navigation',
	 'choices' => array(
		 'light' => __( 'Light', 'bootstrap-for-genesis' ),
		 'dark' => __( 'Dark', 'bootstrap-for-genesis' ),
		 'primary' => __( 'Primary', 'bootstrap-for-genesis' ),
		 'transparent' => __('Transparent', 'bootstrap-for-genesis')
	 )
 ) );

 // Navigation Extras
 $wp_customize->add_setting( 'navextra', array(
	 'default' => 'search'
 ) );

 $wp_customize->add_control( 'navextra', array(
	 'type' => 'select',
	 'priority' => 40,
	 'label' => __( 'Navigation Extras', 'bootstrap-for-genesis' ),
	 'section' => 'navigation',
	 'choices' => array(
		 '' => __( 'None', 'bootstrap-for-genesis' ),
		 'date' => __( 'Date', 'bootstrap-for-genesis' ),
		 'search' => __( 'Search Form', 'bootstrap-for-genesis' ),
		 'widget' => __( 'Widget Area', 'bootstrap-for-genesis' )
	 )
 ) );

 // Container Layout
 $wp_customize->add_section( 'container-layout', array(
	 'title' => __( 'Container Layout', 'bootstrap-for-genesis' ),
	 'priority' => 40,
	 'panel' => 'wellington-studio-theme'
 ) );

 $wp_customize->add_setting( 'container', array(
	 'default' => 'boxed',
 ) );

 $wp_customize->add_control( 'container', array(
	 'type' => 'select',
	 'priority' => 30,
	 'label' => __( 'Container Settings', 'bootstrap-for-genesis' ),
	 'section' => 'container-layout',
	 'choices' => array(
		 'fluid' => __( 'Fluid Layout', 'bootstrap-for-genesis' ),
		 'boxed' => __( 'Boxed Layout', 'bootstrap-for-genesis' )
	 )
 ) );

 // Footer Section
 $wp_customize->add_section( 'footer', array(
	 'title' => __( 'Footer Section', 'bootstrap-for-genesis' ),
	 'priority' => 40,
	 'panel' => 'wellington-studio-theme'
 ) );

 $wp_customize->add_setting( 'footerwidgetbg', array(
	 'default' => 'dark'
 ) );

 $wp_customize->add_control( 'footerwidgetbg', array(
	 'type' => 'select',
	 'priority' => 30,
	 'label' => __( 'Footer Widget Background', 'bootstrap-for-genesis' ),
	 'section' => 'footer',
	 'choices' => array(
		 'light' => __( 'Light', 'bootstrap-for-genesis' ),
		 'dark' => __( 'Dark', 'bootstrap-for-genesis' ),
		 'primary' => __( 'Primary', 'bootstrap-for-genesis' )
	 )
 ) );

 $wp_customize->add_setting( 'footerbg', array(
	 'default' => 'dark'
 ) );

 $wp_customize->add_control( 'footerbg', array(
	 'type' => 'select',
	 'priority' => 30,
	 'label' => __( 'Footer Background', 'bootstrap-for-genesis' ),
	 'section' => 'footer',
	 'choices' => array(
		 'light' => __( 'Light', 'bootstrap-for-genesis' ),
		 'dark' => __( 'Dark', 'bootstrap-for-genesis' ),
		 'primary' => __( 'Primary', 'bootstrap-for-genesis' )
	 )
 ) );
});
