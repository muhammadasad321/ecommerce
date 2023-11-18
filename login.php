<?php require('top.php');?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>Fringoman: Login</title>
</head>
<style>

		.loginform {background: #fff;
 margin-top:5px; width: 100%;
    display: block;}
		.loginform-inner {
			  background-color: #fff;
			  width: 90%;
    margin: auto;
    
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    justify-content: center;
		}
	
		
	.login-items button {padding: 12px;border: none;cursor: pointer;border-radius: 12px;color: black;
width: 100%;}		
		
	.login-items input { font-size: 15px; display: block; padding: 12px;padding-left: 30px;
width: 100%; margin-top: 12px;font-family: Roboto,Ariel,sans-serif;border: none; background-color: #f6f6f6; border-radius: 8px;outline: none;
	}
	
	.login-items input:focus {
		background-color: transparent; border: 1px solid dodgerblue
	}
	
	.forgotpsd  {
	color: dodgerblue; text-decoration: underline;font-family: Roboto,Ariel,sans-serif; line-height: 50px;position: relative;
	}
		.login-items h2 {color: #111;
			font-family: Roboto,Ariel,sans-serif;
		}
	.login-items button {
		   background-color: #FFC45F;
    background: -webkit-gradient(linear, center top, center bottom, color-stop(0.50, #FFC45F), color-stop(0.50, #FBB12D));color: black;font-family: Roboto,Ariel,sans-serif;font-weight: 400;margin-top: 20px;line-height: 20px;font-weight: bold;
	transition: 0.5s;}
	.login-items button:hover {
		background: white; border: 1px solid dodgerblue; color: dodgerblue;
	}
		.login-items form {
border: 1px solid #ddd; padding: 15px; border-radius: 12px;  line-height: 25px; margin-top: 40px;  }
		
		.login-items h5 { display: flex;flex-wrap: wrap; justify-content: center;color: #767676;font-family: Roboto,Ariel,sans-serif,Ariel,sans-serif;font-weight: 400;}
	.sec2 {line-height: 1px;
}
	.newaccountbtn a{background: white;
		border: none;padding: 0;
	}
	
		label {
			display: flex; flex-wrap: wrap; justify-content: center;
		margin-top: 10px;color: #111;font-family: Roboto,Ariel,sans-serif;}
		@media screen and (max-width:600px){
			.loginform-inner {
margin-top: 5em;
			}
			.logininner {
				width: 100%;
			}
			.login-items form {
				
			}
			.login-items h2 {font-size: 5.5vw; align-content: center;height: 39px;line-height: 50px;text-align: center;}
}
	.login-items i {
position: relative;top: 50px;padding: 0;margin: 0;left: 10px;color: #666;}
	
</style>


<div class="loginform">
    <div class="loginform-inner">  
		
		<div class="logininner">
		
		<div class="login-items" style="text-align:center;"><h2>Welcome To <span style="padding: 4px; padding-left: 20px; padding-right: 20px; font-size: 1em;   background-color:#CB202D;border-radius: 120px;"><span style="color: orange;">F</span><span style="color: #fff;">ringoman</span></span></h2>
			</div>
		<div class="login-items">
		<form action="#"  method="post">
			<h2 style="color: black;font-family: Roboto,Ariel,sans-serif,Ariel,sans-serif;">Sign-In</h2>
	<i class="fa fa-envelope"></i><input type="text" name="login_email" id="login_email" placeholder="Your Email" style="width:100%">
			<span class="field_error" id="login_email_error"></span>
	<i class="fa fa-lock"></i>	<input type="password" name="login_password" id="login_password" placeholder="Your Password" style="width:100%">
		<div class="show-hide-password" style="display:-webkit-box;margin-top:10px;">
				<input type="checkbox" onclick="myFunction()" style="width:10%;margin-top:5px;"><p style="width:30%; margin-top:px;margin-bottom:0px; font-family:Roboto,Ariel,sans-serif;font-size:14px;">show Password</p></div>

				<span class="field_error" id="login_password_error"></span>
				<div class="contact-btn">
										<button type="button" class="fv-btn" onclick="user_login()">Login</button>
									</div>
			<a href="forgot_password.php"  class="forgotpsd" >Forgot Your Password?</a>
		
		</form>
				<div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
			<div class="sec2">
			<div class="login-items" id="sec2">
			<h5>New to Fringoman</h5>
				</div>
			<a href="signup.php"><button type="submit" id="newaccountbtn" style="transition:0.5s">Create Your Fringoman Account</button></a>
			</div>
			<label>&copy; 2021 Fringoman.com. All rights reserved.</label>
			</div>
	</div>
			</div>
		</div>
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


</script>
<script>
function myFunction() {
  var x = document.getElementById("login_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>

        <!-- End Contact Area -->
		<!-- Google Map js -->
  <?php require('footer.php')?>