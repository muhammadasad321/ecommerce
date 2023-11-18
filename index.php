
    
    <?php
define('ENTER',true);
require('top.php');


?> 
<?php 
							 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="z-index: -1;">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image1']?>" class="img-responsive" alt="First slide" >
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image2']?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image3']?>" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
         
</div>
<?php }?>
    
<div class="container-fluid" style="background: #fff; position: relative; top: 10px; border-radius: 0px; overflow-x: auto;height:34em;">
            <div class="row"  >
                 <div class="section__title--2 text-center" style="display:inline-block;height:0; width:100%;">
                            <h2 class="title__line" style=" font-family:Roboto,Ariel,sans-serif;border-bottom:1.5px solid #ddd;padding-bottom:15px; position:relative	;width:100%;">Feature Products</h2>
							
                        </div>
				<div class="feature-product" style="position:relative;top:6em;display:flex;">
                  
            
				<?php
							$get_product=get_product($con,7,'','','','','','','yes');
							foreach($get_product as $list){
							?>
                 
    <div class="card" style="border: none;">
    <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                        </a>
    <div class="card-body">
      <h4 class="card-title line-clamp" style="font-size: 15px; color: ;"><a style="font-family:Roboto,Ariel,sans-serif,Ariel,sans-serif; color:darkcyan" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4>
 
        <p class="card-text" style="font-family:Roboto,Ariel,sans-serif; color:#B12704;font-weight:500"><i class='fa fa-rupee'></i><?php echo $list['price'] ?></p>
        <a style="font-family:Roboto,Ariel,sans-serif;" href="product.php?id=<?php echo $list['id']?>"><button class="buybtn" style="">See more</button></a>
    
       
    </div>
  </div>
               
				    
                      		<?php }  ?>                    
                </div>
			


                    </div>
            
        </div>
 	  
	
       
      
		     <section class="bestsellerbackground">
            <div class="container-fluid" id="bestsellerback" style="width:90%;">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line" style=" font-family:Roboto,Ariel,sans-serif;border-bottom:1.5px solid #ddd;padding-bottom:12px;">Best Seller</h2>
							
                        </div>
						
                    </div>
                </div>
                <div class="row">
                    <div class="product__list clearfix mt--30">
							<?php
							$get_product=get_product($con,8,'','','','','yes');
							foreach($get_product as $list){
							?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category" id="bestseller" style="padding:12px;">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
										<ul class="product__action">
											
											<li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
										</ul>
									</div>
									<a style="font-family:Roboto,Ariel,sans-serif;" href="product.php?id=<?php echo $list['id']?>"><button class="buybtn" style="width:100%;">See more</button></a>
                                    <div class="fr__product__inner">
                                  <!--      <h4 class="line-clamp" style="font-family:Roboto,Ariel,sans-serif;"><a style="font-size:15px;font-family:Roboto,Ariel,sans-serif;" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4> -->
                                        <ul class="fr__pro__prize">
                                         
											<!-- <li><i class='fa fa-rupee'></i> <?php echo $list['price']?></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
							<?php } ?>
                        </div>
                </div>
            </div>
        </section>


		
        
        <div class="container-fluid" style="background: #fff; position: relative; top: 10px; border-radius: 0px; overflow-x: auto;height:34em;">
            <div class="row"  >
                 <div class="section__title--2 text-center" style="display:inline-block;height:0; width:100%;">
                            <h2 class="title__line" style=" font-family:Roboto,Ariel,sans-serif;border-bottom:1.5px solid #ddd;padding-bottom:15px; position:relative	;width:100%;">Best Deal of the Day</h2>
							
                        </div>
				<div class="bestdeal" style="position:relative;top:6em;display:flex;">
                  
            
				<?php
							$get_product=get_product($con,7,'','','','','','','','yes');
							foreach($get_product as $list){
							?>
                 
    <div class="card" style="border: none;">
		
    <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                        </a>
		
    <div class="card-body">
      <h4 class="card-title line-clamp" style="font-size: 15px; color: #111;"><a style="font-family:Roboto,Ariel,sans-serif;color:darkcyan" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4>
  
        <p class="card-text" style="font-family:Roboto,Ariel,sans-serif; color:#B12704;font-weight:500"><i class='fa fa-rupee'></i><?php echo $list['price']?></p>
        
  <a style="font-family:Roboto,Ariel,sans-serif;" href="product.php?id=<?php echo $list['id']?>"><button class="buybtn" style="">See more</button></a>
      
       
    </div>
  </div>
               
				    
                      		<?php }  ?>                    
                </div>
			


                    </div>
            
        </div>
 	
     
	    <script>
function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			if(result=='not_avaliable'){
				alert('Qty not avaliable');	
			}else{
				jQuery('.htc__qua').html(result);
			}
		}	
	});	
}

</script>    

<?php
require('footer.php')
?> 