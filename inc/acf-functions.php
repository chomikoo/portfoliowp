<?php
/**
*	@package Smacznego
*   ////////////////////
*   // Custom Post Type
*   ////////////////////
* 
*/


add_filter('acf/settings/save_json', 'chomikoo_acf_json_save_point');

function chomikoo_acf_json_save_point( $path ) {
      // update path
      $path = plugin_dir_path( __DIR__ ) . '/acf-json';
      // return
      return $path;
}


add_filter('acf/settings/load_json', 'chomikoo_acf_json_load_point');

function chomikoo_acf_json_load_point( $paths ) {
      // append path
      $paths[] = plugin_dir_path( __DIR__ ) . '/acf-json';
      // return
      return $paths;
}