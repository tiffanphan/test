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
      
     <div class="simpleCart_items">
 
    </div>
  
<table class="table table-hover">
        <tr>
    <td id="space">   </td>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td><h5>Subtotal</h5></td>
    <td><div class="simpleCart_total"></div></td>
</tr>
<tr>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td><h5>Estimated shipping</h5></td>
    <td><div class="simpleCart_shipping"></div></td>
</tr>
<tr>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td><h4>Total</h4></td>
    <td><div class="simpleCart_grandTotal"></div></td>
</tr>

</table>

      <div class="container">

      <div class="pull-right">
          <div class="">
           
            <div class="list-inline">
         <a href="checkout.php"><input type="submit" value="Checkout" class="btn btn-orange pull-right mb10"></a>
            <a href="catalog.php"><input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10"></a>
            </div>
          </div>
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

