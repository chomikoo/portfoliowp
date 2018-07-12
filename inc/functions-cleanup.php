<?php

/*
	
@package MyBlog
	
	========================
	THEME SUPPORT OPTIONS
	========================
*/

// remove ver string ,from js and css
function chomikoo_remove_wp_version_strings( $src ) {

    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;

}

add_filter( 'script_loader_src', 'chomikoo_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'chomikoo_remove_wp_version_strings' );


// Remove metatag generator from header

function chomikoo_remove_meta_version() {
	return '';
}
add_filter( 'the_generator', 'chomikoo_remove_meta_version' );












