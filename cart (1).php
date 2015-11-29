<!DOCTYPE html>
<?php
 include_once('header.php');
 include_once('db_connect.php');
 include_once('cart_update.php');
?>

<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu container">
      <li><a href="home.php"><i class="icon-home icon-white font18"></i> <span> Home</span></a></li>
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

<!-- Header End -->
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="home.php">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active"> Cart</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> <i class="icon-shopping-cart"></i> Shopping Cart</span></h1>
      <!-- Cart-->
      <?php 
      if($_SESSION["cart_products"]==null){ 
	  ?>
    <br> 
    <div class='cart-info'>
        There are currently no items in your cart.
    </div> 
<?php }else{ ?>
     
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
            <th class="delete">Remove</th>
          </tr>
          <tr>
          <div class="cart-view-table-back">
<form method="post" action="process.php">
  <tbody>
    <?php
     //include_once("config.php"); //include config file
      if(isset($_SESSION["cart_products"])){ //check session var
        $total = 0; //set initial total value
        $b = 0; //var for zebra stripe table 
        foreach ($_SESSION["cart_products"] as $cart_itm){
            //set variables to use in content below
            $product_name = $cart_itm["product_name"];
            $product_qty = $cart_itm["product_qty"];
            $price = $cart_itm["price"];
            $product_sku = $cart_itm["product_sku"];
            $description = $cart_itm["description"];
            $product_code = $cart_itm["product_code"];
            $image_url = $cart_itm["image_url"];
            $subtotal = $price * $product_qty; //calculate Price x Qty
            
            echo '<td class="image"><a href="#"><img title="product" alt="product" src="'.$image_url.'" height="50" width="50"></a></td>';
            echo '<td class ="name">'.$product_name.'</td>';
            echo '<td class="description">'.$description.'</td>';
            echo '<td class="quantity"><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" class="col-lg-3 col-md-3 col-xs-6 col-sm-3"></td>';
            echo '<td class="total"> <a href="#" class="mr10"> <i class="tooltip-test font24 icon-refresh " data-original-title="Update"> </i> </a> 
               <i class="tooltip-test font24 icon-remove-circle" data-original-title="Remove" name="remove_code[]" value="'.$product_code.'"> </i></td>';
            echo '<td class="price">'.$price.'</td>';
            echo '<td class="total">'.$subtotal.'</td>';
            echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
            $total = ($total + $subtotal);
           }
          } 
        ?>
  </tbody>
</div>
</tr>
</table>
  <div class="cart_edit large-6 medium-6 small-6 columns">    
    <ul>
        <li><button type="submit" formaction="cart_update.php">Update</button></li>
    </ul>          
  </div>
  <div class="large-3 medium-4 small-12 columns">
  <input type="hidden" name="return_url" value="<?php $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  echo $current_url; ?>" />
  </div>
  </form>

<div class="total_box large-12 medium-12 small-12 columns">
			<?php
        foreach($ship_item as $key => $value){ //List all taxes
            $shipping_handling  .= $key. sprintf("%01.2f", $value).'<br />';
        }

        $grand_total = $total + $shipping_handling; //grand total including shipping cost
        foreach($taxes as $key => $value){ //list and calculate taxes
                $tax_amount     = round($total) * ($value);
                $tax_item[$key] = $tax_amount;
                $grand_total    = round($grand_total + $tax_amount,2);  //add tax val to grand total
        }

        foreach($shipping as $key => $value){ //list and calculate taxes in array
                $ship_amount     = round($total) * ($value / 20);
                $ship_item[$key] = $ship_amount;
                $grand_total    = round($grand_total + $ship_amount,2);  //add shipping val to grand total
        }

        $list_tax       = '';
        foreach($tax_item as $key => $value){ //List all taxes
            $list_tax .= $key. sprintf("%01.2f", $value).'<br />';
        }

        
    
    $sub_total = round($grand_total-$list_tax-$shipping_handling,2);


    $_SESSION['grand_total']=$grand_total;
    $_SESSION['subtotal']=$sub_total;
    $_SESSION['shipping']=$shipping_handling;
    $_SESSION['tax']=$list_tax;
	 ?>
                </div>
      <div class="container">
      <div class="pull-right">
          <div class="">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold">Sub-Total :</span></td>
                <?php echo'<td><span class="bold">'.$subtotal.'</span></td>';
				?>
              </tr>
              <tr>
                <td><span class="extra bold">Eco Tax (-5.00) :</span></td>
                <?php echo '<td><span class="bold">'.$list_tax.'</span></td>';
				?>
              </tr>
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <?php echo  '<td><span class="bold totalamout">'.$grand_total.'</span></td>';
				?>
              </tr>
            </table>
            </form>
            <div class="list-inline">
            <a href="checkout.php"><input type="submit" value="CheckOut" class="btn btn-orange pull-right mb10"></a>
            <a href="catalog.php"><input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
            </div>
          </div>
        </div>
        </div>
    </div>
  </section>
</div>
<?php } 
include('footer.php');
?>

