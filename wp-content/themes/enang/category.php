<?php
/**
 * The Template for displaying category posts.
 *
 * @file      category.php
 * @author    Chinh Tran.
 * @link 	  http://enang.net
 */
 
?>

<?php 
global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request)); 

if (strpos($current_url,'video') !== false) {
    get_template_part( 'category', 'video' );
} 
else
{
    get_template_part( 'category', 'post' );
}
?>
