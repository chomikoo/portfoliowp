<?php 
	/**
	* @package Portfolio
	=========================
	BACKEND/ADMIN ENQUEUE FUNCTIONS 
	=========================
	*/

// function chomikoo_load_admin_scripts( $hook ) {	
// 	// echo 'q q q q q q q q q q q q q q  q q q q q q q w w  w e e e e e e e e e e e             ' . $hook;
// 	$ver = '1.0.0';
	
// 	if( 'toplevel_page_chomikoo_theme' == $hook ) {

// 		wp_register_style( 'chomikoo_admin', THEME_URL . 'css/admin_styles.css', array(), $ver, 'all' );
// 		wp_enqueue_style( 'chomikoo_admin' );

// 		wp_enqueue_media();

// 		wp_register_script( 'chomikoo_admin_script', THEME_URL . 'scripts/admin_script.js', array( 'jquery' ), $ver, true );
// 		wp_enqueue_script( 'chomikoo_admin_script' );

// 	} else if ( 'myblog_page_chomikoo_theme_css' == $hook ) {
		
// 		wp_enqueue_style( 'ace', THEME_URL . 'css/admin_styles_ace.css', array(), $ver, 'all' );
// 		wp_enqueue_script( 'ace', THEME_URL . 'scripts/ace/ace.js', array( 'jquery' ), $ver, true );
// 		wp_enqueue_script( 'chomikoo_custom_css_script', THEME_URL . 'scripts/admin_script_css.js', array( 'jquery' ), $ver, true);

// 	} else {
		
// 		return;

// 	}

// }

// add_action( 'admin_enqueue_scripts', 'chomikoo_load_admin_scripts' );


	/**
	=========================
	FRONT END ENQUEUE FUNCTIONS 
	=========================
	*/

function chomikoo_load_scripts() {

	$ver = time();

	wp_enqueue_style( 'styles', THEME_URL . '/dist/css/style.min.css', array(), $ver, 'all' );

	wp_deregister_script( 'jquery' );

	//build

	// wp_enqueue_script( 'myscript', THEME_URL . '/dist/js/main.min.js', array(), $ver, true  );
	wp_enqueue_script( 'jq', THEME_URL . '/src/js/jquery.js', array(), $ver, true  );
	wp_enqueue_script( 'sr', THEME_URL . '/src/js/vendors/scrollreveal.js', array(), $ver, true  );


	wp_enqueue_script( 'myscript', THEME_URL . '/src/js/script.js', array(), $ver, true  );



}

add_action( 'wp_enqueue_scripts', 'chomikoo_load_scripts' );