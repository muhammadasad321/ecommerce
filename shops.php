<?php 
require('top.php');

$shop_res=mysqli_query($con,"select * from admin_users where status=1 order by shop asc");
$shop_arr=array();
while($row=mysqli_fetch_assoc($shop_res)){
	$shop_arr[]=$row;	
}

?>

	
		     <section class="bestsellerbackground">
            <div class="container-fluid" id="bestsellerback" style="width:90%;">
                <div class="row" style="width:100%;">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line" style="border-bottom:1.5px solid #ddd;padding-bottom:12px;">Shops on fringoman</h2>
							
                        </div>
						
                    </div>
                </div>
                <div class="row">
                    <div class="product__list clearfix mt--30">
   <?php
										foreach($shop_arr as $list){
											?>
						   <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category" id="bestseller" style="padding:12px;">
						 <div class="ht__cat__thumb">
                                        <a href="shopname.php?id=<?php echo $list['shops_id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="<?php echo $list['shop']?>">
                                        </a>
                                    </div>
									<div class="shopname">
										<li><a href="shopname.php?id=<?php echo $list['shops_id']?>"><?php echo $list['shop']?></a></li>
										</div>

										    </div>
                            </div>
                            <!-- End Single Category -->
							<?php } ?>
                        </div>
                </div>
            </div>
        </section>
<style>
	.shopname li {
border:1px solid black;border-radius: 5px; font-family: Roboto;text-align: center; background: orange;}
	.shopname a {color:black;font-family: Roboto; text-decoration: none;}
</style>
<?php require('footer.php')?>        

