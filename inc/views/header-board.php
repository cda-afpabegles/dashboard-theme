<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- vpg start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 col-12">
            
            <div class="topbranding mb-3 text-center text-lg-left">
                <span class="topbranding-logo"><img src="https://board.afpa.digital/wp-content/themes/twentytwentyone-child/logo.png" alt=""/></span>
                <span class="topbranding-title" style="font-size:20px;" ><a href="https://board.afpa.digital/">Board Afpa Digital</a></span>
            </div>
        </div>
        <div class="col-lg-7 col-12">
            <?php include('inc/views/filters.php'); ?>
        </div>
    </div>
</div>



<!-- vpg end 
    <img src="https://board.afpa.digital/wp-content/themes/twentytwentyone-child/logo.png" alt="" style="width:120px;height:auto;text-align:center;margin:5px auto;display:block;">-->
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

	
	
	


