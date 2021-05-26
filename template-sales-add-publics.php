<?php
/**
* Template Name: Sales - Add Public
*/
    acf_form_head();
    get_header('sales');
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
                        'post_type'		=> 'publics',
                        'post_status'	=> 'publish'
                    ),
                    'submit_value'  => 'Ajouter un élément'
                ));      
                ?> 
            </div>
            </div>
		</div>
	</div>
<?php   
    get_footer('sales');
?>