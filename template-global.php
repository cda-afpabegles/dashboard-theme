<?php
/**
* Template Name: AFPA Cards by Category
*/
    get_header('board');
?>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
                <div class="container-fluid">

                <style>
                                            
                    .gantt {
                    display: grid;
                    border: 0;
                    border-radius: 12px;
                    position: relative;
                    overflow: hidden;
                    box-sizing: border-box;
                    box-shadow: 0 75px 125px -57px #7e8f94;
                    }
                    .gantt__row {
                    display: grid;
                    grid-template-columns: 150px 1fr;
                    background-color: #fff;
                    }
                    .gantt__row:nth-child(odd) {
                    background-color: #f5f5f5;
                    }
                    .gantt__row:nth-child(odd) .gantt__row-first {
                    background-color: #f5f5f5;
                    }
                    .gantt__row:nth-child(3) .gantt__row-bars {
                    border-top: 0;
                    }
                    .gantt__row:nth-child(3) .gantt__row-first {
                    border-top: 0;
                    }
                    .gantt__row--empty {
                    background-color: #ffd6d2 !important;
                    z-index: 1;
                    }
                    .gantt__row--empty .gantt__row-first {
                    border-width: 1px 1px 0 0;
                    }
                    .gantt__row--lines {
                    position: absolute;
                    height: 100%;
                    width: 100%;
                    background-color: transparent;
                    grid-template-columns: 150px repeat(10, 1fr);
                    }
                    .gantt__row--lines span {
                    display: block;
                    border-right: 1px solid rgba(0, 0, 0, 0.1);
                    }
                    .gantt__row--lines span.marker {
                    background-color: rgba(10, 52, 68, 0.13);
                    z-index: 2;
                    }
                    .gantt__row--lines:after {
                    grid-row: 1;
                    grid-column: 0;
                    background-color: #1688b345;
                    z-index: 2;
                    height: 100%;
                    }
                    .gantt__row--months {
                    color: #fff;
                    background-color: #0a3444 !important;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
                    grid-template-columns: 150px repeat(10, 1fr);
                    }
                    .gantt__row--months .gantt__row-first {
                    border-top: 0 !important;
                    background-color: #0a3444 !important;
                    }
                    .gantt__row--months span {
                    text-align: center;
                    font-size: 13px;
                    align-self: center;
                    font-weight: bold;
                    padding: 20px 0;
                    }
                    .gantt__row-first {
                    background-color: #fff;
                    border-width: 1px 0 0 0;
                    border-color: rgba(0, 0, 0, 0.1);
                    border-style: solid;
                    padding: 15px 0;
                    font-size: 13px;
                    font-weight: bold;
                    text-align: center;
                    }
                    .gantt__row-bars {
                    list-style: none;
                    display: grid;
                    padding: 9px 0;
                    margin: 0;
                    grid-template-columns: repeat(10, 1fr);
                    grid-gap: 8px 0;
                    border-top: 1px solid rgba(221, 221, 221, 0.8);
                    }
                    .gantt__row-bars li {
                    font-weight: 500;
                    text-align: left;
                    font-size: 14px;
                    min-height: 15px;
                    background-color: #55de84;
                    padding: 5px 12px;
                    color: #fff;
                    overflow: hidden;
                    position: relative;
                    cursor: pointer;
                    border-radius: 4px;
                    }
                    .gantt__row-bars li.stripes {
                    background-image: repeating-linear-gradient(45deg, transparent, transparent 5px, rgba(255, 255, 255, 0.1) 5px, rgba(255, 255, 255, 0.1) 12px);
                    }
                    .gantt__row-bars li:before, .gantt__row-bars li:after {
                    content: "";
                    height: 100%;
                    top: 0;
                    z-index: 4;
                    position: absolute;
                    background-color: rgba(0, 0, 0, 0.3);
                    }
                    .gantt__row-bars li:before {
                    left: 0;
                    }
                    .gantt__row-bars li:after {
                    right: 0;
                    }
                </style>

                <div class="gantt">
                    <div class="gantt__row gantt__row--months">
                        <div class="gantt__row-first"></div>
                        <span></span><span></span><span></span>
                        <span></span><span></span><span></span>
                        <span></span><span></span><span></span>
                        <span></span>
                    </div>
                    <div class="gantt__row gantt__row--lines" data-month="5">
                        <span></span><span></span><span></span>
                        <span></span><span></span><span></span>
                        <span></span>
                        <span></span><span></span>
                        <span></span>
                    </div>
                    <?php  
                    $categories = get_categories();
                    foreach ($categories as $category) : 
                        ?>
                        <div class="gantt__row">
                            <div class="gantt__row-first">
                                <?php echo $category->cat_name; ?>
                            </div>
                            <ul class="gantt__row-bars">
                                <?php
                                    $args = array( 
                                        'posts_per_page' => -1,
                                        'cat' => $category->cat_ID
                                    );
                                    $myposts = get_posts( $args );
                                    foreach ( $myposts as $post ) : 
                                        displayCardGlobal($post);
                                    ?>
                                    <?php
                                    endforeach;
                                ?>
                            </ul>
                        </div>
                        <?php
                            endforeach;
                        ?>
                    </div>
                    <script>
                        var d = new Date();
                        var n = d.getMonth();
                    </script>

                </div>

            </main>
		</div>
	</div>
<?php   
    include('inc/views/modals-global.php');
    get_footer('board');
?>