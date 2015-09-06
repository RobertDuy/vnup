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
<?php $category = get_the_category(); $relateCats = get_relate_catID($category[0]->term_id)?>

<div id="main">
		<div id="mainNews" class="container">
			<div id="containerTopRow" class="row">
                
				<div id="mainTop">
					<div id="bannerTop" class="hidden-xs">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner-top.jpg" alt="banner top"/>
					</div>
				</div>
                <div class="breadscrum">
        				<a href="<?php echo esc_url( get_category_link( $category[0]->category_parent ) ); ?>"><span><?php echo  ($category[0]->category_parent > 0)? get_cat_name($category[0]->category_parent).'' : ""; ?></span></a>
                        <a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>"><span><?php  echo '>> '.$category[0]->cat_name;?> </span></a> 
        			</div>
				<div id="colleftDetail" class=" col-md-9 col-lg-9">
                    
                     <?php if (have_posts()) {  //echo getPostViews(get_the_ID());?>		
                  			<?php while (have_posts()) : the_post(); ?>
                            <?php $category = get_the_category();   ?>
                                    <article class="newsCenter" id="post-733565">
                						<div class="autNewsCt row">
                							<div class="top-box-article"> 
                								<span class="ctnAutCt col-md-10 col-sm-10 col-xs-9 col-lg-5"> 
                									<h4> 
                										<a href="<?php esc_url(the_permalink())?>"><?php the_title();?></a>
                									</h4>  
                								</span>
                								<a class="date-post" ><?php the_date('H:i  d/m/Y'); ?></a> 
                								<div class=" hidden-xs icon-list-btn col-lg-4">
                									<ul class="list-tool">
                										<li> 
                											<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url(the_permalink())?>&amp;display=popup&amp;ref=plugin" title="Facebook">
                												<img class="icon-faces" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/transparent.png">
                											</a>
                										</li>
                										<li> 
                											<a target="_blank" href="https://plus.google.com/share?url=<?php esc_url(the_permalink())?>" title="google plus">
                												<img class="icon-googles" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/transparent.png">
                											</a>
                										</li>
                										<li> 
                											<a href="mailto:ducchinhbk@gmail.com" title="">
                											<img class="icon-mail" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/transparent.png">
                											</a>
                										</li>
                										<li> 
                											<a onclick="window.print();" title="">
                											<img class="icon-print" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/transparent.png">
                											</a>
                										</li>
                									</ul>
                								</div>
                							</div>
                							<div class="bottom-box-article">
                    							<?php the_content(); ?>
                							</div>
                							
                						</div>
                					</article>
                            <?php setPostViews(get_the_ID()); ?>
                            
                            <div class="like-share-con">
    						<p class="like_button">
    							<span class="btn-qt">
    								<a href="javascript:;" title="quan tâm" class="tto_object_like_btn">quan tâm</a>
    								<span class="sl"><span></span><?php echo getPostLoves(get_the_ID()); ?></span>
    							</span>
    						</p>
    						<div class="like_share" style="width: 100%;float: left; margin-bottom: 55px; border: 1px solid #ddd;padding: 5px;">
                            	<div class="like" style="float:left; width:80px;">
                                		<div class="fb-like" data-href="<?php echo esc_url(get_the_permalink())?>" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>
                            	</div>
                            	<div class="share" style="text-align:right; width:100%;"> 
                                		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/share_ngay.png" style="margin-bottom: 15px">
                                		<a rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(get_the_permalink())?>" id="share-btn">
                                    		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/share_button.png" alt="Share" style="margin-left:2px" title="Share">
                                		</a>
                            	</div>
    						</div>
                            <input type="hidden" id="post_id" name="post_id" value="<?php echo get_the_ID(); ?>"/>
    					</div>
                        <ul class="block-key"> <?php $posttags = get_the_tags();?>
    			             <li>Tags</li>
                             <?php if(!empty($posttags)){
                                    foreach( $posttags as $tag){
                             ?>
                                        <li>
                				            <a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
                			             </li>
                             <?php           
                                    }
                                }?>
    					</ul>
                            <?php endwhile; ?>
                     <?php } ?>
					
					
					<div class="re-posts"> 
                        <h2>Bài viết liên quan</h2>
                        <div id="cafe-webtretho-news">
                            <ul class="cafe-post-news">
                                 <?php  $postID_exclude= array(); array_push($postID_exclude, get_the_ID());
                                        $args = array(
                                                'cat'                => $category[0]->term_id,
                                            	'posts_per_page'      => 8,
                                                'post__not_in'        =>$postID_exclude,
                                                'orderby'             =>  'meta_value_num',
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
                           								<div class="cafe-image">
                                                            <img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>"/>
                                                            
                                                        </div>
                           								<div class="cafe-title"> <?php the_title();?></div> 
                                                    </a>
                        						</li>
                                               
        						      <?php  }} wp_reset_postdata(); ?>
                            
        					</ul>
                        </div>
					</div>
                    <div class="re-posts"> 
                        <h2>Video xem nhiều</h2>
                        <div id="cafe-webtretho-news" >
                        <style> .active_video p iframe{ width: 95%; height: 410px;} </style>
                            <div class="active_video" class="hidden-xs">
                                <?php  $postID_exclude = array();
                                        $args = array(
                                                'category_name' => 'video',
                                                'post_type'     =>'video',
                                            	'posts_per_page'      => 1,
                                                'orderby'               => 'rand',  
                                             );
                                                
                                        $the_query = new WP_Query($args);
                                        // The Loop
                                        if ( $the_query->have_posts() ) {
                                        	
                                        	while ( $the_query->have_posts() ) {
                                        		$the_query->the_post();
                                                array_push($postID_exclude,get_the_ID()); 
                                                ?>
                                                <?php the_content();?>
                                               
        						      <?php  }} wp_reset_postdata(); ?>
                            </div>
                            <ul class="cafe-post-news">
                                 <?php  
                                        $args = array(
                                                'category_name' => 'video',
                                                'post_type'     =>'video',
                                            	'posts_per_page'      => 8,
                                                'post__not_in'         =>$postID_exclude,
                                                'orderby'               => 'rand',  
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
                           								<div class="cafe-image">
                                                            <img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>"/>
                                                            <span class="video-cover"></span>
                                                        </div>
                           								<div class="cafe-title"> <?php the_title();?></div> 
                                                    </a>
                        						</li>
                                               
        						      <?php  }} wp_reset_postdata(); ?>
                            
        					</ul>
                        </div>
					</div>
				</div>
				<div id="colRightNewsBox" class="hidden-xs hidden-sm col-md-3 col-lg-3">
					<?php get_search_form(true); ?>
                    
					<div class="banner_300x250">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner_300x250_1.jpg" alt="banner 300x250"/>
					</div>
                    <div class="block-related-news hidden-xs hidden-sm">
            			<h2 class="title">
            				<a target="_blank" href="<?php echo esc_url(get_category_link((int)$relateCats[0]))?>" title="<?php echo get_cat_name((int)$relateCats[0]);?>" ><?php echo "Chuyên mục ".get_cat_name((int)$relateCats[0]);?></a>
            			</h2>
                        <div class="baivietyeuthich">
							<ul class="baiviet-list">
                            <?php 
                                $args = array(
                                    'cat'            => (int)$relateCats[0],
                                   	'posts_per_page'      => 6,  
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
                    <div class="block-related-news hidden-xs hidden-sm">
            			<h2 class="title">
            				<a target="_blank" href="<?php echo esc_url(get_category_link((int)$relateCats[1]))?>" title="<?php echo get_cat_name((int)$relateCats[1]);?>" ><?php echo "Chuyên mục ".get_cat_name((int)$relateCats[1]);?></a>
            			</h2>
                        <div class="baivietyeuthich">
							<ul class="baiviet-list">
                            <?php 
                                $args = array(
                                    'cat'            => (int)$relateCats[1],
                                   	'posts_per_page'      => 6,  
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
					<div class="banner_300x250 hidden-xs hidden-sm">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner_300x250_2.jpg" alt="banner 300x250"/>
					</div>
                    <div class="block-related-news hidden-xs hidden-sm">
            			<h2 class="title">
            				<a target="_blank" href="<?php echo esc_url(get_category_link((int)$relateCats[2]))?>" title="<?php echo get_cat_name((int)$relateCats[1]);?>" ><?php echo "Chuyên mục ".get_cat_name((int)$relateCats[2]);?></a>
            			</h2>	
						<div class="baivietyeuthich">
							<ul class="baiviet-list">
                                <?php 
                                    $args = array(
                                        'cat'            => (int)$relateCats[2],
                                       	'posts_per_page'      => 6,  
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
				</div>
				
				</div>
				
		
			</div>
            <span class="sclTopNews hidden-xs" ></span>
		</div>
   </div>


<?php get_footer();?>