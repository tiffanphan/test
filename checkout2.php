<?php
$pageTitle = 'Batchpad.com - Checkout';
include_once('header.php');
?>
    <div id="categorymenu">
        <nav class="subnav">
            <ul class="nav-pills categorymenu container">
                <li><a href="home.php"><i class="icon-home icon-white font18"></i> <span> Home</span></a></li>
                <li><a href="catalog.php?page=1">Shop</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="contact.php">Contact Us</a> </li>
                <li class="pull-right">
                	<form action="search.php" method="post" class="form-search top-search">
                    	<input type="text" name="search" class="input-small search-query" placeholder="Search Here…">
                    	<button class="btn btn-orange btn-small tooltip-test" data-original-title="Search"><i class="icon-search icon-white"></i></button>
                  	</form>
                </li>
            </ul>
        </nav>
    </div>   
</header>
<!-- Header End -->


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
        <li class="active">Billing&nbsp;&amp;&nbsp;Shipping</li>
      </ul>
      <div class="row">        
        <!-- Account Login-->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <h2 class="heading1"><span class="maintext">Checkout</span></h2>
        <div class="checkoutsteptitle"> Step 2A: Billing Information </div>
        <div class="checkoutstep">
          <div class="row">  
            <form class="form-horizontal form-custom" method="post" action="checkout3.php">
              <fieldset>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" >First Name<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="bFirst" id="bFirst">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >Last Name<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="bLast" id="bLast">
                    </div>
                  </div>
                	<div class="form-group">
                    <label class="control-label" >Address 1<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="bAddress1" id="bAddress1">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >Address 2</label>
                    <div class="controls">
                      <input type="text" name="bAddress2" id="bAddress2">
                    </div>
                  </div>
                 </div>
                 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" >City<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="bCity" id="bCity">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >State</label>
                    <div class="controls">
                      <input type="text" name="bState" id="bState">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >Zip Code<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="bZip" id="bZip">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >Country/Region<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="bCountry" id="bCountry">
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <div class="checkoutsteptitle"> Step 2B: Shipping Information </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" >First Name<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="sFirst" id="sFirst">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >Last Name<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="sLast" id="sLast">
                    </div>
                  </div>
                	<div class="form-group">
                    <label class="control-label" >Address 1<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="sAddress1" id="sAddress1">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >Address 2</label>
                    <div class="controls">
                      <input type="text" name="sAddress2" id="sAddress2">
                    </div>
                  </div>
                 </div>
                 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" >City<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="sCity" id="sCity">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >State</label>
                    <div class="controls">
                      <input type="text" name="sState" id="sState">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >Zip Code<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="sZip" id="sZip">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" >Country/Region<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="sCountry" id="sCountry">
                    </div>
                  </div>
                  <input type="submit" class="btn btn-orange pull-right"></a>
                </div>
              </fieldset>
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
                  <a class="active">Billing &amp; Shipping Details</a>
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
    </div>
  </section>
</div>

<?php
include('footer.php');
?>