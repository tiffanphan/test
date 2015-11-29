<?php
$pageTitle = 'Batchpad.com - Edit User';
include("db_connect.php");
include("header.php");

	if(!isset($_SESSION['logged_in'])) {
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
    	<img class='fixed' src='img/error-404.png' alt='not found'><span>You need to be logged in to do this!</span>

<?php
	}else if(isset($_SESSION['logged_in'])) {
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
        
          <h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> Edit Personal Information</span></h1>
          <form class="form-horizontal form-custom" method="post" >
            <h3 class="heading3">Edit Personal Information</h3>
            <div class="registerbox">
              <fieldset>
              <?php 
			  	//selecting the user id from link on the referring page page
               	$id= $_GET['id'];
  	  			$select_user = "SELECT * FROM users WHERE user_id = $id";
      			$myUser = $mysqli->query($select_user);
	 			$row = $myUser->fetch_object(); ?>
                <div class="control-group">
                  <label for="username" class="control-label"><span class="red">*</span> Username</label>
                  <div class="controls">
                    <?php echo '<input required name="username" maxlength="24" type="text" value='.$row->username.' >'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="first" class="control-label"><span class="red">*</span> First Name</label>
                  <div class="controls">
                    <?php echo '<input required name="first" type="text" maxlength="24"  value="'.$row->first_name.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="last" class="control-label"><span class="red">*</span> Last Name</label>
                  <div class="controls">
                    <?php echo '<input required name="last" maxlength="24" type="text"  value="'.$row->last_name.'">'; ?>
                  </div>
                </div>
                <?php if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "admin")) { ?>
                <div class="control-group">
                  <label for="access" class="control-label"><span class="red">*</span> Access Level: superuser, admin, or customer</label>
                  <div class="controls">
                    <?php echo '<input required name="access" maxlength="16" type="text"  value="'.$row->access_level.'">'; ?>
                  </div>
                </div>
                <?php } ?>
                <div class="control-group">
                  <label for="email" class="control-label"> E-mail Address</label>
                  <div class="controls">
                    <?php echo '<input name="email" type="email" maxlength="64"  value="'.$row->email.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="address1" class="control-label"> Address1</label>
                  <div class="controls">
                    <?php echo '<input name="address1" maxlength="64" type="text"  value="'.$row->address1.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="address2" class="control-label"> Address2</label>
                  <div class="controls">
                    <?php echo '<input name="address2" maxlength="64" type="text"  value="'.$row->address2.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="city" class="control-label"> City</label>
                  <div class="controls">
                    <?php echo '<input required name="city" maxlength="16" type="text"  value="'.$row->city.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                    <label for="state" class="control-label"> State</label>
                <div class="controls">
                    <?php echo '<input name="state" maxlength="2" type="text"  value="'.$row->state.'">'; ?>
                </div>
                </div>
                <div class="control-group">
                	<label for="zip" class="control-label"> Zip</label>
                <div class="controls">
                    <?php echo '<input maxlength="5" name="zip" type="number"  value="'.$row->zip.'">'; ?>
                </div>
                </div>                
                <div class="control-group">
                  <label for="telephone" class="control-label"> Telephone</label>
                  <div class="controls">
                    <?php echo '<input  name="telephone" type="number" maxlength="10"  value="'.$row->telephone.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="mobile" class="control-label"> Mobile</label>
                  <div class="controls">
                    <?php echo '<input name="mobile" type="number" maxlength="10" value="'.$row->mobile.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                	<label for="company" class="control-label"> Company</label>
                <div class="controls">
                    <?php echo '<input name="company" type="text" maxlength="20"  value="'.$row->company.'">'; ?>
                </div>
                </div> 
                <div class="pull-left">
                <?php
                if(isset($_POST['submit'])) {
				$insert_user_query = "UPDATE users SET username = '".$_POST['username']."', first_name = '".$_POST['first']."', last_name = '".$_POST['last']."', access_level = '".$_POST['access']."', email = '".$_POST['email']."', address1 = '".$_POST['address1']."', address2 = '".$_POST['address2']."', city = '".$_POST['city']."', state = '".$_POST['state']."', zip = '".$_POST['zip']."', telephone = '".$_POST['telephone']."', mobile = '".$_POST['mobile']."', company = '".$_POST['company']."' WHERE user_id = $id";
				$mysqli->query($insert_user_query);
				?> <script type="text/javascript"> alert('You have successfully Updated The Clients Information'); window.location = "admin.php";</script>
                <?php } ?>
              <input class="btn btn-orange" name="submit" id="submit" type="submit" value="Update Information" />
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
           
           <!-- we can put sidebar here (optional) -->
           
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