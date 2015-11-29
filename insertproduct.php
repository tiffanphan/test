<?php
$pageTitle = 'Batchpad.com - Insert Product';
include("db_connect.php");
include("header.php");

	if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in_user_access'] != 'admin')) {

		print "You do not have the authorization to do this.";

		
	}elseif($_SESSION['logged_in_user_access'] == 'admin') {			

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
        <li class="active">Admin View</li>
      </ul>
      <div class="row">       
        <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
        
          <h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> Insert into:</span></h1>
          <form class="form-horizontal form-custom" method="post">
            <h3 class="heading3">Insert Products</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label for="product_name" class="control-label"><span class="red">*</span> Product name</label>
                  <div class="controls">
                    <input required name="product_name" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="description" class="control-label"><span class="red">*</span> Product Description</label>
                  <div class="controls">
                    <input required name="description" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="sku" class="control-label"><span class="red">*</span> SKU</label>
                  <div class="controls">
                    <input required name="sku" type="number"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="quantity" class="control-label"><span class="red">*</span> Quantity in Stock</label>
                  <div class="controls">
                    <input required name="quantity" type="number"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="price" class="control-label"> Price</label>
                  <div class="controls">
                    <input required name="price" type="text"  class="">
                  </div>
                </div>
                                <div class="control-group">
                  <label for="cost" class="control-label"> Cost</label>
                  <div class="controls">
                    <input required name="cost" type="number"  class="">
                  </div>
                </div>
                <div class="control-group">
                    <label for="img_url" class="control-label"> Image URL</label>
                <div class="controls">
                    <input required name="img_url" type="text"  class="">
                </div>
                </div>
                <div class="control-group">
                	<label for="sale" class="control-label"> on Sale? Yes or No</label>
                <div class="controls">
                    <input name="sale" type="text"  class="">
                </div>
                </div>                
                <div class="control-group">
                  <label for="featured" class="control-label"> Featured? Yes or No</label>
                  <div class="controls">
                    <input name="featured" type="text"  class="">
                  </div>
                </div>
                <div class="control-group">
                  <label for="new" class="control-label"> New? Yes or No</label>
                  <div class="controls">
                    <input name="new" type="text"  class="">
                  </div>
                </div>
                <div class="pull-left">
                <?php
				if(isset($_POST['submit'])){
				$insert_product_query = "INSERT INTO products (product_name, description, product_sku, qty_stock, price, cost, image_url, sale, featured, new)
										VALUES ('".$_POST['product_name']."', '".$_POST['description']."', '".$_POST['sku']."', '".$_POST['quantity']."','".$_POST['price']."','".$_POST['cost']."','".$_POST['img_url']."','".$_POST['sale']."','".$_POST['featured']."','".$_POST['new']."')";
				$mysqli->query($insert_product_query);
				?>
                <script type="text/javascript"> alert ('Product inserted Successfully'); </script>
                <?php
			} ?>
              <input class="btn btn-orange" name="submit" id="submit" type="submit" value="Insert Product" />
              <a href="admin.php" class="btn btn-danger"> Cancel </a>
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