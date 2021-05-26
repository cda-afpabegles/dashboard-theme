<?php



function afpa_register_assets() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( 
        'bootstrap-css', 
        get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css',
        array( $parenthandle ),
        $theme->get('Version'),
        false
    );
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 
        'dragula-css',
        'https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css',
        array(),
        time(),
        false
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
    wp_enqueue_style( 
        'Gfonts', 
        'https://fonts.googleapis.com/css?family=Montserrat:400,700,200',
        'bootstrap-css',
        $theme->get('Version'),
        false
    );     
    

    wp_deregister_script( 'jquery' );
    wp_enqueue_script(
        'jquery', 
        'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', 
        false, 
        '3.3.1', 
        true 
    );
    wp_enqueue_script(
        'fontawesome', 
        'https://kit.fontawesome.com/a4862d6768.js', 
        false, 
        '3.3.1', 
        true 
    );
    wp_enqueue_script(
        'core-plugins', 
        get_stylesheet_directory_uri() . '/assets/js/core-plugins.js',
        false, 
        '3.3.1', 
        true 
    );
    wp_enqueue_script(
        'dragula', 
        'https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js', 
        'jquery', 
        '3.3.1', 
        true 
    );
    wp_enqueue_script(
        'ajax-script',
        get_stylesheet_directory_uri() . '/assets/js/ajax/ajax.js',
        array('core-plugins', 'dragula'),
        true	
    );
    wp_enqueue_script( // On déclare une version plus moderne
        'main', 
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array('core-plugins', 'dragula'), 
        '3.3.1', 
        true 
    );
    wp_localize_script( 
        'ajax-script',
        'wp_ajax',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        )                 
    );
}
add_action( 'wp_enqueue_scripts', 'afpa_register_assets' );








function adminafpa_enqueue_scripts( $hook ) {

    if( !in_array( $hook, array( 'post.php', 'post-new.php' ) ) )
        return;
    wp_enqueue_script(
        'jquery', 
        'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', 
        false, 
        '3.3.1', 
        true 
    );
    wp_enqueue_script( 
        'redirect_update',
        get_stylesheet_directory_uri() . '/assets/js/admin.js',
        array( 'jquery' )      ,
        '1.0',
        true
    );
}
add_action( 'admin_enqueue_scripts', 'adminafpa_enqueue_scripts', 2000 );