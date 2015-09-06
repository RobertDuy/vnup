<?php
defined('ABSPATH') or die("No script kiddies please!");
add_theme_support( 'post-thumbnails' );

//custom image size
add_image_size( 'featured-slide-img', 658, 311, true );
//add_image_size('featured-slide-img', 658, 311, true);
add_image_size( 'featured-slide-img', 9999, 311, false );

add_image_size( 'mid-image', 175, 92, true );

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
function get_cate_name($postID){
    $category = get_the_category( $postID );
    if($category->parent > 0){
        $parentCat = get_category($category[0]->parent);
        $slug = $parentCat->slug;
    }
    else{
        $slug = $category[0]->slug;
    }
    
    switch($slug){
        case 'doc-bao':
            $result = '<div class=" hidden-xs slide_cat_name slide_doc_bao">'.$category[0]->name.'</div>';
            break;
        case 'tam-su':
            $result = '<div class=" hidden-xs slide_cat_name slide_tam_su">'.$category[0]->name.'</div>';
            break;
        case 'lam-dep':
            $result = '<div class=" hidden-xs slide_cat_name slide_lam_dep">'.$category[0]->name.'</div>';
            break;
        case 'me-va-be':
            $result = '<div class=" hidden-xs slide_cat_name slide_lam_me">'.$category[0]->name.'</div>';
            break;
        case 'kinh-nghiem-hay':
            $result = '<div class=" hidden-xs slide_cat_name slide_kinh_nghiem">'.$category[0]->name.'</div>';
            break;
        case 'nha-cua':
            $result = '<div class=" hidden-xs slide_cat_name slide_nha_cua">'.$category[0]->name.'</div>';
            break;
        case 'giai-tri':
            $result = '<div class=" hidden-xs slide_cat_name slide_thu_gian">'.$category[0]->name.'</div>';
            break;
        case 'show-biz':
            $result = '<div class=" hidden-xs slide_cat_name slide_show_biz">'.$category[0]->name.'</div>';
            break;
        case 'nang-teen':
            $result = '<div class=" hidden-xs slide_cat_name slide_nang_teen">'.$category[0]->name.'</div>';
            break;
        default:
            break;
    }
    return $result;
    
}
//get category name of related post item list
function get_cate_name_re($postID){
    $category = get_the_category( $postID );
    $slug = $category[0]->slug;
    switch($slug){
        case 'doc-bao':
            $result = '<p class="other-cat-name slide_doc_bao">'.$category[0]->name.'</p>';
            break;
        case 'tam-su':
            $result = '<p class="other-cat-name slide_tam_su">'.$category[0]->name.'</p>';
            break;
        case 'lam-dep':
            $result = '<p class="other-cat-name slide_lam_dep">'.$category[0]->name.'</p>';
            break;
        case 'me-va-be':
            $result = '<p class="other-cat-name slide_lam_me">'.$category[0]->name.'</p>';
            break;
        case 'kinh-nghiem-hay':
            $result = '<p class="other-cat-name slide_kinh_nghiem">'.$category[0]->name.'</p>';
            break;
        case 'nha-cua':
            $result = '<p class="other-cat-name slide_nha_cua">'.$category[0]->name.'</p>';
            break;
        case 'giai-tri':
            $result = '<p class="other-cat-name slide_thu_gian">'.$category[0]->name.'</p>';
            break;
        default:
            break;
    }
    return $result;
    
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



//get first new posts of each category before process ajax scroll
function get_cate_new_first_posts($postID_exclude){
   if(isset($_POST['cate_id'])){
        $cat_ID = $_POST['cate_id'];
   }
   else{
        $cat_ID = get_query_var('cat');
   }
   $category = get_category($cat_ID);
   $current_date = $lastDate = date('Y-m-d H:i:s');
    
    $args = array(
        'cat' => $cat_ID,
        'post__not_in'        =>$postID_exclude,
        'posts_per_page'      => 20,
        
    );
    //var_dump($args);
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
              $the_query->the_post(); 
              $para_print_post = array(
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'      => esc_url(get_permalink()),
                    'date'        =>get_the_date('d/m/Y  H:i'),
                    'except'      => get_the_excerpt(),
                    'image_link'      => get_bg_image(get_the_ID())
                );
                $lastDate = get_the_date('Y-m-d H:i:s');
                
               print_post($para_print_post,$category->slug);
                
        }
        echo '<input type="hidden" class="lastpost_date" value="'.$lastDate.'">';
    }
    else{
        echo '<div id="no_news" class="pager pager-padding" style="background-color: #fff;"> 
				    <a class="btn-block btn-md btn"><span>Không còn tin để hiển thị</span></a>
                </div>';
    }                       
    
}
//get first new posts of each home middle category before process ajax scroll
function home_get_first_cate_new_posts($postID_exclude)
{
    $lastDate = date('Y-m-d H:i:s');
    $args = array(
        'post__not_in'        =>$postID_exclude,
        'posts_per_page'      => 18,
   );
    //var_dump($args);
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
              $the_query->the_post(); 
              $para_print_post = array(
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'      => esc_url(get_permalink()),
                    'date'        =>get_the_date('d/m/Y  H:i'),
                    'except'      => get_the_excerpt(),
                    'image_link'      => get_bg_image(get_the_ID())
                );
                
                $lastDate = get_the_date('Y-m-d H:i:s');
                
                
               print_post($para_print_post,$cate_slug);
                
        }
        echo '<input type="hidden" class="lastpost_date" value="'.$lastDate.'">';
    }
    else{
        echo '<div id="no_news" class="pager pager-padding" style="background-color: #fff;"> 
				    <a class="btn-block btn-md btn"><span>Không còn tin để hiển thị</span></a>
                </div>';
    }                       
   
}
// ajax process
add_action('init', 'dvd_enqueue_script');
function dvd_enqueue_script(){
    wp_register_script('ajax_js', get_template_directory_uri() . '/js/ajax.js', array('jquery'), null, false);
    wp_localize_script('ajax_js', 'AJAX', array('url' => admin_url('admin-ajax.php')));
    wp_enqueue_script('ajax_js');
}
//register ajax action for category page
add_action('wp_ajax_get_cate_new_posts', 'get_cate_new_posts');
add_action('wp_ajax_nopriv_get_cate_new_posts', 'get_cate_new_posts');

//register ajax action for home page
add_action('wp_ajax_home_get_cate_new_posts', 'home_get_cate_new_posts');
add_action('wp_ajax_nopriv_home_get_cate_new_posts', 'home_get_cate_new_posts');

//register ajax action for search page
add_action('wp_ajax_get_search_posts', 'get_search_posts');
add_action('wp_ajax_nopriv_get_search_posts', 'get_search_posts');

//register ajax action for search page
add_action('wp_ajax_get_videos', 'get_videos');
add_action('wp_ajax_nopriv_get_videos', 'get_videos');

//register ajax love count action for single page
add_action('wp_ajax_set_post_love', 'set_post_love');
add_action('wp_ajax_nopriv_set_post_love', 'set_post_love');

//register ajax share count action for single page
add_action('wp_ajax_set_post_share', 'set_post_share');
add_action('wp_ajax_nopriv_set_post_share', 'set_post_share');

//register ajax action for process comment
add_action('wp_ajax_comment_process', 'comment_process');
add_action('wp_ajax_nopriv_comment_process', 'comment_process');

//register ajax action for comment like
add_action('wp_ajax_set_comment_like', 'set_comment_like');
add_action('wp_ajax_nopriv_set_comment_like', 'set_comment_like');
add_action('wp_ajax_down_comment_like', 'down_comment_like');
add_action('wp_ajax_nopriv_down_comment_like', 'down_comment_like');

//get new post of each category by ajax
function get_cate_new_posts(){
   if(isset($_POST['cate_id'])){
        $cat_ID = $_POST['cate_id'];
   }
   else{
        $cat_ID = get_query_var('cat');
   }
   $category = get_category($cat_ID);
   $current_date = $_POST['current_date'];
   
    $args = array(
        'cat' => $cat_ID,
        'date_query' => array(
             array(
    			'before' => $current_date,
    		 )
         ),
        'posts_per_page'      => 3,
        'post__not_in'        =>$postID_exclude,
        'orderby' => 'date',
        'order'   => 'DESC',
        
    );
    //var_dump($args);
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
              $the_query->the_post(); 
              $para_print_post = array(
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'      => esc_url(get_permalink()),
                    'date'        =>get_the_date('d/m/Y  H:i'),
                    'except'      => get_the_excerpt(),
                    'image_link'      => get_bg_image(get_the_ID())
                );
                $lastDate = get_the_date('Y-m-d H:i:s');
               print_post($para_print_post,$category->slug);
                
        }
        echo '<input type="hidden" class="lastpost_date" value="'.$lastDate.'">';
    }
    else{
        echo '<div id="no_news" class="pager pager-padding" style="background-color: #fff;"> 
				    <a class="btn-block btn-md btn"><span>Không còn tin để hiển thị</span></a>
                </div>';
    }                       
    
    die();
}


function home_get_cate_new_posts()
{
   
   if(isset($_POST['current_date'])){
        $current_date = $_POST['current_date'];
   }
   else{
        $current_date = date('Y-m-d H:i');
   }
  
   
    $args = array(
        'date_query' => array(
             array(
                //'column' => 'post_date_gmt',
                'before'     => $current_date,
    			
    		 )
         ),
        'posts_per_page'      => 3,
        
    );
    //var_dump($args);
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
              $the_query->the_post(); 
              $para_print_post = array(
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'      => esc_url(get_permalink()),
                    'date'        =>get_the_date('d/m/Y  H:i'),
                    'except'      => get_the_excerpt(),
                    'image_link'      => get_bg_image(get_the_ID())
                );
                $lastDate = get_the_date('Y-m-d H:i:s');
               print_post($para_print_post,$cate_slug);
                
        }
        echo '<input type="hidden" class="lastpost_date" value="'.$lastDate.'">';
    }
    else{
        echo '<div id="no_news" class="pager pager-padding" style="background-color: #fff;"> 
				    <a class="btn-block btn-md btn"><span>Không còn tin để hiển thị</span></a>
                </div>';
    }                 
    
    die();
}

//get post for search page
function get_search_posts(){
   
   $current_date = $_POST['current_date'];
   $query_string = $_POST['query_string'];
   
    $args = array(
        's'         => $query_string,
        'date_query' => array(
             array(
                //'column' => 'post_date_gmt',
                'before'     => $current_date,
    			
    		 )
         ),
        'posts_per_page'      => 6,
        'orderby' => 'date',
        'order'   => 'DESC',
        
    );
    //var_dump($args);
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
              $the_query->the_post(); 
              $para_print_post = array(
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'      => esc_url(get_permalink()),
                    'date'        =>get_the_date('d/m/Y  H:i'),
                    'except'      => get_the_excerpt(),
                    'image_link'      => get_bg_image(get_the_ID())
                );
                $lastDate = get_the_date('Y-m-d H:i:s');
               print_post($para_print_post,$category->slug);
                
        }
        echo '<input type="hidden" class="lastpost_date" value="'.$lastDate.'">';
    }
    else{
        echo '<div id="no_news" class="pager pager-padding" style="background-color: #fff;"> 
				    <a class="btn-block btn-md btn"><span>Không còn tin để hiển thị</span></a>
                </div>';
    }                       
    die();
}
//get videos
function get_videos(){
   
   $current_date = $_POST['current_date'];
   $video_cat = $_POST['video_cat'];
   
    $args = array(
        'cat'               =>$cat_ID,
        'post_type'         => 'video',
        'date_query' => array(
             array(
                //'column' => 'post_date_gmt',
                'before'     => $current_date,
    			
    		 )
         ),
        'posts_per_page'      => 5,
        'orderby' => 'date',
        'order'   => 'DESC',
        
    );
    //var_dump($args);
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
              $the_query->the_post(); 
              $para_print_post = array(
                    'id'            => get_the_ID(),
                    'title'         => get_the_title(),
                    'link'      => esc_url(get_permalink()),
                    'date'        =>get_the_date('d/m/Y  H:i'),
                    'except'      => get_the_excerpt(),
                    'image_link'      => get_bg_image(get_the_ID())
                );
                $lastDate = get_the_date('Y-m-d H:i:s');
               print_video($para_print_post);
                
        }
        echo '<input type="hidden" class="lastpost_date" value="'.$lastDate.'">';
    }
    else{
        echo '<div id="no_news" class="pager pager-padding" style="background-color: #fff;"> 
				    <a class="btn-block btn-md btn"><span>Không còn tin để hiển thị</span></a>
                </div>';
    }                       
    die();
}

//print article
function print_video($para_print_post){
    
    $output .= '<li class="vi_cafe" style="width: 219px;">';
    $output .= '<a href="'.$para_print_post['link'].'">';
    $output .=    '<div class="cafe-image">';
    $output .=      '<img src="'.$para_print_post['image_link'].'" alt="'.$para_print_post['title'].'">';
    $output .=      '<span class="video-cover"></span>';
    $output .=    '</div>';
    $output .=    '<div class="cafe-title">'.$para_print_post['title'].'</div>';
    $output .= '</a>';
    $output .= '</li>';
    
    echo $output;
}
//print article
function print_post($para_print_post, $cate_slug){
    $approveCom = wp_count_comments($para_print_post['id']);
    
    $output .= '<article class="newsCenter" id="post-'.$para_print_post['id'].'" style="border-top: 2px solid '.get_color($cate_slug).';">';
    $output .=     '<div class="autNewsCt row">';
    $output .=         '<div class="top-box-article"> ';
    $output .=              '<span class="ctnAutCt col-md-10 col-sm-10 col-xs-9 col-lg-5">';
    $output .=                  '<h4>';
    $output .=                      '<a href="'.$para_print_post['link'].'">'.$para_print_post['title'].'</a>';
    $output .=                  '</h4>';
    $output .=              '</span>';
    $output .=              '<a class="date-post" href="'.$para_print_post['link'].'">'.$para_print_post['date'].'</a>';
    $output .=              '<div class="icon-list-btn col-lg-4">';
    $output .=                  '<ul>';
    $output .=                      '<li>';
    $output .=                          '<span title="Cảm ơn"><i class="fa fa-heart"></i></span>';
    $output .=                          '<br/>';
    $output .=                          '<span class="value-btn">'.getPostLoves($para_print_post['id']).'</span>';
    $output .=                      '</li>';
    $output .=                      '<li>';
    $output .=                          '<a title="Chia sẻ" class="btn-shareface" data-gtmname="chia-se" rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u='.$para_print_post['link'].'">';
    $output .=                              '<span><i class="fa fa-share-alt"></i></span>';
    $output .=                              '<br/>';
    $output .=                              '<span class="value-btn">'.get_post_shares($para_print_post['id']).'</span>';
    $output .=                          '</a>';
    $output .=                      '</li>';
    $output .=                      '<li>';
    $output .=                          '<span title="Lượt xem" ><i class="fa fa-eye"></i></i></span>';
    $output .=                          '<br/>';
    $output .=                          '<span class="value-btn">'.getPostViews($para_print_post['id']).'</span>';
    $output .=                      '</li>';
    $output .=                  '</ul>';
    $output .=              '</div>';
    $output .=          '</div>';
    $output .=          '<div class="bottom-box-article">';
    $output .=          '<a class="link-post-content" href="'.$para_print_post['link'].'">';
    $output .=              '<p>'.$para_print_post['except'].'</p>';
    $output .=          '</a>';
    $output .=          '<div class="imgArtCt">';
    $output .=              '<em>';
    $output .=                  '<a href="'.$para_print_post['link'].'"><img src="'.$para_print_post['image_link'].'" alt="'.$para_print_post['title'].'"></a>';
    $output .=              '</em>';
    $output .=          '</div>';
    $output .=          '</div>';
    $output .=     '</div>';
    $output .= '</article>';
    
    echo $output;
}
//get different color for different category
function get_color($cate_name){
    switch($cate_name){
        case 'doc-bao':
            $color = '#eb6f70';
            break;
        case 'tam-su':
            $color = '#40a880';
            break;
        case 'lam-dep':
            $color = '#ff8400';
            break;
        case 'me-va-be':
            $color = '#309ac1';
            break;
        case 'kinh-nghiem-hay':
            $color = '#955694';
            break;
        case 'nha-cua':
            $color = '#309ac1';
            break;
        case 'giai-tri':
            $color = '#e347a7';
            break;
        default:
            $color = '#eb6f70';
            break;
            
    }
    
    return $color;
}									
											

												
function set_post_love() {
    if(isset($_POST['post_id']))
    {
        $postID = $_POST['post_id'];
        $count_key = 'post_love_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
        echo 'success';
    }
    else
    {
        echo "fail";
    }
     
    die();
}	

function getPostLoves($postID){
    $count_key = 'post_love_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}

function set_post_share() {
    if(isset($_POST['post_id']))
    {
        $postID = $_POST['post_id'];
        $count_key = 'post_share_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
        echo 'success';
    }
    else
    {
        echo "fail";
    }
     
    die();
}	

function get_post_shares($postID){
    $count_key = 'post_share_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}
											 
//function process insert comment													 
function comment_process()
{
    $comment_author       = ( isset($_POST['cmt_name']) )  ? trim(strip_tags($_POST['cmt_name'])) : 'no value';
    $comment_author_email = ( isset($_POST['cmt-email']) )   ? trim($_POST['cmt_email']) : null;
    $comment_content      = ( isset($_POST['cmt_content']) ) ? trim($_POST['cmt_content']) : null;
    $comment_post_ID      = isset($_POST['post_id']) ? (int) $_POST['post_id'] : 0;
    $comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
    $comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
    $comment_type = '';
    
    
   $commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');

    $comment_id = wp_new_comment( $commentdata );
    
    if ( ! $comment_id ) {
    	echo "Có lỗi xảy ra, vui lòng thử lại";
    }
    else{
        echo "Ý kiến của bạn đã được ghi nhận thành công!";
    }
   
   die();
    
}														
													  
function set_comment_like() {
    if(isset($_POST['comment_id']))
    {
        $commentID = $_POST['comment_id'];
        $count_key = 'comment_like';
        $count = get_comment_meta($commentID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_comment_meta($commentID, $count_key);
            add_comment_meta($commentID, $count_key, '0');
        }else{
            $count++;
            update_comment_meta($commentID, $count_key, $count);
        }
        echo 'success';
    }
    else
    {
        echo "fail";
    }
     
    die();
}	

function down_comment_like() {
    if(isset($_POST['comment_id']))
    {
        $commentID = $_POST['comment_id'];
        $count_key = 'comment_like';
        $count = get_comment_meta($commentID, $count_key, true);
        if($count >0){
            $count--;
            update_comment_meta($commentID, $count_key, $count);
        }else{
            echo "fail";
        }
        echo 'success';
    }
    else
    {
        echo "fail";
    }
     
    die();
}

function get_comment_like($commentID){
    $count_key = 'comment_like';
    $count = get_comment_meta($commentID, $count_key, true);
    if($count==''){
        delete_comment_meta($commentID, $count_key);
        add_comment_meta($commentID, $count_key, '0');
        return 0;
    }
    return $count;
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
    $allCat = array(0=>'171', 1=>'3511', 2=>'3512', 3=>'4', 4=>'1444', 5=>'146', 6=>'164', 7=>'161', 8=>'6');
    $key = array_search($catID, $allCat);
     
     $result = array();
     for( $i = 0; $i < count($allCat); $i++ ){
        if( count($result) < 3 ){
            $element = ($key + 1)%count($allCat);
            array_push($result, $allCat[$element]);
        }
        $key++;
     }
     return $result;
}												
													
													
												
											
											
												
													
														
												
												
											
									
									