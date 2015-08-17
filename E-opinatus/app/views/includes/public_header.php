<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php $this->get_data('page_title'); ?></title>
		<meta name="description" content="E-Opinatus, Online Store">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700,100|Open+Sans:400,800,300,600,700|Abel" rel="stylesheet">
        <link href="resources/css/animate.css" rel="stylesheet">
		<link href="resources/css/style.css" media="all" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="resources/css/pagination/pagination.css" media="screen" />
		<script src="resources/js/vendor/modernizr-2.6.2.min.js"></script>
	</head>
	<body class="<?php $this->get_data('page_class'); ?>">
	
		<header id="header">
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 21 123 45 67</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@e-opinatus.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://plus.google.com/dashboard" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo SITE_PATH; ?>"><img src="<?php echo IMAGE_PATH; ?>logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							    <li><p class="cartinfo">
                                <?php 
                                    $items = $this->get_data('cart_total_items', FALSE); 
                                    $price = $this->get_data('cart_total_cost', FALSE); 
                                    if ($items == 1) 
                                    {
                                        echo $items . ' item ($' . $price . ') in Cart';
                                    }
                                    else 
                                    {
                                        echo $items . ' items ($' . $price . ') in Cart';	
                                    }
                                ?> 
                            </p></li>
								<li><a href="<?php echo SITE_PATH; ?>cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="<?php echo SITE_PATH; ?>admin/"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><?php $this->get_data('page_nav'); ?></li>  
								<li><a href="<?php echo SITE_PATH; ?>contact/">Contact Us</a></li>
								<li><a href="<?php echo SITE_PATH; ?>search/">Search</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
        </header>
         
    <div id="wrapper">
    