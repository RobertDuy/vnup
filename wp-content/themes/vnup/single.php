<?php
/**
 * The template for displaying Home page.
 *
 * @file      index.php
 * @package   VnEconomist news
 * @author    Chinh Tran
 * 
 **/
?>
<?php get_header();?>
<?php $category = get_the_category(); $relateCats = get_relate_catID($category[0]->term_id)?>
<div class="wp980">

		<div class="toplistbv">
			<ul class="menutoplistbv">
                <?php $postID_exclude = array(); 
                      $args = array(
                     	'posts_per_page'      => 5,
                      );
                      $the_query = new WP_Query($args);
                      // The Loop
                      if ( $the_query->have_posts() ) {
                            	
                     	while ( $the_query->have_posts() ) {
                    		$the_query->the_post();
                        array_push($postID_exclude,get_the_ID()); 
                      ?>
                        <li>
        					<a class="a_toplistbv" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title() ?>">
        						<img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title() ?>  " title="<?php the_title() ?>" width="180px" />
        					</a>
        					<p><a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?> "><?php the_title() ?></a></p>
        				</li>
                                    
                <?php }} wp_reset_postdata(); ?>
            
			
				<div class="clear"></div>
			</ul>
		</div>

	<div class="topbanner" style="margin-top: 0;">
		<img src="<?php echo get_template_directory_uri(); ?>/images/topbanner.jpg" alt="Chứng khoán " title="Chứng khoán  " />
	</div>
	<div class="vachborder"></div>
	
	<div class="content">
		<div class="contentleft">
        <?php if (have_posts()) { ;?>
        <?php while (have_posts()) : the_post(); ?>	
			<div class="fl w100pc mb5">
				<div class="breadcumcontain">
					<p class="titleheaderbv"><a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>" title="<?php  echo $category[0]->cat_name;?>"><span><?php  echo $category[0]->cat_name;?> </span></a> </p>
				</div>
				<span class="timverbvvth">
				<?php the_date('H:i  d/m/Y'); ?>
				</span>
				<a href="#" class="printbt" target="_blank" rel="nofollow">
				 <i class="sprite"></i>
				 Print</a>
			</div>
		<div>
			<h1 class="h1titleheaderbvt"><?php the_title();?></h1>

		</div>
		<div class="maincontentleft">

			<div class="leftmaincontentleft">
				<?php the_content(); ?>
                
			<div class="sharebaiviet">
            
			  <div class="fl mr5">  
				<div class="fb-send" data-href="<?php esc_url(the_permalink())?>"></div>
			  </div>
			  <div class="fl mr20">  
				  <div class="fb-like" data-href="<?php esc_url(the_permalink())?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			  </div>
			  

				<div class="mshare-detail">
				</div>  
				<div class="clear"></div>
			</div>

		<div class="tagbaiviet">
			<span class="ntagtagbaiviet">TỪ KHÓA</span>
            <?php $posttags = get_the_tags(); //var_dump($posttags);?>
            <?php if(!empty($posttags)){?>
			<span class="lsttagbaiviet">
                <?php foreach($posttags as $tag){?>
                <a href="<?php echo get_tag_link($tag->term_id); ?>" title=" <?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
                                            
                 <?php } ?>
			<div class="clear"></div>
			</span>
            <?php } ?>
			<div class="clear"></div>
		</div>

	</div>
	<div class="rightmaincontentleft" id="boxRightDetail">

	<div class="box1rightmaincontentleft">
		<p class="ttrightmaincontentleft">XEM NHIỀU</p>
		<ul class="mnrgmcontentleft">
            <?php  $i=0;
            $args = array(
                //'date_query' => array(
                  //    array(
                    //		'after' => '30 days ago'
                      //)
		          //),
             	'posts_per_page'      => 6,
                'meta_key'            => 'post_views_count',
                'orderby'             =>  'meta_value_num',
                'order'               => 'DESC',
            );
            $the_query = new WP_Query($args);
            // The Loop
            if ( $the_query->have_posts() ) {
                                	
           	while ( $the_query->have_posts() ) {
          		$the_query->the_post();
                if($i <= 0){
            ?>
                <li>
    				<a class="a_mnrgm" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title() ?> ">
    					<img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title() ?> " title="<?php the_title() ?> " width="140px" />
    				</a>
    				<p class="ficontenleft"><a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?> "><?php the_title() ?> </a></p>
    			</li>
                
            <?php } else {?>
                <li>
    				<p><a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>"><?php the_title() ?></a></p>
    			</li>
                                        
            <?php } $i++; } } wp_reset_postdata(); ?>
        

		</ul>
	</div>

	<div class="box1rightmaincontentleft">
		<p class="ttrightmaincontentleft">MỚI NHẤT</p>
		<ul class="mnrgmcontentleft">
            <?php  $i=0;
            $args = array(
             	'posts_per_page'      => 6,
                'post__not_in'        =>$postID_exclude,
            );
            $the_query = new WP_Query($args);
            // The Loop
            if ( $the_query->have_posts() ) {
                                	
           	while ( $the_query->have_posts() ) {
          		$the_query->the_post();
                if($i <= 0){
            ?>
                <li>
    				<a class="a_mnrgm" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title() ?> ">
    					<img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title() ?> " title="<?php the_title() ?> " width="140px" />
    				</a>
    				<p class="ficontenleft"><a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?> "><?php the_title() ?> </a></p>
    			</li>
                
            <?php } else {?>
                <li>
    				<p><a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>"><?php the_title() ?></a></p>
    			</li>
                                        
            <?php } $i++; } } wp_reset_postdata(); ?>
        
			
		</ul>
	</div>

    
</div>

	<div class="clear"></div>
</div>
<?php endwhile; ?>
<?php } ?>
	<div id="boxThreadDetail"></div>


	<div class="clear"></div>

	<div class="w100pc fl adv_botdetail mb10">
		<center>
		<script type="text/javascript" src="http://admicro1.vcmedia.vn/ads_codes/ads_box_200.ads"></script> 
		</center>
	</div>

	<div class="footertinbkhac">
		<p class="ttrightmaincontentleft">TIN LIÊN QUAN</p>
	<ul class="lstfootertinbkhac">
		<li>
			<a href="#" title=" ">
				<img src="<?php echo get_template_directory_uri(); ?>/images/0-21797.jpg" alt="10 đại " title="10 đại " width="150px" />
			</a>
			<p><a href="#" title="10 đại  ">10 đại biểu không biểu quyết thông qua ngân sách</a>
			</p>
		</li>
		<li><a href="#" title="Nhiều thay  "><img src="<?php echo get_template_directory_uri(); ?>/images/tin-dung-nong-nghiep-a0b97.jpg" alt="Nhiều " title="Nhiều thay " width="150px" /></a>
		<p><a href="#" title="Nhiều thay  ">Nhiều thay đổi về ưu đãi tín dụng nông nghiệp</a></p>
		</li>
		<li>
			<a href="#" title="fdafda"><img src="<?php echo get_template_directory_uri(); ?>/images/gold-5a005.jpg" alt="Giá  " title="Giá vàng  " width="150px" /></a>
			<p><a href="#" title="daf">Giá vàng chạm đáy từ cuối năm 2013</a></p>
		</li>
		<li>
			<a href="#" title="Forbes: Vietcombank "><img src="<?php echo get_template_directory_uri(); ?>/images/Vietcombank-new-708ff.jpg" alt="Forbes: Vietcombank  " title="Forbes: Vietcombank df" width="150px" /></a>
			<p><a href="#" title="Forbesd">Forbes: Vietcombank là ngân hàng niêm yết tốt nhất Việt Nam</a></p>
		</li>
		<div class="clear"></div>

	</ul>

	</div>

	<div class="footertinbkhac1">
		<ul class="mnfootertinbkhac1">
			<li><a href="#" title=" thuế điện tử">Ngân hàng đồng loạt triển khai dịch vụ nộp thuế điện tử</a></p>
			</li>
			<li><a href="#" title="Cấm giới hạn">Cấm ngân hàng cho vay cổ đông sở hữu quá giới hạn</a></p></li>
			<li><a href="#" title="dfdf">“Lý do thứ 7” để giữ nguyên tỷ giá</a></p></li>
			<li><a href="#" title="Sức ">Sức ép đảo chiều lãi suất đến đâu?</a></p></li>
			<div class="clear"></div>
		</ul>
		<ul class="mnfootertinbkhac1 fr">
			<li><a href="#" title="Tỷ gdf">Tỷ giá, lãi suất và thử thách kiểm soát lạm phát</a></p></li>
			<li><a href="#" title="fdfd">Chính phủ yêu cầu ổn định tỷ giá</a></p></li>
			<li><a href="#" title="fdf">Các ngân hàng làm ăn thế nào trong quý 1/2015?</a></p></li>
			<li><a href="#" title="năm rưỡi">Giá vàng SJC xuống đáy 1 năm rưỡi</a></p></li>
			<div class="clear"></div>

		</ul>
	</div>

</div>
<div class="contentright">

	<div class="search">
		<?php get_search_form(true); ?>
	</div>
	<div class="ads_zone1">
		<div class="zonitem"><img src="<?php echo get_template_directory_uri(); ?>/images/adzone1.jpg" alt="" title=""/></div>
		<div class="zonitem"><img src="<?php echo get_template_directory_uri(); ?>/images/adzone1.jpg" alt="" title=""/></div>
	</div>
	<div class="boxright2">
		<span class="boxrighttitle"><a href="<?php echo esc_url(get_category_link((int)$relateCats[0]))?>" title="<?php echo get_cat_name((int)$relateCats[1]);?>"><?php echo get_cat_name((int)$relateCats[0]);?></a></span>
		<div class="topright2">
			<ul>
            <?php  $i = 0;
                 $args = array(
                    'cat'            => (int)$relateCats[0],
                	'posts_per_page'      => 4,
                 );
                 $the_query = new WP_Query($args);
                 // The Loop
                 if ( $the_query->have_posts() ) {
                                	
                	while ( $the_query->have_posts() ) {
                   		$the_query->the_post();
                        array_push($postID_exclude,get_the_ID()); 
                    ?>
                    <?php  if($i==2) echo '<div class="clearfix"></div>' ; ?>
                        <li class="fl <?php echo ($i%2==1)? 'margin_left': '' ; ?>"> 
            				<a class="a_ultopright2" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title() ?>">
            					<img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" width="145px" />
            				</a> 
            				<h4><a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?> " class="htitleright2">Phó thủ tướng: 6 vấn đề làm khách nước ngoài e ngại</a></h4> 
            			</li>
                        
                    						
        		<?php  $i++; }} wp_reset_postdata(); ?>
            
				<li class="clear"></li>
			</ul>
		</div>
	</div>
	<div class="boxright3">
		<span class="boxrighttitle">
			<a href="<?php echo esc_url(get_category_link((int)$relateCats[1]))?>" title="<?php echo get_cat_name((int)$relateCats[1]);?>"><?php echo get_cat_name((int)$relateCats[1]);?></a>
		</span>
		<div class="topright3">
			<ul> 
                <?php  $i = 0;
                 $args = array(
                    'cat'            => (int)$relateCats[1],
                	'posts_per_page'      => 4,
                 );
                 $the_query = new WP_Query($args);
                 // The Loop
                 if ( $the_query->have_posts() ) {
                                	
                	while ( $the_query->have_posts() ) {
                   		$the_query->the_post();
                    ?>
                    <?php  if($i < 1) { ?>
                        <li> 
        					<a class="a_topright3" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title=" <?php the_title() ?>"> 
        						<img src="<?php echo get_bg_image(get_the_ID());?>" alt=" <?php the_title() ?>" title=" <?php the_title() ?>" width="300px" />
        					</a>
        					<a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?> " class="titletopmid2 titletopright3"><?php the_title() ?></a>
        				</li>
                        
                        <?php } else {?>
                    	<li> 
        					<a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>"> </a>
        					<a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>" class="itemtopright3"><?php the_title() ?></a>
        				</li> 					
        		<?php  } $i++; }} wp_reset_postdata(); ?>
            
			</ul>
		</div>
	</div>
    <div class="ads_zone1">
		<div class="zonitem"><img src="<?php echo get_template_directory_uri(); ?>/images/adzone1.jpg" alt="" title=""/></div>
		
	</div>
    
    <div class="boxright2">
		<span class="boxrighttitle"><a href="<?php echo esc_url(get_category_link((int)$relateCats[2]))?>" title="<?php echo get_cat_name((int)$relateCats[2]);?>"><?php echo get_cat_name((int)$relateCats[2]);?></a></span>
		<div class="topright2">
			<ul>
            <?php  $i = 0;
                 $args = array(
                    'cat'            => (int)$relateCats[2],
                	'posts_per_page'      => 4,
                 );
                 $the_query = new WP_Query($args);
                 // The Loop
                 if ( $the_query->have_posts() ) {
                                	
                	while ( $the_query->have_posts() ) {
                   		$the_query->the_post();
                        array_push($postID_exclude,get_the_ID()); 
                    ?>
                    <?php  if($i==2) echo '<div class="clearfix"></div>' ; ?>
                        <li class="fl <?php echo ($i%2==1)? 'margin_left': '' ; ?>"> 
            				<a class="a_ultopright2" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title() ?>">
            					<img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" width="145px" />
            				</a> 
            				<h4><a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?> " class="htitleright2">Phó thủ tướng: 6 vấn đề làm khách nước ngoài e ngại</a></h4> 
            			</li>
                        
                    						
        		<?php  $i++; }} wp_reset_postdata(); ?>
            
				<li class="clear"></li>
			</ul>
		</div>
	</div>
    <div class="ads_zone1">
		<div class="zonitem"><img src="<?php echo get_template_directory_uri(); ?>/images/adzone1.jpg" alt="" title=""/></div>
		<div class="zonitem"><img src="<?php echo get_template_directory_uri(); ?>/images/adzone1.jpg" alt="" title=""/></div>
	</div>
		<div class="fl w100pc">

		</div>
	</div>
	</div>
	<div class="clear"></div>

	<div id="adm_sticky_footer" style="clear:both"></div><!-- chặn stick adv để nó khỏi kéo xuống che box này đi-->
	<div class="footertinbkhac2">
		<a class="ttlstfootertinbkhac2" href="<?php echo esc_url(get_category_link((int)$relateCats[3]))?>" title="<?php echo get_cat_name((int)$relateCats[3]);?>"><?php echo get_cat_name((int)$relateCats[3]);?></a>
		<ul class="lstfootertinbkhac2">
            <?php  
                 $args = array(
                    'cat'            => (int)$relateCats[3],
                	'posts_per_page'      => 5,
                 );
                 $the_query = new WP_Query($args);
                 // The Loop
                 if ( $the_query->have_posts() ) {
                                	
                	while ( $the_query->have_posts() ) {
                   		$the_query->the_post();
                        array_push($postID_exclude,get_the_ID()); 
                    ?>
                       <li class="lstfootertinbkhac2first">
                            <a class="a_lstfooter" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title() ?>">
                            <img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" width="176px" />
                            </a>
            			     <p><a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>"><?php the_title() ?></a></p>
                        </li> 
                    						
        		<?php  }} wp_reset_postdata(); ?>
        
			

			<div class="clear"></div>
		</ul>
	</div>
</div>


<div id="adm_sticky_footer" style="clear:both">
	<div id="divADV" class="adv_footerBanner">
	<div class="BottomBanner" align="center">
		
	</div>
	</div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php get_footer();?>