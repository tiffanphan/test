<?php 
$pageTitle = 'Batchpad.com - About';
include("header.php"); 
$_SESSION['url'] = $_SERVER['REQUEST_URI'];                                      
?>
    <div id="categorymenu">
        <nav class="subnav">
            <ul class="nav-pills categorymenu container">
                <li><a class="home" href="home.php"><i class="icon-home icon-white font18"></i> <span> Home</span></a></li>
                <li><a href="catalog.php?page=1">Shop</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="contact.php">Contact Us</a> </li>
                <?php
                if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "admin")) {
                print "<li><a class='active' href='admin.php'>Admin</a> </li>";
                }
				if(isset($_SESSION['logged_in_user_access'])&&($_SESSION['logged_in_user_access'] == "customer")) {
                print "<li><a href='client.php?id=".$_SESSION['logged_in_user_id']."'>My Account</a> </li>";
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
    <!--Header End-->

    <div id="maincontainer"> 
     <!--  breadcrumb --> 
        <div class="container">  
            <ul class="breadcrumb">
                <li>
                    <a href="home.php">Home</a>
                    <span class="divider">/</span>
                </li>
                <li class="active">About Us</li>
            </ul>
           
            <h1 class="heading1" style="padding-left: 30px;"><a href="privacy.php">Privacy Statement</a></h1>
            
            <!-- Section Start-->
            <section class="row" id="about">
            <ul class="aboutus row">
               <li class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div>
                    <h2 class="heading2 icons">SECTION 1 - WHAT DO WE DO WITH YOUR INFORMATION?</h2>
                    When you purchase something from our store, as part of the buying and selling process, we collect the personal information you give us such as your name, address and email address. 
                    When you browse our store, we also automatically receive your computer’s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system.
                    Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates. 
                </div>
                <div>
                    <h2 class="heading2 icons">SECTION 2 - CONSENT</h2>
                    How do you get my consent?
When you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting it and using it for that specific reason only.
If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no. 

How do I withdraw my consent?
If after you opt-in, you change your mind, you may withdrawing your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at Batchpad or mailing us at:
Batchpad.com
                </div>
                <div>
                    <h2 class="heading2 icons">SECTION 3 - DISCLOSURE</h2>
                    We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service. 

                </div>
                
                <div>
                    <h2 class="heading2 icons">SECTION 4 - THIRD-PARTY SERVICES</h2>
                    In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us. 
However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.
For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers. 
In particular, remember that certain providers may be located in or have facilities that are located a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.
As an example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, then your personal information used in completing that transaction may be subject to disclosure under United States legislation, including the Patriot Act.
Once you leave our store’s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website’s Terms of Service. 

Links
When you click on links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.
                </div>
                <div>
                    <h2 class="heading2 icons">SECTION 5 - SECURITY</h2>
                    To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed.
If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.

                </div>
                <div>
                    <h2 class="heading2 icons">SECTION 6 - COOKIES</h2>
                    Here is a list of cookies that we use. We’ve listed them here so you that you can choose if you want to opt-out of cookies or not.
_session_id, unique token, sessional, Allows Shopify to store information about your session (referrer, landing page, etc).
_shopify_visit, no data held, Persistent for 30 minutes from the last visit, Used by our website provider’s internal stats tracker to record the number of visits
_shopify_uniq, no data held, expires midnight (relative to the visitor) of the next day, Counts the number of visits to a store by a single customer.
cart, unique token, persistent for 2 weeks, Stores information about the contents of your cart.
_secure_session_id, unique token, sessional
storefront_digest, unique token, indefinite If the shop has a password, this is used to determine if the current visitor has access.

                </div>
                <div>
                    <h2 class="heading2 icons">SECTION 7 - AGE OF CONSENT
</h2>
                    By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.

                </div>
                <div>
                    <h2 class="heading2 icons">SECTION 8 - CHANGES TO THIS PRIVACY POLICY
</h2>
                    We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.
If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.


                </div>
                 <div>
                    <h2 class="heading2 icons">QUESTIONS AND CONTACT INFORMATION
</h2>
                    If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer at Batchpad 4000 Central FLorida Blvd Orlando FL

More Legal for you to read.

We collect information from you when you register on the site, place an order, enter a contest or sweepstakes, respond to a survey or communication such as e-mail, or participate in another site feature.
When ordering or registering, we may ask you for your name, e-mail address, mailing address, phone number, credit card information or other information. You may, however, visit our site anonymously.
We also collect information about gift recipients so that we can fulfill the gift purchase. The information we collect about gift recipients is not used for marketing purposes.
Like many websites, we use "cookies" to enhance your experience and gather information about visitors and visits to our websites. Please refer to the "Do we use 'cookies'?" section below for information about cookies and how we use them.

How do we use your information?

We may use the information we collect from you when you register, purchase products, enter a contest or promotion, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:
To personalize your site experience and to allow us to deliver the type of content and product offerings in which you are most interested.
To allow us to better service you in responding to your customer service requests.
To quickly process your transactions.
To administer a contest, promotion, survey or other site feature.
If you have opted-in to receive our e-mail newsletter, we may send you periodic e-mails. If you would no longer like to receive promotional e-mail from us, please refer to the "How can you opt-out, remove or modify information you have provided to us?" section below. If you have not opted-in to receive e-mail newsletters, you will not receive these e-mails. Visitors who register or participate in other site features such as marketing programs and 'members-only' content will be given a choice whether they would like to be on our e-mail list and receive e-mail communications from us.

How do we protect visitor information?

We implement a variety of security measures to maintain the safety of your personal information. Your personal information is contained behind secured networks and is only accessible by a limited number of persons who have special access rights to such systems, and are required to keep the information confidential. When you place orders or access your personal information, we offer the use of a secure server. All sensitive/credit information you supply is transmitted via Secure Socket Layer (SSL) technology and then encrypted into our databases to be only accessed as stated above.


                </div>
                <hr>
                    <a href="privacy.php" style="text-decoration: underline;">Privacy Statment</a><span class="divider">/</span>
                    <a href="return.php" style="text-decoration: underline;">Return Policy</a>
            </section>

            
            </div>
    <!-- Section End--> 
    
<!-- /maincontainer --> 
<?php include_once('footer.php'); ?>