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
            <ul class="tab">
            <li><h1 class="heading1"><a href="about.php"></i> About Us</span><span class="divider">/</span></a></h1>
            </li>
            <li> <h1 class="heading1"><a href="team.php"></i> Our Team</span></a><span class="divider">/</span></h1></li>
            <li> <h1 class="heading1"><a href="policy.php"></i> Our Policy</span></a></h1></li>
            </ul>
            <!-- Section Start-->
            <section class="row" id="about">
            <ul class="aboutus row">
               <li class="col-lg-4 col-md-4 col-xs-6 col-sm-6">
                <div>
                    <img src="img/leader.png" style="padding-right: 10px; width:150px; height:130px;" alt="team1"/>
                    <h4>Devin Robbins</h4>
                    <h5 style="padding-bottom: 50px;">Team Leader</h5>
                    
                </div>
                <br>
                <div>
                    <img src="img/team3.png" style="padding-right: 10px; width:150px; height:130px;" alt="team3"/>
                    <h4>Alicia White</h4>
                    <h5 class="text-faded">Assistant Team Leader</h5>
                    
                </div>
            </li>
            <li class="col-lg-4 col-md-4 col-xs-6 col-sm-6">
                <div>
                  <img src="img/team5.png" style="padding-right: 10px; width:150px; height:130px;" alt="team5"/>
    <h4>Justin Duncan</h4>
    <h5 style="padding-bottom: 50px;">Lead Developer</h5>
                    
                </div>
            
           
                <div>
                    <img src="img/team1.png" style="padding-right: 10px; width:150px; height:130px;" alt="team1"/>
                    <h4 >Julie Bartee</h4> 
                    <h5 >Assistant Developer</h5>
                    
                </div>
            </li>
            <li class="col-lg-4 col-md-4 col-xs-6 col-sm-6">
                <div>
                    <img src="img/team4.png" style="padding-right: 10px; width=150px; height:130px;" alt="team4"/>
                    <h4>Brian Lewis</h4>
                    <h5 style="padding-bottom: 50px;">Assistant Developer</h5>
                    
                </div>
                <div>
                    <img src="img/team2.png" style="padding-right: 10px; width:140px; height:130px;" alt="team2"/>
                    <h4>Thao Phan<h4>
                    <h5>Assistant Developer/Designer</h5>
                     
                </div> 
            </li>
        </ul>
<hr>
                    <a href="privacy.php" style="text-decoration: underline;">Privacy Statment</a><span class="divider">/</span>
                    <a href="return.php" style="text-decoration: underline;">Return Policy</a>
            
            </section>
   
            
            </div>
    <!-- Section End--> 
    
<!-- /maincontainer --> 
<?php include_once('footer.php'); ?>