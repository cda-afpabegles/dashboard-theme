<?php
/**
* Template Name: Homepage - logged
*/
    get_header('log');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Bienvenue sur AFPA Digital</h1>
            <?php
            $user = wp_get_current_user(); 
    $roles = ( array ) $user->roles;
    if($roles[0] !== 'administrator'){
        if( $roles[0] == "assistant_formation" ){
            ?>
              <a href="/sales/" class="btn btn-primary mt-5">sales</a>
            <?php
        }else if( $roles[0] == "communication" ){
            ?>
                <a href="/communication/" class="btn btn-primary mt-5">communication</a>
            <?php
        }else if( $roles[0] == "direction" || $roles[0] == "administrator" ){
            ?>
                <a href="/board/" class="btn btn-primary mt-5">board</a>
            <?php
        }else{
            ?>
              <p>Aucun droit d'accès, merci de contacter un administrateur.</p>
            <?php
        }
    }
    ?>
              
        </div>
    </div>
</div>
<?php   
    get_footer();
?>
