<?php
/**
* Template Name: Sales - Add Prospect
*/
    acf_form_head();
    get_header('sales');
?>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
            <div class="container">
            <div id="content">
                <?php
                acf_form(array(
                    'post_id'		=> 'new_post',
                    'post_title'	=> true,
                    'post_content'	=> true,
                    'new_post'		=> array(
                        'post_type'		=> 'prospects',
                        'post_status'	=> 'publish'
                    )
                ));      
                ?> 
            </div>
            </div>
		</div>
	</div>
<?php   
    get_footer('sales-prospects');
?>