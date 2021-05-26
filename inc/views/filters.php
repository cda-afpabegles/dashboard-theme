<div class="row filters-board">
    <div class="col-12 mb-2 text-center text-lg-right">
        <button id="slim_version" class="btn" style="padding:12px;">Version simplifiée</button>
        <select name="nom" id="user_select" class="form-select">
            <option selected value="card-holder">Filtrer par utilisateur</option>
            <?php 
            $blogusers = get_users( array( 'fields' => array( 'display_name' ) ) );
            foreach ( $blogusers as $user ) {
                echo '<option value="'.$user->display_name.'">' . esc_html( $user->display_name ) . '</option>';
            }
            ?>
        </select>
        <select name="cat" id="cat_select" class="form-select">
            <option selected value="card-holder">Filtrer par catégories</option>
            <?php
            $categories = get_categories();
            foreach($categories as $category) {
            echo '<option value="' . $category->name . '">' . $category->name . '</option>';
            }
        ?>
        </select>
    </div>
    <div class="col-12 d-flex flex-row-reverse text-center text-lg-right">
        <input type="text" name="filter" id="filter2" class=" w-md-50 w-100 form-control form-inline" id="" placeholder="Rechercher une tâche / catégorie">
    </div>
</div>