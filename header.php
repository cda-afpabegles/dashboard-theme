<?php
    $user = wp_get_current_user(); 
    $roles = ( array ) $user->roles;
  if(!empty($roles[0]) ){
        if( $roles[0] == "assistant_formation" ){
            wp_redirect( 'https://board.afpa.digital/sales/'); 
            exit;
        }else if( $roles[0] == "communication" ){
            wp_redirect( 'https://board.afpa.digital/communication/'); 
            exit;
        }else if( $roles[0] == "direction" || $roles[0] == "administrator" ){
            wp_redirect( 'https://board.afpa.digital/board/'); 
            exit;
        }else{
            wp_redirect( 'https://board.afpa.digital/home/'); 
            exit;
        }
    } 
?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<!-- vpg start -->
<div class="p-1">
    <div class="row">
        <div class="col-lg-5 col-12">
            <div class="topbranding mb-3 text-center text-lg-left">
                <span class="topbranding-logo"><img src="https://board.afpa.digital/wp-content/themes/twentytwentyone-child/assets/img/logo.png" alt=""/></span>
                <span class="topbranding-title" style="font-size:14px;">AFPA DIGITAL</span>           
            </div>
        </div>
        <div class="col-lg-7 col-12">
        </div>
    </div>
</div>


	


