<!-- Footer -->
<footer id="footer">
  <section class="footersocial">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6 span3 info">
          <h2> <i class="icon-link"></i> SiteMap </h2>
          <ul>
            <li><a href="home.php">Home</a> </li>
            <?php
			if(isset($_SESSION["logged_in_user_id"])){
			echo '<li><a href="client.php?id='.$_SESSION["logged_in_user_id"].'">My Account</a> </li>'; }?>
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
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 textcenter"> This site is not official and is an assignment for a UCF Digital Media course - Designed by Group 3 Lab 0012 </div>
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 span5 col-lg-3 col-md-3 col-xs-12 col-sm-12 paymentsicons"> <img title="PayPal" alt="paypal" src="img/payment_paypal.png"> <img title="American Express" alt="american-express" src="img/payment_american.png"><img title="Maestro" alt="maestro" src="img/payment_maestro.png"> <img title="Discover" alt="discover" src="img/payment_discover.png"> </div>
      </div>
    </div>
  </section>
  <a id="gotop" href="#">Back to top</a>
</footer>
<!-- javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
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
<script  src="js/zoomsl-3.0.min.js"></script> <script  type="text/javascript" src="js/jquery.validate.js"></script> 
<script type="text/javascript"  src="js/jquery.carouFredSel-6.1.0-packed.js"></script> 
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
    }(document, new Date(), "script", "rating-widget.com/"));</script>
    <script type="text/javascript">
$(document).ready(function() {
    var x_timer;    
    $("#username").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_username_ajax(user_name);
        }, 1000);
    }); 

function check_username_ajax(username){
    $("#hint11").html('<img src="img/loading.gif"/>');
    $.post('validate.php', {'username':username}, function(data) {
      $("#hint11").html(data);
    });
}
});
function change(){
    document.getElementById("view_form").submit();
}

function change2(){
    document.getElementById("sort_form").submit();
}
//Google Analytics
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-69797602-1', 'auto');
  ga('send', 'pageview');
</script>
<script>
$(document).ready(function() {
	function hideProducts(){
        $( ".furniture").hide();
		$( ".kitchen" ).hide();
		$( ".electronic" ).hide();
		$( ".bathroom" ).hide();
		$( ".bedroom" ).hide();
		$( ".livingroom" ).hide();
	}
  $(".categoryBtnFurniture").click(function(){
	hideProducts();
	$(".furniture").show(800);
    });

  $(".categoryBtnKitchen").on("click", function(){
    hideProducts();
    $(".kitchen").show(800);
  });

  $(".categoryBtnElectronics").on("click", function(){
    hideProducts();
    $(".electronic").show(800);
  });

  $(".categoryBtnBathroom").on("click", function(){
    hideProducts();
    $(".bathroom").show(800);
  });

  $(".categoryBtnBedroom").on("click", function(){
    hideProducts();
    $(".bedroom").show(800);
  });

  $(".categoryBtnLivingroom").on("click", function(){
    hideProducts();
    $(".livingroom").show(800);
  });

});
</script>
<?php
mysqli_close($mysqli);
?>
  
  </body>
</html>