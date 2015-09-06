<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" itemscope="itemscope" itemtype="http://schema.org/NewsArticle">
  <head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="content-language" content="vi" />
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
    
    
    <?php wp_head(); ?>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.min.js"></script>
    

  </head>
<body>
<div id="admWrapsite">
	<div id="admMenuStick">  
		<!--- Phần menu của site đặt chế độ fixed-->
		<div class="boxheader">
			<div class="header">
				<div class="sprite logotop">

					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="VnEconomist - Thông tin đầu tư, kinh doanh, khởi nghiệp ở Việt Nam">&nbsp;</a></h1>

				</div>
				<div class="menutop">
					
                    <a class="homt" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Trang nhất">Trang nhất</a>
                    <?php
					wp_nav_menu(array(
						'menu' => 'Category Menu',
						'menu_class' => 'menu-list',
						'container' => false,
					));
				    ?>
				</div>
				<div class="clearboth"></div>
			</div>
		</div>
	</div>
    <div class="clearboth"></div>