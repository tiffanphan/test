<?php 
$pageTitle = 'Batchpad.com - About';
include("header.php"); 
$_SESSION['url'] = $_SERVER['REQUEST_URI'];                                      
?>
    <div id="categorymenu">
        <nav class="subnav">
            <ul class="nav-pills categorymenu container">
                <li><a class="home" href="home.php"><i class="icon-home icon-white font18"></i> <span> Home</span></a></li>
                <li><a href="catalog.php?page=1">Shop</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="contact.php">Contact Us</a> </li>
                <?php
                if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "admin")) {
                print "<li><a class='active' href='admin.php'>Admin</a> </li>";
                }
				if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "customer")) {
                print "<li><a href='client.php?id=".$_SESSION['logged_in_user_id']."'>My Account</a> </li>";
                }
				if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "customer")) {
                print "<li><a class='active' href='client.php'>My Account</a> </li>";
                }
                ?>
                <li class="pull-right">
                    <form action="search.php" method="get" class="form-search top-search">
                        <input type="text" class="input-small search-query" placeholder="Search Here…">
                        <button class="btn btn-orange btn-small tooltip-test" data-original-title="Search"><i class="icon-search icon-white"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>   
    <!--Header End-->

    <div id="maincontainer"> 
     <!--  breadcrumb --> 
        <div class="container">  
            <ul class="breadcrumb">
                <li>
                    <a href="home.php">Home</a>
                    <span class="divider">/</span>
                </li>
                <li class="active">About Us</li>
            </ul>
            <h1 class="heading1" style="padding-left:30px;"><a href="about.php">Return Policy</span></a></h1></li>
            
            <!-- Section Start-->
            <section class="row" id="about">
            <ul class="aboutus row">
               <li class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                BATCHPAD wants you to be excited with your purchase, and proud to own it. If something isn’t quite right we want to fix it.  Our success depends upon you, so all products are eligible for return within 14 days of the original shipment date.
                <div>
                    <h4 style="font-weight: bold;">Furniture returns:</h4>
                    If your product does arrived damaged, you must email us a photo and description of the damage within 48 hours of receiving your order. We’ll review your email and send you a shipping label, and will provide free shipping back to us.   Repackage the furniture in original box as best as possible and include original parts, tags, instructions, and packaging.
                </div>
                <div>
                    <h4 style="font-weight: bold;">If the box appears to be damaged in way you believe that contents sustained</h4>
                     If you are unsatisfied with any of the products you must email us requesting a Return Shipping Label.  We will review your request and email you a shipping labeel to affix to the original package.  The item must contain original parts, tags, instructions, and packaging. The item should not be installed, used, or modified.  Because all of our furniture is shipped for free, and White Gloved delivered inside of your residence we do charge to have the item shipped back to us.  You will be refunded the full value of your purchase minus the shipping fee. We do not charge a restocking fee.

                </div>
                <div>
                    <h4 style="font-weight: bold;">Accents (anything other than furniture[you can’t sit on it, nor would you want to place a beer on it)].</h4>
                    If you purchased an item other than furniture you and wish to return it a shipping label will be sent to you. The item must contain original parts, tags, instructions, and packaging. The item should not be installed, used, or modified. Additionally, you will be refunded the full value of your purchase and not charged a restocking fee. <br>

 

<a href="">Click here </a> to contact us via email,   We use email so that both you and Batchpad have an electronic version of our communication so that you can hold us accountable. 
                </div>
                <hr>
                    <a href="privacy.php" style="text-decoration: underline;">Privacy Statment</a><span class="divider">/</span>
                    <a href="return.php" style="text-decoration: underline;">Return Policy</a>

                

            </section>

            
            </div>
    <!-- Section End--> 
    
<!-- /maincontainer --> 
<?php include_once('footer.php'); ?>