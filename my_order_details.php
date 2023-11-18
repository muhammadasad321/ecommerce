<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con,$_GET['id']);

$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value from `order` where id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];
?>

<style>
	#style {
		font-family: Roboto;
	}
	
	#table {
position: relative;top: 50px;}
</style>

        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container" id="table">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail" id="style">Product Name</th>
												<th class="product-thumbnail">Product Image</th>
                                                <th class="product-name" id="style">Qty</th>
                                                <th class="product-price" id="style">Price</th>
                                                <th class="product-price" id="style">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
											$total_price=0;
											while($row=mysqli_fetch_assoc($res)){
											$total_price=$total_price+($row['qty']*$row['price']);
											?>
                                            <tr>
												<td class="product-name" id="style"><?php echo $row['name']?></td>
                                                <td class="product-name" id="style"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
												<td class="product-name" id="style"><?php echo $row['qty']?></td>
												<td class="product-name" id="style"><?php echo $row['price']?></td>
												<td class="product-name" id="style"><?php echo $row['qty']*$row['price']?></td>
                                                
                                            </tr>
                                            <?php } 			if($coupon_value!=''){?>
                     </tr>

											<tr>
												<td colspan="3"></td>
												<td class="product-name">Coupon Value</td>
												<td class="product-name"><?php echo $coupon_value?></td>
                                                
                                            </tr>
											<?php } ?>
											<tr>
												<td colspan="3"></td>
												<td class="product-name">Total Price</td>
												<td class="product-name">
												<?php 
												echo $total_price-$coupon_value;
												?></td>
                                                
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        								<?php 

if(isset($_POST['submit'])){
	 
	
	
    $reason = $_POST['reason'];
    $status = 'cancelled';
	 


    mysqli_query($con,"INSERT INTO orderstracking (order_id, status, reason)
	VALUES('$order_id', '$status', '$reason')");  

	
mysqli_query($con, "update `order` set order_status='4' where id=$order_id");

	
	
	
	}

 ?>
								<form method="post">
<h2 style="width:100%;text-align:center;font-family:Roboto;text-decoration:underline;">Want To Cancel?</h2>
				<div class="clearfix space20"></div>
									<div class="container">
							<label style="font-size:30px;margin:21px;font-family:Roboto;">Reason of Cancel</label>
 						 <textarea style="font-size:30px;" class="form-control" name='reason' cols="20" rows="5" id="reason"></textarea>
						 <div class="row">
            <div class="col-md-12 text-center">
                <input type="hidden" name='orderid' value='<?php echo $_GET['id'] ?>'>
                <input type='submit' name='submit' value='Cancel Order' class="btn" style="background:#444;margin-top:12px;color:#fff;padding:12px;margin:21px;">
            </div>
        </div>	
										</div>
	</form>
			<style>
				
</style>		
        						
<?php require('footer.php')?>        