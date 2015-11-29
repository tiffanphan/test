<?php
    $currency = '&#36;'; //Currency Character or code
    $shipping_cost      = 5.89; //shipping cost
    $taxes              = array( //List your Taxes percent here. 
                            '' => .065
                            );  
    $shipping              = array( //List your Taxes percent here.
                            '' => 4.50, 
                            );

    $PayPalMode         = 'sandbox'; // sandbox or live
    $PayPalApiUsername  = 'justinduncan2010_api1.gmail.com'; //PayPal API Username
    $PayPalApiPassword  = 'R8UGLVP4B7UP9VSM'; //Paypal API password
    $PayPalApiSignature     = 'ACf10cy2SeOOID8MCu6BbKvG5kSCAXliRu8M0.D.1BG6M5f5su2lz09b'; //Paypal API Signature
    $PayPalCurrencyCode     = 'USD'; //Paypal Currency Code
    $PayPalReturnURL    = 'http://localhost/ecommerce/process.php'; //Point to process.php page
    $PayPalCancelURL    = 'http://localhost/ecommerce/home.php'; //Cancel URL if user clicks cancel
    error_reporting(E_ALL ^ E_NOTICE);
//local
//$mysqli = new mysqli('localhost', 'root', 'Jade7369!', 'ju655443');
//sulley
$mysqli = new mysqli('sulley.cah.ucf.edu', 'ju655443', 'Jade7369!', 'ju655443');  

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>