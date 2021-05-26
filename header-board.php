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
                <span class="topbranding-title" style="font-size:14px;" ><a href="https://board.afpa.digital/board/">Drag &Drop</a></span>
                <span class="topbranding-title" style="font-size:14px;" ><a href="https://board.afpa.digital/global/">Global</a></span>
                <span class="topbranding-title" style="font-size:14px;" ><a href="https://board.afpa.digital/small-cards/">Small Cards</a></span>

                
            </div>
        </div>
        <div class="col-lg-7 col-12">
            <div class="row filters-board">
                <div class="col-12 mb-2 text-center text-lg-right">
                    <button id="slim_version" class="btn" style="padding:12px;">Version étendue</button>
                    <select name="nom" id="user_select" class="form-select">
                        <option selected value="modal-link">Filtrer par utilisateur</option>
                        
                        <?php 
                        $blogusers = get_users( array( 'fields' => array( 'display_name' ) ) );
                        foreach ( $blogusers as $user ) {
                            echo '<option value="'.$user->display_name.'">' . esc_html( $user->display_name ) . '</option>';
                        }
                        ?>
                    </select>
                    <select name="cat" id="cat_select" class="form-select">
                        <option selected value="modal-link">Filtrer par catégories</option>
                        <?php
                        $categories = get_categories();
                        foreach($categories as $category) {
                        echo '<option value="' . $category->name . '">' . $category->name . '</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="col-12 d-flex flex-row-reverse text-center text-lg-right">
                    <input type="text" name="filter" id="filter2" class=" w-md-50 w-100 form-control form-inline" id="" placeholder="Rechercher une tâche / catégorie">
                </div>
            </div>
        </div>
    </div>
</div>



<!-- vpg end 
    <img src="https://board.afpa.digital/wp-content/themes/twentytwentyone-child/logo.png" alt="" style="width:120px;height:auto;text-align:center;margin:5px auto;display:block;">-->
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

	
	
	


