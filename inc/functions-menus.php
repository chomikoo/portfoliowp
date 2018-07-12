<?php
/**
*	@package Portfolio
*   ////////////////////
*   // Menus
*   ////////////////////
* 
*/
	// Register Menu
	function chomikoo_custom_menu() {
	  register_nav_menus(
	  	array(
	  	'top-menu' => __( 'Top_menu' )
	  	)
	  );
	}
	add_action( 'init', 'chomikoo_custom_menu' );


