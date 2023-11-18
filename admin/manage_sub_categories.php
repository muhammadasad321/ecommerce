<?php
require('top.inc.php');
isAdmin();
$categories='';
$msg='';
$sub_categories='';
$is_home='';
$sub_img='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from sub_categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$sub_categories=$row['sub_categories'];
		$categories=$row['categories_id'];
		$is_home=$row['is_home'];
		$sub_img=$row['sub_img'];
	}else{
		header('location:sub_categories.php');
		die();
	}
}
if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories_id']);
	$sub_categories=get_safe_value($con,$_POST['sub_categories']);
		$is_home=get_safe_value($con,$_POST['is_home']);
	
	  $sub_img=rand(111111111,999999999).'_'.$_FILES['sub_img']['name'];
				move_uploaded_file($_FILES['sub_img']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$sub_img);
	$res=mysqli_query($con,"select * from sub_categories where categories_id='$categories' and sub_categories='$sub_categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Sub Categories already exist";
			}
		}else{
			$msg="Sub Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update sub_categories set categories_id='$categories',sub_categories='$sub_categories', is_home='$is_home',sub_img='$sub_img' where id='$id'");
		}else{
			
			mysqli_query($con,"insert into sub_categories(categories_id,sub_categories,is_home,sub_img,status) values('$categories','$sub_categories','$is_home','$sub_img','1')");
		}
		header('location:sub_categories.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Sub Categories</strong><small> Form</small></div>
                        <form method="post"  enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select name="categories_id" required class="form-control">
										<option value="">Select Categories</option>
										<?php
										$res=mysqli_query($con,"select * from categories where status='1'");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories){
												echo "<option value=".$row['id']." selected>".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Sub Categories</label>
									<input type="text" name="sub_categories" placeholder="Enter sub categories" class="form-control" required value="<?php echo $sub_categories?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">category at homepage</label>
									<select class="form-control" name="is_home" required>
										<option value=''>Select</option>
										<?php
										if($is_home==1){
											echo '<option value="1" selected>Yes</option>
												<option value="0">No</option>';
										}elseif($is_home==0){
											echo '<option value="1">Yes</option>
												<option value="0" selected>No</option>';
										}else{
											echo '<option value="1">Yes</option>
												<option value="0">No</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">image</label>
									<input type="file" name="sub_img" accept=".jpg,.png,.pdf" class="form-control">
								</div>
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