<?php
/**
* Template Name: AFPA GANTT 1
*/
    get_header('board');
?>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
                <div class="px-1">
                    <div class="row table_head">
                        <div class="col-sm-1">
                            <p>Gantt 1</p>
                        </div>
                        <div class="col-sm-11">
                            <div class="row">     
                                <div class="col-sm-3">
                                    <p>En Preparation</p>
                                </div>
                                <div class="col-sm-3">
                                    <p>In Progress</p>
                                </div>
                                <div class="col-sm-3">
                                    <p>En Validation</p>
                                </div>
                                <div class="col-sm-3">
                                    <p>En Exploitation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  
                    $categories = get_categories();
                    foreach ($categories as $category) :
                        $cat_ID = $category->cat_ID 
                        ?>
                        <div class="row cat_row">     
                            <div class="col-sm-1 border-right border-bottom" style="background-color:#0c3d50;font-size:12px;text-transform:uppercase;font-weight:700;color:white;">
                                <?php echo $category->cat_name; ?>
                            </div>
                            <div class="col-sm-11 table_smallcards border-bottom">
                                <div class="row">
                                    <div class="align-content-start row dragdrop_container col-sm-3 border-right" data-column="en-preparation">
                                        <div style="min-height:20px; content=' ';"></div>
                                        <?php
                                            $args = array( 
                                            'posts_per_page' => -1,
                                            'cat' => $cat_ID,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'etats',
                                                    'field' => 'slug',
                                                    'terms' => 'en-preparation',
                                                )
                                            ),
                                            'orderby'          => 'modified'
                                        );
                                        $myposts = get_posts( $args );
                                        foreach ( $myposts as $post ) :
                                            displaySmallCards($post);    
                                        endforeach;   
                                            ?>
                                    </div>
                                    <div class="align-content-start row dragdrop_container col-sm-3 border-right" data-column="in-progress">
                                        <div style="min-height:20px; content=' ';"></div>
                                            <?php
                                                $args = array( 
                                            'posts_per_page' => -1,
                                            'cat' => $cat_ID,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'etats',
                                                    'field' => 'slug',
                                                    'terms' => 'in-progress',
                                                )
                                                ),
                                                'orderby'          => 'modified'
                                        );
                                        $myposts = get_posts( $args );
                                        foreach ( $myposts as $post ) :
                                            displaySmallCards($post);    
                                        endforeach;   
                                            ?>
                                    </div>
                                    <div class="align-content-start dragdrop_container col-sm-3 border-right row" data-column="en-validation">
                                        <div style="min-height:20px; content=' ';"></div>
                                            <?php
                                                $args = array( 
                                            'posts_per_page' => -1,
                                            'cat' => $cat_ID,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'etats',
                                                    'field' => 'slug',
                                                    'terms' => 'en-validation',
                                                )
                                            ),
                                            'orderby'          => 'modified'
                                        );
                                        $myposts = get_posts( $args );
                                        foreach ( $myposts as $post ) :
                                            displaySmallCards($post);    
                                        endforeach;   
                                            ?>
                                    </div>
                                    <div class="align-content-start dragdrop_container col-sm-3 border-right row" data-column="en-exploitation">
                                        <div style="min-height:20px; content=' ';"></div>
                                            <?php
                                                $args = array( 
                                            'posts_per_page' => -1,
                                            'cat' => $cat_ID,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'etats',
                                                    'field' => 'slug',
                                                    'terms' => 'en-exploitation',
                                                )
                                            ),
                                            'orderby'          => 'modified'
                                        );
                                        $myposts = get_posts( $args );
                                        foreach ( $myposts as $post ) :
                                            displaySmallCards($post);    
                                        endforeach;   
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </main>
		</div>
	</div>
<?php   
    include('inc/views/modals-global.php');
    get_footer('smallcards');
?>