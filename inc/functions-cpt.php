<?php
/**
*	@package Portfolio
*   ////////////////////
*   // Custom Post Type
*   ////////////////////
* 
*/

	// Custom Post Type
	
    add_action('init', 'chomikoo_init_posttypes');
    
    function chomikoo_init_posttypes(){

        $labels =  array(
            'name'              => __('Projekty'),
            'singular_name'     => __('Projekt'),
            'all_items'         => __('Wszystkie projekty'),
            'add_new'           => __('Dodaj nowy projekt'),
            'add_new_item'      => __('Dodaj nowy projekt'),
            'edit_item'         => __('Edytuj projekt'),
            'new_item'          => __('Nowy projekt'),
            'view_item'         => __('Zobacz projekt'),
            'search_items'      => __('Szukaj w projektach'),
            'not_found'         =>  __('Nie znaleziono żadnych projektów'),
            'not_found_in_trash' => __('Nie znaleziono żadnych projektów w koszu'), 
        );
        
        /*
         * Register Projects Post Type
         */
        $projects_arg = array(
            'labels' => $labels,
            'parent_item_colon' => '',
            'public'                    => true,
            'publicly_queryable'        => true,
            'show_ui'                   => true, 
            'query_var'                 => true,
            'rewrite'                   => true,
            'capability_type'           => 'post',
            'hierarchical'              => false,
            'menu_icon'                 => 'dashicons-media-text',
            'menu_position'             => 5,
            'supports' => array(
                'title','author','thumbnail','excerpt','custom-fields'
            ),
            'has_archive' => true            
        );
        
        register_post_type('projects', $projects_arg);
        
    }

    
    add_action('init', 'chomikoo_init_taxonomies');
    /* register taxonomy*/

    function chomikoo_init_taxonomies(){
 
        // PROJECT TYPE TAXONOMY

        $type_taxonomy_labels = array(
            'name'              => __('Technologia'),
            'singular_name'     => __('Technologia'),
            'search_items'      => __('Wyszukaj technologie'),
            'popular_items'     => __('Najpopularniejsze technologie'),
            'all_items'         => __('Wszystkie technoloie'),
            'most_used_items'   => null,
            'parent_item'       => null,
            'parent_item_colon' => null,
            'edit_item'         => __('Edytuj technologie') ,
            'update_item'       => __('Aktualizuj technologie'),
            'add_new_item'      => __('Dodaj nowy technologie'),
            'new_item_name'     => __('Nazwa nowego technologie'),
            'separate_items_with_commas'    => __('Oddziel technologie przecinkiem'),
            'add_or_remove_items'           => __('Dodaj lub usuń technologie'),
            'choose_from_most_used'         => __('Wybierz spośród najczęścież używanych typów'),
            'menu_name'                     => __('Technologie'),
        );
        // Type
        register_taxonomy(
            'technology',
            array('projects'),
            array(
                'hierarchical' => true,
                'labels' => $type_taxonomy_labels,
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'type' )
        ));

        // Categories in portfolio 

        // Type
        register_taxonomy(
            'category',
            array('projects'),
            array(
                'hierarchical' => true,
                'label' => __( 'Kategoria' ),
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'prcategory' )
        ));
    }