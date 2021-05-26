<?php
function edit_element_com_commentaire()
{
    global $wpdb;
    $id = $_POST['id'];
    $acf_code_comment = 'field_6098fa68d5970';
    $commentaire = $_POST['commentaire'];
    $post = get_post($id);
        if ( update_field($acf_code_comment, $commentaire, $id) ) {
            // There was an error somewhere and the terms couldn't be set.
            echo 'bravo';
        } else {
            // Success! The post's categories were set.
            echo 'KO!';
        }
   
    echo 'KO!';
    die();
}
add_action( 'wp_ajax_edit_element_com_commentaire', 'edit_element_com_commentaire' );
add_action( 'wp_ajax_nopriv_edit_element_com_commentaire', 'edit_element_com_commentaire' );
