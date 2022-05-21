<?php

/**
 * This file adds the Front Page Template to Wellington Studio Theme
 */


add_filter( 'body_class', 'io_front_page_body_class' );
/**
 * Adds a css class to the body element
 *
 * @param  array $classes the current body classes
 * @return array $classes modified classes
 */
function io_front_page_body_class( $classes ) {
  $classes[] = 'front-page';
  return $classes;
}

// Front Page Hero Section
add_action( 'genesis_before_content_sidebar_wrap', 'add_slider_front_page', 10 );
function add_slider_front_page() {
  $default 			= '';
  $videoUrl			= get_theme_mod('hero_video_url', $default );
  $hero_h1 			= get_theme_mod('hero_h1', $default );
  $hero_desc		= get_theme_mod('hero_desc', $default );
  $wst_slider1		= get_theme_mod('wst_slider1', $default );
  ?>
	<?php if ( is_plugin_active( 'revslider/revslider.php' ) ) : ?>
	<?php echo do_shortcode('[rev_slider alias="100-slider"][/rev_slider]'); ?>
	<?php elseif($videoUrl !== $default ) : ?>
	<div id="hero-section">
	  <div id="header-video" >
		<div class="overlay"></div>
		<video class="embed-responsive" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">';
		  <source src="<?php echo $videoUrl; ?>" type="video/mp4">
		</video>
		<div class="container h-100">
		  <div class="d-flex h-100 text-center align-items-center">
			<div class="w-100 text-white">
			  <h1 class="display-3"><?php if($hero_h1 !== $default){echo $hero_h1;} ?></h1>
			  <p class="lead mb-0"><?php if($hero_desc !== $default){echo $hero_desc;} ?></p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<?php elseif($wst_slider1 !== $default) :
	    include (get_stylesheet_directory() . '/inc/fp-hero-slider.php');
	elseif($videoUrl == $default && $wst_slider1 == $default ) :
		include (get_stylesheet_directory() . '/inc/portrait-slider.php');
   	endif;
 }

add_action( 'genesis_before_content', 'mid_page_slider', 15 );
function mid_page_slider() {
  $firstImage = get_theme_mod('wst_mid_slider1');
  if($firstImage !== '') {
	 include 'inc/fp-mid-slider.php';
	}
}

// Adds Sub Naviagtion Menu Function => /lib/nav.php
add_action('genesis_before_content_sidebar_wrap', 'sub_nav_menu', 15 );


add_action( 'genesis_before_loop', 'io_front_page_latest_posts' );
function io_front_page_latest_posts() {

  // The Query
  $the_query = new WP_Query( array(
	  'order'          => 'DESC',
	  'orderby'       => 'date',
	  'no_found_rows'  => true,
	  'posts_per_page' => 6
  ) );

  // The Loop
  if ( $the_query->have_posts() ) {
	echo '	<div id="news-title" class="container-fluid">
			<div class="row pl pr">

			<div class="col-md-5 text-center left-col">
			<h2 class="display-5">NEWS</h2>
			</div>
			<div class="col-md-7 right-col">';

			if ( is_active_sidebar( 'frontpage-news' ) ) : ?>
    		<div id="news-widget-area" class="chw-widget-area widget-area col-9" role="complementary">
    		<?php dynamic_sidebar( 'frontpage-news' ); ?>
    		</div>
 			<?php endif;

		  	/*if ( is_active_sidebar( 'frontpage-news-mobile' ) ) : ?>
			  <div id="news-widget-area-mobile" class="chw-widget-area widget-area col-9" role="complementary">
				  <?php dynamic_sidebar( 'frontpage-news-mobile' ); ?>
			  </div>
		  	<?php endif;*/

	echo '	</div>
			</div>
			</div>';


	echo '<div id="news-wrapper" class="container-fluid"><div id="fp-news" class="news-fp mt row justify-content-center">';

	while ( $the_query->have_posts() ) {
	  $the_query->the_post();

	  echo '<div class="news-excerpt col-md-4">';

	  if ( $image = genesis_get_image( 'format=url&size=featured-image' ) ) {
		printf( '<div class="featured-image"><a href="%s" rel="bookmark"><img src="%s" alt="%s" /></a></div>', get_permalink(), $image, the_title_attribute( 'echo=0' ) );
	  }

	  echo '<h3><a href="';
	  echo esc_url( the_permalink() );
	  echo '">';
	  echo get_the_title();
	  echo '</a></h3>';

	  echo '</div>';
	}
	echo '</div></div>';

	/* Restore original Post Data */
	wp_reset_postdata();
  } else {
	 echo 'no posts found';
  }
}

remove_action( 'genesis_loop', 'genesis_do_loop' );
//add_action( 'genesis_loop', 'child_grid_loop_helper' );
/** Add support for Genesis Grid Loop **/
function child_grid_loop_helper() {

  if ( function_exists( 'genesis_grid_loop' ) ) {
	remove_action( 'genesis_before_post_content', 'generate_post_image', 5 );
	genesis_grid_loop( array(
		'features'              => 2,
		'feature_image_size'    => 'large',
		'feature_image_class'   => 'aligncenter post-image',
		'feature_content_limit' => 0,
		'grid_image_size'       => 'grid',
		'grid_image_class'      => 'alignleft post-image',
		'grid_content_limit'    => 0,
		'more'                  => __( 'Continue reading...', 'genesis' ),
		'posts_per_page'        => 3,
	) );
  } else {
	genesis_standard_loop();
  }
}

genesis();
