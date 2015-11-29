<?php
$pageTitle = 'Batchpad.com - Admin';
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
    <div class="centeralign">
    	<br><h3 class="red">This area is for administrators only, please sign in to view content.</h3><br><hr>
        <br><img class='fixed' src='img/liam.jpg' alt='not found'><br><hr><br>
        <h3 class="red">If you are here to do Batchpad.com harm, I will find you, and I will kill you!</h3><br>
        </div>

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
        <li class="active">Admin View</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        
          <h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> Products List</span></h1>

<div class="takeout table table-striped table-bordered table-condensed">
<ul class="">
<li>product&nbsp;Id</li>
<li>Product Name</li>
<li>Description</li>
<li>Sku</li>
<li>Qty</li>
<li>Cost</li>
<li>Price</li>
<li>Image Location</li>
<li>On&nbsp;Sale?</li>
<li>Featured?</li>
<li>New Product?</li>
</ul>
<div class="tbody">
<?php
$page = (int) $_GET['page'];
        if ($page < 1) $page = 1;
        $startResults = ($page - 1) * 10;
        $numberOfRows = mysqli_num_rows($mysqli->query('SELECT * FROM products'));
        $totalPages = ceil($numberOfRows / 10);
		$select_products = "SELECT * FROM products
                                ORDER BY product_name ASC
                                LIMIT $startResults, 10";
  	$myProducts = $mysqli->query($select_products);
while($row = $myProducts->fetch_object()){
echo "<ul>";
if($_SESSION['logged_in_user_access'] == 'admin'){
echo "<li><a href='deleteproduct.php?id=".$row->product_id."'><i class='icon-trash'></i></a>&nbsp;<a href='editproduct.php?id=".$row->product_id."'><i class='icon-pencil'></i></a>" .$row->product_id. "</li>";
}elseif($_SESSION['logged_in_user_access'] == 'superuser'){
echo "<li>" .$row->product_id. "</li>";
}
echo "<li>" .$row->product_name."</li>";
echo "<li>" .$row->description. "</li>";
echo "<li>" .$row->product_sku. "</li>";
echo "<li>" .$row->qty_stock. "</li>";
echo "<li>" .$row->cost."</li>";
echo "<li>" .$row->price."</li>";
echo "<li>" .$row->image_url."</li>";
//if the person accountable is not null display nothing
if($row->sale == NULL){	
	echo "<li>" . "" . "</li>";
}else{
	echo "<li>" . $row->sale. "</li>";	
}
if($row->featured == NULL){	
	echo "<li>" . "" . "</li>";
}else{
	echo "<li>" . $row->featured. "</li>";	
}
if($row->new == NULL){	
	echo "<li>" . "" . "</li>";
}else{
	echo "<li>" . $row->new. "</li>";	
}

echo "</tr>";
}
?>
</div>
</div>

                  <div class="pull-right">

                <ul class="pagination">
                    <li>
                    <?php
                        if($page > 1)
                        echo '<a href="?page='.($page - 1).'">Prev</a>'; 
                    ?>
                    </li>
                    <?php  for($i = 1; $i <= $totalPages; $i++){
   					if($i == $page)
      					echo '<li class="active"><a><strong>'.$i.'</strong></a></li>&nbsp';
   					else
      					echo '<li><a href="?page='.$i.'">'.$i.'</a><li>&nbsp';
					} 
                    ?>

                   <li>
                    <?php
                        echo '<a href="?page='.($page + 1).'">Next</a>'; 
                    ?>
                    </li>
                </ul>            
       </div>

</div>
<div class="pull-left">
<a class="btn btn-orange" href="insertproduct.php">Insert New Product</a>
</div><br><br>
<h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> Customers List</span></h1>
<div class="takeout table table-striped table-bordered table-condensed">
<li>
<?php
if($_SESSION['logged_in_user_access'] == 'admin'){
echo '<li>Edit</li>';
echo '<li>User Id</li>';
}else{
echo '<li>User Id</li>';
} ?>
<li>Username</li>
<li>Password</li>
<li>First Name</li>
<li>Last Name</li>
<li>E-Mail</li>
<li>Address 1</li>
<li>Address 2</li>
<li>City</li>
<li>State</li>
<li>Zip</li>
<li>Telephone</li>
<li>Mobile</li>
<li>Company</li>
</ul>
<div class="tbody">
<?php
	$select_customers = "SELECT * FROM users WHERE access_level = 'customer'";
  	$myCustomers = $mysqli->query($select_customers);
while($row = $myCustomers->fetch_object()){
echo "<ul>";
if($_SESSION['logged_in_user_access'] == 'admin'){
echo "<li><a href='deleteuser.php?id=".$row->user_id."'><i class='icon-trash'></i></a>&nbsp;<a href='edituser.php?id=".$row->user_id."'><i class='icon-pencil'></i></a></li>";
echo "<li>" .$row->user_id. "</li>";
}else{
echo "<li>" .$row->user_id. "</li>";
}
echo "<li>" .$row->username."</li>";
echo "<li>" .$row->password. "</li>";
echo "<li>" .$row->first_name. "</li>";
echo "<li>" .$row->last_name. "</li>";
echo "<li>" .$row->email."</li>";
echo "<li>" .$row->address1."</li>";
echo "<li>" .$row->address2."</li>";
echo "<li>" .$row->city."</li>";
echo "<li>" .$row->state."</li>";
echo "<li>" .$row->zip."</li>";
echo "<li>" .$row->telephone."</li>";
//if the field is NULL display nothing
if($row->mobile == NULL){	
	echo "<li>" . "" . "</li>";
}else{
	echo "<li>" . $row->mobile. "</li>";	
}
if($row->company == NULL){	
	echo "<li>" . "" . "</li>";
}else{
	echo "<li>" . $row->company. "</li>";	
}

echo "</ul>";
}
?>
</div>
</div>
<h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> Admins and Users List</span></h1>
<div class="takeout table table-striped table-bordered table-condensed">
<ul>
<?php
if($_SESSION['logged_in_user_access'] == 'admin'){
echo '<li>Edit</li>';
echo '<li>User Id</li>';
}else{
echo '<li>User Id</li>';
} ?>
<li>Username</li>
<li>Password</li>
<li>First Name</li>
<li>Last Name</li>
<li>E-Mail</li>
<div class="tbody">
<?php
	$select_users = "SELECT * FROM users WHERE access_level != 'customer'";
  	$myUsers = $mysqli->query($select_users);
while($row = $myUsers->fetch_object()){
echo "<ul>";
if($_SESSION['logged_in_user_access'] == 'admin'){
echo "<li><a href='deleteuser.php?id=".$row->user_id."'><i class='icon-trash'></i></a>&nbsp;<a href='edituser.php?id=".$row->user_id."'><i class='icon-pencil'></i></a></li>";
echo "<li>" .$row->user_id. "</li>";
}else{
echo "<li>" .$row->user_id. "</li>";
}
echo "<li>" .$row->username."</li>";
echo "<li>" .$row->password. "</li>";
echo "<li>" .$row->first_name. "</li>";
echo "<li>" .$row->last_name. "</li>";
echo "<li>" .$row->email."</li>"; ?>
</ul>
<?php } ?>
</div>
</div>
<div class="pull-left">
<?php if($_SESSION['logged_in_user_access'] == 'admin'){ ?>
<a href="insertuser.php" class="btn btn-orange">Insert New User</a>
<?php } ?>
</div>
          <div class="clearfix"></div>
          <br>
        </div>        
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-69797602-1', 'auto');
  ga('send', 'pageview');
</script>
<?php } include('footer.php'); ?>