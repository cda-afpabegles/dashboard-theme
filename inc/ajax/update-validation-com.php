<?php
function edit_element_com()
{
    global $wpdb;
    $id = $_POST['id'];
    $acf_code_valid = 'field_6098fb12d5975';
    $validation = $_POST['validation'];
    $post = get_post($id);
    if ( update_field($acf_code_valid, $validation, $id) ) {
            echo 'bravo';
    } else {
        // Success! The post's categories were set.
        echo 'KO!';
    }
    echo 'KO!';
    die();
}
add_action( 'wp_ajax_edit_element_com', 'edit_element_com' );
add_action( 'wp_ajax_nopriv_edit_element_com', 'edit_element_com' );
