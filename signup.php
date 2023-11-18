<?php require('top.php')
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
		.Signupform {background: #fff;
 margin-top:5px ; width: 100%;
    display: block;}
		.Signupform-inner {
			  width: 90%;
    margin: auto;
    padding: 30px 10px;
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    justify-content: center;
		}
		
	.field_error { 
		color: #ff3d00;font-family: Roboto,Ariel,sans-serif,Ariel,sans-serif;font-weight: 400;
	}
	
	.Signup-items	input {     font-size: 15px;
    display: block;
    padding: 7px;
    padding-left: 30px;
    width: 100%;
    margin-top: px;
    font-family: Roboto,Ariel,sans-serif;
    border: none;
    background-color: #f6f6f6;
    border-radius: 8px;
    outline: none;
}
	.Signup-items input:focus {
border: 1px solid dodgerblue;
	background: #fff;}
		
	.Signup-items	h2 {padding: 10px; color: black;
			font-family: Roboto,Ariel,sans-serif ;text-align: center;
		}

		.Signup-items form {
border: 1px solid #ddd; padding:10px; width:100%; border-radius: 12px;  line-height: 40px; margin-top: 40px;  }
		
		.Signup-items h5 { display: flex;flex-wrap: wrap; justify-content: center;color: #767676;font-family: Roboto,Ariel,sans-serif,Ariel,sans-serif;font-weight: 400;}
		
		#registerbtn button {margin-top: 20px;
			width: 100%;padding: ;   background-color: #FFC45F;
    background: -webkit-gradient(linear, center top, center bottom, color-stop(0.50, #FFC45F), color-stop(0.50, #FBB12D)); color: #111;border-radius: 7px; border: none; font-family: Roboto,Ariel,sans-serif, 
Ariel,sans-serif;outline: none;cursor: pointer;
		}
	#registerbtn button:hover {
		background: #fff;
        border: 1px solid dodgerblue;
		
		color: dodgerblue;
	}
	
	.email_verify_otp{display:none;}
.height_60px{height:auto; padding: 12px;margin-top: 12px;  background-color: #FFC45F;
    background: -webkit-gradient(linear, center top, center bottom, color-stop(0.50, #FFC45F), color-stop(0.50, #FBB12D)); border: none;color: black; cursor: pointer;}
	
	#email_otp {
		display: none;
	}
	
	.height_60px:hover {
background: #fff;
	color: dodgerblue;
	border: 1px solid dodgerblue;}
#email_otp_result{
	margin-top: 15px;
    font-size: 15px;
    ;;
}

.mobile_verify_otp{display:none;}
#mobile_otp_result{
	margin-top: 15px;
    font-size: 15px;
    ;;
}
		label {
			display: flex; flex-wrap: wrap; justify-content: center;
		margin-top: 10px;color: #111; font-family: Roboto,Ariel,sans-serif;}
		
	@media screen and (max-width:600px){
			.Signupform-inner  {padding: 0;
width: 100%;			
			}
		.Signupinner {
			width: 100%;
		}
		.Signup-items form {
			width: 100%;justify-content: flex-start;border: none;
		}
			.Signup-items h2 {font-size: 5.5vw; align-content: center;height: 39px;line-height: 50px;text-align: center; width: 100%;}
}
.Signup-items i {
position: relative;top: 45px;padding: 0;margin: 0;left: 10px;color: #666;}
</style>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
  	<div class="Signupform">
    <div class="Signupform-inner">  
		<div class="Signupinner">
<div class="Signup-items"><h2>Welcome To <span style="padding: 4px; padding-left: 20px; padding-right: 20px; font-size: 1em; background:#CB202D;  border-radius: 120px;"><span style="color: orange;">F</span><span style="color: #fff;">ringoman</span></span></h2>
			</div>
		<div class="Signup-items">
		<form>
			<h2 style="color: black;font-family: Roboto,Ariel,sans-serif,Ariel,sans-serif;">Create Account</h2>
			
		<i class="fa fa-user"></i><input type="text" placeholder="Your Name" id="name" maxlength="128" required>
			<span class="field_error" id="name_error"></span>
		<i class="fa fa-envelope"></i><input type="email" name="Email" id="email" placeholder="Email" required>
			<button type="button"  class="fv-btn email_sent_otp height_60px" onclick="email_sent_otp()">Send OTP</button>
											
											<input type="text" id="email_otp" placeholder="OTP" style="width:100%" class="email_verify_otp" >
											
											
											<button type="button" class="fv-btn email_verify_otp height_60px" onclick="email_verify_otp()">Verify OTP</button>
											
											<span id="email_otp_result"></span>
			<span class="field_error" id="email_error"></span>
		
			<input type="email" name="mobile" id="mobile" placeholder="Mobile" required>

			<!--<button type="button" class="fv-btn mobile_sent_otp height_60px" onclick="mobile_sent_otp()">Send OTP</button>
											
											<input type="text" id="mobile_otp" placeholder="OTP" style="width:100%" class="mobile_verify_otp">
											
											
											<button type="button" class="fv-btn mobile_verify_otp height_60px" onclick="mobile_verify_otp()">Verify OTP</button>
											
											<span id="mobile_otp_result"></span>
											-->
			<span class="field_error" id="mobile_error"></span> 
			<br>
			<i class="fa fa-lock"></i>
			<input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
			<div class="show-hide-password" style="display:-webkit-box;margin-top:10px;">
				<input type="checkbox" onclick="myFunction()" style="width:10%;margin-top:5px;"><p style="width:30%; margin-top:px;margin-bottom:0px; font-family:Roboto,Ariel,sans-serif;font-size:14px;">show Password</p></div>

			<span class="field_error" id="password_error"></span>
			<div class="form-output register_msg">
									<p class="form-messege field_error" style="color:green;"></p>
								</div>
								<p style="font-family:Roboto,Ariel,sans-serif;">By continuing you are agree our <a href="https://portal.termshub.io/fringoman.in/#website_tos">Terms and condition</a></p>
				<div class="contact-btn" id="registerbtn">
                                    <button type="button" onclick="user_register()"  class="fv-btn" >Continue</button>
                                </div>
			
			<label>Already Have An Account?<a class="a-signin-link" href="login.php"> Sign-In</a></label>
		
		</form>
	
			</div>
			<label>&copy; 2021 Fringoman.com. All rights reserved.</label>
			</div>
	</div>
<input type="hidden" id="is_email_verified"/>
		<input type="hidden" id="is_mobile_verified"/>	
</div>
	
<script>
  
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

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
					jQuery('.register_msg p').html('Thank you for registeration. Please login and continue your shopping');
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
		
	/*	function mobile_sent_otp(){
			jQuery('#mobile_error').html('');
			var mobile=jQuery('#mobile').val();
			if(mobile==''){
				jQuery('#mobile_error').html('Please enter mobile number');
			}else{
				jQuery('.mobile_sent_otp').html('Please wait..');
				jQuery('.mobile_sent_otp').attr('disabled',true);
				jQuery('.mobile_sent_otp');
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'mobile='+mobile+'&type=mobile',
					success:function(result){
						if(result=='done'){
							jQuery('#mobile').attr('disabled',true);
							jQuery('.mobile_verify_otp').show();
							jQuery('.mobile_sent_otp').hide();
						}else if(result=='mobile_present'){
							jQuery('.mobile_sent_otp').html('Send OTP');
							jQuery('.mobile_sent_otp').attr('disabled',false);
							jQuery('#mobile_error').html('Mobile number already exists');
						}else{
							jQuery('.mobile_sent_otp').html('Send OTP');
							jQuery('.mobile_sent_otp').attr('disabled',false);
							jQuery('#mobile_error').html('Please try after sometime');
						}
					}
				});
			}
		}
		function mobile_verify_otp(){
			jQuery('#mobile_error').html('');
			var mobile_otp=jQuery('#mobile_otp').val();
			if(mobile_otp==''){
				jQuery('#mobile_error').html('Please enter OTP');
			}else{
				jQuery.ajax({
					url:'check_otp.php',
					type:'post',
					data:'otp='+mobile_otp+'&type=mobile',
					success:function(result){
						if(result=='done'){
							jQuery('.mobile_verify_otp').hide();
							jQuery('#mobile_otp_result').html('Mobile number verified');
							jQuery('#is_mobile_verified').val('1');
							if(jQuery('#is_email_verified').val()==1){
								jQuery('#btn_register').attr('disabled',false);
							}
						}else{
							jQuery('#mobile_error').html('Please enter valid OTP');
						}
					}
					
				});
			}
		} */

</script>
<?php require('footer.php')?>