<?php
function cpt_prospects() {
    $labels = array(
        'name'                => _x( 'Prospects', 'Post Type General Name', 'twentytwentyone-child' ),
        'singular_name'       => _x( 'Prospect', 'Post Type Singular Name', 'twentytwentyone-child' ),
        'menu_name'           => __( 'Prospects', 'twentytwentyone-child' ),
        'parent_item_colon'   => __( 'Parent Prospect', 'twentytwentyone-child' ),
        'all_items'           => __( 'All Prospects', 'twentytwentyone-child' ),
        'view_item'           => __( 'View Prospect', 'twentytwentyone-child' ),
        'add_new_item'        => __( 'Add New Prospect', 'twentytwentyone-child' ),
        'add_new'             => __( 'Add New', 'twentytwentyone-child' ),
        'edit_item'           => __( 'Edit Prospect', 'twentytwentyone-child' ),
        'update_item'         => __( 'Update Prospect', 'twentytwentyone-child' ),
        'search_items'        => __( 'Search Prospect', 'twentytwentyone-child' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone-child' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone-child' ),
    );
    $args = array(
        'label'               => __( 'prospects', 'twentytwentyone-child' ),
        'description'         => __( 'Prospects news and reviews', 'twentytwentyone-child' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'categories' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest' => true,
    );
    register_post_type( 'prospects', $args );
}
add_action( 'init', 'cpt_prospects', 0 );

function cpt_financements() {
    $labels = array(
        'name'                => _x( 'Financements', 'Post Type General Name', 'twentytwentyone-child' ),
        'singular_name'       => _x( 'Financement', 'Post Type Singular Name', 'twentytwentyone-child' ),
        'menu_name'           => __( 'Financements', 'twentytwentyone-child' ),
        'parent_item_colon'   => __( 'Parent financement', 'twentytwentyone-child' ),
        'all_items'           => __( 'All financements', 'twentytwentyone-child' ),
        'view_item'           => __( 'View financement', 'twentytwentyone-child' ),
        'add_new_item'        => __( 'Add New financement', 'twentytwentyone-child' ),
        'add_new'             => __( 'Add New', 'twentytwentyone-child' ),
        'edit_item'           => __( 'Edit financement', 'twentytwentyone-child' ),
        'update_item'         => __( 'Update financement', 'twentytwentyone-child' ),
        'search_items'        => __( 'Search financement', 'twentytwentyone-child' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone-child' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone-child' ),
    );
    $args = array(
        'label'               => __( 'financements', 'twentytwentyone-child' ),
        'description'         => __( 'financements news and reviews', 'twentytwentyone-child' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'categories' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest' => true,
    );
    register_post_type( 'financements', $args );
}
add_action( 'init', 'cpt_financements', 0 );

function cpt_publics() {
    $labels = array(
        'name'                => _x( 'Publics', 'Post Type General Name', 'twentytwentyone-child' ),
        'singular_name'       => _x( 'Public', 'Post Type Singular Name', 'twentytwentyone-child' ),
        'menu_name'           => __( 'Publics', 'twentytwentyone-child' ),
        'parent_item_colon'   => __( 'Parent public', 'twentytwentyone-child' ),
        'all_items'           => __( 'All publics', 'twentytwentyone-child' ),
        'view_item'           => __( 'View public', 'twentytwentyone-child' ),
        'add_new_item'        => __( 'Add New public', 'twentytwentyone-child' ),
        'add_new'             => __( 'Add New', 'twentytwentyone-child' ),
        'edit_item'           => __( 'Edit public', 'twentytwentyone-child' ),
        'update_item'         => __( 'Update public', 'twentytwentyone-child' ),
        'search_items'        => __( 'Search public', 'twentytwentyone-child' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone-child' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone-child' ),
    );
    $args = array(
        'label'               => __( 'publics', 'twentytwentyone-child' ),
        'description'         => __( 'Publics news and reviews', 'twentytwentyone-child' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'categories' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest' => true,
    );
    register_post_type( 'publics', $args );
}
add_action( 'init', 'cpt_publics', 0 );


function my_custom_posts() {

    register_post_type( 'landing',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Landing Pages' ),
                'singular_name' => __( 'Landing Page' )
            ),
            'public' => true,
            'menu_position' => -10,
            'taxonomies' => array( 'categories'),
            'menu_icon' => 'dashicons-book-alt',
            'has_archive' => true,
            'rewrite' => array('slug' => 'landing'),
            'show_in_rest' => true,
            'capability_type'     => 'page',

        )
    );

    register_post_type( 'element_com',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Elements de Com' ),
                'singular_name' => __( 'Element de Com' )
            ),
            'public' => true,
            'menu_position' => -10,
            'taxonomies' => array( 'categories'),
            'menu_icon' => 'dashicons-book-alt',
            'has_archive' => true,
            'rewrite' => array('slug' => 'elements_com'),
            'show_in_rest' => true,
            'capability_type'     => 'page',
        )
    );

}
add_action( 'init', 'my_custom_posts', 0 );


