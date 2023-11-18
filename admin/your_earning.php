<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);

}
$shop_id='';

$sql="select sum(total_price),shop_id,shop,added_on from `order` where order_status='5' and shop_id='".$_SESSION['ADMIN_SHOP_ID']."' group by added_on  order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Your income statement</h4>

				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
				   						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Shop Name</th>
							   <th>Today Earning</th>
							  			<th>Earning Added On</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $_SESSION['ADMIN_SHOP_ID']?></td>
							   <td><?php echo $_SESSION['ADMIN_SHOP']?></td>
							   <td><?php echo $row['sum(total_price)']?></td>
							   
							   <td><?php echo $row['added_on']?></td>
						   
							  					

						
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