<!DOCTYPE html>
<!--[if lt IE 8]> <html class="lt-ie10 lt-ie9 lt-ie8 unsupported-browser"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie10 lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>    <html class="lt-ie10 ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="modern-browser"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,700,800' rel='stylesheet' type='text/css'>
        <meta name="robots" content="noindex" />        
		<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url');?>assets/themes/default/css/css-white-lion.css" />
        
		<title>Member Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <style>
            .error{
                font-size: 12px;
                color: red;
            }
        </style>

        <script type="text/javascript" src="//platform.linkedin.com/in.js">
            api_key:   4632931
            onLoad:    afterLoad
            authorize: true
            lang:      en_US
        </script>
        <script>
            function afterLoad(){
                alert('after load linkedin Init!!!');
            }
        </script>
    </head>

    <body class="responsive">
        <script type="in/Login"></script>
		<div id="site-wrapper" class="site-wrapper">
            <header id="widget-TopNav" class="top-navigation for-guest">
				<nav role="navigation" class="container">
					<div class="navbar-header">
						<a id="logo" class="pph-logo" href="http://www.home.com/">Home</a>        
					</div>
					<div class="nav collapse navbar-collapse visible-md visible-lg">
						<div class="pull-right menu-block user-menu">
							<div class="auth-menu">
								<a href="#" title="Sign up" class="text-uppercase sign-up">Sign up</a>
								<a href="#" title="Log in" class="text-uppercase login">Log in</a>
							</div>
						</div>
						<div class="pull-right menu-block navigation-menu">
							
						</div>
					</div>
					<button class="offcanvas-toggle topnav-toggle button visible-xs visible-sm">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="fa fa-times topnav-close"></span>
					</button>

				<div class="nav navbar-collapse">
					<div class="navbar-mobile visible-xs visible-sm">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="active">
							<a href="#home" role="tab" data-toggle="tab"><i class="fa fa-home"></i></a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<!-- BEGIN: Home tab -->
						<div class="tab-pane active" id="home">
							<!-- Help Section -->
							<section>
								<header class="row text-uppercase">Help</header>
								<ul class="simple">
									
									<li>
										<a href="#">Sign up</a>                
									</li>
									<li>
										<a href="#">Log in</a>               
									</li>
								</ul>
							</section>
						</div>
						<!-- END: Home Tab-->
					</div>
				</div>
			</div>
		</nav>
	</header>