<?php
  $pageTitle = 'Batchpad.com - Profile';
  include('header.php');
  include('db_connect.php');
  if(isset($_SESSION['logged_in_user_id'])){
  $id= $_GET['id'];
  $select_id = "SELECT * FROM users WHERE user_id = $id";
  $select_id_result = $mysqli->query($select_id);
  }
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
                    <form action="search.php" method="post" class="form-search top-search">
                        <input type="text" name="search" class="input-small search-query" placeholder="Search Here…">
                        <button class="btn btn-orange btn-small tooltip-test" data-original-title="Search"><i class="icon-search icon-white"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
<?php
	if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in_user_access'] == 'admin') || ($_SESSION['logged_in_user_access'] == 'superuser') ) {

		print "This is for customer information, Login as the test user account to view content! or go to the <a class='clickable' href='admin.php'>Admin page </a>to view user information.";
		
	}else if($_SESSION['logged_in_user_access'] == 'customer') {
?>

<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="home.php">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Account Info</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <?php $row = $select_id_result->fetch_object(); ?>
        <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
          <h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> My Account details</span></h1>
          <ul class="unstyled listoption2">
          	<?php echo "<li><b>First Name:</b> &nbsp; &nbsp; ".$row->first_name."</li><br>"; ?>
            <?php echo "<li><b>Last Name:</b> &nbsp; &nbsp; ".$row->last_name."</li><br>"; ?>
            <?php echo "<li><b>E-mail:</b> &nbsp; &nbsp; ".$row->email."</li><br>"; ?>
            <?php echo "<li><b>Address 1:</b> &nbsp; &nbsp; ".$row->address1."</li><br>"; ?>
            <?php echo "<li><b>Address 2:</b> &nbsp; &nbsp; ".$row->address2."</li><br>"; ?>
            <?php echo "<li><b>City:</b> &nbsp; &nbsp; ".$row->city."</li><br>"; ?>
            <?php echo "<li><b>State:</b> &nbsp; &nbsp; ".$row->state."</li><br>"; ?>
            <?php echo "<li><b>Zip Code:</b> &nbsp; &nbsp; ".$row->zip."</li><br>"; ?>
            <?php echo "<li><b>Telephone:</b> &nbsp; &nbsp; ".$row->telephone."</li><br>"; ?>
            <?php echo "<li><b>Mobile:</b> &nbsp; &nbsp; ".$row->mobile."</li><br>"; ?>
            <?php echo "<li><b>Company:</b> &nbsp; &nbsp; ".$row->company."</li><br>"; ?>
          </ul>
          <div class="clearfix"></div>
          <br>
        </div>        
        <!-- Sidebar Start-->
        <aside class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span3">
          <div class="sidewidt">
            <h1 class="heading1"><span class="maintext"> <i class="icon-user"></i> Account</span></h1>
            <ul class="nav nav-list categories">
              <li><a href="client.php"> My Account</a></li>
              <li><?php echo '<a href="editinfo.php?id='.$id.'">Edit Account</a>'; ?></li>
              <li><a href="#">Recover Password</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </aside>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>
<?php } ?>
<?php
include('footer.php');
?>