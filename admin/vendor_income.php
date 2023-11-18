<?php
require('top.inc.php');
isAdmin();
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);

}


$sql="select sum(total_price),shop_id,shop from `order` where order_status='5' and shop_id group by shop_id ";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Vendor incomes </h4>
				   <h4 class="box-link"><a href="manage_vendor_income.php">More About your income</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Shop Name of Vendor</th>
							   <th>Total Earning</th>
							  			
							</tr>
						 </thead>
						 <tbody>
							<?php 
							 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['shop_id']?></td>
							   <td><?php echo $row['shop']?></td>
							   <td><?php echo $row['sum(total_price)']?></td>
							   
						   
							  					

						
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>