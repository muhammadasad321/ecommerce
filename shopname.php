<?php require('top.php');
$shop_id='';
$id=$_GET['id'];

$res=mysqli_query($con,"select * from product where shop_id='$id'");
	while($row=mysqli_fetch_assoc($res)){

?>
<body style="background:#fff">
 <section class="bestsellerbackground" style="height:100%;position:absolute; width:100%;top:18%;">
            <div class="container-fluid" id="bestsellerback" style="width:90%;">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line" style="border-bottom:1.5px solid #ddd;padding-bottom:12px;">Products of this shop</h2>
							
                        </div>
						
                    </div>
                </div>
                <div class="row">
                    <div class="product__list clearfix mt--30">
						
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category" id="bestseller" style="padding:12px;margin-bottom:15px;">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $row['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
										<ul class="product__action">
											
											<li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $row['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
										</ul>
									</div>
									   <h4 class="line-clamp" style="font-family:Roboto;"><a style="font-size:12px;font-family:Roboto;" href="product.php?id=<?php echo $row['id']?>"><?php echo $row['name']?></a></h4> 
									<a style="font-family:Roboto;" href="product.php?id=<?php echo $row['id']?>"><button class="buybtn" style="width:100%;">See more</button></a>
                                    <div class="fr__product__inner">
                                     
                                        <ul class="fr__pro__prize">
                                         
											<!-- <li><i class='fa fa-rupee'></i><?php echo $row['price']?><br/></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
							<?php } ?>
                        </div>
                </div>
            </div>
	 <?php require('footer.php')?>
        </section>

</body>

