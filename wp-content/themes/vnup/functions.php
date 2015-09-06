<?php
defined('ABSPATH') or die("No script kiddies please!");
add_theme_support( 'post-thumbnails' );

//custom image size
add_image_size( 'featured-slide-img', 658, 311, true );
//add_image_size('featured-slide-img', 658, 311, true);
add_image_size( 'featured-slide-img', 9999, 311, false );

add_image_size( 'mid-image', 175, 92, true );

// register menu
register_nav_menu('category-menu',__( 'Category Menu' ));

//get background image
function get_bg_resize_image($postID, $size)
{
    if ( has_post_thumbnail() ){
        $image_link = wp_get_attachment_image_src(get_post_thumbnail_id($postID), array(175, 92));
        $image_link = $image_link[0]; 
    }
    else 
    {
        $image_link = "/wp-content/themes/enang/images/img_default.jpg";
    }
    return $image_link;
}

//get background image
function get_bg_image($postID)
{
    if ( has_post_thumbnail() ){
        $image_link = wp_get_attachment_url(get_post_thumbnail_id($postID));
    }
    else 
    {
        $image_link = "/wp-content/themes/enang/images/img_default.jpg";
    }
    return $image_link;
}

//get Vietnamese date time
function sw_get_current_weekday() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $weekday = date("l");
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'Thứ hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ tư';
            break;
        case 'thursday':
            $weekday = 'Thứ năm';
            break;
        case 'friday':
            $weekday = 'Thứ sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ bảy';
            break;
        default:
            $weekday = 'Chủ nhật';
            break;
    }
    return $weekday.', '.date('d/m/Y | H:i');
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


												

function get_tag_keyword()
{
    $posttags = get_the_tags();
    $keyword = '';
    if ($posttags) {
      foreach($posttags as $tag) {
        $keyword = $keyword . $tag->name . ', '; 
      }
    }
    return $keyword;
}
												 
function get_relate_catID($catID){
    $allCat = array(0=>'4', 1=>'68', 2=>'3', 3=>'5', 4=>'69', 5=>'8', 6=>'2', 7=>'71', 8=>'74');
    $key = array_search($catID, $allCat);
     
     $result = array();
     for( $i = 0; $i < count($allCat); $i++ ){
        if( count($result) < 4 ){
            $element = ($key + 1)%count($allCat);
            array_push($result, $allCat[$element]);
        }
        $key++;
     }
     return $result;
}												
													
													
												
											
											
												
													
														
												
												
											
									
									