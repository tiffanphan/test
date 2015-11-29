<!DOCTYPE html>
<?php
$pageTitle = 'Batchpad.com - Checkout';
 include_once('header.php');
 include_once('db_connect.php');
 include_once('cart_update.php');
 if(isset($_SESSION["cart_products"])){
 $cart_itm = $_SESSION["cart_products"];
 }
?>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BatchPad Checkout - Justin Duncan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet">
<link href="css/prettyPhoto.css" rel="stylesheet" media="screen">
<link href="css/portfolio.css" rel="stylesheet">
<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
<link rel="stylesheet" href="layerslider/css/layersliderstyle.css" type="text/css">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>
<body>
<!-- Header Start -->

<div id="maincontainer">
  <section id="product">
    <div class="container">
    <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="home.php">Home/ </a>
        </li>
        <li>
          <a href="checkout.php">Checkout:Options&nbsp;/ </a>
        </li>
        <li>
        	<a href="checkout2.php">Billing&nbsp;&amp;&nbsp;Shipping&nbsp;/ </a></li>
        <li class="active">Payment&nbsp;&amp;&nbsp;Confirm&nbsp;</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <h2 class="heading1"><span class="maintext">Checkout</span></h2>
        <div class="checkoutsteptitle">Personal Info</div>
        <div class="checkoutstep">
        <ul class="table-bordered">
            <?php echo "<li><b>First Name:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_firstname']."</li><br>"; ?>
            <?php echo "<li><b>Last Name:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_lastname']."</li><br>"; ?>
            <?php echo "<li><b>Address 1:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_address1']."</li><br>"; ?>
            <?php echo "<li><b>Address 2:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_address2']."</li><br>"; ?>
            <?php echo "<li><b>City:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_city']."</li><br>"; ?>
            <?php echo "<li><b>State:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_state']."</li><br>"; ?>
            <?php echo "<li><b>Zip Code:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_zip']."</li><br>"; ?>
            <?php echo "<li><b>Telephone:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_telephone']."</li><br>"; ?>
            <?php echo "<li><b>Mobile:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_mobile']."</li><br>"; ?>
            <?php echo "<li><b>Company:</b> &nbsp; &nbsp; ".$_SESSION['logged_in_company']."</li><br>"; ?>
        <ul>
        <?php
            if(isset($_SESSION['logged_in'])){
                $row = $select_id_result->fetch_object();
                echo "<li><b>First Name:</b> &nbsp; &nbsp; ".$row->first_name."</li><br>";
                echo "<li><b>Last Name:</b> &nbsp; &nbsp; ".$row->last_name."</li><br>";
                echo "<li><b>Address 1:</b> &nbsp; &nbsp; ".$row->address1."</li><br>";
                echo "<li><b>Address 2:</b> &nbsp; &nbsp; ".$row->address2."</li><br>";
                echo "<li><b>City:</b> &nbsp; &nbsp; ".$row->city."</li><br>";
                echo "<li><b>State:</b> &nbsp; &nbsp; ".$row->state."</li><br>";
                echo "<li><b>Zip Code:</b> &nbsp; &nbsp; ".$row->zip."</li><br>";
                echo "<li><b>Telephone:</b> &nbsp; &nbsp; ".$row->telephone."</li><br>";
                echo "<li><b>Mobile:</b> &nbsp; &nbsp; ".$row->mobile."</li><br>";
                echo "<li><b>Company:</b> &nbsp; &nbsp; ".$row->company."</li><br>";
            }else if(!isset($_POST['submit'])){
                echo "<li class='checkoutsteptitle'>Billing Information</li>";
                echo "<li><b>First Name:</b> &nbsp; &nbsp; ".$_POST['bFirst']."</li><br>";
                echo "<li><b>Last Name:</b> &nbsp; &nbsp; ".$_POST['bLast']."</li><br>";
                echo "<li><b>Address 1:</b> &nbsp; &nbsp; ".$_POST['bAddress1']."</li><br>";
                echo "<li><b>Address 2:</b> &nbsp; &nbsp; ".$_POST['bAddress2']."</li><br>";
                echo "<li><b>City:</b> &nbsp; &nbsp; ".$_POST['bCity']."</li><br>";
                echo "<li><b>State:</b> &nbsp; &nbsp; ".$_POST['bState']."</li><br>";
                echo "<li><b>Zip Code:</b> &nbsp; &nbsp; ".$_POST['bZip']."</li><br>";
                echo "<li><b>Country/Region:</b> &nbsp; &nbsp; ".$_POST['bCountry']."</li><br>";

                echo "<li class='checkoutsteptitle'>Shipping Information</li>";
                echo "<li><b>First Name:</b> &nbsp; &nbsp; ".$_POST['sFirst']."</li><br>";
                echo "<li><b>Last Name:</b> &nbsp; &nbsp; ".$_POST['sLast']."</li><br>";
                echo "<li><b>Address 1:</b> &nbsp; &nbsp; ".$_POST['sAddress1']."</li><br>";
                echo "<li><b>Address 2:</b> &nbsp; &nbsp; ".$_POST['sAddress2']."</li><br>";
                echo "<li><b>City:</b> &nbsp; &nbsp; ".$_POST['sCity']."</li><br>";
                echo "<li><b>State:</b> &nbsp; &nbsp; ".$_POST['sState']."</li><br>";
                echo "<li><b>Zip Code:</b> &nbsp; &nbsp; ".$_POST['sZip']."</li><br>";
                echo "<li><b>Country/Region:</b> &nbsp; &nbsp; ".$_POST['sCountry']."</li><br>";
            }
        ?>
          </ul>
        </div>
        <div class="checkoutsteptitle">Confirm Order </div>
        <div class="checkoutstep">
      
            <div class="cart-info">
        <table class="table table-striped table-bordered">
        <form method="post" action="cart_update.php">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="model">Model</th>
            <th class="quantity">Qty</th>
              <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
          
          <tr>
          <div class="cart-view-table-back">
<form method="post" action="cart_update.php">
  <tbody>
    <?php
     //include_once("config.php"); //include config file
    if(isset($_SESSION["cart_products"])) //check session var
    {
        $total = 0; //set initial total value
        $b = 0; //var for zebra stripe table 
        foreach ($_SESSION["cart_products"] as $cart_itm)
        {
            //set variables to use in content below
            $product_name = $cart_itm["product_name"];
            $product_qty = $cart_itm["product_qty"];
            $price = $cart_itm["price"];
            $product_code = $cart_itm["product_code"];
            $description = $cart_itm["description"];
            $image_url = $cart_itm["image_url"];
            $subtotal = ($price * $product_qty); //calculate Price x Qty
            
            echo '<td class="image"><a href="#"><img title="product" alt="product" src="'.$image_url.'" height="50" width="50"></a></td>';
            echo '<td class ="name">'.$product_name.'</td>';
            echo '<td class="description">'.$description.'</td>';
            echo '<td class="quantity"><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" class="col-lg-3 col-md-3 col-xs-6 col-sm-3"></td>';
            echo '<td class="total"> <a href="#" class="mr10"> <i class="tooltip-test font24 icon-refresh " data-original-title="Update"> </i> </a> 
               <a href="#"><i class="tooltip-test font24 icon-remove-circle" data-original-title="Remove"> </i></a></td>';
            echo '<td class="price">'.$currency.$price.'</td>';
            echo '<td class="total">'.$currency.$subtotal.'</td>';
            echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
            $total = ($total + $subtotal); //add subtotal to total var
        }
   $grand_total = $total + $shipping_cost; //grand total including shipping cost
        foreach($taxes as $key => $value){ //list and calculate all taxes in array
                $tax_amount     = round($total * ($value / 100));
                $tax_item[$key] = $tax_amount;
                $grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
        }
        
        $list_tax = '';
        foreach($tax_item as $key => $value){ //List all taxes
            $list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
        }
        $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
    }
    ?>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

          <div class="pull-right">
            <table class="table table-striped table-bordered ">
                <tbody>
                    <tr>
                        <td class="textright"><b>Sub-Total:</b></td>
                        <?php echo'<td><span class="bold">'.$subtotal.'</span></td>'?>
                    </tr>
                    <tr>
<<<<<<< HEAD
                        <td class="textright"><b>Eco Tax (-2.00):</b></td>
=======
                        <td class="textright"><b>Tax (.065%):</b></td>
>>>>>>> origin/master
                            <?php echo '<td><span class="bold">'.$tax_amount.'</span></td>'?>
                        </tr>
                    <tr>
                        <td class="textright"><b>Shipping</b></td>
                        <?php '<td class="textright">'.$shipping_handling.'</td>'; ?>
                    </tr>
                    <tr>
                    <td class="textright"><b>Total:</b></td>
                        <?php echo  '<td><span class="bold totalamout">'.$grand_total.'</span></td>'?>
                    </tr>
                </tbody>
            </table>
            <form action="process.php">
            <button class="btn btn-orange dw_button add checkout_button" type="submit" name="submitbutt" >Checkout</button>
            </form>
          </div>
        </div>
      </div>        
        <!-- Sidebar Start-->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span><i class="icon-list-ol"></i> Checkout Steps</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a>Checkout Options</a>
                </li>
                <li>
                  <a>Billing &amp; Shipping Details</a>
                </li>               
                <li>
                  <a class="active"> Payment Method &amp; Confirm Order</a>
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>

<!-- Footer -->
<footer id="footer">
    <section class="footersocial">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6 span3 info">
                    <h2> <i class="icon-link"></i> SiteMap </h2>
                    <ul>
                        <li><a href="home.php">Home</a> </li>
                        <li><a href="client.php">My Account</a> </li>
                        <li><a href="catalog.php">Shop</a> </li>
                        <li><a href="contact.php">Contact Us</a> </li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="cart.php">My Cart</a> </li>
                        <li><a href="register.php">Sign-Up</a> </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6 span3 contact">
                    <h2> <i class="icon-phone-sign"></i> Contact Info </h2>
                    <ul>
                        <li class="location"> 404 Not found Rd.‎ Melbourne, Fl 32903</li>
                        <li class="phone">(800)555-7890 &nbsp; (877)555-7890</li>
                        <li class="mobile"> #Bachpad</li>
                        <li class="email"> sales@batchpad.com</li>
                    </ul>
                </div>
                <!-- Testimonial-->
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span3">
                    <div class="sidewidt">
                        <h2 class="heading2"><span><i class="icon-edit"></i> Testimonials</span></h2>
                        <div class="flexslider" id="testimonialsidebar">
                            <ul class="slides">
                                <li>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."<br>"Lorem Ipsum is simply dummy text of the printing and industry.<br><br>
                                    <span class="pull-left orange">By : Lorem Ipsum</span> 
                                </li>
                                <li>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."<br>"Lorem Ipsum is simply dummy text of the printing and industry.<br><br>
                                    <span class="pull-left orange">By : Lorem Ipsum</span> 
                                </li>
                                <li>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."<br>"Lorem Ipsum is simply dummy text of the printing and industry.<br><br>
                                    <span class="pull-left orange">By : Lorem Ipsum</span> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6 span3 facebook">
                    <h2> <i class="icon-facebook-sign"></i> Facebook </h2>
                    <div class="seperator"></div>
                    <div class="seperator1"></div>
                    <div id="fb-root"></div>
                    <div class="fb-like-box" data-href="https://www.facebook.com/BachelorHaus" data-width="292" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-show-border="false" data-header="false"  data-height="240"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="copyrightbottom">
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span5 col-lg-3 col-md-3 col-xs-12 col-sm-12 paymentsicons"></div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 textcenter"> This site is not official and is an assignment for a UCF Digital Media course - Designed by Justin Duncan </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span5 col-lg-3 col-md-3 col-xs-12 col-sm-12 paymentsicons"> <img title="PayPal" alt="paypal" src="img/payment_paypal.png"> <img title="American Express" alt="american-express" src="img/payment_american.png"><img title="Maestro" alt="maestro" src="img/payment_maestro.png"> <img title="Discover" alt="discover" src="img/payment_discover.png"> </div>
            </div>
        </div>
    </section>
    <a id="gotop" href="#">Back to top</a>
</footer>
<!-- javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate.min.js"></script> 
<script type="text/javascript" src="js/jquery.easing.js"></script> 
<script src="js/respond.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script  src="js/jquery.prettyPhoto.js"></script> 
<script defer src="js/jquery.flexslider.js"></script> 
<script src="layerslider/js/greensock.js" type="text/javascript"></script> 
<script src="layerslider/js/layerslider.transitions.js" type="text/javascript"></script> 
<script src="layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script> 
<script type="text/javascript" src="js/jquery.tweet.js"></script> 
<script  src="js/zoomsl-3.0.min.js"></script> <script  type="text/javascript" src="js/jquery.validate.js"></script> 
<script type="text/javascript"  src="js/jquery.carouFredSel-6.1.0-packed.js"></script> 
<script type="text/javascript"  src="js/jquery.mousewheel.min.js"></script> 
<script type="text/javascript"  src="js/jquery.touchSwipe.min.js"></script> 
<script type="text/javascript" src="js/jquery.gmap.js"></script>
<script type="text/javascript" src="js/jquery.countdown.js"></script>
<script defer src="js/custom.js"></script>
</body>
</html>