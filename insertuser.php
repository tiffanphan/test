<?php
$pageTitle = 'Batchpad.com - Insert User';
include("db_connect.php");
include("header.php");

	if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in_user_access'] != 'admin')) {
		?>
            <div id="categorymenu">
        <nav class="subnav">
            <ul class="nav-pills categorymenu container">
                <li><a class="home" href="home.php"><i class="icon-home icon-white font18"></i> <span> Home</span></a></li>
                <li><a href="catalog.php?page=1">Shop</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="contact.php">Contact Us</a> </li>
                <li class="pull-right">
                    <form action="search.php" method="get" class="form-search top-search">
                        <input type="text" class="input-small search-query" placeholder="Search Here…">
                        <button class="btn btn-orange btn-small tooltip-test" data-original-title="Search"><i class="icon-search icon-white"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
    	<img class='fixed' src='img/error-404.png' alt='not found'><span>This area is for administrators only, please sign in to view content.</span>

<?php
	}else if($_SESSION['logged_in_user_access'] == 'admin') {
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
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="home.php">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Insert User</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
        
          <h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> Insert Users</span></h1>
          <form class="form-horizontal form-custom" method="post">
            <h3 class="heading3">Insert User</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label for="username" class="control-label"><span class="red">*</span> Username</label>
                  <div class="controls">
                    <input required name="username" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="password" class="control-label"><span class="red">*</span> Password</label>
                  <div class="controls">
                    <input required name="password" type="password"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="first" class="control-label"><span class="red">*</span> First Name</label>
                  <div class="controls">
                    <input required name="first" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="last" class="control-label"><span class="red">*</span> Last Name</label>
                  <div class="controls">
                    <input required name="last" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="access" class="control-label"><span class="red">*</span> Access Level: superuser, admin, or customer</label>
                  <div class="controls">
                    <input required name="access" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="email" class="control-label"> E-mail Address</label>
                  <div class="controls">
                    <input name="email" type="email"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="address1" class="control-label"> Address1</label>
                  <div class="controls">
                    <input name="address1" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="address2" class="control-label"> Address2</label>
                  <div class="controls">
                    <input name="address2" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="city" class="control-label"> City</label>
                  <div class="controls">
                    <input name="city" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                    <label for="state" class="control-label"> State</label>
                <div class="controls">
                    <input name="state" type="text"  class="">
                </div>
                </div>
                <div class="control-group">
                	<label for="zip" class="control-label"> Zip</label>
                <div class="controls">
                    <input name="zip" type="text"  class="">
                </div>
                </div>                
                <div class="control-group">
                  <label for="telephone" class="control-label"> Telephone</label>
                  <div class="controls">
                    <input name="telephone" type="number"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="mobile" class="control-label"> Mobile</label>
                  <div class="controls">
                    <input name="mobile" type="number"  class="">
                  </div>
                </div>
                <div class="control-group">
                	<label for="company" class="control-label"> Company</label>
                <div class="controls">
                    <input name="company" type="text"  class="">
                </div>
                </div> 
                <div class="pull-left">
                <?php
                if(isset($_POST['submit'])) {
				$insert_user_query = "INSERT INTO users (username, password, first_name, last_name, access_level, email, address1, address2, city, state, zip, telephone, mobile, company)
										VALUES ('".$_POST['username']."', '".md5($_POST['password'])."', '".$_POST['first']."', '".$_POST['last']."', '".$_POST['access']."','".$_POST['email']."','".$_POST['address1']."','".$_POST['address2']."','".$_POST['city']."','".$_POST['state']."','".$_POST['zip']."','".$_POST['telephone']."','".$_POST['mobile']."','".$_POST['company']."')";
				$mysqli->query($insert_user_query);
				?> <script type="text/javascript"> alert('You have successfully entered the User');</script>
                <?php } ?>
              <input class="btn btn-orange" name="submit" id="submit" type="submit" value="Insert User" />
              <input action="action" type="button" class="btn btn-danger" value="Cancel" onclick="window.history.go(-1); return false;" />
            </div>
              </fieldset>
            </div>
            </form>
            <span id="error"></span>
          <div class="clearfix"></div>
          <br>
        </div>        
        <!-- Sidebar Start-->
        <aside class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span3">
          <div class="sidewidt">
            <h1 class="heading1"><span class="maintext"> <i class="icon-user"></i> Options</span></h1>
            <ul class="nav nav-list categories">
              <li>
                <a href="admin.php"> View Databases</a>
              </li>
              <li>
                <a href="insertproduct.php"> Insert Products</a>
              </li>
              <li>
                <a href="insertuser.php">Insert Users</a>
              </li>
              <li>
                <a href="logout.php">Logout</a>
              </li>
              <li> <a>Browse Pages</a>
                <ul>
                  <li> <a href="about.php">About </a> </li>
                  <li> <a href="admin.php">Admin </a> </li>
                  <li> <a href="catalog.php?page=1">Catalog</a> </li>
                  <li> <a href="checkout1.php">Checkout1</a> </li>
                  <li> <a href="checkout2.php">Checkout2 </a> </li>
                  <li> <a href="checkout3.php">Checkout3 </a> </li>
                  <li> <a href="client.php">Client</a> </li>
                  <li> <a href="contact.php">Contact</a> </li>
                  <li> <a href="home.php">Home </a> </li>
                  <li> <a href="product.php">product view</a> </li>
                  <li> <a href="register.php">Register</a> </li>
                  <li> <a href="register.php">Search</a> </li>
                </ul>
              </li>
            </ul>
          </div>
        </aside>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>

<!--Google Analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-69797602-1', 'auto');
  ga('send', 'pageview');
</script>

<?php } include('footer.php'); ?>