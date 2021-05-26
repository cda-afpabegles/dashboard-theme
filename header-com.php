<?php
if ( !is_user_logged_in() ){
    wp_redirect( 'https://board.afpa.digital/'); 
    exit;
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
            <div class="row text-right">
                <a href="/communication/" class="btn btn-primary ml-3">Voir le tableau de bord</a>
                <a href="/communication-ajout-element/" class="btn btn-primary ml-3">Ajouter un Element de Communication</a>
            </div>
        </div>
    </div>
</div>
<!-- vpg end 
    <img src="https://board.afpa.digital/wp-content/themes/twentytwentyone-child/logo.png" alt="" style="width:120px;height:auto;text-align:center;margin:5px auto;display:block;">-->
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>