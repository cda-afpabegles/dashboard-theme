<?php
/**
* Template Name: AFPA Board
*/
    get_header('board');
?>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 en-preparation">
                            <h2>En Préparation</h2>
                            <div  id="column-drag-1" data-column="en-preparation">
                                <div style="min-height:20px; content=' ';"></div>
                                
                                <?php 
                                $args    = array( 
                                                'posts_per_page' => -1, 
                                                'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'etats',
                                                    'field' => 'slug',
                                                    'terms' => 'en-preparation',
                                                )),
                                                'orderby'          => 'modified'
                                            );
                                $myposts = get_posts( $args );
                                foreach ( $myposts as $post ) : 
                                    displayCard($post);
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 in-progress">
                            <h2>In  Progress</h2>
                            <div  id="column-drag-2" data-column="in-progress">  
                                <div style="min-height:20px; content=' ';"></div>
                                
                    <?php 
                    $args    = array( 
                                    'posts_per_page' => -1, 
                                    'tax_query' => array(
                                    array(
                                        'taxonomy' => 'etats',
                                        'field' => 'slug',
                                        'terms' => 'in-progress',
                                    )),
                                    'orderby'          => 'modified'
                                );
                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : 
                        displayCard($post);
                    endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 en-validation">
                            <h2>En  Validation</h2>
                            <div  id="column-drag-3" data-column="en-validation">
                                <div style="min-height:20px; content=' ';"></div>
                                
                    <?php 
                    $args    = array( 
                                    'posts_per_page' => -1, 
                                    'tax_query' => array(
                                    array(
                                        'taxonomy' => 'etats',
                                        'field' => 'slug',
                                        'terms' => 'en-validation',
                                    )),
                                        'orderby'          => 'modified'
                                );
                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : 
                        displayCard($post);
                    endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 en-exploitation">
                            <h2>En  Exploitation</h2>
                            <div  id="column-drag-4" data-column="en-exploitation">
                                <div style="min-height:20px; content=' ';"></div>
                               
                    <?php 
                    $args    = array( 
                                    'posts_per_page' => -1, 
                                    'tax_query' => array(
                                    array(
                                        'taxonomy' => 'etats',
                                        'field' => 'slug',
                                        'terms' => 'en-exploitation',
                                    )),
                                        'orderby'          => 'modified'
                                );
                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : 
                        displayCard($post);
                    endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
		</div>
	</div>
<?php   
    include('inc/views/modals.php');
    get_footer('board');
?>