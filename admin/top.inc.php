<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){
}else{
	header('location:login.php');
	die();
}
$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
 
	</head>
	
	
   <body>
	   <script>
	function check() {
		document.getElementById("cat").style.width = "144px";
	}
	</script>
      <aside id="left-panel" class="left-panel" style="">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" style="color:black" class="main-menu collapse navbar-collapse">
             <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  
				  <li class="menu-item-has-children dropdown">
                     <a href="product.php" style="color:#111" >Fringoman Products </a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <?php 
					 if($_SESSION['ADMIN_ROLE']==1){
						echo '<a href="order_master_vendor.php" style="color:#111" > Order Master</a>';
                  echo '<a href="your_earning.php" style="color:#111" > Your Earning</a>';
					 }else{
						echo '<a href="order_master.php"style="color:#111" > Order Master</a>';
					 }
					 ?>
                  </li>
				  <?php if($_SESSION['ADMIN_ROLE']!=1){?>
               <li class="menu-item-has-children dropdown">
                     <a href="vendor_income.php"style="color:#111;" >Vendor Earning</a>
                  </li>
               <li class="menu-item-has-children dropdown">
                     <a href="banner.php"style="color:#111" >Banner</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="searchterms.php"style="color:#111" >What people are searching?</a>
                  </li>
				   <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php"style="color:#111" >Vendor Management</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="categories.php" style="color:#111">Fringoman Categories</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="sub_categories.php" style="color:#111">Fringoman Sub Categories </a>
                  </li>
                  
				  <li class="menu-item-has-children dropdown">
                     <a href="users.php"style="color:#111" >Fringoman Users</a>
                  </li>
			
				  <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php" style="color:#111">Contact Us</a>
                  </li>
				   <li class="menu-item-has-children dropdown">
                     <a href="ratting.php" style="color:#111">Customer Rating</a>
                  </li>
                     <li class="menu-item-has-children dropdown">
                     <a href="coupon_master.php" style="color:#111">Fringoman Coupons</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="fringoman-shops.php" style="color:#111">Fringoman Shops</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="color.php" style="color:#111">Fringoman Colours</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="size.php" style="color:#111">Fringoman Sizes</a>
                  </li>
				  <?php } ?>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="product.php"><h1 style="font-family: Roboto,Ariel,sans-serif;font-size:30px;padding-top:2px;"> <span style="padding: 4px; padding-left: 20px; padding-right: 20px; font-size: 1em; background: red;border-radius: 120px;"><span style="color: orange;">F</span><span style="color: #fff;">ringoman</span></span></h1></a>
                  <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                  <?php 
		
      	$res=mysqli_query($con,"select sum(total_price), order_detail.qty,product.name,`order`.*,order_status.name as order_status_str from order_detail,product,`order`,order_status where order_status='5' and order_status.id=`order`.order_status and product.id=order_detail.product_id and `order`.id=order_detail.order_id and product.added_by='".$_SESSION['ADMIN_ID']."' order by `order`.id desc");
					
         while($row=mysqli_fetch_assoc($res)){
					?>
					<tr>
              
                        <p id="earning" style="padding:12px;color:black;"><td>Total Earning On Fringoman: Rs. </td><td class="product-name"><?php echo $row['sum(total_price)']?></td>
				</p>	</tr>		
					<?php }?>
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false style="background:#111;padding:12px;"">Welcome <?php echo $_SESSION['ADMIN_USERNAME']?></a>	  
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
          <style>
              #earning {
                  @media screen and (max-width:800px){
}}
          </style>