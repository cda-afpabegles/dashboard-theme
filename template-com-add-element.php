<?php
/**
* Template Name: Com - Ajout Element
*/
    acf_form_head();
    get_header('com');
?>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
            <div class="container mb-5">
            <div id="content">
                <?php
                acf_form(array(
                    'post_id'		=> 'new_post',
                    'post_title'	=> true,
                    'post_content'	=> false,
                    'new_post'		=> array(
                        'post_type'		=> 'element_com',
                        'post_status'	=> 'publish'
                    ),
                    'submit_value'  => 'Ajouter un élément de communication'
                ));      
                ?> 
            </div>
            </div>
		</div>
	</div>
<?php   
    get_footer('com');
?>