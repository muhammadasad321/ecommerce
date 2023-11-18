<?php
require('top.inc.php');
isAdmin();
$username='';
$password='';
$email='';
$mobile='';
$shops_id='';
$shop='';
$shop_address='';
$image='';
$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from admin_users where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$username=$row['username'];
		$password=$row['password'];
		$email=$row['email'];
		$mobile=$row['mobile'];
		$shops_id=$row['shops_id'];
		$shop=$row['shop'];
		$shop_address=$row['shop_address'];
		
	}else{
		header('location:fringoman_shops.php');
		die();
	}
}
print_r($_POST);
if(isset($_POST['submit'])){

	$username=get_safe_value($con,$_POST['username']);
				$password=get_safe_value($con,$_POST['password']);
				$email=get_safe_value($con,$_POST['email']);
				$mobile=get_safe_value($con,$_POST['mobile']);
	$shops_id=get_safe_value($con,$_POST['shops_id']);
	$shop=get_safe_value($con,$_POST['shop']);
	$shop_address=get_safe_value($con,$_POST['shop_address']);

	$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);

	$res=mysqli_query($con,"select * from admin_users where shop='$shop'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Shop name already exist";
			}
		}else{
			$msg="Shop name already exist";
		}
	}
		

if($msg==''){

	if(isset($_GET['id']) && $_GET['id']!=''){
	
			mysqli_query($con,"update admin_users set username='$username',password='$password',role='$role',email='$email',mobile='$mobile',shops_id='$shops_id', shop='$shop',shop_address='$shop_address', where id='$id'");
		}else{
						mysqli_query($con,"insert into
  admin_users (
	username,
	password,
	role,
	email,
	mobile,  
	shops_id,
    shop,
	image,
	shop_address,
    status
  )
values('$username','$password','1','$email','$mobile',
    '$shops_id','$shop','$image','$shop_address','1'
  )
");

		}
		header('location:fringoman_shops.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Shops</strong><small> Form</small></div>
                        <form method="post"   action="" 
              enctype="multipart/form-data">
							<div class="card-body card-block">
							<div class="form-group">
									<label for="admin_users" class=" form-control-label">Username</label>
									<input type="text" name="username" placeholder="Enter username" class="form-control" required value="<?php echo $username?>">
								</div>
								<div class="form-group">
									<label for="admin_users" class=" form-control-label">Password</label>
									<input type="text" name="password" placeholder="Enter password" class="form-control" required value="<?php echo $password?>">
								</div>
								<div class="form-group">
									<label for="admin_users" class=" form-control-label">Email</label>
									<input type="email" name="email" placeholder="Enter eamil" class="form-control" required value="<?php echo $email?>">
								</div>
								<div class="form-group">
									<label for="admin_users" class=" form-control-label">Mobile</label>
									<input type="text" name="mobile" placeholder="Enter mobile number" class="form-control" required value="<?php echo $shop?>">
								</div>
								 <div class="form-group">
									<label for="admin_users" class=" form-control-label">Shop id</label>
									<input type="text" name="shops_id" placeholder="Enter shop name" class="form-control" required value="<?php echo $shop?>">
								</div>
							   <div class="form-group">
									<label for="admin_users" class=" form-control-label">Shop name</label>
									<input type="text" name="shop" placeholder="Enter shop name" class="form-control" required value="<?php echo $shop?>">
								</div>
								<div class="form-group">
									<label for="admin_users" class=" form-control-label">Shop address</label>
									<textarea name="shop_address" placeholder="Enter shop address" class="form-control" required value="<?php echo $shop_address?>"></textarea>
								</div>
										<div class="form-group">
									<label for="admin_users" class=" form-control-label">Image of the shop</label>
									<input type="file" name="image" class="form-control" >
								</div>
								<div class="form-group">
									
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>