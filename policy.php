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
            <ul class="tab">
            <li><h1 class="heading1"><a href="about.php">About Us</span></a><span class="divider">/</span></h1></li>
            <li> <h1 class="heading1"><a href="team.php">Our Team</span></a><span class="divider">/</span></h1></li>
            <li> <h1 class="heading1"><a href="policy.php">Our Policy</span></a></h1></li>
            </ul>
            <!-- Section Start-->
            <section class="row" id="about">
            <ul class="aboutus row">
               <li class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div>
                    <h2 class="heading2 icons">Terms and Conditions </h2>
                    PLEASE READ THE FOLLOWING TERMS AND CONDITIONS OF USE CAREFULLY BEFORE USING THIS WEBSITE. All users of this site agree that access to and use of this site are subject to the following terms and conditions and other applicable law. If you do not agree to these terms and conditions, please do not use this site.
                </div>
                <div>
                    <h2 class="heading2 icons">Copyright</h2>
                    The entire content included in this site, including but not limited to text, graphics or code is copyrighted as a collective work under the United States and other copyright laws, and is the property of . The collective work includes works that are licensed to . Copyright 2012, ALL RIGHTS RESERVED. Permission is granted to electronically copy and print hard copy portions of this site for the sole purpose of placing an order with or purchasing products. You may display and, subject to any expressly stated restrictions or limitations relating to specific material, download or print portions of the material from the different areas of the site solely for your own non-commercial use, or to place an order with or to purchase products. Any other use, including but not limited to the reproduction, distribution, display or transmission of the content of this site is strictly prohibited, unless authorized by . You further agree not to change or delete any proprietary notices from materials downloaded from the site.

                </div>
                <div>
                    <h2 class="heading2 icons">Trademarks</h2>
                    All trademarks, service marks and trade names of used in the site are trademarks or registered trademarks of 
                </div>
                <div>
                    <h2 class="heading2 icons">Warranty Disclaimer </h2>
                    This site and the materials and products on this site are provided "as is" and without warranties of any kind, whether express or implied. To the fullest extent permissible pursuant to applicable law, disclaims all warranties, express or implied, including, but not limited to, implied warranties of merchantability and fitness for a particular purpose and non-infringement. does not represent or warrant that the functions contained in the site will be uninterrupted or error-free, that the defects will be corrected, or that this site or the server that makes the site available are free of viruses or other harmful components. does not make any warrantees or representations regarding the use of the materials in this site in terms of their correctness, accuracy, adequacy, usefulness, timeliness, reliability or otherwise. Some states do not permit limitations or exclusions on warranties, so the above limitations may not apply to you.
                </div>
                <div>
                    <h2 class="heading2 icons">Limitation of Liability
</h2>
                    shall not be liable for any special or consequential damages that result from the use of, or the inability to use, the materials on this site or the performance of the products, even if has been advised of the possibility of such damages. Applicable law may not allow the limitation of exclusion of liability or incidental or consequential damages, so the above limitation or exclusion may not apply to you.
                </div>
                <div>
                    <h2 class="heading2 icons">Typographical Errors
</h2>
                    In the event that a product is mistakenly listed at an incorrect price, reserves the right to refuse or cancel any orders placed for product listed at the incorrect price. reserves the right to refuse or cancel any such orders whether or not the order has been confirmed and your credit card charged. If your credit card has already been charged for the purchase and your order is cancelled, shall issue a credit to your credit card account in the amount of the incorrect price.

                </div>
                <div>
                    <h2 class="heading2 icons">Term; Termination</h2>
                    These terms and conditions are applicable to you upon your accessing the site and/or completing the registration or shopping process. These terms and conditions, or any part of them, may be terminated by without notice at any time, for any reason. The provisions relating to Copyrights, Trademark, Disclaimer, Limitation of Liability, Indemnification and Miscellaneous, shall survive any termination.

                </div>
                <div>
                    <h2 class="heading2 icons">Notice</h2>
                    may deliver notice to you by means of e-mail, a general notice on the site, or by other reliable method to the address you have provided to .

                </div>
                <div>
                    <h2 class="heading2 icons">Miscellaneous</h2>
                    Your use of this site shall be governed in all respects by the laws of the state of California, U.S.A., without regard to choice of law provisions, and not by the 1980 U.N. Convention on contracts for the international sale of goods. You agree that jurisdiction over and venue in any legal proceeding directly or indirectly arising out of or relating to this site (including but not limited to the purchase of products) shall be in the state or federal courts located in Los Angeles County, California. Any cause of action or claim you may have with respect to the site (including but not limited to the purchase of products) must be commenced within one (1) year after the claim or cause of action arises. 's failure to insist upon or enforce strict performance of any provision of these terms and conditions shall not be construed as a waiver of any provision or right. Neither the course of conduct between the parties nor trade practice shall act to modify any of these terms and conditions. may assign its rights and duties under this Agreement to any party at any time without notice to you.

                </div>
                <div>
                    <h2 class="heading2 icons">Use of Site</h2>
                    Harassment in any manner or form on the site, including via e-mail, chat, or by use of obscene or abusive language, is strictly forbidden. Impersonation of others, including a or other licensed employee, host, or representative, as well as other members or visitors on the site is prohibited. You may not upload to, distribute, or otherwise publish through the site any content which is libelous, defamatory, obscene, threatening, invasive of privacy or publicity rights, abusive, illegal, or otherwise objectionable which may constitute or encourage a criminal offense, violate the rights of any party or which may otherwise give rise to liability or violate any law. You may not upload commercial content on the site or use the site to solicit others to join or become members of any other commercial online service or other organization.

                </div>
                <div>
                    <h2 class="heading2 icons">Use of Site</h2>
                    Harassment in any manner or form on the site, including via e-mail, chat, or by use of obscene or abusive language, is strictly forbidden. Impersonation of others, including a or other licensed employee, host, or representative, as well as other members or visitors on the site is prohibited. You may not upload to, distribute, or otherwise publish through the site any content which is libelous, defamatory, obscene, threatening, invasive of privacy or publicity rights, abusive, illegal, or otherwise objectionable which may constitute or encourage a criminal offense, violate the rights of any party or which may otherwise give rise to liability or violate any law. You may not upload commercial content on the site or use the site to solicit others to join or become members of any other commercial online service or other organization.

                </div>
                <div>
                    <h2 class="heading2 icons">Participation Disclaimer</h2>
                    does not and cannot review all communications and materials posted to or created by users accessing the site, and is not in any manner responsible for the content of these communications and materials. You acknowledge that by providing you with the ability to view and distribute user-generated content on the site, is merely acting as a passive conduit for such distribution and is not undertaking any obligation or liability relating to any contents or activities on the site. However, reserves the right to block or remove communications or materials that it determines to be (a) abusive, defamatory, or obscene, (b) fraudulent, deceptive, or misleading, (c) in violation of a copyright, trademark or; other intellectual property right of another or (d) offensive or otherwise unacceptable to in its sole discretion.

                </div>

                <div>
                    <h2 class="heading2 icons">Third-Party Links</h2>
                    In an attempt to provide increased value to our visitors, may link to sites operated by third parties. However, even if the third party is affiliated with , has no control over these linked sites, all of which have separate privacy and data collection practices, independent of . These linked sites are only for your convenience and therefore you access them at your own risk. Nonetheless, seeks to protect the integrity of its web site and the links placed upon it and therefore requests any feedback on not only its own site, but for sites it links to as well (including if a specific link does not work). 
                    <br>
                    <hr>
                    <a href="privacy.php" style="text-decoration: underline;">Privacy Statment</a><span class="divider">/</span>
                    <a href="return.php" style="text-decoration: underline;">Return Policy</a>

                </div>

            </section>

            
            </div>
    <!-- Section End--> 
    
<!-- /maincontainer --> 
<?php include_once('footer.php'); ?>