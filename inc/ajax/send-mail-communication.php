<?php
function send_mail_communication()
{
    $to = $_POST['recipients'];
    $subject = $_POST['title'];
    $body = $_POST['content'];
    $body .= '<br><a target="_blank" href="https://board.afpa.digital/communication/">Accéder au tableau</a>';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $body, $headers );
   
}
add_action( 'wp_ajax_send_mail_communication', 'send_mail_communication' );
add_action( 'wp_ajax_nopriv_send_mail_communication', 'send_mail_communication' );
