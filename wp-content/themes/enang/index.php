<?php
/**
 * The template for displaying Home page.
 *
 * @file      index.php
 * @package   Enang news
 * @author    Chinh Tran
 * 
 **/
?>
<?php get_header();?>

<div id="main">
		<!--div id="mainTop">
			<div id="bannerTop" class="hidden-xs">
				<img src="images/banner-top.jpg" alt="banner top"/>
			</div>
		</div-->
		<div id="mainNews" class="container">
			<div id="containerTopRow" class="row">
				<div id="homecenterNews"  class="centerNews col-sm-9 col-md-7 col-lg-7" >
					<div id="carousel-feature-posts" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-feature-posts" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-feature-posts" data-slide-to="1" class=""></li>
							<li data-target="#carousel-feature-posts" data-slide-to="2" class=""></li>
						
						</ol>
						<div class="carousel-inner">
                                
                            <?php $i = 0; $today = getdate();
                                $postID_exclude = array(); 
                                    $args = array(
                                        array(
                                 			'hour'      => 24,
                                			'compare'   => '<=',
                                  		),
                                        'posts_per_page'      => 3,
                                        'orderby'             =>  'meta_value_num',
                                        'meta_key'            => 'level',
                                        'order'               => 'DESC',
                                    	
                                     );
                                        
                                $the_query = new WP_Query($args);
                                // The Loop
                                if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        array_push($postID_exclude,get_the_ID());  
                                        ?>
                                        <div class="item <?php if($i <= 0) echo 'active';?>" style="background: url(<?php echo get_bg_image(get_the_ID()); ?>) no-repeat; background-size: cover;"> 
            								<img class="f-image"  src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>">
            								<div class="carousel-caption"> 
            									<a href="<?php esc_url(the_permalink())?>"><?php the_title();?></a>
            									<br>
            									<?php echo get_cate_name(get_the_ID())?>
            								</div>
            								<p class="gradient"></p>
            							</div>
                                        
						      <?php $i++; }} wp_reset_postdata(); ?>
                        
							
						</div> 
						
					</div><!--end carousel-feature-posts-->
					<div class="other-post-div hidden-xs">
						<ul class="other-post">
                            <?php 
                                     $args = array(
                                        array(
                                 			'hour'      => 24,
                                			'compare'   => '<=',
                                  		),
                                        'post__not_in'        =>$postID_exclude,
                                        'posts_per_page'      => 4,
                                        'orderby'             =>  'meta_value_num',
                                        'meta_key'            => 'level',
                                        'order'               => 'DESC',
                                        
                                         
                                     );
                                        
                                $the_query = new WP_Query($args);
                                // The Loop
                                if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        array_push($postID_exclude,get_the_ID());  
                                        ?>
                                        <li> 
            								<a href="<?php esc_url(the_permalink())?>">
            									<div class="left-other-post"> 
            										<img class="img-other-post" src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>">
            										<?php echo get_cate_name_re(get_the_ID())?>
            									</div>
            									<div class="right-other-post"> <?php the_title();?></div> 
            								</a>
            							</li>
                                        
						      <?php  }} wp_reset_postdata(); ?>
                        
						</ul>
					</div><!-- end other-post-div-->
				</div><!-- end homecenterNews-->
				
				<div id="homecolLeftNews" class="hidden-xs col-sm-3 hidden-md col-lg-2" style="background-color: none !important;">
					<div class="news-list" >
						<ul>
                            <?php   $i = 0;
                                    $args = array(
                                        array(
                                 			'hour'      => 24,
                                			'compare'   => '<=',
                                  		),
                                        'post__not_in'        =>$postID_exclude,
                                        'posts_per_page'      => 4,
                                        'orderby'             =>  'meta_value_num',
                                        'meta_key'            => 'level',
                                        'order'               => 'DESC',
                                        );
                                        
                                $the_query = new WP_Query($args);
                                // The Loop
                                if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        array_push($postID_exclude,get_the_ID());  
                                        ?>
                                        
                                        <li> 
                                			<a href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_resize_image(get_the_ID(), 'mid-image'); ?>) no-repeat;width: 117px; height: 80px; display: block; margin-bottom: 8px; background-size: cover;" class="img"><img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>" style="display: none;"></a>
                                			 <a style="display: block; height: 46px; overflow: hidden;" href="<?php esc_url(the_permalink())?>" title="<?php the_title();?>"><?php the_title();?> </a>
                                		</li>
						      <?php  }  } wp_reset_postdata(); ?>
                            
						</ul>
					</div>
				</div>
				
				<div id="colRightNewsBox" class="hidden-xs hidden-sm col-md-3 col-lg-3">
					<div class="" style="margin-bottom: 5px;">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner_300x250_1.jpg" alt="banner 300x250"/>
					</div>
					<div class="">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner_300x250_2.jpg" alt="banner 300x250"/>
					</div>
				</div>
				<div id="cafe-webtretho-news" class="hidden-xs">
					<ul class="cafe-post-news">
                         <?php  $args = array(
                                    array(
                                 			'hour'      => 24,
                                			'compare'   => '<=',
                       		        ),
                                    
                                    'post__not_in'        =>$postID_exclude,
                                    'posts_per_page'      => 6,
                                    'orderby'             =>  'meta_value_num',
                                    'meta_key'            => 'level',
                                    'order'               => 'DESC',
                                );
                                        
                                $the_query = new WP_Query($args);
                                // The Loop
                                if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        array_push($postID_exclude,get_the_ID()); 
                                        ?>
                                        <li> 
                							<a href="<?php esc_url(the_permalink())?>">
                								<div class="cafe-image"> <img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>"></div>
                								<div class="cafe-title"> <?php the_title();?></div> </a>
                						</li>
                                       
						      <?php  }} wp_reset_postdata(); ?>
                    
					</ul>
				</div>
				<div id="mainTop">
					<div id="bannerTop" class="hidden-xs">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner-top.jpg" alt="banner top"/>
					</div>
				</div>
				<div id="containerNews">
					<div id="colLeftNewsContent" class="hidden-xs col-sm-3 hidden-md col-lg-2" >
						<div id="sticky-left-sidebar">
							<h2 class="title-h2">Chào buổi sáng</h2>
							<div class="news-list ct_newlist">
								<ul>
                                    <?php  $i=0; $args = array(
                                        'category_name' => 'chao-buoi-sang',
                                    	'posts_per_page'      => 12,
                                        'post__not_in'        =>$postID_exclude,
                                        'orderby'             =>  'date',
                                        'order'               => 'DESC',  
                                     );
                                        
                                $the_query = new WP_Query($args);
                                // The Loop
                                if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        array_push($postID_exclude,get_the_ID());
                                        if($i <= 0){
                                        ?>
                                        <li> 
                                            <a href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID()); ?>) no-repeat;width: 142px; height: 92px; display: block; margin-bottom: 8px; background-size: cover;" class="img"><img src="<?php echo get_bg_image(get_the_ID()); ?>" alt=" <?php the_title();?>" style="display: none;"/></a>
    										<a href="<?php esc_url(the_permalink())?>"> <?php the_title();?> </a> 
    									</li>
                                       
                                       <?php } else {?>
                                       <li> 
    										<a href="<?php esc_url(the_permalink())?>"> <?php the_title();?> </a> 
    									</li>
						      <?php  } $i++; } } wp_reset_postdata(); ?>
                                								
								</ul>
							</div>
						</div>
					</div><!-- end colLeftNewsContent-->
					<div class="visible-xs">
						<div id="mobile_category_list" class="row visible-xs">
							<div class="item col-xs-6 clearfix">
								<div id="mobile_btn_rea" class="ctn_cateRea mobile_btn_category">
									<div> 
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/video"> 
											<span>Video</span>
										</a>
									</div>
								</div>
							</div>
							<div class="item col-xs-6 clearfix">
								<div id="mobile_btn_conf" class="ctn_cateConf mobile_btn_category">
									<div> 
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/sao"> 
											<span>Sao</span>
										</a>
									</div>
								</div>
							</div>
							<div class="item col-xs-6 clearfix">
								<div id="mobile_btn_bea" class="ctn_cateBea mobile_btn_category">
									<div> 
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/cine"> 
											<span>Ciné</span>
										</a>
									</div>
								</div>
							</div>
							<div class="item col-xs-6 clearfix">
								<div id="mobile_btn_mom" class="ctn_cateMom mobile_btn_category">
									<div> 
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/musik"> 
											<span>Musik</span>
										</a>
									</div>
								</div>
							</div>
							<div class="item col-xs-6 clearfix">
								<div id="mobile_btn_exp" class="ctn_cateExp mobile_btn_category">
									<div> 
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/lam-dep"> 
											<span>Làm đẹp</span>
										</a>
									</div>
								</div>
							</div>
							<div class="item col-xs-6 clearfix">
								<div id="mobile_btn_nang" class="ctn_cateCaf mobile_btn_category">
									<div> 
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/nang-2"> 
											<span>Nàng 2.0</span> 
										</a>
									</div>
								</div>
							</div>
						
						</div>
					</div><!-- end visible-xs-->
					<div id="centerNewsContent" class=" col-sm-9 col-md-7 col-lg-7">
						<div id="gotoCenter" class="mainCt">
                            
							<div id="ctnNavCt"></div>
							<div id="contentBox">
								<div id="docbao-tabs" class="activeBox nang_wtt"> 
									<input class="page cate_slug_box" type="hidden" value="doc-bao"> 
									<?php echo home_get_first_cate_new_posts($postID_exclude);?>
				                </div>
							</div><!-- end contentBox-->
						</div><!-- end gotoCenter-->
						<div id="loadmoreajaxloader" style="display: none;"> 
							<img alt="Loading more content" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ajax-loader.gif">
						</div>
					</div><!-- end centerNewsContent-->
					<div id="colRightNews" class="hidden-xs hidden-sm col-md-3 col-lg-3">
						<div id="colRightNewsContainer">
                            <h2 class="title-h2">Video mới nhất</h2>
							<div class="">
								<div class="baivietyeuthich">
									<ul class="baiviet-list">
                                        <?php 
                                            $video_exclude = array();
                                            $args = array(
                                                'post_type'          =>'video',
                                            	'posts_per_page'      => 6, 
                                             );
                                        
                                            $the_query = new WP_Query($args);
                                            // The Loop
                                            if ( $the_query->have_posts() ) {
                                            	
                                            	while ( $the_query->have_posts() ) {
                                            		$the_query->the_post();
                                                    array_push($video_exclude,get_the_ID()); 
                                                    ?>
                                                    <li> 
            											<a href="<?php esc_url(the_permalink())?>">
            												<div class="avatar-img"> 
            													<img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>">
            												</div>
            												<div class="right-list-baiviet">
            													<div class="content-baiviet"><?php the_title();?></div>
            												
            												</div> 
            											</a>
            										</li>
                                                    
                                                    
            						      <?php }} wp_reset_postdata(); ?>
                                    
									</ul>
								</div>
								<div id="div-gpt-ad-1373285386337-0">
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner_300x250_3.jpg" alt="banner 300x250"/>
								</div>
                                <div class="baivietyeuthich">
									<ul class="baiviet-list">
                                        <?php 
                                            $args = array(
                                                'post_type'          =>'video',
                                            	'posts_per_page'      => 6, 
                                                'post__not_in'        =>$video_exclude,
                                             );
                                        
                                            $the_query = new WP_Query($args);
                                            // The Loop
                                            if ( $the_query->have_posts() ) {
                                            	
                                            	while ( $the_query->have_posts() ) {
                                            		$the_query->the_post();
                                                    array_push($video_exclude,get_the_ID()); 
                                                    ?>
                                                    <li> 
            											<a href="<?php esc_url(the_permalink())?>">
            												<div class="avatar-img"> 
            													<img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>">
            												</div>
            												<div class="right-list-baiviet">
            													<div class="content-baiviet"><?php the_title();?></div>
            												
            												</div> 
            											</a>
            										</li>
                                                    
                                                    
            						      <?php }} wp_reset_postdata(); ?>
                                    
									</ul>
								</div>
                                <div id="div-gpt-ad-1373285386337-0">
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner_300x250_4.jpg" alt="banner 300x250"/>
								</div>
                                <div class="baivietyeuthich">
									<ul class="baiviet-list">
                                        <?php 
                                            $args = array(
                                                'post_type'          =>'video',
                                            	'posts_per_page'      => 6, 
                                                'post__not_in'        =>$video_exclude,
                                             );
                                        
                                            $the_query = new WP_Query($args);
                                            // The Loop
                                            if ( $the_query->have_posts() ) {
                                            	
                                            	while ( $the_query->have_posts() ) {
                                            		$the_query->the_post();
                                                    array_push($video_exclude,get_the_ID());
                                                    ?>
                                                    <li> 
            											<a href="<?php esc_url(the_permalink())?>">
            												<div class="avatar-img"> 
            													<img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>">
            												</div>
            												<div class="right-list-baiviet">
            													<div class="content-baiviet"><?php the_title();?></div>
            												
            												</div> 
            											</a>
            										</li>
                                                    
                                                    
            						      <?php }} wp_reset_postdata(); ?>
                                    
									</ul>
								</div>
                                <div id="div-gpt-ad-1373285386337-0">
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner_300x250_5.jpg" alt="banner 300x250"/>
								</div>
                                <div id="sticky-right-sidebar" >
                                <h2 class="title-h2" style="margin-top: 10px; width: 300px;">Xem nhiều hôm nay</h2>
                                <div  class="baivietyeuthich">
									<ul class="baiviet-list">
                                        <?php 
                                            $args = array(
                                                array(
                                        			'hour'      => 48,
                                        			'compare'   => '<=',
                                        		),
                                            	'posts_per_page'      => 6,
                                                'orderby'             =>  'meta_value_num',
                                                'meta_key'     => 'post_views_count',
                                                'order'               => 'DESC',  
                                             );
                                        
                                            $the_query = new WP_Query($args);
                                            // The Loop
                                            if ( $the_query->have_posts() ) {
                                            	
                                            	while ( $the_query->have_posts() ) {
                                            		$the_query->the_post();
                                                    ?>
                                                    <li> 
            											<a href="<?php esc_url(the_permalink())?>">
            												<div class="avatar-img"> 
            													<img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>">
            												</div>
            												<div class="right-list-baiviet">
            													<div class="content-baiviet"><?php the_title();?></div>
            												
            												</div> 
            											</a>
            										</li>
                                                    
                                                    
            						      <?php }} wp_reset_postdata(); ?>
                                    
									</ul>
								</div>
                                </div>
							</div><!-- end sticky-right-sidebar-->
						</div> <!-- end colRightNewsContainer-->
					</div><!-- end colRightNews-->
				</div><!-- end containerNews-->
			</div><!-- end containerTopRow-->
		</div><!-- end mainNews-->
		<span class="sclTopNews hidden-xs" ></span>
   </div><!-- end main-->
   
    <!--script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.min.js"></script-->
    <!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
    <!--script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.js"></script-->
	
  </body>

</html>