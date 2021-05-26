<?php
/**
* Template Name: Com - Global View red lights
*/
    acf_form_head();
    get_header('com');
?>
<style>
  table {
    width: 100%;
  }

  table thead tr {
    background: #dcd5c5 url('/Global/Images/parchment-bkg.jpg') repeat;
  }

  table thead tr.Vertical {
    background-image: url('/Global/Images/parchment-bkg-rotated.jpg');
  }

  table thead tr h1,
  table thead tr h2,
  table thead tr .h1,
  table thead tr .h2,
  table thead tr h3,
  table thead tr .h3,
  table thead tr h4,
  table thead tr .h4 {
    color: #151515;
  }

  table thead tr a {
    color: #0075b0;
  }

  table thead tr a:hover,
  table thead tr a:focus {
    color: white;
  }

  table tbody tr:nth-of-type(even) {
    background: #e2e2e2;
  }

  table td,
  table th {
    padding: 8px 14px;
    text-align: left;
    font-size: 0.9rem;
  }

  table td a,
  table th a {
    font-weight: bold;
    color: #00918a !important;
  }

  table td a:hover,
  table th a:hover,
  table td a:focus,
  table th a:focus {
    color: white !important;
  }

  table th {
    font-weight: 700;
    font-size: 0.8rem;
    line-height: 1.4;
    font-family: "Gotham SSm A", "Gotham SSm B", Helvetica, sans-serif;
    text-transform: uppercase;
    margin: 0;
    max-width: 800px;
    line-height: inherit;
    color: #151515;
  }

  table th.PrimaryFont {
    text-transform: none;
  }


  @media only screen and (max-width: 599px) {
    table th {
      display: none;
    }

    table td {
      position: relative;
      display: block;
      padding-left: 110px;
    }

    table td:before {
      position: absolute;
      top: 8px;
      left: 10px;
      display: block;
      content: attr(aria-label) ": ";
      font-weight: 700;
    }

    table tbody tr {
      padding: 20px 0;
      display: block;
    }

    table:nth-of-type(odd) {
      background: #f3f3f3;
    }
  }

  /* For display in CodePen */
  body {
    padding: 20px;
  }

  table {
    border-collapse: collapse;
  }
</style>
<div id="content" class="site-content">
  <div id="primary" class="content-area mb-3">

    <section class="border-top">
      <div class="container-fluid">
        <div class="row mt-5 mb-4 justify-content-center">
          <div class="col-lg-12 d-flex">
            <h2>Elements de Communication</h2>
            <div class="text-right">
              <a href="/communication-ajout-element/" class="btn btn-primary">Ajouter un Element de Com</a>
              <a href="#inform" id="inform" class="btn btn-primary">Informer les utilisateurs d'une mise à jour</a>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <table class="table table-bordered table-hover">
              <thead class="thead-dark">
                <tr>
                  <td>Date</td>
                  <td>Titre de l'élément</td>
                  <td>Cible</td>
                  <td>URL de l'élément</td>
                  <td>Pièces jointes</td>
                  <td>Validation</td>
                </tr>
              </thead>
              <tbody>
          <!--      -->
              <?php
                            $args = array( 
                                    'posts_per_page' => -1, 
                                    'post_type' => 'element_com'
                                );
                            $myposts = get_posts( $args );
                            $i = 0;
                            foreach ( $myposts as $post ){ 
                                setup_postdata( $post );
                                $date = get_the_date("d M Y || H \h i");
                                $id = get_the_id();
                                $validation = get_field('validation');
                                $validation = $validation['value'];
                                if( $validation == '0' ) { 
                                  $class_valid = 'en-attente'; 
                                }elseif( $validation == '2' ) { 
                                  $class_valid = 'en-modif'; 
                                }elseif( $validation == '1' ) { 
                                  $class_valid = 'en-valid'; 
                                }elseif( $validation == '3' ) { 
                                  $class_valid = 'en-refus'; 
                                }
                                ?>
                                <div class="<?php echo $class_valid; ?>">
                                  <tr class="<?php echo $class_valid; ?>" style="border-top:solid 10px darkgrey;">
                                    <td><?php  echo $date; ?></td>
                                    <td><?php  the_title(); ?></td>
                                    <td>
                                      <?
                                                          $field = get_field_object('cible');
                                                          $cibles = $field['value'];
                                                          if( $cibles ): ?>
                                        <?php foreach( $cibles as $cible ): ?>
                                          <span class="badge"><?php echo $field['choices'][ $cible ]; ?></span>
                                          <?php endforeach; ?>
                                          <?php endif; ?>
                                        </td>
                                        <td><?php if( get_field('url_element') ){ ?><a target="_blank" href="<?php the_field('url_element'); ?>"><?php the_field('url_element'); ?></a><?php } ?></td>
                                        
                                        <td><?php 
                                                      if( have_rows('fichiers_annexes') ): ?>
                                        <div class="slides">
                                          <?php while( have_rows('fichiers_annexes') ): the_row(); 
                                                              $nom = get_field('nom_du_document');
                                                              $file = get_sub_field('document_a_uploader');
                                                              ?>
                                          <a target="_blank" href="<?php echo $file['url']; ?>"><i class="far fa-file-pdf"></i>
                                          <?php echo $file['filename']; ?></a>
                                          <br>
                                          <?php
                                                              endwhile; ?>
                                        </div>
                                        <?php endif; ?>
                                      </td>
                                      
                                      <td class="td-validation" style="position:relative;">
                                        <div style="height:40px;width:200px;content:' ';"></div>
                                        <form class="form_validation_com" action="#" data-form="<?php echo $id; ?>">
                                          <div class="row">
                                            <div class="traffic-light updatealert">
                                              <input title="En attente de validation" type="radio" name="radio-group" class="input_validation color0 updated" value="0" <?php if( $validation == '0' ) { echo 'checked'; }?>>
                                              <input title="Validé" type="radio" name="radio-group" class="input_validation color1 updated" value="1" <?php if( $validation == '1' ) { echo 'checked'; }?>>
                                              <input title="Action corrective" type="radio" name="radio-group" class="input_validation color2 updated" value="2" <?php if( $validation == '2' ) { echo 'checked'; }?>>
                                              <input title="Refusé" type="radio" name="radio-group" class="input_validation color3 updated" value="3" <?php if( $validation == '3' ) { echo 'checked'; }?>>
                                              <div class="lock-it"><i class="fas fa-2x fa-lock"></i></div>
                                            </div>
                                          </div>
                                        </form>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="1">Détails de l'élément : </td>
                                      
                                      <td colspan="6">
                                        <?php if( get_field('details') ){ the_field('details'); } ?>
                                        </form>
                                      </td>
                                    </tr>
                                    <tr class="comments-row">
                                      <td colspan="1">Commentaire: </td>
                                      
                                      <td class="comment-content" colspan="5" data-user="<?php echo $current_user->display_name; ?>">
                                        <p class="past-comment"><?php if( get_field('commentaire') ){ the_field('commentaire'); } ?></p>
                                        <form class="form_validation_com_2" action="#" data-form="<?php echo $id; ?>">
                                          <textarea name="" id="" cols="30" rows="3"></textarea>
                                          <br>
                                          <div class="saveme"><br><i class="fas fa-2x fa-save"></i></div>
                                        </form>
                                      </td>
                                    </tr>
                                  </div>
                            <?php
                                wp_reset_postdata();
                                $i++;
                            }
                            ?>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</div>
<?php   
    get_footer('com');
?>