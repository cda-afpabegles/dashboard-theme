<?php
    get_header('board');
?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main container" role="main">
       <?php
        while ( have_posts() ) :
                $categories = get_the_category();
                $category_list = "";
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
                        $important_class = 'style="border:solid 1px #950000;"';
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
                            
                ?>
                <div>
                    <div class="modal-link text-decoration-none <?php echo $category_list; ?>">
                        
                        <div class="card bg-light pb-3 mb-3" <?php  echo $important_class; ?>>
                            <?php
                            if( get_field('important') ) {
                                echo '<div class="important">'.get_field('important').'</div>';
                            }
                            ?>
                        <div class="row px-3 ">
                            <div class="col-md-6">
                            <?php   
                                if( have_rows('users_deadline') ): ?>
                                    <?php while( have_rows('users_deadline') ): the_row(); 
                                        $deadline = get_sub_field('deadline');
                                        ?>
                                    <p class="h6 mt-3">Deadline: <?php echo $deadline; ?></p>
                                <?php endwhile; 
                                    endif; ?>
                            </div>
                            <div class="col-md-6 text-right pt-2">
                            <?php
                                    $categories = get_the_category();
                                    echo "<p class='tags mx-1 my-2'>";
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
                        <div class="row px-3 ">
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
                        <div class="row px-3 ">
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
                                <p class="h6 mt-3"><?php comments_number(); ?></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            get_template_part( 'template-parts/content/content-page' );

            // If comments are open or there is at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        endwhile; // End of the loop.
        ?>
        </main>
    </div>
</div>
<?php
    get_footer('board');
?>