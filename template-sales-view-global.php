<?php
/**
* Template Name: Sales - Global View
*/
    acf_form_head();
    get_header('sales');
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
    <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-12">
              <h2>Publics</h2>
            </div>
            <a href="/ajout-public/" class="btn btn-primary">Ajouter un type de public</a>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                    <td>Type de public</td>
                    <td>Commentaire</td>
                  </tr>
                </thead>
                <?php
              $args = array( 
                      'posts_per_page' => -1, 
                      'post_type' => 'publics'
                  );
                  $myposts = get_posts( $args );
              foreach ( $myposts as $post ){ 
                setup_postdata( $post );
                ?>
                <tr>
                  <td><?php if( get_field('type_de_public') ){ the_field('type_de_public'); } ?></td>
                </td>
                <td class="zoom-in-comment align-middle h4"><i class="fas fa-2x fa-search-plus"></i></td>
              </tr>
              <tr class="comments-row">
                <td colspan="2"><?php if( get_field('commentaire_libre') ){ the_field('commentaire_libre'); } ?></td>
              </tr>
              <?php
                wp_reset_postdata();
              }
              ?>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-12">
              <h2>Financements</h2>
            </div>
            <a href="/ajout-financement/" class="btn btn-primary">Ajouter un type de financement</a>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                    <td>Nom du financement</td>
                    <td>Code / Intitulé / Acronyme</td>
                    <td>Cible</td>
                    <td>Description</td>
                    <td>Budget</td>
                    <td>Délai de mise en place</td>
                    <td>Commentaire libre</td>
                  </tr>
                </thead>
                <?php
            $args = array( 
                    'posts_per_page' => -1, 
                    'post_type' => 'financements'
                );
            $myposts = get_posts( $args );
            foreach ( $myposts as $post ){ 
                setup_postdata( $post );
                ?>
                <tr>
                  <td><?php if( get_field('nom_financement') ){ the_field('nom_financement'); } ?></td>
                  <td><?php if( get_field('code_intitule') ){ the_field('code_intitule'); } ?></td>
                  <td>
                  <?php
                    $cible_financement = get_field('cible_financement');
                                      if( $cible_financement ): ?>
                                        <?php foreach( $cible_financement as $cible ): 
                                              $name = get_field( 'type_de_public', $cible->ID );
                                              ?>
                                               <span class="badge"><?php echo $name; ?></span>
                                          <?php endforeach; ?>
                                      <?php endif; ?>
                  </td>
                  <td><?php if( get_field('description_financement') ){ the_field('description_financement'); } ?></td>
                  <td><?php if( get_field('budget') ){ the_field('budget'); } ?></td>
                  <td><?php if( get_field('delai') ){ the_field('delai'); } ?></td>
                  </td>
                    <td class="zoom-in-comment align-middle h4"><i class="fas fa-2x fa-search-plus"></i></td>
                  </tr>
                  <tr class="comments-row">
                    <td colspan="7"><?php if( get_field('commentaire_libre') ){ the_field('commentaire_libre'); } ?></td>
                  </tr>
                <?php
                      wp_reset_postdata();
                  }
                  ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="border-top">
    <div class="container-fluid">
      <div class="row mt-5 mb-4 justify-content-center">
        <div class="col-md-10 d-flex">
          <h2>Prospects</h2>
          <div class="text-right">
            <a href="/ajouter-un-prospect/" class="btn btn-primary">Ajouter un Prospect</a>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                                <tr>
                                    <td>Date de contact</td>
                                    <td>Titre / Code</td>
                                    <td>Nom</td>
                                    <td>Prénom</td>
                                    <td>Age</td>
                                    <td>Téléphone</td>
                                    <td>Email</td>
                                    <td>Orientation concernée</td>
                                    <td>Financement</td>
                                    <td>CV</td>
                                    <td>Documents annexes</td>
                                    <td>Commentaire</td>
                                </tr>
                            </thead>
                            <?php
                            $args = array( 
                                    'posts_per_page' => -1, 
                                    'post_type' => 'prospects'
                                );
                            $myposts = get_posts( $args );
                            foreach ( $myposts as $post ){ 
                                setup_postdata( $post );
                                $date = get_the_date("d M Y || H \h i");
                                ?>
                                <tr>
                                    <td><?php  echo $date; ?></td>
                                    <td><?php  the_title(); ?></td>
                                    <td><?php if( get_field('nom') ){ the_field('nom'); } ?></td>
                                    <td><?php if( get_field('prenom') ){ the_field('prenom'); } ?></td>
                                    <td><?php if( get_field('age') ){ the_field('age'); } ?></td>
                                    <td><?php if( get_field('telephone') ){ the_field('telephone'); } ?></td>
                                    <td><?php if( get_field('email') ){ the_field('email');} ?></td>
                                    <td> <?php
                                      $orientation = get_field('orientation');
                                      if( $orientation ): ?>
                                          <?php foreach( $orientation as $or ): ?>
                                              <span class="badge"><?php echo $or; ?></span>
                                          <?php endforeach; ?>
                                      <?php endif; ?>
                                    </td>
                                    <td>
                                      <?

                                      $financement = get_field('financement');
                                      if( $financement ): ?>
                                        <?php foreach( $financement as $fin ): 
                                              $code_fin = get_field( 'code_intitule', $fin->ID );
                                              $nom_fin = get_field( 'nom_financement', $fin->ID );
                                              ?>
                                               <span class="badge"><?php echo $code_fin.' - '.$nom_fin; ?></span>
                                          <?php endforeach; ?>
                                      <?php endif; ?>
                                  </td>
                                    <td><?php 
                                        $file = get_field('cv');
                                        if( $file ): ?>
                                            <a  target="_blank" href="<?php echo $file['url']; ?>"><i class="far fa-file-pdf"></i> <?php echo $file['filename']; ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php 
                                     if( have_rows('fichiers_annexes') ): ?>
                                        <div class="slides">
                                        <?php while( have_rows('fichiers_annexes') ): the_row(); 
                                            $nom = get_field('nom_du_document');
                                            $file = get_sub_field('document_a_uploader');
                                            ?>
                                            <a target="_blank" href="<?php echo $file['url']; ?>"><i class="far fa-file-pdf"></i> <?php echo $file['filename']; ?></a>
                                            <br>
                                        <?php
                                            endwhile; ?>
                                        </div>
                                    <?php endif;
                                    ?></td>
                                  <td class="zoom-in-comment align-middle h4"><i class="fas fa-2x fa-search-plus"></i></td>
                              </tr>
                              <tr class="comments-row">
                                <td colspan="11"><?php if( get_field('commentaire') ){ the_field('commentaire'); } ?></td>
                                
                                </tr>
                                <?php
                                wp_reset_postdata();
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
    get_footer('sales');
?>