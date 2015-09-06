
<!DOCTYPE html>
<html style="margin-top: 0 !important;">
  <head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(''); ?></title>
    <?php if( is_single() ){?>
        <meta name="description" content="<?php echo get_the_excerpt(); ?>"/>
        <meta name="keywords" content="<?php echo get_tag_keyword(); ?>"/>
        <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
        <meta property="og:title" content="<?php echo get_the_title(); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php echo get_the_permalink(); ?>" />
        <meta property="og:image" content="<?php echo get_bg_image( get_the_ID() ); ?>" />
    <?php } else{?>
        <meta name="description" content="<?php bloginfo('description'); ?>"/>
        <meta name="keywords" content="<?php bloginfo('keyword'); ?>"/>
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css"/>
    
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.min.js"></script>
	 <link type="text/css" rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/include/font-awesome-4.2.0/css/font-awesome.css">
	<!--[if IE ]><link type="text/css" media="all" rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css" /><![endif]-->
	<!--[if lt IE 9]><script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script><![endif]-->
	<!--[if IE 8]><script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/respond.src.js"></script><![endif]-->
	<!--[if !IE]><!-->
    
    <?php wp_head(); ?>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.js"></script>
    

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60198620-1', 'auto');
  ga('send', 'pageview');

</script>
  </head>

  <body>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  <!--Fix Navigation Bar with drop down menu -->
    <header>
		<div class="navcontain navbar navbar-default cus_nav">
			<div class="container"> <?php  $cat_ID = get_query_var('cat'); $url = esc_url(get_category_link($cat_ID)) ; ?>
            
				<div class="navbar-header">
					
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" style="margin-right: 30px;"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="logo"/></a>
				</div>
                <div class="navbar-collapse collapse">
					<ul id="nav" class="nav navbar-nav">
						
						<li class="digital <?php echo (strpos($url, 'video') !== FALSE)? 'active': '';?>">
						   <a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/video" ><span class="nav_point"></span>VIDEO</a>
	                       <div class="lstEnt">
                               <ul class="ctn_lstNav">
                                   <li class="menu-item">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/video/sao-video" >SAO</a>
                                   </li>
                                   <li class="menu-item">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/video/musik-video">MUSIK</a>
                                   </li>
                                   <li class="menu-item">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/video/cine-video">CINÉ</a>
                                   </li>
                                   <li class="menu-item">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/video/lam-dep-video">ĐẸP</a>
                                   </li>
                                   <li class="menu-item">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/video/cuoi-hai-video">CƯỜI HÀI</a>
                                   </li>
                                   <li class="menu-item">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/video/soc-bua-video">SÓC BỰA</a>
                                   </li>
                               </ul>
                           </div>
                        </li>
						
						<li class="interior <?php echo (strpos($url, 'sao') !== FALSE)? 'active': '';?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/sao" <?php echo (strpos($url, 'sao') !== FALSE)? "class = 'active'": '';?>><span class="nav_point"></span>SAO</a>
						    
                        </li>
                        <li class="digital <?php echo (strpos($url, 'cine') !== FALSE)? 'active': '';?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/cine" <?php echo (strpos($url, 'cine') !== FALSE)? "class = 'active'": '';?>><span class="nav_point"></span>CINÉ</a>
						    
                        </li>
                        <li class="interior <?php echo (strpos($url, 'musik') !== FALSE)? 'active': '';?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/musik" <?php echo (strpos($url, 'musik') !== FALSE)? "class = 'active'": '';?>><span class="nav_point"></span>MUSIK</a>
						    
                        </li>
						<li class="food <?php echo (strpos($url, 'lam-dep') !== FALSE)? 'active': '';?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/lam-dep" <?php echo (strpos($url, 'lam-dep') !== FALSE)? "class = 'active'": '';?>><span class="nav_point"></span>ĐẸP</a>
	                        
                        </li>
                        <li class="goods <?php echo (strpos($url, 'nang-2') !== FALSE)? 'active': '';?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/nang-2" ><span class="nav_point"></span>NÀNG 2.0</a>
						    
                        </li>
                        <li class="travel <?php echo (strpos($url, 'beat-chang') !== FALSE)? 'active': '';?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/beat-chang" ><span class="nav_point"></span>BEAT CHÀNG</a>
						     
                        </li>
						<li class="fashion <?php echo (strpos($url, 'soc-bua') !== FALSE)? 'active': '';?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/soc-bua" ><span class="nav_point"></span>SỐC & BỰA</a>
						   
                        </li>
                        <li class="travel <?php echo (strpos($url, 'cuoi-hai') !== FALSE)? 'active': '';?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/cuoi-hai" ><span class="nav_point"></span>CƯỜI & HÀI</a>
						  
                        </li>
                        <li class="digital <?php echo (strpos($url, 'la-cool') !== FALSE)? 'active': '';?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>chuyen-muc/la-cool" ><span class="nav_point"></span>LẠ & COOL</a>
						  
                        </li>
						<li class="show">
							<a href="http://www.zotatv.com" target="_blank" style="text-transform: none;"><span class="nav_point"></span>ZotaTV</a>
						  
                        </li>
					</ul>
				</div
			</div>
		</div>
    </header>