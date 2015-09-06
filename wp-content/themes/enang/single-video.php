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
                <?php if (have_posts()) { ?>		
                    <?php   while (have_posts()) : the_post();?>
				<div id="videohomecenterNews"  class="centerNews col-sm-9 col-md-7 col-lg-7" >
					<style> 
						 #content_temp object, #content_temp embed, #content_temp p iframe{
                            width: 100% !important;
                            height: 507px;
                         }
					</style>
                    <div id="content_temp" style="width: 100%; height: 517px;">
                        <?php the_content(); ?>
                       
                    </div>
                    <!--div id="yplayer"></div>
                    <script>
                        jQuery(function(){
                            var video_iframe = $('#content_temp').find('iframe');
                            var player_height = $('#content_temp').height();
                            if(video_iframe.length>0) {
                                var video_src = $('#content_temp iframe').attr('src');
                                console.log(video_src);
                                var youtube = video_src.match(/youtube.com\/embed\/([^\/&]+)/i);
                                console.log(youtube);
                                /*if(youtube) {
                                    console.log('Youtube id: '+youtube[1]);
                                    jwplayer('yplayer').setup({
                    					'flashplayer': '<?php echo get_template_directory_uri();?>/flash/player.swf',
                    					'file': 'https://www.youtube.com/watch?v='+youtube[1],
                    					'controlbar': 'bottom',
                    					'width': '100%',
                    					'height': player_height,
                    					
                				  });*/
                                  if(youtube) {
                                    /*
                                      jwplayer('yplayer').setup({
                							file: 'https://www.youtube.com/watch?v='+youtube[1],
                							width: '100%',
                                            height: player_height,
                							aspectratio: '16:9',
                							skin: 'five',
                							logo: {
                								file: "http://freetuts.net/upload/config/images/logo-hoc-lap-trinh-online.jpg",
                								link: 'http://freettuts.net',
                							}
                						});*/
                                        $('#content_temp').show();
                                    
                                  //$('#content_temp').remove();
                                } else {
                                    console.log('Not youtube video');
                                    $('#content_temp').show();
                                    $('#content_temp iframe').width('100%');
                                    
                                    $('#content_temp iframe').height(player_height);
                                }    
                            } else {
                                console.log('No iframe embed!');
                                $('#content_temp').show();
                                $('#content_temp object').width('100%');
                                
                                $('#content_temp object').parent().height(player_height);
                            }
                            
                        });
                    </script-->
					
				</div><!-- end homecenterNews-->
				<?php setPostViews(get_the_ID()); endwhile; }?>
				
				<div id="colRightNewsBox" class="hidden-xs hidden-sm col-md-3 col-lg-3">
					<div class="" style="margin-bottom: 5px;">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner-300x250.jpg" alt="banner 300x250"/>
					</div>
					<div class="">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner-300x250.jpg" alt="banner 300x250"/>
					</div>
				</div>
                <div id="mainTop" style="border: none; padding: 10px 10px 25px;">
					<h2><?php the_title(); ?></h2>
				</div>
                <div id="mainTop" >
					<div id="bannerTop" class="hidden-xs">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner-top.jpg" alt="banner top"/>
					</div>
				</div>
				<div id="cafe-webtretho-news">
					<ul class="cafe-post-news">
                         <?php  $postID_exclude = array();
                                $args = array(
                                        'category_name' => 'video',
                                        'post_type'     => 'video',
                                    	'posts_per_page'      => 20,
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
                                        <li class="vi_cafe" style="width: 219px;"> 
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
				
				
			</div><!-- end containerTopRow-->
		</div><!-- end mainNews-->
		<span class="sclTopNews hidden-xs" ></span>
   </div><!-- end main-->
   
   <?php get_footer();?>