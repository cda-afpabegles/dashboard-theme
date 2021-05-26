<div id="modals"  class="pt-5">
    <?php  
    $args    = array( 'posts_per_page' => -1);
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
        if (have_posts()) {
            $postid = get_the_ID();
            ?>
            <div class="global_modal_card container" id="modal-<?php echo $postid; ?>">
                <div class="close_modal"><i class="far fa-2x fa-times-circle"></i></div>
                <?php
                    displayCardModalGlobal($post);
                ?>
            </div>
        <?php
        }
    endforeach;
    wp_reset_postdata();
    ?>
</div>