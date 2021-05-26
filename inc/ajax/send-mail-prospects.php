<?php
function send_mail_prospects()
{
    $to = $_POST['recipients'];
    $subject = $_POST['title'];
    $body = $_POST['content'];
    $body .= '<br><a target="_blank" href="https://board.afpa.digital/sales/">Accéder au tableau</a>';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $body, $headers );
   
}
add_action( 'wp_ajax_send_mail_prospects', 'send_mail_prospects' );
add_action( 'wp_ajax_nopriv_send_mail_prospects', 'send_mail_prospects' );

