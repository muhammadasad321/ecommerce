<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
<style>
	#style {
		font-family: Roboto;
	}
	a {
font-family: Roboto;}
	.bg__white {
		position: relative; top: 10px;background: cadetblue;
	}
	td#style.product-name {
		font-weight: 400;
	}
</style>

        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="wishlist-area ptb--100 bg__white">
			<h1 style="width:100%;padding-bottom:22px; font-family:Roboto;">My Account</h1>
			<h2 style="color:white;position:relative;left:15%;padding-bottom:12px;font-family:Roboto;">Recent Orders</h2>
            <div class="container" >
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table id="aaa">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail" id="style">Order ID</th>
                                                <th class="product-name"id="style"><span class="nobr">Order Date</span></th>
                                                <th class="product-price"id="style"><span class="nobr"> Address </span></th>
                                                <th class="product-stock-stauts"id="style"><span class="nobr"> Payment Type </span></th>
												<th class="product-stock-stauts"id="style"><span class="nobr"> Payment Status </span></th>
												<th class="product-stock-stauts"id="style"><span class="nobr"> Order Status </span></th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status");
											while($row=mysqli_fetch_assoc($res)){
											?>
                                            <tr>
												<td class="product-add-to-cart"><a style="text-transform:none;font-weight:500;" href="my_order_details.php?id=<?php echo $row['id']?>">View <?php echo $row['id']?></a></td>
                                                <td class="product-name"id="style"><?php echo $row['added_on']?></td>
                                                <td class="product-name"id="style">
												<?php echo $row['address']?><br/>
												<?php echo $row['city']?><br/>
												<?php echo $row['pincode']?>
												</td>
												<td class="product-name"id="style"><?php echo $row['payment_type']?></td>
												<td class="product-name"id="style"><?php echo ucfirst($row['payment_status'])?></td>
												<td class="product-name"id="style"><?php echo $row['order_status_str']?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        						
<?php require('footer.php')?>        