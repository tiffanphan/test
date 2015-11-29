<?php 
$pageTitle = 'Batchpad.com - Register';
include_once('header.php');

//when the page is submitted, runs this to clean and set data
if(isset($_POST['submit'])){
	$firstname = clean_input($_POST["firstname"]);
	$lastname = clean_input($_POST["lastname"]);
	$email = clean_input($_POST["email"]);
	$telephone = clean_input($_POST["telephone"]);
	$mobile = clean_input($_POST["mobile"]);
	$address1 = clean_input($_POST["address1"]);
	$city = clean_input($_POST["city"]);
	$state = clean_input($_POST["state"]);
	$zip = clean_input($_POST["zip"]);
	$username = clean_input($_POST["username"]);	
	$password = clean_input($_POST["pw1"]);
	//if data entered passes validation
	if((preg_match("/^[a-zA-Z]*$/",$_POST["firstname"]))&&(preg_match("/^[a-zA-Z]*$/",$_POST["lastname"]))&&(preg_match("/^([0-9]{3})([0-9]{3})([0-9]{4})$/",$_POST["telephone"]))&&(preg_match("/^([0-9]{3})([0-9]{3})([0-9]{4})$/",$_POST["mobile"]))&&(preg_match("/^([A-Za-z0-9]+)(@)([A-Za-z0-9]+)(.)([a-z]+)$/",$_POST["email"]))&&(preg_match("/^[0-9]+\s+([a-zA-Z]+|[a-zA-Z]+\s[a-zA-Z]+)$/",$_POST["address1"]))&&(preg_match("/^[A-Za-z]*$/",$_POST["city"]))&&(preg_match("/^[a-zA-Z]{2}$/",$_POST["state"]))&&(preg_match("/^[0-9]{5}$/",$_POST["zip"]))&&(preg_match("/^[a-zA-Z0-9_-]{3,16}$/",$_POST["username"]))&&(preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/",$_POST["pw1"]))&&($_POST["pw1"]===$_POST["pw2"])){
	
	$insert_user_query = "INSERT INTO users (username, password, first_name, last_name, email, address1, address2, city, state, zip, telephone, mobile, company) VALUES ('".$_POST['username']."', '".md5($_POST['pw1'])."', '".$_POST['firstname']."', '".$_POST['lastname']."','".$_POST['email']."','".$_POST['address1']."','".$_POST['address2']."','".$_POST['city']."','".$_POST['state']."','".$_POST['zip']."','".$_POST['telephone']."','".$_POST['mobile']."','".$_POST['company']."')";
						$mysqli->query($insert_user_query);						
						header('Location: thankyou.php');
	
}elseif((preg_match("/^[a-zA-Z]*$/",$_POST["firstname"]))||(preg_match("/^[a-zA-Z]*$/",$_POST["lastname"]))||(preg_match("/^([0-9]{3})([0-9]{3})([0-9]{4})$/",$_POST["telephone"]))||(preg_match("/^([0-9]{3})([0-9]{3})([0-9]{4})$/",$_POST["mobile"]))||(preg_match("/^([A-Za-z0-9]+)(@)([A-Za-z0-9]+)(.)([a-z]+)$/",$_POST["email"]))||(preg_match("/^[0-9]+\s+([a-zA-Z]+|[a-zA-Z]+\s[a-zA-Z]+)$/",$_POST["address1"]))||(preg_match("/^[A-Za-z]*$/",$_POST["city"]))||(preg_match("/^[a-zA-Z]{2}$/",$_POST["state"]))||(preg_match("/^[0-9]{5}$/",$_POST["zip"]))||(preg_match("/^[a-zA-Z0-9_-]{3,16}$/",$_POST["username"]))||(preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/",$_POST["pw1"]))||($_POST["pw1"]===$_POST["pw2"])){
	?>
		<script type="text/javascript"> alert('You have to fill in all fields');</script>
	<?php
}
}

function clean_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   return $data;
}
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
<?php if(!isset($_SESSION['logged_in'])){ ?>
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="home.php">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Register Account</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
          <h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> Register Account</span></h1>
          <form class="form-horizontal form-custom" name="register" id="register" method="post" >
            <h3 class="heading3">Your Personal Details</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label for="firstname" class="control-label"><span class="red">*</span> First Name</label>
                  <div class="controls">
                    <input required name="firstname" maxlength="20" id="firstname" type="text">
                    <span id="hint1"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label for="last" class="control-label"><span class="red">*</span> Last Name</label>
                  <div class="controls">
                    <input  name="lastname" maxlength="20" type="text" id="lastname">
                  <span id="hint2"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label for="email" class="control-label"><span class="red">*</span> E-mail Address</label>
                  <div class="controls">
                    <input name="email"  maxlength="36" type="email" id="email">
                  <span id="hint3"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label for="telephone" class="control-label"> Telephone</label>
                  <div class="controls">
                    <input name="telephone" maxlength="10" type="text" id="telephone">
                  <span id="hint4"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label for="mobile" class="control-label"> Mobile </label>
                  <div class="controls">
                    <input name="mobile" maxlength="10" type="text" id="mobile">
                    <span id="hint5"></span>
                  </div>
                  
                </div>
                <div class="control-group">
                	<label for="company" class="control-label"> Company (optional)</label>
                <div class="controls">
                    <input name="company" maxlength="20" type="text" id="company"  class="">
                </div>
                </div>
              </fieldset>
            </div>
            <h3 class="heading3">Your Address</h3>
            <div class="registerbox">
              <fieldset>
              <div class="control-group">
                  <label for="address1" class="control-label"> Address1</label>
                  <div class="controls">
                    <input name="address1" maxlength="64" type="text" id="address1"  class="">
                    <span id="hint6"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label for="address2" class="control-label"> Address2</label>
                  <div class="controls">
                    <input name="address2" maxlength="64" type="text" id="address2">
                    <span id="hint7"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label for="city" class="control-label"> City</label>
                  <div class="controls">
                    <input name="city" maxlength="24" type="text" id="city">
                  	<span id="hint8"></span>
                </div>
                </div>
                <div class="control-group">
                    <label for="state" class="control-label"> State</label>
                <div class="controls">
                    <input name="state" type="text" maxlength="2" id="state">
                    <span id="hint9"></span>
                </div>
                </div>
                <div class="control-group">
                	<label for="zip" class="control-label"> Zip</label>
                <div class="controls">
                    <input name="zip" maxlength="5" type="text" id="zip">
                    <span id="hint10"></span>
                </div>
                </div>  
              </fieldset>
            </div>
            <h3 class="heading3">Your Login Information</h3>
            <div class="registerbox">
              <fieldset>
              <div class="control-group">
                  <label for="username" class="control-label"><span class="red">*</span> Username</label>
                  <div class="controls">
                    <input name="username" type="text" id="username">
                    <span id="hint11"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label for="pw1" class="control-label"><span class="red">*</span> Password</label>
                  <div class="controls">
                    <input name="pw1" type="password"  class="" id="pw1">
                    <span id="hint12"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label for="pw2" class="control-label"><span class="red">*</span>Confirm Password</label>
                  <div class="controls">
                    <input name="pw2" type="password" id="pw2" onKeyUp="checkPass(); return false;">
                    <span id="hint13"></span>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="pull-right"
              <label class="checkbox inline">
                <input name="checkbox" id="checkbox" type="checkbox" onClick="validateData();"/>
              </label>
              I have read and agree to the <a href="policies.php" >Privacy Policy</a>
              &nbsp;
              <input type="submit" name="submit" id="button" class="btn btn-orange" value="Register">
            </div>
          </form>
          <div class="clearfix"></div>
          <br>
        </div>        
        <!-- Sidebar Start-->
        <aside class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span3">
          <div class="sidewidt">
            <h1 class="heading1"><span class="maintext"> <i class="icon-user"></i> Sign Up</span></h1>
            <ul class="nav nav-list categories">
              <li>
              <b>Don't remember your Password?</b>
                <a href="contact.php">Contact us</a>
              </li>
              <li>
                <b>Why Sign up? because you'll probably be back, in fact, we guaruntee you'll love us...</b><a href="about.php">Learn more...</a>
              </li>
            </ul>
          </div>
        </aside>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
</div>
<?php } ?>
<!--Google Analytics-->
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-69797602-1', 'auto');
  ga('send', 'pageview');

</script>

<?php 
require('validate.php');
include('footer.php'); 
?>