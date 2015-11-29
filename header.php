<?php
session_start();
include('db_connect.php'); 
?>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $pageTitle ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Justin Duncan">
<link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet">
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
<link href="css/star-rating.css" rel="stylesheet">
<link href="css/prettyPhoto.css" rel="stylesheet" media="screen">
<link href="css/portfolio.css" rel="stylesheet">
<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
<link rel="stylesheet" href="layerslider/css/layersliderstyle.css" type="text/css">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<!-- Header Start -->
<header>
    <div class="headerstrip">
        <div class="container">
            <a class="logo pull-left" href="home.php"><img title="BatchPad" alt="BatchPad" src="img/logo.png"></a>
            <!-- Top Nav Start -->
            <div class="pull-right">
                <div class="navbar" id="topnav">
                    <div class="navbar-inner">
                        <ul class="nav" >
                        	<?php 
							if(!isset($_SESSION['logged_in'])) { 
							?>
                            
                        	<li class="text-nopad text-center"><a href="register.php">Sign-up</a></li>
                            <li class="text-nopad"><p>or</p></li>
                        	<li class="text-nopad">
                            	<a href="login.php"> &nbsp; login</a>
                            </li>
                            <!--Drop Down Menu -->
                            <!-- <div class="dropdown">
							  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="icon-shopping-cart font18"></i> Shopping Cart 
							  <span class="caret"></span></button>
							  <ul class="dropdown-menu">
							    <li><a href="#">CSS</a></li>
							    <li><a href="#">JavaScript</a></li>
							  </ul>
							</div> -->
                            <li class="dropdown hover carticon "> 
                                <div class="dropdown">
                             <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" onclick="location.href='cart.php';" ><i class="icon-shopping-cart font18"></i> Shopping Cart
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                 <div class="simpleCart_items">
                                <a href="javascript:;" class="simpleCart_checkout">checkout</a> 
                                </div>
                              </ul>
                            </div>
                            
                            <?php
							}else if(isset($_SESSION['logged_in'])) {
							print "<li class='text-nopad red'><p>Hello, ".$_SESSION['logged_in_firstname']."!</p></li>"; ?>
                        	<li class="text-nopad"><p> &nbsp; Not you?</p></li>
                            <li class="text-nopad"><a href="logout.php"> &nbsp; Logout</a></li>
							<!--DROPDOWN CART-->
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><li class="dropdown hover carticon "><i class="icon-shopping-cart font18"></i> Shopping Cart <span class="label label-orange font14"></span></span></button>
        <ul class="dropdown-menu">
            <!--<a href="cart.php" class="dropdown-toggle" > <i class="icon-shopping-cart font18"></i> Shopping Cart <span class="label label-orange font14">-->
            <!--<li class="dropdown menu-large">-->
			<div class="simpleCart_items"></div>
                      <ul id="cart" class='clearfix'></ul><li class="divider"></li>
                        	<div class="btn-group pull-right">
				<a href="#" class="simpleCart_empty btn btn-sm btn-danger">Clear Cart</a>
				<a href="#" class="simpleCart_checkout btn btn-sm btn-success">Checkout Now</a>
				</div>
		  <!--</li>-->
							<?php
							if(isset($_SESSION['cart_products'])){
                            echo count($_SESSION['cart_products']);}?> <!--Items <b class="caret"></b>--></a></li>  
							<?php } ?>
                    </li>
                </ul>
                    </div>
                </div>
            </div>
            <!-- Top Nav End -->
        </div>
    </div>
</header>
<!-- Header End -->
<script src="js/simpleCart.js"></script>
  <script>
    simpleCart({
      checkout: { 
        type: "PayPal" , 
        email: "you@yours.com" 
      }
    }); 
  </script>
<script src="js/simpleCartdropdown.js"></script>