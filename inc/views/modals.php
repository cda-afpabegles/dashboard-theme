<div id="modals">
    <div class="container mt-5">
    <?php  
    $args    = array( 'posts_per_page' => -1);
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
        if (have_posts()) {
        ?>
            <div class="modal_content" id="modal-<?php echo get_the_ID(); ?>">
                <div class="container">
                    <div class="close_modal"><i class="far fa-2x fa-times-circle"></i></div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h4>Envoyer une notification : </h4>
                            <form action="#" method="POST" class="modal_mail_form">
                                
                            <div class="row justify-content-center">
                            <?php
                            if( have_rows('users_deadline') ): 
                                while( have_rows('users_deadline') ): the_row();
                                $users = get_sub_field('users');
                                    if( $users ): ?>
                                        <?php
                                        $i = 0;
                                        foreach( $users as $user ): 
                                            $user_info = get_userdata($user->ID);
                                            $mailaddress = $user_info->user_email;
                                            ?>
                                            <div class="col-md-2 text-center">
                                                <label class="image-checkbox image-checkbox-<?php echo $i; ?>" title="<?php echo $user->display_name; ?>" data-email="<?php echo $mailaddress; ?>">
                                                <img src="<?php print get_avatar_url($user->ID, ['size' => '120']); ?>"/>
                                                    <input type="checkbox" name="team<?php echo $i; ?>" value="<?php echo $mailaddress; ?>" checked="" />
                                                </label>
                                            <div class="text-center">
                                                <?php $color = get_field('color', $user); ?>
                                                <span class="user ml-1" style="color:<?php echo getContrastColor($color)?>; background-color:<?php echo $color; ?>"><?php echo $user->display_name; ?></span>
                                            </div>
                                            </div>
                                        <?php $i++;
                                        endforeach;
                                    endif;
                                endwhile;
                            endif;
                            ?>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8 mt-3">
                                    <input type="text" class="form-control" name="title" value="<?php the_title(); ?>">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8 mt-3">
                                    <textarea type="text" class="form-control" name="message" placeholder="Message (optionnel) aux utilisateurs" ></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8 mt-3">
                                    <input type="submit" class="btn" value="Envoyer la notification">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    endforeach;
    wp_reset_postdata();
    ?>
    </div>
</div>