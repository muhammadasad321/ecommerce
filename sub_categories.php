<?php 
require('top.php');



$cat_id=mysqli_real_escape_string($con,$_GET['id']);
$catsub_res=mysqli_query($con,"select * from sub_categories where status='1' and sub_categories.categories_id='$cat_id'");
$catsub_arr=array();
while($row=mysqli_fetch_assoc($catsub_res)){
	$catsub_arr[]=$row;	
}


?>
<style>
	#subcatimg {
width: 100%;}

</style>

                 <section class="bestsellerbackground" style="background:none; margin-top:50px;">
            <div class="container-fluid" id="bestsellerback" style="width:100%;background:none;">
                <div class="row">
                 
                       <div class="section__title--2 text-center" style="width:100%;">
                            <h2 class="title__line" style="border-bottom:1.5px solid #ddd;padding-bottom:12px;margin-top:70px;width:118%;">All Categories</h2>
							
                        </div>
						
                                </div>
                <div class="row">
                    <div class="product__list clearfix mt--30">
							 <?php
										foreach($catsub_res as $list){
											?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category" id="bestseller" style="padding:18px; border:none;">
                                    <div class="ht__cat__thumb">
                                      <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['sub_img']?>" id="subcatimg" alt="product images">
                                    </div>
                                  <a style="border-radius: 5px;text-decoration: none;
		padding: 5px;background-color: #FFC45F;
    background: -webkit-gradient(linear, center top, center bottom, color-stop(0.50, #FFC45F), color-stop(0.50, #FBB12D));
display:block;color: black;margin-top: 10px;" href="categories.php?id=<?php echo $list['categories_id']?>&sub_categories=<?php echo $list['id']?>"><?php echo $list['sub_categories']?></a>
                                 
                                </div>
                            </div>
                            <!-- End Single Category -->
							<?php } ?>
                        </div>
                </div>
            </div>
        </section>


<?php require('footer.php')?>        

