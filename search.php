<?php
$pageTitle = 'Batchpad.com - Search Results';
if((isset($_POST['view'])&&($_POST['view']))||(isset($_POST['sort'])&&($_POST['sort']))){
	header("location:catalog.php?page=1");
}
if(isset($_SESSION['page'])){
                        $sort=$_SESSION['page'];
                    }

                    else{$_SESSION['page']='1';
					
					}
include("db_connect.php");
include("header.php");

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

?>
<!--Search Results Product Selection-->
	<?php
		include ("db_connect.php");
		
		$output = '';
		if(isset($_POST['search'])){
			$searchq = $_POST['search'];

			$query = $mysqli->query("SELECT * FROM products WHERE product_name LIKE '%$searchq%' OR description LIKE '%$searchq%'");
			$count = mysqli_num_rows($query);
			if($count == 0){
				$output = "No results found for \"<b>$searchq</b>\"";
			}else{
				
				while($row = mysqli_fetch_array($query)){
					$url = $row['image_url'];
					$name = $row['product_name'];
					$desc = $row['description'];
					$id = $row['product_id'];
					$price = $row['price'];
					
					$output .= '<li><div class="thumbnail">
								<div class="row"><div class="col-lg-4 col-md-4 col-xs-12 col-sm-6 span3"><a href="product.php?id='.$id.'"><img alt="" src="' . $url. '"></a> </div>
								<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12"><h4 class="search_title"><a class="prodcutname" href="product.php?id='.$id.'">' .$name. '</a></h4>
								<div class="productdiscrption">' .$desc. '<br></div>
								<div class="price">
								<div class="pricenew">' .$price. '</div>
								<div class="ratingstar">
								<div class="rw-ui-container" data-urid="' . $id. '"></div>
                              	</div>
                                <a  class="btn btn-orange btn-large addtocartbutton pull-left">Add to Cart</a>
                            	</div>					
								</div>
									
								</div>    
								</div>
								</li>';
				
				
				}
			}
		}	
	?> 
<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu container">
      <li><a class="home" href="home.php"><i class="icon-home icon-white font18"></i> <span> Home</span></a></li>
      <li><a class="active" href="catalog.php?page=1">Shop</a></li>
      <li><a href="about.php">about</a></li>
      <li><a href="contact.php">Contact Us</a> </li>
      <?php
        if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "admin")) {
          print "<li><a href='admin.php'>Admin</a> </li>";
        }
      ?>
      <li class="pull-right">
       	<form method="post" action="search.php" class="form-search top-search">
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
              <li> <a href="category.php">Furniture</a>
                <ul>
                  <li> <a href="catalog.php?page=1">Kitchen </a> </li>
                  <li> <a href="catalog.php?page=1">Outdoor </a> </li>
                  <li> <a href="catalog.php?page=1">Living Room</a> </li>
                  <li> <a href="catalog.php?page=1">Bed &amp; Bath</a> </li>
                </ul>
              </li>
              <li> <a href="catalog.php?page=1">Kitchen</a> </li>
              <li> <a href="catalog.php?page=1">Electronics </a> </li>
              <li> <a href="catalog.php?page=1">Bathroom </a> </li>
              <li> <a href="catalog.php?page=1">Outdoor</a> </li>
              <li> <a href="catalog.php?page=1">Living Room</a> </li>
              <li> <a href="catalog.php?page=1">Miscellanious</a> </li>
            </ul>
          </div>
        </aside>
        <!-- Sidebar End-->
		    <!-- Category End-->
        
        <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">	 
          <!-- Category Products-->
          <section id="category">
            <h1 class="heading1"><span class="maintext">Search Results</span></h1>
            <div class="row">
			</div>
         <!-- sort by and view number of items div END -->            
                <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails list row" style="display:block" >
				  
					<!--Outputting search results-->
					<div class="results">
						<?php
							echo "Results found for \"<b>$searchq</b>\":";
							print("$output");
						?> 
					</div>				  
                  </ul>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>

<footer id="footer">
    <section class="footersocial">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6 span3 info">
                    <h2> <i class="icon-link"></i> SiteMap </h2>
                    <ul>
                        <li><a href="home.php">Home</a> </li>
                        <li><a href="client.php">My Account</a> </li>
                        <li><a href="catalog.php?page=1">Shop</a> </li>
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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
                
        RW.init({
            huid: "259474",
            uid: "3b0bc03895785eed657c9e205359ca03",
            source: "website",
            options: {
                "advanced": {
                    "font": {
                        "hover": {
                            "color": "#B7D086"
                        },
                        "size": "12px",
                        "bold": true,
                        "color": "#B7D086"
                    }
                },
                "size": "tiny",
                "label": {
                    "background": "#427E53"
                },
                "style": "oxygen_green",
                "isDummy": false
            } 
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));
    
	
	function change(){
    	document.getElementById("view_form").submit();
		
	}

	function change2(){
    	document.getElementById("sort_form").submit();
		
	}
    
    </script>
    
<!--Google Analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-69797602-1', 'auto');
  ga('send', 'pageview');
</script>

<?php
mysql_close($con);
?>
</body>
</html>