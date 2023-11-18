<?php 
require('top.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}

$cart_total=0;

if(isset($_POST['submit'])){
	$shop_id=get_safe_value($con,$_POST['shop_id']);
	$shop=get_safe_value($con,$_POST['shop']);
	$receiver_name=get_safe_value($con,$_POST['receiver_name']);
	$address=get_safe_value($con,$_POST['address']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$landmark=get_safe_value($con,$_POST['landmark']);
	$city=get_safe_value($con,$_POST['city']);
	$pincode=get_safe_value($con,$_POST['pincode']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);
	$user_id=$_SESSION['USER_ID'];
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
		
	}
	$total_price=$cart_total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='success';
	}
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
	
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			if(isset($_SESSION['COUPON_ID'])){
		$coupon_id=$_SESSION['COUPON_ID'];
		$coupon_code=$_SESSION['COUPON_CODE'];
		$coupon_value=$_SESSION['COUPON_VALUE'];
		$total_price=$total_price-$coupon_value;
		unset($_SESSION['COUPON_ID']);
		unset($_SESSION['COUPON_CODE']);
		unset($_SESSION['COUPON_VALUE']);
	}else{
		$coupon_id='';
		$coupon_code='';
		$coupon_value='';	
	}	
	 
	mysqli_query($con,"insert into `order`(shop_id,shop,receiver_name,user_id,address,mobile,landmark,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid,coupon_id,coupon_code,coupon_value) values('$shop_id','$shop','$receiver_name','$user_id','$address','$mobile','$landmark','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid','$coupon_id','$coupon_code','$coupon_value')");
	
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		
		mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
	}
	
	unset($_SESSION['cart']);
	
	if($payment_type=='payu'){
		$MERCHANT_KEY = "yQBrnOe6"; 
		$SALT = "62FzFJR4D4";
		$hash_string = '';
		$PAYU_BASE_URL = "https://secure.payu.in";
	//	$PAYU_BASE_URL = "https://test.payu.in";
		$action = '';
		$posted = array();
		if(!empty($_POST)) {
		  foreach($_POST as $key=>$value) {    
			$posted[$key]=$value; 
		  }
		}
		
		$userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
		
		$formError = 0;
		$posted['txnid']=$txnid;
		$posted['amount']=$total_price;
		$posted['firstname']=$userArr['name'];
		$posted['email']=$userArr['email'];
		$posted['phone']=$userArr['mobile'];
		$posted['productinfo']="productinfo";
		$posted['key']=$MERCHANT_KEY;
		$hash = '';
		$hashSequence = 
		"key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		if(empty($posted['hash']) && sizeof($posted) > 0) {
		  if(
				  empty($posted['key'])
				  || empty($posted['txnid'])
				  || empty($posted['amount'])
				  || empty($posted['firstname'])
				  || empty($posted['email'])
				  || empty($posted['phone'])
				  || empty($posted['productinfo'])
				 
		  ) {
			$formError = 1;
		  } else {    
			$hashVarsSeq = explode('|', $hashSequence);
			foreach($hashVarsSeq as $hash_var) {
			  $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
			  $hash_string .= '|';
			}
			$hash_string .= $SALT;
			$hash = strtolower(hash('sha512', $hash_string));
			$action = $PAYU_BASE_URL . '/_payment';
		  }
		} elseif(!empty($posted['hash'])) {
		  $hash = $posted['hash'];
		  $action = $PAYU_BASE_URL . '/_payment';
		}


		$formHtml ='<form method="post" name="payuForm" id="payuForm" action="'.$action.'"><input type="hidden" name="key" value="'.$MERCHANT_KEY.'" /><input type="hidden" name="hash" value="'.$hash.'"/><input type="hidden" name="txnid" value="'.$posted['txnid'].'" /><input name="amount" type="hidden" value="'.$posted['amount'].'" /><input type="hidden" name="firstname" id="firstname" value="'.$posted['firstname'].'" /><input type="hidden" name="email" id="email" value="'.$posted['email'].'" /><input type="hidden" name="phone" value="'.$posted['phone'].'" /><textarea name="productinfo" style="display:none;">'.$posted['productinfo'].'</textarea><input type="hidden" name="surl" value="'.SITE_PATH.'payment_complete.php" /><input type="hidden" name="furl" value="'.SITE_PATH.'payment_fail.php"/><input type="submit" style="display:none;"/></form>';
		echo $formHtml;
		echo '<script>document.getElementById("payuForm").submit();</script>';
	}else{	
        sentInvoice($con,$order_id);
		?>
		<script>
			window.location.href='thank_you.php';
		</script>
		<?php
	}	
	
}
?>


        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
					    
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    
									<?php 
									$accordion_class='accordion__title';
									if(!isset($_SESSION['USER_LOGIN'])){
									$accordion_class='accordion__hide';
									?>
									<div class="accordion__title">
                                        Checkout Method
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form id="login-form" method="post">
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                                <input type="text" name="login_email" id="login_email" placeholder="Your Email" style="width:100%">
																<span class="field_error" id="login_email_error"></span>
                                                            </div>
															
                                                            <div class="single-input">
                                                                <input type="password" name="login_password" id="login_password" placeholder="Your Password" style="width:100%">
																<span class="field_error" id="login_password_error"></span>
                                                            </div>
															
                                                            <p class="require">* Required fields</p>
                                                            <div class="dark-btn">
                                                                <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                                            </div>
															<div class="form-output login_msg">
																<p class="form-messege field_error"></p>
															</div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                                <input type="text" name="name" id="name" placeholder="Your Name" style="width:100%">
																<span class="field_error" id="name_error"></span>
                                                            </div>
															<div class="single-input">
                                                                <input type="text" name="email" id="email" placeholder="Your Email" style="width:100%">
																<span class="field_error" id="email_error"></span>
                                                            </div>
															<button type="button"  class="fv-btn email_sent_otp height_60px" onclick="email_sent_otp()">Send OTP</button>
											
											<input type="text" id="email_otp" placeholder="OTP" style="width:100%" class="email_verify_otp" >
											
											
											<button type="button" class="fv-btn email_verify_otp height_60px" onclick="email_verify_otp()">Verify OTP</button>
											
											<span id="email_otp_result" style="color:green; font-weight:bold"></span>

                                                            <div class="single-input">
                                                                <input type="password" name="password" id="password" placeholder="Your Password" style="width:100%">
																<span class="field_error" id="password_error"></span>
                                                            </div>
															<div class="form-output register_msg">
									<p class="form-messege field_error" style="color:green; font-weight:bold;font-family:Roboto;"></p>
								</div>
                                                            <div class="dark-btn">
                                                                <button type="button" class="fv-btn" onclick="user_register()">Register</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<input type="hidden" id="is_email_verified"/>
									<?php } ?>
                                    <div class="<?php echo $accordion_class?>">
                                        Address Information
                                    </div>
									<form method="post">
										<div class="accordion__body">
											<div class="bilinfo">
												
													<div class="row">
														<div class="col-md-12">
														<?php
								$cart_total=0;
								foreach($_SESSION['cart'] as $key=>$val){
								$productArr=get_product($con,'','',$key);
								$shop_id=$productArr[0]['shop_id'];
								$shop=$productArr[0]['shop'];?>
								
<select name="shop_id" style="display:none;"><option><?php echo $shop_id?></option></select>																<select name="shop_id" style="display:none;"><option><?php echo $shop_id?></option></select>
<select name="shop" style="display:none;"><option><?php echo $shop?></option></select>
																<?php }?>
															<div class="single-input">
																<input type="text" name="receiver_name" placeholder="Receiver Name" required>
															</div>
															<div class="single-input">
																<input type="text" name="address" placeholder="Street Address" required>
															</div>
															<div class="single-input">
																<input type="text" name="mobile" placeholder="Phone Number" required maxlength="10">
															</div>
															
															<div class="single-input">
																<input type="text" name="landmark" placeholder="Landmark" required>
															</div>
														</div>
														<div class="col-md-6">
															<div class="single-input">
																<select name="city"><option>Roorkee</option></select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="single-input">
																<input type="text" name="pincode" placeholder="Post code/ zip" required>
															</div>
														</div>
														
													</div>
												
											</div>
										</div>
										<div class="<?php echo $accordion_class?>">
											payment information
										</div>
										<div class="accordion__body">
											<div class="paymentinfo">
												<div class="single-method">
													COD <input type="radio" name="payment_type" value="COD" required/>
												<!-- &nbsp;&nbsp;PayU <input type="radio" name="payment_type" value="payu" required/>-->
										</div>
												<div class="single-method">
												  
												</div>
											</div>
										</div>
										 <input type="submit" name="submit"/>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details" id="orderdetails">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                                <?php
								$cart_total=0;
								foreach($_SESSION['cart'] as $key=>$val){
								$productArr=get_product($con,'','',$key);
								$shop_id=$productArr[0]['shop_id'];
								$shop=$productArr[0]['shop'];
								$pname=$productArr[0]['name'];
								$mrp=$productArr[0]['mrp'];
								$price=$productArr[0]['price'];
								$image=$productArr[0]['image'];
								$qty=$val['qty'];
								$cart_total=$cart_total+($price*$qty);
								?>
								<div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"  />
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname?></a>
										<span class="price"><i class='fa fa-rupee'></i> <?php echo $price*$qty?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a>
                                    </div>
                                </div>
								<select name="shop_id" style="display:none;"><option><?php echo $shop_id?></option></select>
								<?php } ?>
                            </div>
                                            </div>
							<div class="ordre-details__total" id="coupon_box">
                                <h5>Coupon Value</h5>
                                <span class="price" id="coupon_price"></span>
                            </div>				<div class="ordre-details__total" id="coupon_box">
                         <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price"><i class='fa fa-rupee'></i> <?php echo $cart_total?></span>
                            </div>
                            	
							<div class="ordre-details__total bilinfo" style="display:block;">
                                <input type="textbox" id="coupon_str" class="coupon_style mr5" style=""/><br> <input type="button" name="submit" class="fv-btn coupon_style" value="Apply Coupon" onclick="set_coupon()"/>
								
                            </div>
							<div id="coupon_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<style>
	#email_otp {
		display: none;
	}
	.checkout-wrap {
background: #fff;font-family: Roboto;}
	input {
font-family: ROboto;border-radius: 12px;padding: 20px; background: #f6f6f6;border: none;}
.accordion__body .checkout-method__login .single-input input:focus,
.accordion__body .checkout-method__login .single-input input:active{
    background: transparent;
    border: 1px solid dodgerblue;
}

	input[type=submit]{
		background-color: dodgerblue;color: white;padding: 12px; width: 100%;border-radius: 0px;font-weight: bold;
	}
	input[type=submit]:hover {
background: white;border: 1px solid dodgerblue;color:dodgerblue;}
	#orderdetails a{font-family: Roboto; text-decoration: none; color: black;}
	.single-input select {
border-radius: 12px;background: #f6f6f6;}
	.single-input select:focus {
background: #f6f6f6;}
	
	span.price {
		color: #111;font-family:fantasy;
	}
	
	.order-details {
		background-color: #fff; border: 1px solid black; border-radius: 3px;
	}
	
	button[type=button]{border: none;
		background-color: dodgerblue;
	}
	button[type=button]:hover {
		background: white;border: 1px solid dodgerblue;color: dodgerblue	;
	}
	.require {
font-family: Roboto;}
</style>
       <script>
		   
		   		   function user_login(){
	jQuery('.field_error').html('');
	var email=jQuery("#login_email").val();
	var password=jQuery("#login_password").val();
	var is_error='';
	if(email==""){
		jQuery('#login_email_error').html('Please enter email');
		is_error='yes';
	}if(password==""){
		jQuery('#login_password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'login_submit.php',
			type:'post',
			data:'email='+email+'&password='+password,
			success:function(result){
				if(result=='wrong'){
					jQuery('.login_msg p').html('Please enter valid login details');
				}
				if(result=='valid'){
					window.location.href='index.php';
				}
			}	
		});
	}	
}
	

    function emeAccordion(){
        $('.accordion__title')
          .siblings('.accordion__title').removeClass('active')
          .first().addClass('active');
        $('.accordion__body')
          .siblings('.accordion__body').slideUp()
          .first().slideDown();
        $('.accordion').on('click', '.accordion__title', function(){
          $(this).addClass('active').siblings('.accordion__title').removeClass('active');
          $(this).next('.accordion__body').slideDown().siblings('.accordion__body').slideUp();
        });
        };
    emeAccordion();
		   
	function user_register(){
	
	jQuery('.field_error').html('');
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var email_otp=jQuery("#email_otp").val();
	var mobile=jQuery("#mobile").val();
	var password=jQuery("#password").val();
	var is_error='';
	if(name==""){
		jQuery('#name_error').html('Please enter name');
		is_error='yes';
	}if(email==""){
		jQuery('#email_error').html('Please enter email');
		is_error='yes';
	}if(email_otp==""){
		jQuery('#email_error').html('Please verify your email id');
		is_error='yes';
		
	}if(mobile==""){
		jQuery('#mobile_error').html('Please enter mobile');
		is_error='yes';
	}if(password==""){
		jQuery('#password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'register_submit.php',
			type:'post',
			data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
			success:function(result){
				if(result=='email_present'){
					jQuery('#email_error').html('Email id already present');
				}
				if(result=='insert'){
					jQuery('.register_msg p').html('Thank You For Registeration. Please Login To Continue');
				}
			}	
		});
	}
	
}
		   
	function email_sent_otp(){
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('.email_sent_otp').html('Please wait..');
				jQuery('.email_sent_otp').attr('disabled',true);
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'email='+email+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('#email').attr('disabled',true);
							jQuery('.email_verify_otp').show();
							jQuery('.email_sent_otp').hide();
							
						}else if(result=='email_present'){
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Email id already exists');
						}else{
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Please try after sometime');
						}
					}
				});
			}
		}
		function email_verify_otp(){
			jQuery('#email_error').html('');
			var email_otp=jQuery('#email_otp').val();
			if(email_otp==''){
				jQuery('#email_error').html('Please enter OTP');
			}else{
				jQuery.ajax({
					url:'check_otp.php',
					type:'post',
					data:'otp='+email_otp+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('.email_verify_otp').hide();
							jQuery('#email_otp_result').html('Email id verified');
							jQuery('#is_email_verified').val('1');
							if(jQuery('#is_mobile_verified').val()==1){
								jQuery('#btn_register').attr('disabled',false);
							}
						}else{
							jQuery('#email_error').html('Please enter valid OTP');
						}
					}
					
				});
			}
		}
		   
		   
</script>
       <script>
			function set_coupon(){
				var coupon_str=jQuery('#coupon_str').val();
				if(coupon_str!=''){
					jQuery('#coupon_result').html('');
					jQuery.ajax({
						url:'set_coupon.php',
						type:'post',
						data:'coupon_str='+coupon_str,
						success:function(result){
							var data=jQuery.parseJSON(result);
							if(data.is_error=='yes'){
								jQuery('#coupon_box').hide();
								jQuery('#coupon_result').html(data.dd);
								jQuery('#order_total_price').html(data.result);
							}
							if(data.is_error=='no'){
								jQuery('#coupon_box').show();
								jQuery('#coupon_price').html(data.dd);
								jQuery('#order_total_price').html(data.result);
							}
						}
					});
				}
			}
		</script>
					
<?php 
if(isset($_SESSION['COUPON_ID'])){
	unset($_SESSION['COUPON_ID']);
	unset($_SESSION['COUPON_CODE']);
	unset($_SESSION['COUPON_VALUE']);
}
require('footer.php')?>        