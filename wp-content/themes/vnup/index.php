<?php
/**
 * The template for displaying Home page.
 *
 * @file      index.php
 * @package   VnUp news
 * @author    Chinh Tran
 * 
 **/
?>
<?php get_header();?>

<div class="wp980">

		<div class="topbanner">
			<img src="<?php echo get_template_directory_uri(); ?>/images/topbanner.jpg" alt="Chứng khoán " title="Chứng khoán  " />
		</div>
		<div class="indexer_wrapper" id="Box_ThiTruong">
		<table cellspacing="0" cellpadding="0" class="indexer">
			<tbody>
			<tr>

				<td id="ChungKhoan0">
					<b class="indexer_header">VN-Index</b>
					<span class='increase'>▲</span><br />581,05&nbsp;&nbsp;<span class='increase'>6,95&nbsp;&nbsp;1,21%</span>
				</td>

				<td id="ChungKhoan1">
					<b class="indexer_header">HNX-Index</b>
					<span class='increase'>▲</span><br />87,72&nbsp;&nbsp;<span class='increase'>0,22&nbsp;&nbsp;0,25%</span>
				</td>

				<td id="ChungKhoan2">
					<b class="indexer_header">DowJones</b>
					<span class='increase'>▲</span><br />18.000,40&nbsp;&nbsp;<span class='increase'>236,36&nbsp;&nbsp;1,33%</span>
				</td>

				<td id="ChungKhoan3">
					<b class="indexer_header">Vàng</b>
					<span class='decrease'>▼</span><br />1.177,10&nbsp;&nbsp;<span class='decrease'>-9,50&nbsp;&nbsp;-0,80%</span>
				</td>

				<td id="ChungKhoan4">
					<b class="indexer_header">USD</b>
					<span class='not_change'>▬</span><br />21.760,00&nbsp;&nbsp;<span class='not_change'>0,00&nbsp;&nbsp;0,00%</span>
				</td>

				<td id="ChungKhoan5">
					<b class="indexer_header">Dầu thô</b>
					<span class='decrease'>▼</span><br />60,87&nbsp;&nbsp;<span class='decrease'>-0,56&nbsp;&nbsp;-0,91%</span>
				</td>

				<td class="w15p last">
					<div class="sNgayThang1"></div>
				</td>
			</tr>
			</tbody>
		</table>
		<div class="clearboth"></div>
	</div>

 
	<div class="content">
		<div class="contentleft">

			<div class="fl w100pc">
				<div class="wptopmid">
					<div class="topmid1">
                        <?php $postID_exclude = array(); 
                                $args = array(
                                    'category__not_in' => array( 72, 73, 74 ),
                                	'posts_per_page'      => 1,
                                    );
                            $the_query = new WP_Query($args);
                            // The Loop
                            if ( $the_query->have_posts() ) {
                            	
                            	while ( $the_query->have_posts() ) {
                            		$the_query->the_post();
                                    array_push($postID_exclude,get_the_ID()); 
                                    ?>
                                    <a class="fea_img" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title=" <?php the_title() ?>">
            							<img src="<?php echo get_bg_image(get_the_ID());?>" alt=" <?php the_title() ?>" title=" <?php the_title() ?>" width="330px" />
            						</a>
            						<h2><a class="titletopmid1" href="<?php esc_url(the_permalink())?>" title=" <?php the_title() ?>  "> <?php the_title() ?></a></h2>
            						<span class="tgtopmid1"><a href="<?php esc_url(the_permalink())?>" rel="noffolow"><!--author name here--></a></span>
            						<p class="contenttopmid1"><?php echo substr(get_the_excerpt(), 0,194); ?>...</p>

                                    
    						<?php }} wp_reset_postdata(); ?>
                    
					
					</div>
					<div class="topmid2">
					<ul class="ultopmid2">
                        <?php  
                                $args = array(
                                    'category__not_in' => array( 72, 73, 74 ),
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
                							<h3><a class="titletopmid2" href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
                							<div class="mt5">
                								<a href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title() ?> " class="imgtopmid2">
                								<img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" width="80px" /></a>
                								<span class="tgtopmid2"><a href="<?php esc_url(the_permalink())?>" rel="noffolow"><!--author name here--></a></span>
                								<p class="contenttopmid2"><?php echo substr(get_the_excerpt(), 0,164); ?>...</p>
                							</div>
                						</li>
            						
        						<?php }} wp_reset_postdata(); ?>
                    
					</ul>
				</div>
			</div>
			<div class="wptopleft">
				<ul class="uwptopleft">
                  <?php  
                        $args = array(
                            'category__not_in' => array( 72, 73, 74 ),
                           	'posts_per_page'      => 4,
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
        						<a class="a_uwptop" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title() ?>">
        						<img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" width="150px" /></a>
        						<h2 ><a class="wptitle" href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
        					</li>
            						
				<?php }} wp_reset_postdata(); ?>  
                
				</ul>
			</div>
			<div class="wptopright">
				<h2 ><a class="titlewptopright" rel="nofollow" title="">NỔI BẬT</a></h2>
				<ul class="ulwptopright">
                    <?php  
                         $args = array(
                         'category__not_in' => array( 72, 73, 74 ),
                   	    'posts_per_page'      => 3,
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
        						<h3><a class="titletopright2" href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
        						<p class="contenttopright2"><?php echo substr(get_the_excerpt(), 0,104); ?>...</p>
        					</li>
                            
            						
				    <?php }} wp_reset_postdata(); ?>
					

				</ul>
				<h2><a class="titlewptopright twptopright2" rel="nofollow" title="">DÒNG SỰ KIỆN</a></h2>
				<ul class="ulwpfooter">
                    <?php  
                         $args = array(
                         'category__not_in' => array( 72, 73, 74 ),
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
                                <li><h3><a class="titletopright2" href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>  >"><?php the_title() ?></a></h3>

            						
				    <?php }} wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
		<div class="clearboth"></div>


		<div class="newsupdate">
			<ul class="boxnewsupdate">
                <?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'category__not_in' => array( 72, 73, 74 ),
                       	'posts_per_page'      => 20,
                        'post__not_in'        =>$postID_exclude,
                        'paged' => $paged,
                    );
                    $the_query = new WP_Query($args);
                    // The Loop
                    if ( $the_query->have_posts() ) {
                                    	
                       	while ( $the_query->have_posts() ) {
                      		$the_query->the_post();
                            array_push($postID_exclude,get_the_ID()); 
                            ?>
                               <li class="boxnewsupdateitem" data-nid="20150611063215819">
            					<div>
            						<a class="imgnewsupdate" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title() ?>"><img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" width="150px" /></a>
            						<div class="flie">
            							<h3><a class="titletopmid2 " href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?>  "><?php the_title() ?></a></h3>
            							<span class="tgtopmid2 tboxnewsupdate"><a href="<?php esc_url(the_permalink())?>" rel="noffolow"><!-- author name here--></a></span>
            							<p class="contenttopmid2"><?php echo substr(get_the_excerpt(), 0,264); ?>...</p>
            							
            						</div>
            						<div class="clear"></div>
            						<div class="footerboxnewsupdate">
            							
            							<div class="boxnewshare">
            								<div class="commentcountitemhome">
            
            								</div>
            								<div class="shareface">
            									<div class="fbLikeButton">
            									<!--like button here-->
            									</div>
            								</div>
            								<div class="clearboth"></div>
            							</div>
            							<div class="clearboth"></div>
            						</div>
            					</div>
            				</li>
            						
			     <?php }} wp_reset_postdata(); ?>

				

				

		</ul>
	</div>
	<div class="clear"></div>
	<div class="pageindex">
		
        <?php if($the_query->max_num_pages > 1){ 
                if( $the_query->max_num_pages > 10 ){
                                            
                    $limit = $paged + 10;
                    if( $limit > $the_query->max_num_pages)
                    {
                        $limit = $the_query->max_num_pages;
                    }
                                            
                    if( $paged >= 3)
                    {
                        $start = $paged - 2;
                    }
                    else 
                    { 
                        $start = $paged;                                
                    }
                } else{
                $limit = $the_query->max_num_pages;
                $start = 1;
            }
        ?>
		<ul class="uepage">
          <?php
          if ($paged > 1) { ?>
          <li><a href="<?php echo esc_url(get_category_link($cat_ID)).'?paged=' . ($paged -1);?>" class="prev">...</a></li>
                                                       
          <?php }
          for( $i= $start; $i <= $limit; $i++){?>
          <li><a href="<?php echo esc_url(get_category_link($cat_ID)).'?paged=' . $i; ?>" <?php echo ($paged==$i)? 'class="uepageactive"':'';?> ><?php echo $i;?></a></li>
                                                        
        	 <?php
          }
          if($paged < $the_query->max_num_pages){?>
          <li> <a href="<?php echo esc_url(get_category_link($cat_ID)).'?paged=' . ($paged + 1);?>" class="next">...</a></li>
          <?php } ?>
                							
		</ul>
    <?php } ?> 
		
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
		<span class="boxrighttitle"><a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/cafe-sang" title="Cafe sáng">Cafe sáng</a></span> 
		<div class="topright2"> 
		<ul class="ultopright2"> 
            <?php  $i = 0;
                 $args = array(
                    'cat'               => 72,
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
                        <li class="left <?php echo ($i%2==1)? 'margin_left': '' ; ?>"> 
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
		
	</div>
	
	<div class="boxright3">
		<span class="boxrighttitle">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/dong-tien-thong-minh" title="Đồng tiền thông minh">Đồng tiền thông minh</a>
		</span>
		<div class="topright3">
			<ul> 
                <?php  $i = 0;
                 $args = array(
                    'cat'               => 73,
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

	<div class="boxright4">

		<div class="boxright4frame">
			<iframe frameborder="0" class="boxright4frameIframe" src="http://giavang.doji.vn/sites/default/files/bieudo/tabs.html" scrolling="no" id="gold-chart"></iframe>

			<ul>
				<li class="hoptac bghoptac">
					<span class="shoptac">HỢP TÁC VỚI</span>
				</li>
				<li class="bghoptac hoptaclogo">
					<a href="#" rel="nofollow" title=""><span class="sprite dojilogo">&nbsp;</span></a>
					<a href="#" rel="nofollow" title=""><span class="sprite tpbanklogo">&nbsp;</span></a>

				</li>
				<div class="clear"></div>
			</ul>
		</div>
	</div>

 <div class="boxright5">
	<span class="boxrighttitle"><a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/tien-cua-toi" title="Tiền của tôi">Tiền của tôi</a></span>
	<ul>
    <?php  
        $args = array(
        'cat'               => 73,
       	'posts_per_page'      => 4,
        );
        $the_query = new WP_Query($args);
        // The Loop
        if ( $the_query->have_posts() ) {
                                	
       	    while ( $the_query->have_posts() ) {
      		    $the_query->the_post();
                ?>
                <li>
            		<a class="a_boxright5" href="<?php esc_url(the_permalink())?>" style="background:url(<?php echo get_bg_image(get_the_ID());?>) no-repeat; background-size: cover;" title="<?php the_title(); ?>"><img src="<?php echo get_bg_image(get_the_ID());?>" alt="<?php the_title(); ?> " title="<?php the_title(); ?> " width="80px" /></a>
            		<a href="<?php esc_url(the_permalink())?>" title="<?php the_title(); ?> " class="boxright5content"><?php the_title(); ?></a>
            		<div class="clear"></div>
            	</li>   					
        		
    <?php   }} wp_reset_postdata(); ?>


</ul>
</div>

<div class="boxright6">
	<span class="boxrighttitle fl w100pc mt10">XEM NHIỀU</span>
	<ul class="most-view">
    <?php  $i=1; $args = array(
            'posts_per_page'      => 10,
            'meta_key'            => 'post_views_count',
            'orderby'             =>  'meta_value_num',
            'order'               => 'DESC', 
            );
            $the_query = new WP_Query($args);
            // The Loop
            if ( $the_query->have_posts() ) {
                                        	
           	while ( $the_query->have_posts() ) {
          		$the_query->the_post();
            ?>
            <li>
        		<span class="number"><?php echo $i; ?></span>
        		<a href="<?php esc_url(the_permalink())?>" title="<?php the_title(); ?> " class="aboxright6"><?php the_title(); ?></a>
        	</li>
            
    <?php $i++; }} wp_reset_postdata(); ?>
	
	 
	</ul>
</div>

	<div class="fl w100pc">

	 
	</div>
</div>
<div class="clearboth"></div>
</div>

</div>

<div id="adm_sticky_footer" style="clear:both">
	<div id="divADV" class="adv_footerBanner">
		<div class="BottomBanner" align="center">

		</div>
	</div>
</div>

<?php get_footer();?>