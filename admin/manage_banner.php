<?php
require('top.inc.php');
isAdmin();
$image1='';
$image2='';
$image3='';
  $msg = ""; 
  // If upload button is clicked ... 
  if (isset($_POST['upload'])) { 
 	
   $image1=rand(111111111,999999999).'_'.$_FILES['image1']['name'];
				move_uploaded_file($_FILES['image1']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image1);
				
				$image2=rand(111111111,999999999).'_'.$_FILES['image2']['name'];
				move_uploaded_file($_FILES['image2']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image2);
				
				$image3=rand(111111111,999999999).'_'.$_FILES['image3']['name'];
				move_uploaded_file($_FILES['image3']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image3);
    
    
		if($_FILES['image1']['type']!='image1/png' && $_FILES['image1']['type']!='image1/jpg' && $_FILES['image1']['type']!='image1/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	else{
		if($_FILES['image1']['type']!=''){
				if($_FILES['image1']['type']!='image1/png' && $_FILES['image1']['type']!='image1/jpg' && $_FILES['image1']['type']!='image1/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
    
        // Get all the submitted data from the form 
        $sql = "INSERT INTO banner (id,image1,image2,image3) VALUES ('007','$image1','$image2','$image3')"; 
  
        // Execute query 
        mysqli_query($con, $sql); 
          
        // Now let's move the uploaded image into the folder: image 
       
	  header('location:banner.php');
	  die();
		}
  
  $result = mysqli_query($con, "SELECT * FROM banner"); 
?> 

<!DOCTYPE html> 
<html> 
  
<head> 
    <title>Image Upload</title> 
    <link rel="stylesheet" 
          type="text/css"
          href="style.css" /> 
</head> 
  
<body> 
    <div id="content"> 
  
        <form method="POST" 
              action="" 
              enctype="multipart/form-data"> 

								<div class="form-group">
									<label for="banner" class=" form-control-label">First image</label>
									<input type="file" name="image1"accept=".jpg,.png,.pdf" class="form-control">
								</div>
  
								<div class="form-group">
									<label for="banner" class=" form-control-label">Second Image</label>
									<input type="file" name="image2"accept=".jpg,.png,.pdf" class="form-control">
								</div>
   
								<div class="form-group">
									<label for="banner" class=" form-control-label">Third Image</label>
									<input type="file" name="image3"accept=".jpg,.png,.pdf" class="form-control" >
			  <button id="payment-button" name="upload" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
            </div> 
        </form> 
    </div> 
</body> 
  
</html> 
 
<?php
require('footer.inc.php');
?>