<?php 
require('top.php');
?>

 <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
         
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white" style="display:flex; width:100%;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
												
											foreach($val as $key1=>$val1)	{


$resAttr=mysqli_fetch_assoc(mysqli_query($con,"select product_attributes.*,color_master.color,size_master.size from product_attributes 
	left join color_master on product_attributes.color_id=color_master.id and color_master.status=1 
	left join size_master on product_attributes.size_id=size_master.id and size_master.status=1
	where product_attributes.id='$key1'"));

												
											$productArr=get_product($con,'','',$key,'','','','','','',$key1);
											$pname=$productArr[0]['name'];
											$mrp=$productArr[0]['mrp'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image'];
											$qty=$val1['qty'];
											?>
											<tr>
												<td class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"  /></a></td>
												<td class="product-name"><a href="#"><?php echo $pname?></a>
<?php
if(isset($resAttr['color']) && $resAttr['color']!=''){
	echo "<br/>".$resAttr['color'].''; 
}
if(isset($resAttr['size']) && $resAttr['size']!=''){
	echo "<br/>".$resAttr['size'].''; 
}
?>				
					<ul  class="pro__prize">
														<li><?php echo $price?></li>
													</ul>
												</td>
												<td class="product-price"><span class="amount"><?php echo $price?></span></td>
												<td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
												<br/><a href="javascript:void(0)" onclick="manage_cart_update('<?php echo $key?>','update','<?php echo $resAttr['size_id']?>','<?php echo $resAttr['color_id']?>')" style="color:#111;background:#f1f1f1;padding:10px;position:relative;box-shadow:1px 2px 3px grey;top:12px;text-decoration:none;">update</a>
												</td>
												<td class="product-subtotal"><?php echo $qty*$price?></td>
												<td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart_update('<?php echo $key?>','remove','<?php echo $resAttr['size_id']?>','<?php echo $resAttr['color_id']?>')"><i class="icon-trash icons"></i></a></td>
											</tr>
										<?php } } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="<?php echo SITE_PATH?>" style="box-shadow:1px 2px 3px grey">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="<?php echo SITE_PATH?>checkout.php"style="box-shadow:1px 2px 3px grey">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="sid">
		<input type="hidden" id="cid">
		<script>
function manage_cart_update(pid,type,size_id,color_id){
	jQuery('#cid').val(color_id);
	jQuery('#sid').val(size_id);
	manage_cart(pid,type);
}

function manage_cart(pid,type,is_checkout){
	var is_error='';
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	let cid=jQuery('#cid').val();
	let sid=jQuery('#sid').val();
	if(type=='add'){
		
		
		if(is_color!=0 && cid==''){
			jQuery('#cart_attr_msg').html('Please select color');
			is_error='yes';
		}
		if(is_size!=0 && sid=='' && is_error==''){
			jQuery('#cart_attr_msg').html('Please select size');
			is_error='yes';
		}
	}
	if(is_error==''){
	
		jQuery.ajax({
			url:'manage_cart.php',
			type:'post',
			data:'pid='+pid+'&qty='+qty+'&type='+type+'&cid='+cid+'&sid='+sid,
			success:function(result){
				result=result.trim();
				if(type=='update' || type=='remove'){
					window.location.href=window.location.href;
				}
				if(result=='not_avaliable'){
					alert('Qty not avaliable');	
				}else{
					jQuery('.htc__qua').html(result);
					if(is_checkout=='yes'){
						window.location.href='checkout.php';
					}
				}
			}	
		});	
	}
}


</script>
										
<?php require('footer.php')?>        