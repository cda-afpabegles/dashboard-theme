<?php
function create_etat_hierarchical_taxonomy() {
    $labels = array(
      'name' => _x( 'Etat', 'taxonomy general name' ),
      'singular_name' => _x( 'Etat', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Etat' ),
      'all_items' => __( 'All Etat' ),
      'parent_item' => __( 'Parent Etat' ),
      'parent_item_colon' => __( 'Parent Etat:' ),
      'edit_item' => __( 'Edit Etat' ), 
      'update_item' => __( 'Update Etat' ),
      'add_new_item' => __( 'Add New Etat' ),
      'new_item_name' => __( 'New Etat Name' ),
      'menu_name' => __( 'Etat' ),
    );    
    register_taxonomy('etats',array('post'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'etat' ),
    ));
  }
  add_action( 'init', 'create_etat_hierarchical_taxonomy', 0 );

  