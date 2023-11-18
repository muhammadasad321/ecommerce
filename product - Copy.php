<?php 
require('top.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}
}
?>

<style>
	 .rating {
    float:left;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★' }

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}
.rtn{
  float: left;
  width: 100%;
}
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}

.checked{
  color: orange;
}


	.productpage {

  width: 99%;
    background: #fff;
    display: flex;}
	.innerproductpage { width: 95%;
 margin: auto;
		padding: 30px 10px;
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
				

	}
	#imagesection {
	
	}
	#product-details {
width: 55%;}
	
	.productpagedetail h1  {font-size: 20px;color: #111;font-family:Roboto;font-weight:500;letter-spacing: 1px;  text-align: left;
}
	.productpagedetail {
 width: 40%;
    padding: 10px 20px;
    box-sizing: border-box;}
	@media screen and (max-width:800px){
		.innerproductpage {
display: block;	}
		.productpagedetail {
			width: 100%;
		}
	
		#product-details {padding: 0;padding-top: 12px;
width: 100%;}
		a#cartbtn {top: 1.2em; width: 100%; position: relative; display: block;
			margin-top: 12px;
    padding: 10px;
    font-size: 16px;
    text-align: center;
 }
				
		#carouselExampleIndicators {
			width: 100%;
		}
		select#qty {
width: 30%;}
		button#cartbtn.addtocartbtn{
 width: 100%; margin-top: 10px;}
			#button-buying {
display: inline-grid;width: 100%;}
	}
	#qty	 {
		padding-left:10px;outline:none;  margin-left:10px;width:7%;border-radius:12px;border:2px solid black;
	}
	#qty:within {
		border-color: lightgreen;
	}
	.addtocartbtn {position:relative;top:10%;color:#111;text-decoration:none;padding:20px;font-size:20px;width:40%;  border-radius:5px;background-color: #FFC45F;border-color:black;
    background: -webkit-gradient(linear, center top, center bottom, color-stop(0.50, #FFC45F), color-stop(0.50, #FBB12D));font-family:Roboto;
		
	}
	.addtocartbtn button:hover {
text-decoration: none;color: black;}

	.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}

input[type=radio] {display: flex}
</style>
<div class="productpage">
<div class="innerproductpage">
	<div class="productpagedetail" id="imagesection">
<div class="w3-content w3-display-container" style="max-width:100%">
 <div style="z-index:100" class="w3-display-left  w3-padding w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
   <div  style="z-index:100" class="w3-display-right w3-padding w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
  <img class="mySlides" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" style="width:100%;">
		<iframe class="mySlides" style="width:100%;" height="300" src="<?php echo $get_product['0']['video']?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <img class="mySlides" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['second']?>" style="width:100%">
  <img class="mySlides" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['third']?>" style="width:100%">
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
   
  
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
	   <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
  </div>
</div>

	</div>
	<div class="productpagedetail" id="product-details">
	<h1>
		<?php echo $get_product['0']['name']?>
		</h1>
		<h2 style="font-weight:bold; font-family:Roboto; color:#111;font-size:20px;">Highlights</h2>
		<p style=" color:#222; font-weight:400; font-family:Roboto;font-size:20px; "><?php echo $get_product['0']['short_desc']?></p>

		<p style="font-size:20px;margin-top:20px;color:black;font-family:Roboto;font-weight:bold;">Price:<span style="margin-left:10px;color:#B12704;font-weight:500;font-family:Roboto;"><sup><i class="fa fa-rupee" style="font-size:14px;"></i></sup><?php echo $get_product['0']['price']?></span></p>
		
				<p style="font-size:20px;margin-top:20px;font-weight:bold; color:black;font-family:Roboto;">Shipping :-<span style="color:green;font-family:monospace;">Free</span></p>

		<div class="sin__desc">
				<?php
										$productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);
										
										$pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;
										
										$cart_show='yes';
										if($get_product['0']['qty']>$productSoldQtyByProductId){
											$stock='<p style="font-family:Roboto;font-weight:bold;color:green;margin-left:2px;">  In Stock</p';			
										}else{
											$stock='<p style="font-family:Roboto;color:red;margin-left:2px;">  Out of Stock</p>';
											$cart_show='';
										}
										?>
                                        <p style="font-size:20px;font-weight:bold;margin-top:5px;font-weight:bold; color:#111;font-family:Roboto;">Availability :-  <?php  echo $stock?></p>
		</div>
        
<div class="sin__desc">
										<?php
										if($cart_show!=''){
										?>
                                        <p style="display:flex; margin-top:12px;"><span style="font-family:roboto;font-size:20px; font-weight:bold;color:#111;">Qty:</span> 
										<select id="qty" style="width:4em;">
											<?php
											for($i=1;$i<=$pending_qty;$i++){
												echo "<option>$i</option>";
											}
											?>
										</select>
										</p>
										<?php } ?>
	
                                    </div>		<?php
								if($cart_show!=''){
								?>
		
			
		
<?php } ?>
		<div class="sin__desc" style="margin-top:15px;" id="button-buying">
		<button class="addtocartbtn" id="cartbtn" style=" color:black; text-decoration:none; border:none;" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Add to cart</button>

                                      <button class="addtocartbtn" id="cartbtn" style="color:black; text-decoration:none;background-image: linear-gradient(to bottom, #FDC830, #F37335);border:none;" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add'),checkout()" href="javascript:void(0)">Buy Now</button>
		
		</div>
	</div>
                                 
	</div>

</div>
    <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active" >
                                <div class="pro__tab__content__inner" style="font-family:Roboto;font-size:20px; color:black" id="prodescription">
									
                                    <?php echo $get_product['0']['description']?>
									
                                </div>
								<div id="seemore">
								<button onclick="seeMore()" style="float:right; background-color:#fff;border:none;font-family:Roboto;color:dodgerblue;outline:none;font-weight:500;">See More</button>
									</div>
								<div id="seeless">
								<button onclick="seeLess()" style="float:right; background-color:#fff;border:none;font-family:Roboto;color:dodgerblue;outline:none;font-weight:500;">See Less</button></div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
				<ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">from where this product coming?</a></li>
                        </ul>
						<div class="addressofproduct" style="font-family:Roboto;font-size:310px;">
							
						<p>Shop name:- <?php echo $get_product['0']['shop']?></p>

						<p>Shop address:- <?php echo $get_product['0']['shop_address']?></p>
						</div>
				<div class="col-md-6" >

	

    
	<style> 
	.addressofproduct {
		border-bottom:1px solid #e1e1e1;
	}
	.addressofproduct p {
		margin-top:15px;font-size:23px;font-family:Roboto;font-weight:400;color:black;}
		#seeless{color:  ;
display: none;}
	#prodescription {overflow: hidden;
			max-height: 100px;
		}
		p {
font-family: Roboto;color: #111;}
					</style>
					
										 <?php
    $pid=$_GET['id'];
 $sel="SELECT * FROM ratting where pid='$pid' and isapproved='1'";
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){
    
					?>
					
      <div class="row">
        <div class="col-md-12">
           <h4 style="font-family:Roboto;"><?php echo $row['name'];  ?></h4>
          <p>
       <?php for($i=1;$i<=$row['ratting'];$i++){ ?>
          <span class="fa fa-star checked"></span>
        <?php  }?>

        <?php for($j=1;$j<=5-$row['ratting'];$j++) {?>
       <span class="fa fa-star "></span>
        <?php  } ?>
      </p>

      <p><?php echo $row['review'] ?></p>
      <hr/>
        </div>
      </div>

    <?php  } ?>


					<form action="ins-ratting.php" method="post">
  <input type="hidden" name="pid" value="<?php echo $pid;?>">
  <p>Name</p>
  <p><input type="text" name="name" class="form-control"></p>

  <p>email</p>
  <p><input type="text" name="email" class="form-control"></p>

  <p>Ratting</p>
  <div class="rtn">
  <fieldset class="rating">
   
    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Excellent" style="display:flex" >5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Average">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Very Bad">1 star</label>
</fieldset>
</div>

<p>Review</p>
<p><textarea class="form-control" name="rv"></textarea></p>
<p><input type="submit" name="savert" value="Review" class="btn btn-primary" style="margin:30px;"></p>
  
</form>

  </div>



 	
 </div>

	
					
<script>
	
	function checkout(){
		window.location.href='<?php echo SITE_PATH?>checkout.php';
	}
		function seeMore() {
			document.getElementById("prodescription").style.maxHeight = "100%";
	document.getElementById("seemore").style.display = "none";
				document.getElementById("seeless").style.display = "block";
		}
	function seeLess() {	
		document.getElementById("prodescription").style.maxHeight = "100px";
			document.getElementById("seeless").style.display = "none";
		document.getElementById("seemore").style.display = "block";
}
		
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}

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
				alert('Quantity not avaliable');	
			}else{
				jQuery('.htc__qua').html(result);
			}
		}	
	});	
}
</script>
<?php require('footer.php')
?>