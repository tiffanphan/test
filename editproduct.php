<?php
include("db_connect.php");
$pageTitle = 'Batchpad.com - Edit Products';
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
    	<img class='fixed' src='img/error-404.png' alt='not found'><span>You do not have access to do this!</span>

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
        
          <h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> Edit Product Information</span></h1>
          <form class="form-horizontal form-custom" method="post" >
            <h3 class="heading3">Edit Product Information</h3>
            <div class="registerbox">
              <fieldset>
              <?php 
			  	//selecting the user id from link on the referring page page
               	$id= $_GET['id'];
  	  			$select_product = "SELECT * FROM products WHERE product_id = $id";
      			$myProduct = $mysqli->query($select_product);
	 			$row = $myProduct->fetch_object(); ?>
                <div class="control-group">
                  <label for="first" class="control-label"><span class="red">*</span> Product Name</label>
                  <div class="controls">
                    <?php echo '<input required name="product_name" type="text" maxlength="24"  value="'.$row->product_name.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="last" class="control-label"><span class="red">*</span> Description</label>
                  <div class="controls">
                    <?php echo '<textarea rows="5" required name="description" maxlength="144">'.$row->description.'</textarea>'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="access" class="control-label"><span class="red">*</span> SKU</label>
                  <div class="controls">
                    <?php echo '<input required name="sku" maxlength="16" type="text"  value="'.$row->product_sku.'">'; ?>
                  </div>
                </div>
  
                <div class="control-group">
                  <label for="email" class="control-label"> Quantity on hand</label>
                  <div class="controls">
                    <?php echo '<input required name="qty" type="text" maxlength="10"  value="'.$row->qty_stock.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="address1" class="control-label"> Cost</label>
                  <div class="controls">
                    <?php echo '<input required name="cost" maxlength="10" type="text"  value="'.$row->cost.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="address2" class="control-label"> Price</label>
                  <div class="controls">
                    <?php echo '<input required name="price" maxlength="10" type="text"  value="'.$row->price.'">'; ?>
                  </div>
                </div>
                <div class="control-group">
                  <label for="city" class="control-label"> Image URL</label>
                  <div class="controls">
                    <?php echo '<input required name="img_url" maxlength="64" type="text"  value="'.$row->image_url.'">'; ?>
                  </div>
                </div>
                <div class="pull-left">
                <?php
                if(isset($_POST['submit'])) {
				$insert_product_query = "UPDATE products SET product_name = '".$_POST['product_name']."', description = '".$_POST['description']."', product_sku = '".$_POST['sku']."', qty_stock = '".$_POST['qty']."', cost = '".$_POST['cost']."', price = '".$_POST['price']."', image_url = '".$_POST['img_url']."' WHERE product_id = $id";
				$mysqli->query($insert_product_query);
				?> <script type="text/javascript"> alert('You have successfully Updated The Product Information'); window.location = "admin.php";</script>
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