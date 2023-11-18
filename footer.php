<div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
            <h2 class="footerheading" style="font-size:30px; display:flex;justify-content:center;align-items:center;">Fringoman</h2>

            </div>
            <div class="footer-items">
            <h3 style="color: white">Know more about us</h3>
                <div class="border1">
                <ul>
                    <a href="index.php"><li>Home</li></a>
                    <a href="Aboutus.php"><li>About Us</li></a>
                    <a href="https://portal.termshub.io/fringoman.in/#privacy_policy"><li>Privacy Policy</li></a>
                    <a href="https://portal.termshub.io/fringoman.in/#website_tos"><li>Terms and Condition</li></a>
   <a href="Shippingpolicy.php"><li>Shipping Policy</li></a>
                    </ul>
                </div>
            </div>
            <div class="footer-items">
            <h3 style="color: white;">Help from us</h3>
                <div class="border1">
                <ul>
                    <a href=""><li> <?php if(isset($_SESSION['USER_LOGIN']))
{
											echo '<a href="profile.php"  style="color:gray"
											>Your account</a>';
										}else{
											echo ' <a href="login.php" style="color:gray">Hello, Sign in</a>';
										}
					
										?>
	</li></a>
                    <a href=""><li> <?php if(isset($_SESSION['USER_LOGIN']))
{
											echo '<a href="my_order.php"  style="color:gray"
											>My orders</a>';
										}else{
											echo ' <a href="login.php" style="color:gray">My orders</a>';
										}
					
										?>
	</li></a>
                  <a href="Returnpolicy.php"><li>How to Return?</li></a>
                    
                    </ul>
                </div>
            </div>
            <div class="footer-items">
            <h3 style="color: white;">Contact Us</h3>
                <div class="border1">
                <ul>
                   <li><i class="fa fa-map-marker" aria-hidden="true"></i> West Amber Talab, Roorkee, Uttrakhand, India.</li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i> +91 8393990980</li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i> support@fringoman.in</li>
                    </ul>
                   <div class="social-media">
						<h2 id="connectwithus">Connect with Us</h2>
                    <a href="https://www.facebook.com/fringoman/"><i class="fa fa-facebook" aria-hidden="true" style="background: #3b5998;"></i>
                        </a>
                <!--<a href=""><i class="fa fa-twitter" aria-hidden="true" style="background: #00ACEE"></i></a>
                    <a href=""><i class="fa fa-instagram" aria-hidden="true" style="background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);"></i></a>-->
                    </div> 
                </div>
            </div>
            <div class="footer-bottom" style="">
            Copyright &copy; Fringoman <?php echo date('Y')?>. All rights reserved.
            </div>
            </div>
        </div>

    </body>
</html>

