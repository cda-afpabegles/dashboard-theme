<?php 
    function displayCardsList($taxonomy){
        $args    = array( 
                        'posts_per_page' => -1, 
                        'tax_query' => array(
                        array(
                            'taxonomy' => 'etats',
                            'field' => 'slug',
                            'terms' => $taxonomy,
                        )),
                        'meta_query'	=> 
                            array(
                                'key'		=> 'important',
                                'value'		=> '',
                                'compare'	=> '='
                            ),
                        'meta_key'			=> 'important',
                        'orderby'			=> 'meta_value',
                        'order'				=> 'ASC'
                    );
        $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : 
            displayCard($post);
        endforeach;
        ?>
        <?php 
        $args    = array( 
                        'posts_per_page' => -1, 
                        'tax_query' => array(
                        array(
                            'taxonomy' => 'etats',
                            'field' => 'slug',
                            'terms' => $taxonomy,
                        )),
                        'meta_query'	=> 
                            array(
                                'key'		=> 'important',
                                'value'		=> '',
                                'compare'	=> '!='
                            ),
                        'meta_key'			=> 'important',
                        'orderby'			=> 'meta_value',
                        'order'				=> 'ASC'
                    );
        $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : 
            displayCard($post);
        endforeach;
    }