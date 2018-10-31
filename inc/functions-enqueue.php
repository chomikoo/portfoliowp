<?php 
/**
*
*	@package Portfolio
*
*
*	=========================
*	FRONT END ENQUEUE FUNCTIONS 
*	=========================
**/

function chomikoo_load_scripts() {
	// $ver = time();
	$ver = '1.1.a';
	wp_enqueue_style( 'styles', THEME_URL . '/dist/css/style.min.css', array(), $ver, 'all' );
	wp_deregister_script( 'jquery' );
	//build
	// wp_enqueue_script( 'myscript', THEME_URL . '/dist/js/main.min.js', array(), $ver, true  );
	// wp_enqueue_script( 'jq', THEME_URL . '/src/js/jquery.js', array(), $ver, true  );
	// wp_enqueue_script( 'sr', THEME_URL . '/src/js/vendors/scrollreveal.js', array(), $ver, true  );
	wp_enqueue_script( 'myscript', THEME_URL . '/dist/js/main.min.js', array(), $ver, true  );
}
add_action( 'wp_enqueue_scripts', 'chomikoo_load_scripts' );