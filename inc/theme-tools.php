<?php


function getContrastColor($hexColor) 
{

        // hexColor RGB
        $R1 = hexdec(substr($hexColor, 1, 2));
        $G1 = hexdec(substr($hexColor, 3, 2));
        $B1 = hexdec(substr($hexColor, 5, 2));

        // Black RGB
        $blackColor = "#000000";
        $R2BlackColor = hexdec(substr($blackColor, 1, 2));
        $G2BlackColor = hexdec(substr($blackColor, 3, 2));
        $B2BlackColor = hexdec(substr($blackColor, 5, 2));

         // Calc contrast ratio
         $L1 = 0.2126 * pow($R1 / 255, 2.2) +
               0.7152 * pow($G1 / 255, 2.2) +
               0.0722 * pow($B1 / 255, 2.2);

        $L2 = 0.2126 * pow($R2BlackColor / 255, 2.2) +
              0.7152 * pow($G2BlackColor / 255, 2.2) +
              0.0722 * pow($B2BlackColor / 255, 2.2);

        $contrastRatio = 0;
        if ($L1 > $L2) {
            $contrastRatio = (int)(($L1 + 0.05) / ($L2 + 0.05));
        } else {
            $contrastRatio = (int)(($L2 + 0.05) / ($L1 + 0.05));
        }

        // If contrast is more than 5, return black color
        if ($contrastRatio > 5) {
            return '#000000';
        } else { 
            // if not, return white color.
            return '#FFFFFF';
        }
}


function dateToGantt($start, $length){
    return $start.'/'.$length;
}









function redirect_user_page_list( $post_ID, $post, $update ) {
	if( is_user_logged_in() ) {
    	       $user = wp_get_current_user();
    	       $role = ( array ) $user->roles;
    	       if ( 'user_role' == $role[0] ) {
                    $url = '';
	            wp_redirect($url);
	            exit;
    	       }
        }
}
add_action( 'save_post', 'redirect_user_page_list', 10, 3 );







// Deal with images uploaded from the front-end while allowing ACF to do it’s thing
function my_acf_pre_save_post($post_id) {

    if ( !function_exists('wp_handle_upload') ) {
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    }
    
    // Move file to media library
    $movefile = wp_handle_upload( $_FILES['my_image_upload'], array('test_form' => false) );
    
    // If move was successful, insert WordPress attachment
    if ( $movefile && !isset($movefile['error']) ) {
    $wp_upload_dir = wp_upload_dir();
    $attachment = array(
    'guid' => $wp_upload_dir['url'] . '/' . basename($movefile['file']),
    'post_mime_type' => $movefile['type'],
    'post_title' => preg_replace( '/\.[^.]+$/', '', basename($movefile['file']) ),
    'post_content' => '',
    'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment($attachment, $movefile['file']);
    
    // Assign the file as the featured image
    set_post_thumbnail($post_id, $attach_id);
    update_field('my_image_upload', $attach_id, $post_id);
    
    }
    
    return $post_id;
    
    }
    
    add_filter('acf/pre_save_post' , 'my_acf_pre_save_post');













/* 
    
function redirect_if_user_not_logged_in() {
    if ( !is_user_logged_in() ) {
        wp_redirect( 'http://your-redirect-page-here ');         
        exit;
    }
}
add_action( 'admin_init', 'redirect_if_user_not_logged_in' );
 */


function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );



/* Sous menus Admin */
function my_new_admin_bar_menu() {
    global $wp_admin_bar;
    $root_menu = array(
            'parent' => false, // Parent, si false, sera situé à la racine
                    'id' => 'new_custom', // id du menu, doit être unique pour la racine.
                    'title' => __('Communication'), // Menu / sub-menu title
                    'href' => admin_url( 'my-new-menu.php'), // Menu URL
                    'meta' => false
                );
    $sub1 = array( 'parent' => 'new_custom', 'id' => 'new_custom1', 'title' => __('Sub1'), 'href' => admin_url( 'my-first-sub.php'), 'meta' => false );
    $sub2 = array( 'parent' => 'new_custom', 'id' => 'new_custom2', 'title' => __('Sub2'), 'href' => admin_url( 'my-second-sub.php'), 'meta' => false );
    $wp_admin_bar->add_menu( $root_menu );
    $wp_admin_bar->add_menu( $sub1 );
    $wp_admin_bar->add_menu( $sub2 );
}
add_action( 'wp_before_admin_bar_render', 'my_new_admin_bar_menu' );