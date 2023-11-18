<?php
ob_start();
require('top.inc.php');

$condition='';
$condition1='';
if($_SESSION['ADMIN_ROLE']==1){
	$condition=" and product.added_by='".$_SESSION['ADMIN_ID']."'";
	$condition1=" and added_by='".$_SESSION['ADMIN_ID']."'";
}
$shop_id='';
$shop='';
$shop_address='';
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$second='';
$third='';
$video='';
$short_desc	='';
$description='';
$meta_title	='';
$meta_desc	='';
$meta_keyword='';
$best_seller='';
$feature_product='';
$best_deal='';
$sub_categories_id='';
$msg='';
$image_required='required';
$second_required='required';
$third_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$second_required='';
	$third_required='';

	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id' $condition1 ");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$shop_id=$row['shop_id'];
		$shop=$row['shop'];
		$shop_address=$row['shop_address'];
		$categories_id=$row['categories_id'];
		$sub_categories_id=$row['sub_categories_id'];
		$name=$row['name'];
		$mrp=$row['mrp'];
		$price=$row['price'];
		$qty=$row['qty'];
		$video=$row['video'];
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$best_seller=$row['best_seller'];
		$feature_product=$row['feature_product'];
		$best_deal=$row['best_deal'];
		
	}else{
		header('location:product.php');
		die();
	}
}
if(isset($_POST['submit'])){
    $shop_id=get_safe_value($con,$_POST['shop_id']);
	$shop=get_safe_value($con,$_POST['shop']);
	$shop_address=get_safe_value($con,$_POST['shop_address']);
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$sub_categories_id=get_safe_value($con,$_POST['sub_categories_id']);
	$name=get_safe_value($con,$_POST['name']);
	$mrp=get_safe_value($con,$_POST['mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);
	$video=get_safe_value($con,$_POST['video']);
	$short_desc=get_safe_value($con,$_POST['short_desc']);
	$description=get_safe_value($con,$_POST['description']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
	$best_seller=get_safe_value($con,$_POST['best_seller']);
	$feature_product=get_safe_value($con,$_POST['feature_product']);
	$best_deal=get_safe_value($con,$_POST['best_deal']);
	
	$res=mysqli_query($con,"select * from product where name='$name' $condition1 ");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	if(isset($_GET['id']) && $_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	

	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				if($_FILES['second']['name']!=''){
				$second=rand(111111111,999999999).'_'.$_FILES['second']['name'];
				move_uploaded_file($_FILES['second']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$second);
					if($_FILES['third']['name']!=''){
				$third=rand(111111111,999999999).'_'.$_FILES['third']['name'];
				move_uploaded_file($_FILES['third']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$third);
					
 $update_sql="update product set  shop_id='$shop_id',shop='$shop',shop_address='$shop_address', categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',image='$image',second='$second',third='$third',video='$video',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller',feature_product='$feature_product',best_deal='$best_deal',sub_categories_id='$sub_categories_id' where id='$id'";
				}}}else{
				 $update_sql="update product set  shop_id='$shop_id',shop='$shop',shop_address='$shop_address', categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',video='$video',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller',feature_product='$feature_product',best_deal='$best_deal',sub_categories_id='$sub_categories_id' where id='$id'";
			}
			if(isset($update_sql)) {
			mysqli_query($con,$update_sql);}
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			$second=rand(111111111,999999999).'_'.$_FILES['second']['name'];
			move_uploaded_file($_FILES['second']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$second);
			$third=rand(111111111,999999999).'_'.$_FILES['third']['name'];
			move_uploaded_file($_FILES['third']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$third);
	
			mysqli_query($con,"insert into product(shop_id,shop,shop_address,categories_id,name,mrp,price,qty,image,second,third,video,short_desc,description,meta_title,meta_desc,meta_keyword,status,best_seller,feature_product,best_deal,sub_categories_id,added_by) values('$shop_id','$shop','$shop_address','$categories_id','$name','$mrp','$price','$qty','$image','$second','$third','$video','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$best_seller','$feature_product','$best_deal','$sub_categories_id','".$_SESSION['ADMIN_ID']."')");
			}
header('location:product.php');
die();
	}
}

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block" style="">
							    <div class="flex-row">
														   <div class="form-group">
									<label for="categories" class=" form-control-label">Your Shop Unique id</label>
									<select class="form-control" name="shop_id">
										<option><?php echo  $_SESSION['ADMIN_SHOP_ID']?></option>
					
									</select>
								</div>
							
														   <div class="form-group" >
									<label for="categories" class=" form-control-label">Your Shop Name</label>
									<select class="form-control" name="shop">
										<option><?php echo  $_SESSION['ADMIN_SHOP']?></option>
									
									</select>
								</div>
								

<div class="form-group" >
									<label for="categories" class=" form-control-label">Your Shop Address</label>
									<select class="form-control" name="shop_address">
										<option><?php echo  $_SESSION['ADMIN_SHOP_ADDRESS']?></option>
									
									</select>
								</div>
                                    </div>
								</div>
								<div class="col-md-12" style="display:flex">
							   <div class="form-group" style="width:100%;">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								
								<div class="form-group" style="width:100%;">
									<label for="categories" class=" form-control-label">Sub Categories</label>
									<select class="form-control" name="sub_categories_id" id="sub_categories_id">
										<option>Select Sub Category</option>
									</select>
								</div>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
								</div>
								<div class="flex-row" style="">
								<div class="form-group"style="width:100%;">
									<label for="categories" class=" form-control-label">Best Seller</label>
									<select class="form-control" name="best_seller" required>
										<option value=''>Select</option>
										<?php
										if($best_seller==1){
											echo '<option value="1" selected>Yes</option>
												<option value="0">No</option>';
										}elseif($best_seller==0){
											echo '<option value="1">Yes</option>
												<option value="0" selected>No</option>';
										}else{
											echo '<option value="1">Yes</option>
												<option value="0">No</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group"style="width:100%;">
									<label for="categories" class=" form-control-label">Feature Products</label>
									<select class="form-control" name="feature_product" required>
										<option value=''>Select</option>
										<?php
										if($feature_product==1){
											echo '<option value="1" selected>Yes</option>
												<option value="0">No</option>';
										}elseif($feature_product==0){
											echo '<option value="1">Yes</option>
												<option value="0" selected>No</option>';
										}else{
											echo '<option value="1">Yes</option>
												<option value="0">No</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group"style="width:100%;">
									<label for="categories" class=" form-control-label">Best Deal of the Day</label>
									<select class="form-control" name="best_deal" required>
										<option value=''>Select</option>
										<?php
										if($best_deal==1){
											echo '<option value="1" selected>Yes</option>
												<option value="0">No</option>';
										}elseif($best_deal==0){
											echo '<option value="1">Yes</option>
												<option value="0" selected>No</option>';
										}else{
											echo '<option value="1">Yes</option>
												<option value="0">No</option>';
										}
										?>
									</select>
								</div>
								</div>
                            <div class="flex-row">
								<div class="form-group">
									<label for="categories" class=" form-control-label">MRP</label>
									<input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Qty</label>
									<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">
								</div>
                            </div>
								<div class="flex-row">
								<div class="form-group">
									<label for="categories" class=" form-control-label">First Image</label>
									<input type="file" name="image" accept=".jpg,.png,.pdf" class="form-control">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Second Image</label>
									<input type="file" name="second"accept=".jpg,.png,.pdf" class="form-control">
								</div>
									<div class="form-group">
									<label for="categories" class=" form-control-label">Third Image</label>
									<input type="file" name="third"accept=".jpg,.png,.pdf" class="form-control">
								</div>
                            </div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Youtube Video url(embed)</label>
									<input type="text" name="video" placeholder="Enter the youtube embeded video url" class="form-control" required value="<?php echo $video?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Short Description</label>
									<textarea name="short_desc" id="editor" placeholder="Enter product short description" class="form-control" ><?php echo $short_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control" id="editor1" ><?php echo $description?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Title</label>
									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
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
		 
		 <script>
			function get_sub_cat(sub_cat_id){
				var categories_id=jQuery('#categories_id').val();
				jQuery.ajax({
					url:'get_sub_cat.php',
					type:'post',
					data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
					success:function(result){
						jQuery('#sub_categories_id').html(result);
					}
				});
			}
		
		 </script>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinde.js"></script>
<script>
CKEDITOR.replace('editor',{
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});
CKEDITOR.replace('editor1',{
	filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});
</script>
<style>
			 
			 #flex {display:flex;width:100%;}
			 .form-group {width:100%;
				 padding:2px;
			 }
    .flex-row {
display: flex}
    @media only screen and (max-width:800px){
        .flex-row {
display: block;}
    }
		 </style>
<?php
require('footer.inc.php');
?>
<script>
		 <?php
if(isset($_GET['id'])){
?>
get_sub_cat('<?php echo $sub_categories_id?>');
	<?php } ?>
</script>
<?php 
ob_end_flush();
?>