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

$receiver_name='';
$address='';
$landmark='';
$mobile='';
$city='';
$pincode='';
    
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
	 foreach($val as $key1=>$val1)	{
			$resAttr=mysqli_fetch_assoc(mysqli_query($con,"select price from product_attributes where id='$key1'"));
			$price=$resAttr['price'];
			$qty=$val1['qty'];
			$cart_total=$cart_total+($price*$qty);
			
		}
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
		
		foreach($val as $key1=>$val1)	{
			$resAttr=mysqli_fetch_assoc(mysqli_query($con,"select price from product_attributes where id='$key1'"));
			$price=$resAttr['price'];
			$qty=$val1['qty'];
			
			mysqli_query($con,"insert into `order_detail`(order_id,product_id,product_attr_id,qty,price) values('$order_id','$key','$key1','$qty','$price')");
			
		}
	}

	
	
	if($payment_type=='instamojo'){
		
		$userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER,
			array("X-Api-Key:".INSTAMOJO_KEY,"X-Auth-Token:".INSTAMOJO_TOKEN)
		);
		
		$payload = Array(
			'purpose' => 'Buy Product',
			'amount' => $total_price,
			'phone' => $userArr['mobile'],
			'buyer_name' => $userArr['name'],
			'redirect_url' => INSTAMOJO_REDIRECT,
			'send_email' => false,
			'send_sms' => false,
			'email' => $userArr['email'],
			'allow_repeated_payments' => false
		);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
		$response = curl_exec($ch);
		curl_close($ch); 
		$response=json_decode($response);
		if(isset($response->payment_request->id)){
			unset($_SESSION['cart']);
			$_SESSION['TID']=$response->payment_request->id;
			mysqli_query($con,"update `order` set txnid='".$response->payment_request->id."' where id='".$order_id."'");
			?>
			<script>
			window.location.href='<?php echo $response->payment_request->longurl?>';
			</script>
			<?php
		}else{
			if(isset($response->message)){
				$errMsg.="<div class='instamojo_error'>";
				foreach($response->message as $key=>$val){
					$errMsg.=strtoupper($key).' : '.$val[0].'<br/>';				
				}
				$errMsg.="</div>";
			}else{
				echo "Something went wrong";
			}
		}
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
									<?php }else{
$lastOrderDetailsRes=mysqli_query($con,"select receiver_name,landmark,mobile ,address,city,pincode from `order` where user_id='".$_SESSION['USER_ID']."'");

if(mysqli_num_rows($lastOrderDetailsRes)>0){
	$lastOrderDetailsRow=mysqli_fetch_assoc($lastOrderDetailsRes);
    $receiver_name=$lastOrderDetailsRow['receiver_name'];
	$landmark=$lastOrderDetailsRow['landmark'];
	$mobile=$lastOrderDetailsRow['mobile'];
    $address=$lastOrderDetailsRow['address'];
	$city=$lastOrderDetailsRow['city'];
	$pincode=$lastOrderDetailsRow['pincode'];
}

} ?>
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
								//$productArr=get_product($con,'','',$key);
								
								//prx($productArr);
								
								foreach($val as $key1=>$val1){
									
$resAttr=mysqli_fetch_assoc(mysqli_query($con,"select product_attributes.*,color_master.color,size_master.size from product_attributes 
	left join color_master on product_attributes.color_id=color_master.id and color_master.status=1 
	left join size_master on product_attributes.size_id=size_master.id and size_master.status=1
	where product_attributes.id='$key1'"));						
$productArr=get_product($con,'','',$key,'','','','','','',$key1);
	$shop_id=$productArr[0]['shop_id'];
								$shop=$productArr[0]['shop'];?>
								
<select name="shop_id" style="display:none;"><option><?php echo $shop_id?></option></select>																<select name="shop_id" style="display:none;"><option><?php echo $shop_id?></option></select>
<select name="shop" style="display:none;"><option><?php echo $shop?></option></select>
																<?php }}?>
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
												<p style="font-weight:bold;font-family:Roboto,Ariel,sans-serif;color:black"><input type="radio" name="payment_type" value="COD" required/> Pay on Delivery</p> 
												 &nbsp;&nbsp;<p style="font-weight:bold;font-family:Roboto,Ariel,sans-serif;color:black"><input type="radio" name="payment_type" value="instamojo" required/> Add Debit/Credit/ATM Card</p>
                                                    <img src="img/cards.jpg" width="50%">

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
								//$productArr=get_product($con,'','',$key);
								
								//prx($productArr);
								
								foreach($val as $key1=>$val1){
									
$resAttr=mysqli_fetch_assoc(mysqli_query($con,"select product_attributes.*,color_master.color,size_master.size from product_attributes 
	left join color_master on product_attributes.color_id=color_master.id and color_master.status=1 
	left join size_master on product_attributes.size_id=size_master.id and size_master.status=1
	where product_attributes.id='$key1'"));						
$productArr=get_product($con,'','',$key,'','','','','','',$key1);
$pname=$productArr[0]['name'];
$mrp=$productArr[0]['mrp'];
$price=$productArr[0]['price'];
$image=$productArr[0]['image'];
$qty=$val1['qty'];	
								
								$cart_total=$cart_total+($price*$qty);
								?>
								<div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"/>
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#" style="font-family:Roboto,Ariel,sans-serif;"><?php echo $pname?></a>
										<span class="price"><i class='fa fa-rupee'></i> <?php echo $price*$qty?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a>
                                    </div>
                                </div>
								<select name="shop_id" style="display:none;"><option><?php echo $shop_id?></option></select>
								<?php }} ?>
                        	<div class="ordre-details__total" id="coupon_section" style="display:flex;width:80%;">
                                <h5>Coupon Value</h5>
                               <i class="fa fa-rupee"></i><span class="price" id="coupon_price"></span>
                            </div>				<div class="ordre-details__total" id="coupon_section" style="">
                         <div class="ordre-details__total" style="display:flex;width:90%">
                                <h5>Order total</h5>
                                <span class="price"><i class='fa fa-rupee'></i> <?php echo $cart_total?></span>
                            </div>
                            	
							<div class="ordre-details__total bilinfo" style="display:block;">
                                <input type="textbox" id="coupon_str" class="coupon_style mr5" style="font-family:Roboto,Ariel,sans-serif"/><br> <input type="button" style="background:orange;margin-top:12px;border:none" name="submit" class="fv-btn coupon_style" value="Apply Coupon" onclick="set_coupon()"/>
								
                            </div>
							<div id="coupon_result"></div>
                        </div>
                            </div>
                            
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
								jQuery('#coupon_section').hide();
								jQuery('#coupon_result').html(data.dd);
								jQuery('#order_total_price').html(data.result);
							}
							if(data.is_error=='no'){
								jQuery('#coupon_section').show();
								jQuery('#coupon_price').html(data.dd);
								jQuery('#order_total_price').html(data.result);
							}
						}
					});
				}
			}
</script>
       <script>
			
		</script>
					
<?php 
if(isset($_SESSION['COUPON_ID'])){
	unset($_SESSION['COUPON_ID']);
	unset($_SESSION['COUPON_CODE']);
	unset($_SESSION['COUPON_VALUE']);
}
require('footer.php')?>        