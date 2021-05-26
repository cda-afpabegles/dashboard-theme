<?php
function edit_etat()
{
    global $wpdb;
    $id = $_POST['id'];
    $etat = $_POST['etat'];
    $post = get_post($id);

    $etat_update = wp_set_object_terms( $id, $etat, 'etats', false );
 
    if ( is_wp_error( $etat_update ) ) {
        // There was an error somewhere and the terms couldn't be set.
        echo 'error';
    } else {
        // Success! The post's categories were set.
        echo 'bravo!';
    }
    
    die();
}
add_action( 'wp_ajax_edit_etat', 'edit_etat' );
add_action( 'wp_ajax_nopriv_edit_etat', 'edit_etat' );
