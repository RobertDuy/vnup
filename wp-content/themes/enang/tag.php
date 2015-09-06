<?php
/**
 * The template for displaying searh page.
 *
 * @file      search.php
 * @package   Enang news
 * @author    Chinh Tran
 * 
 **/
?>
<?php get_header();?>

<div id="main">
		
		<div id="mainNews" class="container">
			<div id="containerTopRow" class="row">
				<div id="mainTop">
					<div id="bannerTop" class="hidden-xs">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner-top.jpg" alt="banner top"/>
					</div>
				</div>
				<div id="homecenterNews"  class="centerNews col-sm-9 col-md-7 col-lg-7" >
                     <?php if ( have_posts() ) : ?>
					<div id="gotoCenter" class="mainCt">
							<div class="navMainCt search">
								<h2 class="title-h2" style="color: #000;"> Bài viết liên quán đến từ khóa: &nbsp;&nbsp;<span> "<?php echo single_cat_title('') ?>"</span></h2>
							</div><!-- end navMainCt-->
							<div id="contentBox">
								<div id="nang-tabs_hot_newest" class="activeBox nang_wtt"> 
                                <input class="query-str" id="query-str" type="hidden" value="<?php echo single_cat_title('') ?>"> 
                                <?php while ( have_posts() ) : the_post(); 
                                
                                            $para_print_post = array(
                                                'id'            => get_the_ID(),
                                                'title'         => get_the_title(),
                                                'link'      => esc_url(get_permalink()),
                                                'date'        =>get_the_date('d/m/Y  H:i'),
                                                'except'      => get_the_excerpt(),
                                                'image_link'      => get_bg_image(get_the_ID())
                                            );
                                            $last_post_date = get_the_date('Y-m-d H:i');
                                        print_post($para_print_post,'tam-su');
									endwhile;?>
									
									
								<input type="hidden" class="lastpost_date" value="<?php echo $last_post_date;  ?>">
							</div>
							</div>
						</div><!-- end gotoCenter-->
						<div class="pager pager-padding"> 
							<a class="btn-block btn-md btn-danger btn" id="s-view-more"> 
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
					<?php endif; ?>
				</div><!-- end homecenterNews-->
				
				<div id="homecolLeftNews" class="hidden-xs col-sm-3 hidden-md col-lg-2">
					<div class="news-list" style="width: 117px; background-color: #fff;">
						<ul>
                            <?php   $i = 0;
                                    $args = array(
                                    	'posts_per_page'      => 4,
                                        'post__not_in'        =>$postID_exclude
                                        );
                                        
                                $the_query = new WP_Query($args);
                                // The Loop
                                if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        ?>
                                        <li> 
                                			<a href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID()); ?>) no-repeat;width: 100%; height: 92px; display: block; margin-bottom: 8px; background-size: cover;" class="img"><img src="<?php echo get_bg_image(get_the_ID()); ?>" alt="<?php the_title();?>" style="display: none;"></a>
                                			<a href="<?php esc_url(the_permalink())?>"> <?php the_title();?></a> 
                                		</li>
                                        
						      <?php  }  } wp_reset_postdata(); ?>
                        								
						</ul>
					</div>
				</div>
				
				<div id="colRightNewsBox" class="hidden-xs hidden-sm col-md-3 col-lg-3">
                    <div class="banner_300x250">
                        <div class="banner">
						  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner_300x250_1.jpg" alt="banner 300x250"/>
    					</div>
    					<div class="banner">
    						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/banner_300x250_2.jpg" alt="banner 300x250"/>
    					</div>
                    </div>
					
				</div>
				
				
			</div><!-- end containerTopRow-->
		</div><!-- end mainNews-->
		<span class="sclTopNews hidden-xs" ></span>
   </div><!-- end main-->
<script>
$(function(){
    
    var length = $('#colRightNewsBox').offset().top + $('#colRightNewsBox').height();
    //alert(length);
    $(window).scroll(function () {
        if ($(window).scrollTop() > length) {
            $('.news-list').addClass('sticky');
            $('.banner_300x250').addClass('sticky');
        } else {
            $('.news-list').removeClass('sticky');
            $('.banner_300x250').removeClass('sticky');
        }
    });
});
		
</script>
<?php get_footer();?>