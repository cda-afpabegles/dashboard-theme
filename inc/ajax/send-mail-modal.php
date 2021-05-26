<?php
function send_mail_modal()
{
    $to = $_POST['recipients'];
    $subject = $_POST['title'];
    $body = $_POST['content'];
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $body, $headers );
   
}
add_action( 'wp_ajax_send_mail_modal', 'send_mail_modal' );
add_action( 'wp_ajax_nopriv_send_mail_modal', 'send_mail_modal' );