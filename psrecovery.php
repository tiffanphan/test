<?php
session_start();
$pageTitle = 'Batchpad.com - Login';
if(isset($_SESSION['url'])) 
   $url = $_SESSION['url']; // holds url for last page visited.
else 
   $url = "home.php";
include("db_connect.php");
mysql_connect("sulley.cah.ucf.edu","ju655443","Jade7369!") or die("couldn't connect");
mysql_select_db("ju655443") or die("Couldn't connect to db");
?>
<?php
          if(isset($_POST['submit'])&&(!isset($_SESSION['logged_in']))) {
			  // query to select all users/passwords
			$select_users = "SELECT * FROM users";
			$select_users_result = $mysqli->query($select_users);
				if($mysqli->error) {
					print "Select query error!  Message: ".$mysqli->error;
				}					
				while($row = $select_users_result->fetch_object()) {
					if ((($_POST['username']) == ($row->username)) && (md5($_POST['password']) == ($row->password))) {
					// check if user input = a record in the database
						$_SESSION['logged_in']              = true;
						$_SESSION['logged_in_user']         = $row->username;
						$_SESSION['logged_in_firstname']    = $row->first_name;
						$_SESSION['logged_in_lastname']     = $row->last_name;
						$_SESSION['logged_in_user_id']      = $row->user_id;
						$_SESSION['logged_in_user_access']  = $row->access_level;
						$_SESSION['logged_in_email']        = $row->email;
						$_SESSION['logged_in_address1']     = $row->address1;
						$_SESSION['logged_in_address2']     = $row->address2;
						$_SESSION['logged_in_city']         = $row->city;
						$_SESSION['logged_in_state']        = $row->state;
						$_SESSION['logged_in_zip']          = $row->zip;
						$_SESSION['logged_in_telephone']    = $row->telephone;
						$_SESSION['logged_in_mobile']       = $row->mobile;
						$_SESSION['logged_in_company']      = $row->company;
						header("location: ".$url);	
					}
				}
			}
			?>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $pageTitle ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Justin Duncan">
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
</head>
<body>
<!-- Header Start -->
<header>
    <div class="headerstrip">
        <div class="container">
            <a class="logo pull-left" href="home.php"><img title="BatchPad" alt="BatchPad" src="img/logo.png"></a>
            <!-- Top Nav Start -->
            <div class="pull-right">
                <div class="navbar" id="topnav">
                    <div class="navbar-inner">
                        <ul class="nav" >
                        	<?php 
							if(!isset($_SESSION['logged_in'])) { 
							?>
                            
                        	<li class="text-nopad text-center"><a href="register.php">Sign-up</a></li>
                            <li class="text-nopad"><p>or</p></li>
                        	<li class="text-nopad"><a href="login.php"> &nbsp; login</a></li>
                            <li class="dropdown hover carticon "> <a href="cart.php" class="dropdown-toggle" > <i class="icon-shopping-cart font18"></i> Shopping Cart <span class="label label-orange font14">2 item(s)</span> - $1,790.00 <b class="caret"></b></a>
                            
                            <?php
							}else if(isset($_SESSION['logged_in'])) {
							print "<li class='text-nopad red'><p>Hello, ".$_SESSION['logged_in_firstname']."!</p></li>"; ?>
                        	<li class="text-nopad"><p> &nbsp; Not you?</p></li>
                            <li class="text-nopad"><a href="logout.php"> &nbsp; Logout</a></li>  
							<?php } ?>
                    </li>
                </ul>
                    </div>
                </div>
            </div>
            <!-- Top Nav End -->
        </div>
    </div>
</header>
<!-- Header End -->
<link href="css/style.css" rel="stylesheet" type="text/css">
    <div id="categorymenu">
        <nav class="subnav">
            <ul class="nav-pills categorymenu container">
                <li><a class="home" href="home.php"><i class="icon-home icon-white font18"></i> <span> Home</span></a></li>
                <li><a href="catalog.php">Shop</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="contact.php">Contact Us</a> </li>
                <?php
                if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "admin")) {
                print "<li><a class='active' href='admin.php'>Admin</a> </li>";
                }
				if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "customer")) {
                print "<li><a class='active' href='client.php'>My Account</a> </li>";
                }
                ?>
                <li class="pull-right">
                    <form action="search.php" method="get" class="form-search top-search">
                        <input type="text" class="input-small search-query" placeholder="Search Here…">
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
        <li class="active">Login</li>
      </ul>
      <div class="row">        
        <!-- Register Account-->
        <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
        
        	
          <h1 class="heading1"><span class="maintext"> <i class="icon-signin"></i> Forgot password</span></h1><br /> 
         
            <?php 

            echo ' 
            <fieldset>
          <div class="control-group">
          	<form method="post" action="psrecovery.php">
              <label class="control-label" >Enter your username<span class="red">&nbsp;*</span></label>
              <div class="controls">
                <input name="username" id="username" type="text" placeholder="Username"/>
              </div>
          		<label class="control-label" >Enter your email<span class="red">&nbsp;*</span></label>
          		<div class="controls">
          			<input name="email" id="email" type="text" placeholder="Email"/>
          		</div>
          </div>
          
         
            <div class="pull-left">
              
           
				<input name="Submit"  type="submit" class="btn btn-success" value="&nbsp; Request Reset &nbsp;" />
                
                <span class="registerbox">Not a member yet? &nbsp;<a href="register.php">Sign-up!</a></span>
                </div>
               
				</form> </fieldset>';
          if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];

            $query = mysql_query("SELECT * FROM users WHERE username ='$username'");
            $numrow = mysql_num_rows($query);

            if($numrow!=0){
              while($row = mysql_fetch_assoc($query)){
                $db_email = $row['email'];
              }  
              if($email = $db_email)
              {
                $code = rand(100000, 1000000);

                $to = $db_email;
                $subject ="Password Reset";

                $body= "This is an automated email. Please DO NOT response

                        Click the link below or paste it into your get_browser
                        http://sulley.cah.ucf.edu/psrecovery.php/?code&username=$username"; 

                        mysql_query("UPDATE users SET passreset = '$code' WHERE username='$username'");

                        mail($to,$subject,$body);

                        echo"Check Your Email";
              }else
              {
                echo "Email is incorrect";
              }
            }else{
              echo "That username doesn't exits";
            }
          }
        ?>
        
           
          <div class="clearfix"></div>
          <br>
        </div>  

        <!-- Sidebar Start-->
        <aside class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span3">
          <div class="sidewidt">
            <h1 class="heading1"><span class="maintext"> <i class="icon-user"></i> Need Help?</span></h1>
            <ul class="nav nav-list categories">
              <li>
                <a href="psrecovery.php"> forgot your password?</a>
              </li>
              <li>
                <a href="about.php"> Privacy Policy</a>
              </li>
              <li>
                <a href="about.php">Why Sign up?</a>
              </li>
              <li>
                <a href="contact.php">Questions? Contact us!</a>
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

<?php include('footer.php'); ?>