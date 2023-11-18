<?php 
require('top.php');					
?>

<style>

		.Contactusform {background-color: #fff;
position: absolute; margin-top:105px ; width: 100%;
    display: block;}
		.Contactusform-inner {background-color: #fff;
			  width: 90%;
    margin: auto;
    
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    justify-content: center;
		}
		
		
		
	.Contactus-items input { font-size: 15px; display: block; padding: 12px;
width: 100%; margin-top: 12px;		font-family: Roboto,Ariel,sans-serif;border: 1px solid #ddd;border-radius: 8px;outline: none;
	}
	.Contactus-items input:focus {
		border: 1px solid dodgerblue;
	}
	
.Contactus-items	textarea { display: block; 
width: 100%; margin-top: 12px; 	font-family: Roboto,Ariel,sans-serif;border-radius: 8px;
}
	 .contact-box textarea:focus {
		border: 1px solid dodgerblue;
	}
	.contact-btn button {outline: none;
		   background-color: #FFC45F;
    background: -webkit-gradient(linear, center top, center bottom, color-stop(0.50, #FFC45F), color-stop(0.50, #FBB12D)); color: white; border: none; margin-top: 12px;
	border-radius: 8px;}
		.Contactus-items h1 {
			font-family: Roboto,Ariel,sans-serif;
		}
		input[type=submit] {background: orange; border: none; font-family: Roboto,Ariel,sans-serif;}
		.Contactus-items form {
border: 1px solid #ddd; padding:15px; width:100%; border-radius: 12px;  line-height: 20px; margin-top: 40px;  }
		
		.Contactus-items h5 { display: flex;flex-wrap: wrap; justify-content: center;color: #767676;font-family: Roboto,Ariel,sans-serif;font-weight: 400;}
		
		.Contactus-items button {
			width: 100%;padding: 10px; color: #fff;border-radius: 7px; font-family: Roboto,
Ariel,sans-serif;outline: none;
		}
		label {
			display: flex; flex-wrap: wrap; justify-content: center;
		margin-top: 10px;color: #111;font-weight: 200;}
		@media screen and (max-width:600px){
			.Contactusform-inner {
margin-top: 5em;
			}
			
			.Contactus-items h2 {
				height: 100%;
			}
			.Contactus-items form {
				width: 100%;
			}
			.Contactus-items h1 {font-size: 5.5vw; align-content: center;height: 39px;line-height: 50px;text-align: center; }
}
</style>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
    	<div class="Contactform" style="background-color:#fff;">
    <div class="Contactusform-inner">  
		<div class="Contactusinner">
		<div class="Contactus-items" style="text-align:center;"><h1 style="color:black;">Welcome To <span style="padding: 4px; padding-left: 20px; padding-right: 20px; font-size: 1em;background:#CB202D;   border-radius: 120px;"><span style="color: orange;">F</span><span style="color: #fff;">ringoman</span></span></h1>
			</div>
		<div class="Contactus-items">
		<form  action="#" method="post">
			<h2 style="color: black;font-family: Roboto,Ariel,sans-serif;">Send Us a Mail</h2>
		<input type="text" id="name" name="name" placeholder="Your Name" maxlength="128" required>
		<input type="email" id="email" name="Email" placeholder="Email" required>
	
		<input type="email" id="mobile" name="mobile" placeholder="Your Mobile Number">
		 <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="message" id="message" placeholder="Your Message" style="background:#fff;border:1px solid #ddd;"></textarea>
                                    </div>
                                </div>
			   <div class="contact-btn">
                                    <button type="button" onclick="send_message()" class="fv-btn" >Send MESSAGE</button>
                                </div>
		
		</form>
	
			</div>
			<label>&copy; 2021 Fringoman.com. All rights reserved.</label>
			</div>
	</div>
			</div>
<script>


function send_message(){
	var name=jQuery("#name").val();
	var email=jQuery("#email").val();
	var mobile=jQuery("#mobile").val();
	var message=jQuery("#message").val();
	
	if(name==""){
		alert('Please enter name');
	}else if(email==""){
		alert('Please enter email');
	}else if(mobile==""){
		alert('Please enter mobile');
	}else if(message==""){
		alert('Please enter message');
	}else{
		jQuery.ajax({
			url:'send_message.php',
			type:'post',
			data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
			success:function(result){
				alert(result);
			}	
		});
	}
}

</script>
        <!-- End Contact Area -->
		<!-- Google Map js -->
   
<?php require('footer.php')?>        