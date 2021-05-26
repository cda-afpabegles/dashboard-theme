<?php
function displayCard($post){
    setup_postdata( $post );
    if (have_posts()) {
        $categories = get_the_category();
        $category_list = "";
        if ( current_user_can( 'administrator' ) ){
            $admin_class = "admin-class";
        }else{
            $admin_class = "";
        }
                foreach( $categories as $category) {
                    $name = $category->name;
                    $category_list.=  $name.' ';
                }
                if( have_rows('users_deadline') ): ?>
                    <?php while( have_rows('users_deadline') ): the_row(); 
                $users = get_sub_field("users");
                if( $users ):
                    foreach( $users as $user ):
                        $category_list .= $user->display_name.' ';
                    endforeach; 
                endif; 
            endwhile; 
            endif;
            if( get_field('important') ) {
                $important_class = 'style="border:solid 1px #e3007e;"';
            }else{
                $important_class = '';
            }

                    
                    
                    if( have_rows('users_deadline') ): ?>
                        <?php while( have_rows('users_deadline') ): the_row(); 
                    
                            // Get sub field values.
                            $users = get_sub_field('users');
                            $deadline = get_sub_field('deadline');
                    
                            ?>

                        <?php endwhile; ?>
                    <?php endif; 
          $postid = get_the_ID();          
        ?>
        <div class="card-holder <?php echo $category_list; ?>" style="position:relative;" data-card="<?php echo $postid; ?>">
                 <div class="modal-link text-decoration-none <?php echo $category_list; ?> overlay_card <?php echo $admin_class; ?> text-center d-flex align-items-center justify-content-center">
                    <?php

                         if ( current_user_can( 'administrator' ) ) {        
                            if( have_rows('users_deadline') ){                     
                                while( have_rows('users_deadline') ): the_row();
                                $users = get_sub_field('users');
                                if( $users ){ ?>
                                    <div class="look col-4 d-flex align-items-center justify-content-center" data-look="<?php the_permalink(); ?>">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div class="sendmail col-4 d-flex align-items-center justify-content-center"  data-sendmail="<?php echo get_the_ID(); ?>">
                                        <i class="far fa-paper-plane"></i> 
                                    </div>
                                    <div class="look col-md-4 d-flex align-items-center justify-content-center" data-look="<?php echo get_edit_post_link(); ?>">
                                        <i class="far fa-edit"></i>
                                    </div>
                                    <?php
                                }else{
                                ?>
                                    <div class="look col-6 d-flex align-items-center justify-content-center" data-look="<?php the_permalink(); ?>">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div class="look col-md-6 d-flex align-items-center justify-content-center" data-look="<?php echo get_edit_post_link(); ?>">
                                        <i class="far fa-edit"></i>
                                    </div>
                                <?php
                                }
                            endwhile;
                            }   
                        }else{
                        ?>
                            <div class="look col-12 d-flex align-items-center justify-content-center" data-look="<?php the_permalink(); ?>">
                                <i class="far fa-eye"></i>
                            </div>
                        <?php
                        }
                    ?>
                </div>
                <div class="card bg-light pb-3 mb-3" <?php  echo $important_class; ?>>
                    <?php
                    if( get_field('important') ) {
                        echo '<div class="important"><p>'.get_field('important').'</p></div>';
                    }
                    ?>
                <div class="row px-2 ">
                    <div class="col-md-5">
                    <?php   
                        if( have_rows('users_deadline') ): ?>
                            <?php while( have_rows('users_deadline') ): the_row(); 
                                $deadline = get_sub_field('deadline');
                                if($deadline !== ""):
                                ?>
                            <p class="h6 mt-3">Deadline:<br><strong style="font-weight:700; font-size:13px;"><?php echo $deadline; ?></strong></p>
                        <?php endif;
                        endwhile; 
                            endif; ?>
                    </div>
                    <div class="col-md-7 text-right pt-2">
                    <?php
                            $categories = get_the_category();
                            echo "<p class='tags my-2'>";
                            foreach( $categories as $category) {
                                $color = get_field('color', $category);
                                $name = $category->name;
                                $category_link = get_category_link( $category->term_id );
                                echo '<span class=" . esc_attr( $name) . " style="color:'.getContrastColor($color).'; background-color:'.$color.';">' . esc_attr( $name) . '</span>';
                            }
                            echo "</p>";
                        ?>
                    </div>
                </div>
                <div class="row px-2 ">
                    <div class="content_card col-md-12">
                        <?php
                        $hidden_tags = "";
                        foreach($categories as $category) {
                            $hidden_tags .= $category->name.' ';
                        }
                        ?>
                        <h3 class="h4"><?php the_title(); ?><span class="d-none"><?php echo $hidden_tags; ?></span></h3>
                        <p  class="h6"><?php the_excerpt(); ?></p>
                    </div>
                </div>
                <div class="row px-2 ">
                    <div class="col-md-7">
                    <div class="d-flex mt- row-reverse"><?php
                        if( have_rows('users_deadline') ): 
                            while( have_rows('users_deadline') ): the_row();
                            $users = get_sub_field('users');
                                if( $users ): ?>
                                    <?php foreach( $users as $user ): ?>
                                        <div>
                                            <?php $color = get_field('color', $user); ?>
                                            <span class="user ml-1" style="color:<?php echo getContrastColor($color)?>; background-color:<?php echo $color; ?>"><?php echo $user->display_name; ?></span>
                                        </div>
                                    <?php endforeach;
                                endif;
                            endwhile;
                        endif; ?>
                        </div>
                    </div>
                    <div class="col-md-5 text-right">   
                        <?php
                        if(get_comments_number() == 0){ ?>
                        <?php }else { ?>
                            <p class="h6 mt-3"><?php comments_number(false, '1 commentaire'); ?></p>
                            <?php } ?>
                    </div>
                    
                </div>
            </div>
        </div>
    <?php
    } 
    wp_reset_postdata();
}

function displayCardGantt($post){
    setup_postdata( $post );
    ?>
        <li style="grid-column:'1/12'; background-color: #2ecaac;"><?php the_title(); ?></li>
    <?php
    wp_reset_postdata();
}
function displayCardGlobal($post){
    setup_postdata( $post );
    if (have_posts()) {
        $postid = get_the_ID();
        $categories = get_the_category();
        $category_list = "";
        if ( current_user_can( 'administrator' ) ){
            $admin_class = "admin-class";
        }else{
            $admin_class = "";
        }
        foreach( $categories as $category) {
            $name = $category->name;
            $category_list.=  $name.' ';
        }
        if( have_rows('users_deadline') ):
            while( have_rows('users_deadline') ): the_row(); 
                $users = get_sub_field("users");
                if( $users ):
                    foreach( $users as $user ):
                        $category_list .= $user->display_name.' ';
                    endforeach; 
                endif; 
            endwhile; 
        endif;
        if( get_field('important') ) {
            $important_class = 'border-right:solid 2px #e3007e;';
        }else{
            $important_class = '';
        }
        if( have_rows('users_deadline') ){
            while( have_rows('users_deadline') ): the_row(); 
            // Get sub field values.
            $users = get_sub_field('users');
            $deadline = get_sub_field('deadline');
            endwhile;
        } 
    }     
    ?>
    <li style="grid-column:'1/10'; color:#0a0a0a;background-color: #dedede;margin:5px;border:solid 1px grey; <?php echo $important_class; ?> border-right-width:8px;" class="<?php echo $category_list; ?>" data-card="<?php echo $postid; ?>"><?php the_title(); ?></li>
    <?php
    wp_reset_postdata();
}

function displayCardModalGlobal($post){
    $postid = get_the_ID();
    if (have_posts()) {
        $categories = get_the_category();
        $category_list = "";
        if ( current_user_can( 'administrator' ) ){
            $admin_class = "admin-class";
        }else{
            $admin_class = "";
        }
        foreach( $categories as $category) {
            $name = $category->name;
            $category_list.=  $name.' ';
        }
        if( have_rows('users_deadline') ):
            while( have_rows('users_deadline') ): the_row(); 
                $users = get_sub_field("users");
                if( $users ):
                    foreach( $users as $user ):
                        $category_list .= $user->display_name.' ';
                    endforeach; 
                endif; 
            endwhile; 
        endif;
        if( get_field('important') ) {
            $important_class = 'style="border:solid 1px #e3007e;"';
        }else{
            $important_class = '';
        }         
        if( have_rows('users_deadline') ):
            while( have_rows('users_deadline') ): the_row(); 
                $users = get_sub_field('users');
                $deadline = get_sub_field('deadline');
            endwhile;
        endif;               
        ?>
        <div class="card-holder <?php echo $category_list; ?>" style="position:relative;" data-card="<?php echo $postid; ?>">
            <div class="modal-link text-decoration-none <?php echo $category_list; ?> overlay_card <?php echo $admin_class; ?> text-center d-flex align-items-center justify-content-center">
                <?php
                    if ( current_user_can( 'administrator' ) ) {        
                        if( have_rows('users_deadline') ){                     
                            while( have_rows('users_deadline') ): the_row();
                                $users = get_sub_field('users');
                                if( $users ){ ?>
                                    <div class="look col-4 d-flex align-items-center justify-content-center" data-look="<?php the_permalink(); ?>">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div class="sendmail col-4 d-flex align-items-center justify-content-center"  data-sendmail="<?php echo get_the_ID(); ?>">
                                        <i class="far fa-paper-plane"></i> 
                                    </div>
                                    <div class="look col-md-4 d-flex align-items-center justify-content-center" data-look="<?php echo get_edit_post_link(); ?>">
                                        <i class="far fa-edit"></i>
                                    </div>
                                    <?php
                                }else{
                                ?>
                                    <div class="look col-6 d-flex align-items-center justify-content-center" data-look="<?php the_permalink(); ?>">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div class="look col-md-6 d-flex align-items-center justify-content-center" data-look="<?php echo get_edit_post_link(); ?>">
                                        <i class="far fa-edit"></i>
                                    </div>
                                <?php
                                }
                            endwhile;
                        }   
                    }else{
                    ?>
                        <div class="look col-12 d-flex align-items-center justify-content-center" data-look="<?php the_permalink(); ?>">
                            <i class="far fa-eye"></i>
                        </div>
                    <?php
                    }
                ?>
            </div>
            <div class="card bg-light pb-3 mb-3" <?php  echo $important_class; ?>>
                <?php
                if( get_field('important') ) {
                    echo '<div class="important"><p>'.get_field('important').'</p></div>';
                }
                ?>
                <div class="row px-2 ">
                    <div class="col-md-5">
                    <?php   
                        if( have_rows('users_deadline') ): ?>
                            <?php while( have_rows('users_deadline') ): the_row(); 
                                $deadline = get_sub_field('deadline');
                                if($deadline !== ""):
                                ?>
                            <p class="h6 mt-3">Deadline:<br><strong style="font-weight:700; font-size:13px;"><?php echo $deadline; ?></strong></p>
                        <?php endif;
                        endwhile; 
                            endif; ?>
                    </div>
                    <div class="col-md-7 text-right pt-2">
                    <?php
                            $categories = get_the_category();
                            echo "<p class='tags my-2'>";
                            foreach( $categories as $category) {
                                $color = get_field('color', $category);
                                $name = $category->name;
                                $category_link = get_category_link( $category->term_id );
                                echo '<span class=" . esc_attr( $name) . " style="color:'.getContrastColor($color).'; background-color:'.$color.';">' . esc_attr( $name) . '</span>';
                            }
                            echo "</p>";
                        ?>
                    </div>
                </div>
                <div class="row px-2 ">
                    <div class="content_card col-md-12">
                        <?php
                        $hidden_tags = "";
                        foreach($categories as $category) {
                            $hidden_tags .= $category->name.' ';
                        }
                        ?>
                        <h3 class="h4"><?php the_title(); ?><span class="d-none"><?php echo $hidden_tags; ?></span></h3>
                        <p  class="h6"><?php the_excerpt(); ?></p>
                    </div>
                </div>
                <div class="row px-2 ">
                    <div class="col-md-7">
                    <div class="d-flex mt- row-reverse"><?php
                        if( have_rows('users_deadline') ): 
                            while( have_rows('users_deadline') ): the_row();
                            $users = get_sub_field('users');
                                if( $users ): ?>
                                    <?php foreach( $users as $user ): ?>
                                        <div>
                                            <?php $color = get_field('color', $user); ?>
                                            <span class="user ml-1" style="color:<?php echo getContrastColor($color)?>; background-color:<?php echo $color; ?>"><?php echo $user->display_name; ?></span>
                                        </div>
                                    <?php endforeach;
                                endif;
                            endwhile;
                        endif; ?>
                        </div>
                    </div>
                    <div class="col-md-5 text-right">   
                        <?php
                        if(get_comments_number() == 0){ ?>
                        <?php }else { ?>
                            <p class="h6 mt-3"><?php comments_number(false, '1 commentaire'); ?></p>
                            <?php } ?>
                    </div>
                </div>
            </div>       
         </div>
    <?php
    } 
}


function displaySmallCards($post){

    setup_postdata( $post );
    if (have_posts()) {
        $postid = get_the_ID();
        $categories = get_the_category($postid);
        $category_list = "";
        if ( current_user_can( 'administrator' ) ){
            $admin_class = "admin-class";
        }else{
            $admin_class = "";
        }
        foreach( $categories as $category) {
            $name = $category->name;
            $category_list.=  $name.' ';
        }
        if( have_rows('users_deadline') ):
            while( have_rows('users_deadline') ): the_row(); 
                $users = get_sub_field("users");
                if( $users ):
                    foreach( $users as $user ):
                        $category_list .= $user->display_name.' ';
                    endforeach; 
                endif; 
            endwhile; 
        endif;
        if( get_field('important') ) {
            $important_class = 'border-right:solid 2px #e3007e;';
        }else{
            $important_class = '';
        }
        if( have_rows('users_deadline') ){
            while( have_rows('users_deadline') ): the_row(); 
            // Get sub field values.
            $users = get_sub_field('users');
            $deadline = get_sub_field('deadline');
            endwhile;
        } 
    ?>
        <div class="col-sm-4" data-card="<?php echo $postid; ?>"> 
            <div class="modal-link text-decoration-none <?php echo $category_list; ?> overlay_card <?php echo $admin_class; ?> text-center d-flex align-items-center justify-content-center">
                    <?php
                         if ( current_user_can( 'administrator' ) ) {        
                            if( have_rows('users_deadline') ){                     
                                while( have_rows('users_deadline') ): the_row();
                                $users = get_sub_field('users');
                                if( $users ){ ?>
                                    <div class="look col-4 d-flex align-items-center justify-content-center" data-look="<?php the_permalink(); ?>">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div class="sendmail col-4 d-flex align-items-center justify-content-center"  data-sendmail="<?php echo get_the_ID(); ?>">
                                        <i class="far fa-paper-plane"></i> 
                                    </div>
                                    <div class="look col-md-4 d-flex align-items-center justify-content-center" data-look="<?php echo get_edit_post_link(); ?>">
                                        <i class="far fa-edit"></i>
                                    </div>
                                    <?php
                                }else{
                                ?>
                                    <div class="look col-6 d-flex align-items-center justify-content-center" data-look="<?php the_permalink(); ?>">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div class="look col-md-6 d-flex align-items-center justify-content-center" data-look="<?php echo get_edit_post_link(); ?>">
                                        <i class="far fa-edit"></i>
                                    </div>
                                <?php
                                }
                            endwhile;
                            }   
                        }
                        ?>
            </div>
            <div style=" margin:3px;color:#0a0a0a;background-color:#dedede;border-radius:3px; padding:2px;border-right-width:8px;border:solid 1px grey; <?php echo $important_class; ?>" class="smallcards <?php echo $category_list; ?>"  >
                <?php the_title(); ?>
            </div>
        </div>
    <?php
    wp_reset_postdata();
    }     
}