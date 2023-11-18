<?php
if(isset($_SERVER['HTTP_REFERER'])){
$previous = $_SERVER['HTTP_REFERER'];
}
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];


$meta_title="Fringoman.in";
$meta_desc="Fringoman.in: online shopping store in roorkee for kitchen applicances, Gas stove & accessories, Lights, Summer cooling, winter heating";
$meta_keyword="Online shopping website, buy products at affordable price, fringoman.in, buy products at local shop price, free shipping on fringoman.in, electrical applicances, gas stove and accessories, bulbs, emergency lights,kitchen applicances";

if($mypage=='product.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_desc=$product_meta['meta_desc'];
	$meta_keyword=$product_meta['meta_keyword'];
}if($mypage=='Contact.php'){
	$meta_title='Contact Us';
}if($mypage=='Returnpolicy.php'){
	$meta_title='Fringoman: Return Policy';
}
if($mypage=='Aboutus.php'){
	$meta_title='Fringoman: About Us';
}
if($mypage=='signup.php'){
	$meta_title='Fringoman: Sign Up';
}
if($mypage=='login.php'){
	$meta_title='Fringoman: Login';
}

if($mypage=='categories.php'){
	$category_id=get_safe_value($con,$_GET['id']);
	$category_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from categories where id='$category_id'"));
	$meta_title=$category_meta['meta_title'];
	$meta_desc=$category_meta['meta_desc'];
	$meta_keyword=$category_meta['meta_keyword'];
}

$sql="select * from banner";
$res=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-202014705-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-202014705-1');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-202014705-1">
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7009276487769931"
     crossorigin="anonymous"></script>


    <meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
    <meta name="keywords" content="<?php echo $meta_keyword?>"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon/favicon.ico">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/shortcode/header.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
		<script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <link href="Homepage.css" rel="stylesheet">
	<script src="sidebar.js"></script>
	
		
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
		body {font-family:Roboto,Ariel,sans-serif;}
		#fullsearchbar {
			position: relative;margin-top: %;
			
		}
		@media screen and (max-width:800px){
			#fullsearchbar {width: 100%;
				
			}
			.search {
			
			}
			
		}
		.search {
		}		#dropdown {
position:relative; }
		
	</style>
   
   
        </head>

	    <body style="background-color: #f0f5f1; ">
		

		<header>
		 	<div id="mySidebar" class="sidebar">
							
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="background: none; font-size:30px;"><i class="fa fa-close"></i></a>
				<div class="sidebarlogin">
					  <?php if(isset($_SESSION['USER_LOGIN']))
{
											echo '<a href="logout.php"  style="font-weight:bold;border-bottom:2px solid black;"
											>Logout</a>';
										}else{
											echo ' <a href="login.php" id="sidebarsignin"><i class="fa fa-user"></i> Hello, Sign in</a>';
										}
					
										?>
	
</div>
					<a href="index.php">Home</a>
				<div class="shopcart" style="display:flex;">
				   <a class="cart__menu" href="cart.php">My Cart</a>
                                        <a href="cart.php" style="padding-left:0;"><span style="background-color:black;color:#fff;padding:3px;margin-left:12px;border-radius:12px;" class="htc__qua"><?php echo $totalProduct?></span></a>
				  </div>
					<?php if(isset($_SESSION['USER_LOGIN']))
{
 echo ' <a href="profile.php">Profile</a>
  <a href="my_order.php">Orders</a>';
}?>
				  <a href="Aboutus.php" style="">About Us</a>
				  <li><a href="shops.php">Shops</a></li>

  <a href="Contact.php" style="border-bottom: 4px solid #ddd;">Contact</a>
				<a style="font-size: 18px; font-weight: bold; background: none;">Explore</a>
				<a style="font-size: 14px; background: none; text-transform: uppercase;">Top Categories</a>
				  <?php
										foreach($cat_arr as $list){
											?>
											<li class="drop"><a href="sub_categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
										
											
											  
										
											</li>
											<?php
										}
										?>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()"><i class="fa fa-bars"></i></button>  
  
</div>
          
		 
            <div class="container-fluid" id="navigation">
				
              <a href="index.php"><h1 style="display:inline-block; padding:0;margin:0;" ><img src="img/20210323_223812.jpg" style="width:50%;"></h1>
				</a>						
					
			           
      	  <form action="search.php" method="get" style="">
                <div class="searchbar" id="fullsearchbar">
				
                <input type="search" name="str" title="Search for products" autocomplete="off"; placeholder="Search for products" class="search" style="border-bottom-right-radius: 0; border-top-right-radius: 0;">
						  	
					  <form action="search.php" method="get" style=";">
						  <button class="btn btn-primary" style="background-color: orange; border: none; color: black; padding: 8px; width: 50px; border-bottom-left-radius: 0; border-top-left-radius: 0;outline:none; ">
              <i class="fa fa-search" style="font-size: 20px; "></i>							  </button>
					</form>
						</div>
				</form>
			 <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <?php
										foreach($cat_arr as $list){
											?>
											<li class="drop"><a href="sub_categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
									
											</li>
											<?php
										}
										?>
                                        <li><a href="Contact.php">Contact</a></li>
										 <li><a href="Aboutus.php">About Us</a></li>
										 <li><a href="shops.php">Shops</a></li>
                                    </ul>
                                </nav>


          

  </div>
                  

                 
             
				  <div class="shoppingcart" style="">
                                        <a class="cart__menu" href="cart.php"><i style="" class="fa fa-shopping-cart"></i></a>
                                        <a href="cart.php"><span style="bottom:27px" class="htc__qua"><?php echo $totalProduct?></span></a>
                                    </div>
                <div class="log-sign">
				   <div class="header_account">
										<?php if(isset($_SESSION['USER_LOGIN'])){
											?>
											<nav class="account_detail">
											   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="display:none;"
													   >
												<span class="navbar-toggler-icon"></span>
											  </button>

											  <div class="collapse navbar-collapse" id="navbarSupportedContent">
												<ul class="navbar-nav mr-auto">
												  <li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													  Hi <?php echo $_SESSION['USER_NAME']?>
													</a>
													<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													  <a class="dropdown-item" href="my_order.php">Order</a>
													  <a class="dropdown-item" href="profile.php">Profile</a>
													  <div class="dropdown-divider"></div>
													  <a class="dropdown-item" href="logout.php">Logout</a>
													</div>
												  </li>
												  
												</ul>
											  </div>
											</nav>
											<?php
										}else{
											echo '<a href="login.php" id="btnlog">Log In</a> <a href="signup.php" id="btnsign">Sign Up</a>';
										}
										?>
              </div>
				
            </div>
                     
        <main>
            <section>
            
            <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="zmdi zmdi-chevron-up"></i></a>
			
            </section>
            </main>
        </header>
        
        
