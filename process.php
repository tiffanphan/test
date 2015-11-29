<?php
session_start();
include_once("db_connect.php");
include_once("paypal.class.php");
include_once("cart_update.php");

$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';

if($_POST) //Post Data received from product list page.
{
    //Mainly we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
    
    //Please Note : People can manipulate hidden field amounts in form,
    //In practical world you must fetch actual price from database using item id. Eg: 
    //$ItemPrice = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");

    $ItemName       = $_POST["itemname"]; //Item Name
    $ItemPrice      = $_POST["itemprice"]; //Item Price
    $ItemNumber     = $_POST["itemnumber"]; //Item Number
    $ItemDesc       = $_POST["itemdesc"]; //Item description
    $ItemQty        = $_POST["itemQty"]; // Item Quantity
    $ItemTotalPrice = ($ItemPrice*$ItemQty); //(Item Price x Quantity = Total) Get total amount of product; 
    
    //Other important variables like tax, shipping cost
    $TotalTaxAmount     = 2.58;  //Sum of tax for all items in this order. 
    $HandalingCost      = 2.00;  //Handling cost for this order.
    $InsuranceCost      = 1.00;  //shipping insurance cost for this order.
    $ShippinDiscount    = -3.00; //Shipping discount for this order. Specify this as negative number.
    $ShippinCost        = 3.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
    
    //Grand total including all tax, insurance, shipping cost and discount
    $GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);
    
    //Parameters for SetExpressCheckout, which will be sent to PayPal
    $padata =   '&METHOD=SetExpressCheckout'.
                '&RETURNURL='.urlencode($PayPalReturnURL ).
                '&CANCELURL='.urlencode($PayPalCancelURL).
                '&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
                
                '&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
                '&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
                '&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
                '&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
                '&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).
                
                /* 
                //Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
                '&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
                '&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
                '&L_PAYMENTREQUEST_0_DESC1='.urlencode($ItemDesc2).
                '&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
                '&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
                */
                
                /* 
                //Override the buyer's shipping address stored on PayPal, The buyer cannot edit the overridden address.
                '&ADDROVERRIDE=1'.
                '&PAYMENTREQUEST_0_SHIPTONAME=J Smith'.
                '&PAYMENTREQUEST_0_SHIPTOSTREET=1 Main St'.
                '&PAYMENTREQUEST_0_SHIPTOCITY=San Jose'.
                '&PAYMENTREQUEST_0_SHIPTOSTATE=CA'.
                '&PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE=US'.
                '&PAYMENTREQUEST_0_SHIPTOZIP=95131'.
                '&PAYMENTREQUEST_0_SHIPTOPHONENUM=408-967-4444'.
                */
                
                '&NOSHIPPING=0'. //set 1 to hide buyer's shipping address, in-case products that do not require shipping
                
                '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
                '&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
                '&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
                '&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
                '&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
                '&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
                '&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
                '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
                '&LOCALECODE=GB'. //PayPal pages to match the language on your website.
                '&LOGOIMG=http://www.sanwebe.com/wp-content/themes/sanwebe/img/logo.png'. //site logo
                '&CARTBORDERCOLOR=FFFFFF'. //border color of cart
                '&ALLOWNOTE=1';
                
                ############# set session variable we need later for "DoExpressCheckoutPayment" #######
                $_SESSION['ItemName']           =  $ItemName; //Item Name
                $_SESSION['ItemPrice']          =  $ItemPrice; //Item Price
                $_SESSION['ItemNumber']         =  $ItemNumber; //Item Number
                $_SESSION['ItemDesc']           =  $ItemDesc; //Item description
                $_SESSION['ItemQty']            =  $ItemQty; // Item Quantity
                $_SESSION['ItemTotalPrice']     =  $ItemTotalPrice; //total amount of product; 
                $_SESSION['TotalTaxAmount']     =  $TotalTaxAmount;  //Sum of tax for all items in this order. 
                $_SESSION['HandalingCost']      =  $HandalingCost;  //Handling cost for this order.
                $_SESSION['InsuranceCost']      =  $InsuranceCost;  //shipping insurance cost for this order.
                $_SESSION['ShippinDiscount']    =  $ShippinDiscount; //Shipping discount for this order. Specify this as negative number.
                $_SESSION['ShippinCost']        =   $ShippinCost; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
                $_SESSION['GrandTotal']         =  $GrandTotal;


        //We need to execute the "SetExpressCheckOut" method to obtain paypal token
        $paypal= new MyPayPal();
        $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
        
        //Respond according to message we receive from Paypal
        if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
        {

                //Redirect user to PayPal store with Token received.
                $paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
                header('Location: '.$paypalurl);
             
        }else{
            //Show error message
            echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
            echo '<pre>';
            print_r($httpParsedResponseAr);
            echo '</pre>';
        }

}

//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
if(isset($_GET["token"]) && isset($_GET["PayerID"]))
{
    //we will be using these two variables to execute the "DoExpressCheckoutPayment"
    //Note: we haven't received any payment yet.
    
    $token = $_GET["token"];
    $payer_id = $_GET["PayerID"];
    
    //get session variables
    $ItemName           = $_SESSION['ItemName']; //Item Name
    $ItemPrice          = $_SESSION['ItemPrice'] ; //Item Price
    $ItemNumber         = $_SESSION['ItemNumber']; //Item Number
    $ItemDesc           = $_SESSION['ItemDesc']; //Item Number
    $ItemQty            = $_SESSION['ItemQty']; // Item Quantity
    $ItemTotalPrice     = $_SESSION['ItemTotalPrice']; //total amount of product; 
    $TotalTaxAmount     = $_SESSION['TotalTaxAmount'] ;  //Sum of tax for all items in this order. 
    $HandalingCost      = $_SESSION['HandalingCost'];  //Handling cost for this order.
    $InsuranceCost      = $_SESSION['InsuranceCost'];  //shipping insurance cost for this order.
    $ShippinDiscount    = $_SESSION['ShippinDiscount']; //Shipping discount for this order. Specify this as negative number.
    $ShippinCost        = $_SESSION['ShippinCost']; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
    $GrandTotal         = $_SESSION['GrandTotal'];

    $padata =   '&TOKEN='.urlencode($token).
                '&PAYERID='.urlencode($payer_id).
                '&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
                
                //set item info here, otherwise we won't see product details later  
                '&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
                '&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
                '&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
                '&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
                '&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).

                /* 
                //Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
                '&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
                '&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
                '&L_PAYMENTREQUEST_0_DESC1=Description text'.
                '&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
                '&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
                */

                '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
                '&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
                '&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
                '&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
                '&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
                '&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
                '&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
                '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);
    
    //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
    $paypal= new MyPayPal();
    $httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
    
    //Check if everything went ok..
    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
    {
			include('header.php');
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
             <h2 class="green">Success</h2>
           <?php 
		    echo 'Your Transaction ID : '.urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
                if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
                {
                    echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
                }
                elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
                {
                    echo '<div style="color:red">Transaction Complete, but payment is still pending! '.
                    'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
                }
				if(isset($_SESSION["cart_products"])){
            $total = 0; //set initial total value
            $b = 0; //var for zebra stripe table 
            foreach ($_SESSION["cart_products"] as $cart_itm){
            //set variables to use in content below
            $product_name = $cart_itm["product_name"];
            $product_qty = $cart_itm["product_qty"];
            $price = $cart_itm["price"];
            $product_code = $cart_itm["product_code"];
            $description = $cart_itm["description"];
            $image_url = $cart_itm["image_url"];
            $subtotal = ($price * $product_qty);
		   
		   
		   echo '<div class="col-lg-6 col-md-6 col-sm-9 col-xs-12">';
		   echo '<h3 class="bold">Thanks for your purchase of this item:</h3>';
		    echo '<ul class="list-inline table-bordered">';
            echo '<li class="image"><a href="#"><img title="product" alt="product" src="'.$image_url.'" height="100" width="100"></a></li>';
            echo '<li class ="name"><h3>'.$product_name.'</h3></li>';
            echo '<li class="total pull-right"><h2 class="green">'.$price.'</h2></li>';
			echo '</ul>';
			echo '</div><br>';
			}}
                // we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
                // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
                $padata =   '&TOKEN='.urlencode($token);
                $paypal= new MyPayPal();
                $httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
		?>
        </div>
        </div>
        <?php		
include('footer.php');
	}
}
?>