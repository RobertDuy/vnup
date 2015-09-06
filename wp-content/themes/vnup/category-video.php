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
<?php $cat_ID = get_query_var('cat');  ?>
<div id="main">
		<!--div id="mainTop">
			<div id="bannerTop" class="hidden-xs">
				<img src="images/banner-top.jpg" alt="banner top"/>
			</div>
		</div-->
        <input type="hidden" class="video_cat" value="<?php echo $cat_ID;  ?>">
		<div id="mainNews" class="container">
			<div id="containerTopRow" class="row">
				<div id="videohomecenterNews"  class="centerNews col-sm-9 col-md-7 col-lg-7" >
					<div id="carousel-feature-posts" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-feature-posts" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-feature-posts" data-slide-to="1" class=""></li>
							<li data-target="#carousel-feature-posts" data-slide-to="2" class=""></li>
							<li data-target="#carousel-feature-posts" data-slide-to="3" class=""></li>
							<li data-target="#carousel-feature-posts" data-slide-to="4" class=""></li>
							<li data-target="#carousel-feature-posts" data-slide-to="5" class=""></li>
						</ol>
						<div class="carousel-inner">
                                
                            <?php $i = 0;
                                $postID_exclude = array(); 
                                    $args = array(
                                        /*'category__not_in'         => 10,
                                        'meta_key'     => 'post_views_count',
                                        array(
                                			'hour'      => 72,
                                			'compare'   => '<=',
                                		),*/
                                        'cat'               =>$cat_ID,
                                        'post_type'         => 'video',
                                    	'posts_per_page'      => 6,  
                                     );
                                        
                                $the_query = new WP_Query($args);
                                // The Loop
                                if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        array_push($postID_exclude,get_the_ID());  
                                        ?>
                                        <div class="item <?php if($i <= 0) echo 'active';?>" style="background: url(<?php echo get_bg_image(get_the_ID()); ?>) no-repeat; background-size: 100% 100%;"> 
            								<img class="f-image"  src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>">
            								<div class="carousel-caption"> 
            									<a style="font-size: 28px;" href="<?php esc_url(the_permalink())?>"><?php the_title();?></a>
            									
                                                <br/>
            									<?php //echo get_cate_name(get_the_ID())?>
            								</div>
            								<p class="gradient"></p>
            							</div>
                                        
						      <?php $i++; }} wp_reset_postdata(); ?>
                        
							
						</div> 
						
					</div><!--end carousel-feature-posts-->
					<div class="other-video-div hidden-xs">
						<ul class="other-video">
                            <?php 
                                     $args = array(
                                        'cat'               =>$cat_ID,
                                        'post_type'         => 'video',
                                    	'posts_per_page'      => 2,
                                        'post__not_in'        =>$postID_exclude, 
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
            										<div class="other-cat-name"> <?php the_title(); ?></div>
            									</div>
            									
            								</a>
            							</li>
                                        
						      <?php  }} wp_reset_postdata(); ?>
                        
						</ul>
					</div><!-- end other-post-div-->
				</div><!-- end homecenterNews-->
				
				
				<div id="colRightNewsBox" class="hidden-xs hidden-sm col-md-3 col-lg-3">
					<div class="" style="margin-bottom: 5px;">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner-300x250.jpg" alt="banner 300x250"/>
					</div>
					<div class="">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner-300x250.jpg" alt="banner 300x250"/>
					</div>
				</div>
                <div id="mainTop" style="padding-top: 40px;">
					<div id="bannerTop" class="hidden-xs">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner-top.jpg" alt="banner top"/>
					</div>
				</div>
				<div id="cafe-webtretho-news">
					<ul class="cafe-post-news">
                         <?php  $args = array(
                                        'cat'               =>$cat_ID,
                                        'post_type'         => 'video',
                                      	'posts_per_page'      => 25,
                                        'post__not_in'        =>$postID_exclude,
                                     );
                                        
                                $the_query = new WP_Query($args);
                                // The Loop
                                if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        array_push($postID_exclude,get_the_ID()); 
                                        ?>
                                        <li class="vi_cafe" style="width: 219px;"> 
                							<a href="<?php esc_url(the_permalink())?>">
                   								<div class="cafe-image">
                                                    <img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>"/>
                                                    <span class="video-cover"></span>
                                                </div>
                   								<div class="cafe-title"> <?php the_title();?></div> 
                                            </a>
                						</li>
                                       
						      <?php $last_post_date = get_the_date('Y-m-d H:i'); } ?>
                              
                              <input type="hidden" class="lastpost_date" value="<?php echo $last_post_date;  ?>"/>
                              
                              
                              <?php } wp_reset_postdata(); ?>
                           
					</ul>
                    <div class="pager pager-padding" style="margin: 30px 15% 30px 15%;"> 
                        <a class="btn-block btn-md btn-danger btn" id="v-view-more"> 
								<span class="hidden-xs">
									<span class="glyphicon glyphicon glyphicon-heart-empty"></span> 
									... Nhấn vào đây để xem tiếp ... 
									<span class="glyphicon glyphicon glyphicon-heart-empty"></span> 
								</span> 
								<span class="visible-xs"> 
									<span class="glyphicon glyphicon glyphicon-heart-empty"></span> 
									... Click để xem tiếp ... 
									<span class="glyphicon glyphicon glyphicon-heart-empty"></span> 
								</span> 
					       </a>
					</div>
					<div id="loadmoreajaxloader" style="display: none;"> 
					   <img alt="Loading more content" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ajax-loader.gif">
					</div>
				</div>
				
				
			</div><!-- end containerTopRow-->
		</div><!-- end mainNews-->
		<span class="sclTopNews hidden-xs" ></span>
   </div><!-- end main-->
   
   <?php get_footer();?>