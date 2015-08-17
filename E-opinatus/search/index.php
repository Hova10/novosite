<?php

include("../app/init.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<!-- Meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Search</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700,100|Open+Sans:400,800,300,600,700|Abel" rel="stylesheet">
	<link href="<?php echo SITE_PATH; ?>resources/css/animate.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>resources/css/style.css" media="all" rel="stylesheet" type="text/css">
    <link href="style/style.css" media="all" rel="stylesheet" type="text/css">
    <script src="<?php echo SITE_PATH; ?>resources/js/vendor/modernizr-2.6.2.min.js"></script>
	<script src="scripts/custom.js"></script>
	
</head>
<body>
    
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
							<a href="<?php echo SITE_PATH; ?>"><img src="<?php echo IMAGE_PATH; ?>logo.png" alt="logo" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
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
								<li><a href="<?php echo SITE_PATH; ?>">Home</a></li>  
								<li><a href="<?php echo SITE_PATH; ?>index.php?id=3">Clothing</a></li>  
								<li><a href="<?php echo SITE_PATH; ?>index.php?id=2">Electronics</a></li>  
								<li><a href="<?php echo SITE_PATH; ?>index.php?id=1">Toys</a></li>    
								<li><a href="<?php echo SITE_PATH; ?>contact/">Contact Us</a></li>  
								<li><a href="<?php echo SITE_PATH; ?>search/">Search</a></li>  
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
        </header>
    
	<div id="main">

		<!-- Main Input -->
		<input type="text" id="search" autocomplete="off" placeholder="Search">

		<!-- Show Results -->
		<h4 id="results-text">Showing results for: <b id="search-string">Array</b></h4>
		<ul id="results"></ul>

	</div>
    
    <section class="container border"></section>
                <div class="brands1">
                    <h2 class="title text-center">our brands</h2>
                        <div id="brands-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">	
                                    <div class="col-sm-4">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo IMAGE_PATH; ?>canon.jpg" alt="canon" title="canon">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo IMAGE_PATH; ?>esprit.jpg" alt="esprit" title="esprit">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo IMAGE_PATH; ?>gap.jpg" alt="gap" title="gap">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">	
                                    <div class="col-sm-4">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo IMAGE_PATH; ?>next.jpg" alt="next" title="next">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo IMAGE_PATH; ?>puma.jpg" alt="puma" title="puma">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo IMAGE_PATH; ?>zara.jpg" alt="zara" title="zara">
                                        </div>
                                    </div>
                                </div>
                            </div>	
                        </div>
                </div>
		    
		
		<footer id="footer">
            <div class="footer-top">
                <div class="steps-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 steps-block-col">
                                <i class="fa fa-truck"></i>
                                    <div>
                                        <h2>Free shipping</h2>
                                        <em>Express delivery withing 3 days</em>
                                    </div>
                                    <span>&nbsp;</span>
                            </div>
                            <div class="col-md-4 steps-block-col">
                                <i class="fa fa-gift"></i>
                                    <div>
                                        <h2>Daily Gifts</h2>
                                        <em>3 Gifts daily for lucky customers</em>
                                    </div>
                                    <span>&nbsp;</span>
                            </div>
                            <div class="col-md-4 steps-block-col">
                                <i class="fa fa-phone"></i>
                                    <div>
                                        <h2>21 356 06 06</h2>
                                        <em>24/7 customer care available</em>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About E-Opinatus</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Mailing List</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated yourself...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2014 Opinatus-Solutions Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.opinatus-solutions.com">Opinatus</a></span></p>
				</div>
			</div>
		</div>
	</footer>
        
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="<?php echo SITE_PATH; ?>resources/js/jquery.scrollUp.min.js"></script>
        <script src="<?php echo SITE_PATH; ?>resources/js/plugins.js"></script>
        <script src="<?php echo SITE_PATH; ?>resources/js/main.js"></script>
</body>
</html>