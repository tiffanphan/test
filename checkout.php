<?php
include_once('header.php');
$pageTitle = 'Batchpad.com - Checkout';
print $_SESSION['logged_in'];
?>
<div id="categorymenu">
    <nav class="subnav">
        <ul class="nav-pills categorymenu container">
            <li><a class="home active" href="home.php"><i class="icon-home icon-white font18"></i> <span> Home</span></a></li>
            <li><a href="catalog.php?page=1">Shop</a></li>
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
    <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="home.php">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Checkout:Options</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <h2 class="heading1"><span class="maintext">Checkout</span></h2>
          <div class="checkoutsteptitle">Step 1: Checkout Options </div>
          <div class="checkoutstep ">        
            <section class="newcustomer">
              <h3 class="heading3">New Customer </h3>
              <div class="loginbox">
                <ul>
                  <li><input type="radio" name="clogin" id="register">Register Account</li>
                  <br>
                  <li><input type="radio" name="clogin" id="guest"> Guest Checkout </li>
                </ul>
                <p><br>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                <br>
                <input type="submit" class="btn btn-orange" onClick="submitCheckedRadio()"> &nbsp; Already a customer? <a href="login.php"> &nbsp; Sign-in</a>
              </div>
            </section>
          </div>
        </div> 
        <script>
        function submitCheckedRadio(){
          if(document.getElementById('register').checked){
            window.location="register.php"; 
          }else if(document.getElementById('guest').checked){
            window.location="checkout2.php";
          }
        }
        </script>
        <!-- Sidebar Start-->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span><i class="icon-list-ol"></i> Checkout Steps</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active">Checkout Options</a>
                </li>
                <li>
                  <a>Billing &amp; Shipping Details</a>
                </li>               
                <li>
                  <a> Payment Method &amp; Confirm Order</a>
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
      </div>

  </section>
      </div>  
</div>
<?php
include('footer.php');
?>