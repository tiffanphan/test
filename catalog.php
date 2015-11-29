<?php
$pageTitle = 'Batchpad.com - Shop';
if((isset($_POST['view'])&&($_POST['view']))||(isset($_POST['sort'])&&($_POST['sort']))){
	header("location:catalog.php?page=1");
}
if(isset($_SESSION['page'])){
                        $sort=$_SESSION['page'];
                    }else{
						$_SESSION['page']='1';
				
        	}
include("db_connect.php");
include("header.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

?>
<script>/*<![CDATA[*/!window.QUnit && document.write('<script src="js/qunit.js"><\/script>')/*]]>*/</script>
  <script src="http://simplecartjs.org/js/inject.js"></script>
  
    <!-- Your project file goes here -->  
  <script>/*<![CDATA[*/
  
  if( QUnit.urlParams.lib && QUnit.urlParams.ver ){
    document.write('<script src="https://ajax.googleapis.com/ajax/libs/'+ 
          QUnit.urlParams.lib + '/' + 
          QUnit.urlParams.ver + '/' + 
          QUnit.urlParams.lib + '.js"><\/script>');
  } else {
    document.write('<script src="js/jquery.1.6.1.min.js"><\/script>');
  }
  
  if( QUnit.urlParams.commit ){
    document.write('<script src="js/get-raw-javascript.php?file=https://raw.github.com/wojodesign/simplecart-js/'+ QUnit.urlParams.commit +'/simpleCart.js"><\/script>');
   // document.write('<script src="js/get-raw-javascript.php?file=https://raw.github.com/wojodesign/simplecart-js/'+ QUnit.urlParams.commit +'/test/test.core.js"><\/script>');
  } else {
    document.write('<script src="js/simpleCart.js"><\/script>');
    //document.write('<script type="text/javascript" src="js/test.core.js"><\/script>');
  }
  /*]]>*/</script>
<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu container">
      <li><a class="home" href="home.php"><i class="icon-home icon-white font18"></i> <span> Home</span></a></li>
      <li><a class="active" href="catalog.php">Shop</a></li>
      <li><a href="about.php">about</a></li>
      <li><a href="contact.php">Contact Us</a> </li>
      <?php
        if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "admin")) {
          print "<li><a href='admin.php'>Admin</a> </li>";
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


<div id="maincontainer">
  <section id="product">
    <div class="container"> 
   <!-- <div class="simpleCart_items">
  <br />
  SubTotal: <span class="simpleCart_total"></span> <br />
  Tax: <span class="simpleCart_taxCost"></span> <br />
  Shipping: <span class="simpleCart_shippingCost"></span> <br />
  -----------------------------<br />
  Final Total: <span class="simpleCart_finalTotal"></span> <br />

  <a href="javascript:;" class="simpleCart_checkout">checkout</a> 
    </div>-->
      <!--  breadcrumb -->
      <ul class="breadcrumb">
        <li> <a href="home.php">Home</a> <span class="divider">/</span> </li>
        <li class="active">Shop</li>
      </ul>
      <div class="row"> 
        <!-- Sidebar Start--> 
        <!-- Sidebar-->
        <aside class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span3"> 
          <!-- Category-->
          <div class="sidewidt">
            <h1 class="heading1"><span class="maintext"><i class="icon-th-list"></i> Categories</span></h1>
            <ul class="nav nav-list categories">
              <li><a href="#" id="navFurn" class="categoryBtnFurniture">Furniture</a></li>
              <li><a href="#" id="navKit" class="categoryBtnKitchen">Kitchen</a> </li>
              <li><a href="#" id="navElect" class="categoryBtnElectronics">Electronics </a> </li>
              <li><a href="#" id="navBath" class="categoryBtnBathroom">Bathroom </a> </li>
              <li><a href="#" id="navBed" class="categoryBtnBedroom">Bedroom</a> </li>
              <li><a href="#" id="navLiv" class="categoryBtnLivingroom">Living Room</a> </li>
            </ul>
          </div>
          <!--  Hottest New Products -->
          <div class="sidewidt">
            <h1 class="heading1"><span class="maintext"><i class="icon-bookmark"></i> Hot New Items</span></h1>
            <ul class="bestseller">
            <?php
			        $zero=0;
        			$limit=6;
        			$new = 'SELECT * FROM products WHERE new="yes"';
        			$myNew = $mysqli->query($new);
        			//$myNew = mysql_query($new,$con);  
              while(($row = $myNew->fetch_object()) && ($zero<=$limit)){
	              $zero++;
	              echo "<li> <img width='50' height='50' src='".$row->image_url."' alt='product' title='product'> <a class='productname' href='product.php?id='".$row->product_id."'>".$row->product_name."</a><span class='procategory'>Furniture</span><span class='price'>".$row->price."</span></li>";
              }
            ?>
            </ul>
          </div>
        </aside>
        <!-- Sidebar End-->
		    <!-- Category End-->
        <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">	 
          <!-- Category Products-->
          <section id="category">
            <h1 class="heading1"><span class="maintext"> <i class="icon-money"></i> Catalog</span></h1>
            <div class="row">
              <div class="sorting well">
              <?php
			          if(isset($_SESSION['sort'])){
                  $sort=$_SESSION['sort'];
                }else{
                  $_SESSION['sort']='blank';
                }
			          (isset($_POST["sort"])) ? ($sort = $_POST["sort"]) &&($_SESSION['sort']=$_POST["sort"]) : $sort=$_SESSION['sort']
              ?>
                <div class="pull-left">
                  <form id="sort_form" class="form-inline" method="post" onchange="change2()">
                    Sort By:
                    <select id="sort" name="sort" class="span2">
                      <option <?php if ($sort == 'blank' ) echo 'selected' ; ?> value='blank'>--</option>
                      <option <?php if ($sort == 'Name' ) echo 'selected' ; ?> value='Name'>Name: A-Z</option>
                      <option <?php if ($sort == 'Price' ) echo 'selected' ; ?> value='Price'>Price: Low to high</option>
                    </select>
                  </form>
                  <?php
			              if(isset($_SESSION['view'])&&($_SESSION['view']>12)){
				              $view=$_SESSION['view'];
			              }else{
				              $_SESSION['view']=12;
			              }
                  ?>
                </div>
        		    <!-- amount of products sidebar --> 
                <?php
				          ((isset($_POST['view'])) ? ($view = $_POST['view'])&&($_SESSION['view']=$_POST['view']) : $view=$_SESSION['view']);
				        ?>
                <div class="pull-right">
                  <form id="view_form" method="post" onchange="change()" class="pull-right">
                    View:
                    <select class="span1" id="view" name="view">
                      <option <?php if ($view == 12 ) echo 'selected' ; ?> value="12">12</option>
                      <option <?php if ($view == 24 ) echo 'selected' ; ?> value="24">24</option>
                      <option <?php if ($view == 36 ) echo 'selected' ; ?> value="36">36</option>
                    </select>
                    <?php 
				              $page = (int) $_GET['page'];
                      if ($page < 1) $page = 1;
                      $startResults = ($page - 1) * $view;
                      $numberOfRows = mysqli_num_rows($mysqli->query('SELECT * FROM products'));
                      $totalPages = ceil($numberOfRows / $view);
				              if($sort=='Name'){
                        $all = "SELECT * FROM products ORDER BY product_name ASC LIMIT $startResults, $view";
                      }elseif($sort=='Price'){
                        $all = "SELECT * FROM products ORDER BY cost ASC LIMIT $startResults, $view";
                      }else{
                        $all = "SELECT * FROM products LIMIT $startResults, $view";
                      }
              				$new = 'SELECT * FROM products WHERE new = "yes"';
              				$myAll = $mysqli->query($all);
						          $last = "SELECT product_id FROM products ORDER BY product_id DESC";
            			    $myLast = $mysqli->query($last);
            			    $amount = $myLast->fetch_object();
                      if(($startResults+$view)>($amount->product_id)){
                        print " ".($startResults+1)."-".($amount->product_id)." of ".$amount->product_id."\n";
                      }else{
                        print " ".($startResults+1)."-".($startResults+$view)." of ".$amount->product_id."\n";
                      }    
            		    ?>
                  </form>
                </div>
              </div>
            <!-- amount of items to view END -->
            </div>
            <!-- sort by and view number of items div END -->            
                <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails list row" style="display:block" >
                  <?php
                    if($view==24){
	                  $zero=1;
                    $limit_zero=23;
                    while(($row = $myAll->fetch_object())&&($zero<=$limit_zero)){
							        $zero++;
                   echo "<li class='".$row->category."'>";
			  echo "<div class='simpleCart_shelfItem'>\n";
              echo "<h2 style='display: none' class='item_name'>".$row->product_name."</h2>";
              echo "<h2 style='display: none' class='item_price'>".$row->price."</h2>";
			  echo "<div class='row'>\n";
			  echo "<form method='post' action='cart_update.php'>\n";
			  echo "\t\t\t\t\t<div class='product_image'>\n";
			  echo "<div class='col-lg-4 col-md-4 col-xs-12 col-sm-6 span3'><a href='product.php?id=".$row->product_id."'><img src='".$row->image_url."' alt='".$row->product_name."'></a></div>";
			  echo "<div class='col-lg-6 col-md-6 col-xs-12 col-sm-12'><a class='productname' href='product.php?id=".$row->product_id."'>".$row->product_name."</a>";
			  echo "<div class='productdescription'>".$row->description."<br></div>";
			  echo "\t\t\t\t\t<p><span class='green'>In Stock</span><span class='item_price' $".$row->price."</span></p></div>\n";  
			  echo "<div class='rw-ui-container' data-urid=".$row->product_id."></div>";
			  echo "\t\t\t\t\t<div>\n";
			  echo "<input type='hidden' name='product_qty' value='1' />";
			  echo "<input type='hidden' name='product_code' value=".$row->product_sku." />";
			  echo "<input type='hidden' name='type' value='add' />";
			  echo "<input type='hidden' name='return_url' value=".$current_url."/>"; 
			  echo "\t\t\t\t\t\t<input type='button' class='item_add btn btn-orange btn-small addtocartbutton' value='Add to Cart'>\n"; 
			  echo "\t\t\t\t\t</div>\n";
					?>
                         </form>
                         </div>
                         </div>
                         </li>
					<?php
                      
}  
    
} 

elseif($view==36){
	$zero=0;
	$limit_zero=35;
        while(($row = $myAll->fetch_object())&&($zero<=$limit_zero)){
              $zero++;
                  echo "<li class='".$row->category."'>";
			  echo "<div class='simpleCart_shelfItem'>\n";
              echo "<h2 style='display: none' class='item_name'>".$row->product_name."</h2>";
              echo "<h2 style='display: none' class='item_price'>".$row->price."</h2>";
			  echo "<div class='row'>\n";
			  echo "<form method='post' action='cart_update.php'>\n";
			  echo "\t\t\t\t\t<div class='product_image'>\n";
			  echo "<div class='col-lg-4 col-md-4 col-xs-12 col-sm-6 span3'><a href='product.php?id=".$row->product_id."'><img src='".$row->image_url."' alt='".$row->product_name."'></a></div>";
			  echo "<div class='col-lg-6 col-md-6 col-xs-12 col-sm-12'><a class='productname' href='product.php?id=".$row->product_id."'>".$row->product_name."</a>";
			  echo "<div class='productdescription'>".$row->description."<br></div>";
			  echo "\t\t\t\t\t<p><span class='green'>In Stock</span><span class='item_price' $".$row->price."</span></p></div>\n";  
			  echo "<div class='rw-ui-container' data-urid=".$row->product_id."></div>";
			  echo "\t\t\t\t\t<div>\n";
			  echo "<input type='hidden' name='product_qty' value='1' />";
			  echo "<input type='hidden' name='product_code' value=".$row->product_sku." />";
			  echo "<input type='hidden' name='type' value='add' />";
			  echo "<input type='hidden' name='return_url' value=".$current_url."/>"; 
			  echo "\t\t\t\t\t\t<input type='button'class='item_add btn btn-orange btn-small addtocartbutton' value='Add to Cart'>\n"; 
			  echo "\t\t\t\t\t</div>\n";
					?>
               </form>
               </div>
               </div>
               </li>
               <?php } }
else{
	$zero=1;
						
	/* While loop sending back 12 item view */
	$limit_zero=11;
        while(($row = $myAll->fetch_object())&&($zero<=$limit_zero)){
              $zero++;
			  echo "<li class='".$row->category."'>";
			  echo "<div class='simpleCart_shelfItem'>\n";
              echo "<h2 style='display: none' class='item_name'>".$row->product_name."</h2>";
              echo "<h2 style='display: none' class='item_price'>".$row->price."</h2>";
			  echo "<div class='row'>\n";
			  echo "<form method='post' action='cart_update.php'>\n";
			  echo "\t\t\t\t\t<div class='product_image'>\n";
			  echo "<div class='col-lg-4 col-md-4 col-xs-12 col-sm-6 span3'><a href='product.php?id=".$row->product_id."'><img src='".$row->image_url."' alt='".$row->product_name."'></a></div>";
			  echo "<div class='col-lg-6 col-md-6 col-xs-12 col-sm-12'><a class='productname' href='product.php?id=".$row->product_id."'>".$row->product_name."</a>";
			  echo "<div class='productdescription'>".$row->description."<br></div>";
			  echo "\t\t\t\t\t<p><span class='green'>In Stock</span><span class='item_price' $".$row->price."</span></p></div>\n";  
			  echo "<div class='rw-ui-container' data-urid=".$row->product_id."></div>";
			  echo "\t\t\t\t\t<div>\n";
			  echo "<input type='hidden' name='product_qty' value='1' />";
			  echo "<input type='hidden' name='product_code' value=".$row->product_sku." />";
			  echo "<input type='hidden' name='type' value='add' />";
			  echo "<input type='hidden' name='return_url' value=".$current_url."/>"; 
			  echo "\t\t\t\t\t\t<input type='button'class='item_add btn btn-orange btn-small addtocartbutton' value='Add to Cart'>\n"; 
			  echo "\t\t\t\t\t</div>\n";?>
              </form>
              </div>
              </div>
              </li> 
              <?php } } ?>
              </ul>


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


            
                 <?php  
                    if(($startResults+$view)>($amount->product_id)){
                     print " ".($startResults+1)."-".($amount->product_id)." of ".$amount->product_id."\n";
                    }
                    else{
                        print " ".($startResults+1)."-".($startResults+$view)." of ".$amount->product_id."\n";
                    }
                 ?>
           
       </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
include('footer.php');
?>
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