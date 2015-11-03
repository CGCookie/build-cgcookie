<?php

/*
*	Main class responsible for theme related functions not suitable for CGC Core plugin
*	@since 5.0
*/

class buildCGCookie {

	function __construct(){

		// Set some constants
		define('CGC_BUILD_THEME_VERSION', '1.0');

		define('CGC_BUILD_THEME_DIR', get_template_directory());
		define('CGC_BUILD_THEME_URL', get_template_directory_uri());

		add_action('after_setup_theme',		array($this,'theme_setup'));

		add_action('wp_enqueue_scripts',	array($this,'styles'));
		add_action( 'wp_head', 				array($this,'typekit'));

	}

	/**
	*
	*	Theme specific functionality like registering sidebars, widgets, image sizes, etc
	*
	*	@since 5.0
	*/
	function theme_setup(){

		// sidebars
		register_sidebars(1, array(
			'name' => 'Main Sidebar',
			'id'	=> "main-sidebar",
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
	    ));

		// custom nav menus
		register_nav_menus(
			array(
			  'public' => 'Public',
			  'private'	=>	'Logged In'
			)
		);
	}

	function styles(){

		wp_enqueue_style('cgc5--build__style', get_stylesheet_directory_uri().'/assets/css/style.css', CGC_BUILD_THEME_VERSION, true);

	}

	/**
	*	Load Typekit
	*	@since 5.0
	*/
	function typekit(){
		?>
		<script src="//use.typekit.net/nxp8kyf.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		<?php
	}
}
new buildCGCookie;









