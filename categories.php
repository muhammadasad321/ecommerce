<?php 
require('top.php');

if(!isset($_GET['id']) && $_GET['id']!=''){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}

$cat_id=get_safe_value($con,$_GET['id']);

$sub_categories='';
if(isset($_GET['sub_categories'])){
	$sub_categories=get_safe_value($con,$_GET['sub_categories']);
}
$price_high_selected=" ";
$price_low_selected=" ";
$new_selected=" ";
$old_selected=" ";
$sort_order=" ";
if(isset($_GET['sort'])){
	$sort=get_safe_value($con,$_GET['sort']);
	if($sort=="price_high"){
		$sort_order="  order by product_attributes.price desc";
		$price_high_selected="selected";	
	}if($sort=="price_low"){
		$sort_order=" order by product_attributes.price asc";
		$price_low_selected="selected";
	}if($sort=="new"){
		$sort_order=" order by product.id desc";
		$new_selected="selected";
	}if($sort=="old"){
		$sort_order=" order by product.id asc";
		$old_selected="selected";
	}

}

if($cat_id>0){
	$get_product=get_product($con,'',$cat_id,'','',$sort_order,'',$sub_categories);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}

?>
<style>
	
	
	@media screen and (max-width:800px){ 
	
	#fullsearchbar {
		
	}
	}
	@media screen and (max-width:400px){ 
	
	
	#fullsearchbar {
		
	}
	}
	.products {
  width: 99%;
    background: #fff;
    display: flex;
		
	border-bottom:  solid #ddd;margin: 120px 10px 0 10px;}
	
	.product-inner {
		 width: 95%;
 
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    
	}
	.product-items img { 
	width: 80%;height: auto;
	}
.product-items	h2 {      
	
		text-align: left;
	}
	.product-items h2 a:hover {color: rebeccapurple;}
	
	.product-items h2 a{
		 text-decoration: none;width: 100%; margin: 0px; font-size: 25px; color: #111;max-height: 72px;font-family: Roboto,Ariel,sans-serif;	}
	.product-items h3 p {text-transform: none;color: darkgray; font-family: sans-serif;
		margin-left: 10px; position: relative; 
	}
	.free  {bottom: 20%;position: absolute;}
	
.product-items	h3 {display: flex;font-family:sans-serif;
		color: #B12704;font-weight: bold; 	}
	#productdetail {
		width: 70%;
	}
	.product-items {
		height: auto;
	padding: 10px 30px;	border-bottom: 2px solid #ddd;
		 width: 30%;
       box-sizing: border-box;
	}
	@media screen and (max-width:800px){
		#productdetail {
		
width: 55%;padding: 10px;}
		.product-items {
width: 45%; 
padding: 3px;}
		
		.product-items img { 
		width: 100%;
	}
		
		.product-items h2 a {line-height: normal;color: #222;
font-size: 15px;font-family: Roboto,Ariel,sans-serif;
		}
	.product-items	h3 {display:block;padding:;
		 font-size: 20px;width: 100%;
		text-align: left;}
		.product-items h3 p {
font-family: monospace;font-size: 15px; width: 100%; color:darkcyan;}
		.product-inner {
			justify-content: flex-start;
		}
		h2 {text-rendering: auto;
		line-height:15px;
	text-align: left;
		}
		.products {position: relative;
	 padding: 0;top: 0px;
		}
		#sort_product_id {position: absolute;
			bottom: 15px;		}
	}
	
	#sort {position: relative; top: 90px;font-weight: bold;text-align: center;
display:inline-block;width: 100%;font-family: Roboto,Ariel,sans-serif,Ariel,sans-serif;color: #111;text-align: center;}
	#sort_product_id {position: relative;
		text-align: center; background: white; outline: 2px solid black;align-content: center; margin: 0px 10px 0px 10px;
	}

</style>
<head>
<title><?php echo $categories?></title>
	</head>
<body>
	 
			<?php if(count($get_product)>0){?>
	 <div class="htc__grid__top" id="sort">
                                <div class="htc__select__option">
                                    <select class="ht__select" onchange="sort_product_drop('<?php echo $cat_id?>','<?php echo SITE_PATH?>')" id="sort_product_id">
                                        <option value="">Default sorting</option>
                                        <option value="price_low" <?php echo $price_low_selected?>>Sort by price low to high</option>
                                        <option value="price_high" <?php echo $price_high_selected?>>Sort by price high to low</option>
                                        <option value="new" <?php echo $new_selected?>>Sort by new first</option>
										<option value="old" <?php echo $old_selected?>>Sort by old first</option>
                                    </select>
                                </div>
                               
                            </div>
<div class="products">
		
	<div class="product-inner">
	
 <?php
foreach($get_product as $list){

							?>
	<div class="product-items">
		<a href="product.php?id=<?php echo $list['id']?>&name=<?php echo $list['name']?>">
		<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
		</a>
		</div>
		<div class="product-items s-line-champ-3" id="productdetail">
		<h2 class=" line-clamp" style="" ><a href="product.php?id=<?php echo $list['id']?>&name=<?php echo $list['name']?>">
		<?php echo $list['name']?>
			</a></h2>
		<h3 style="position:relative;">
			<sup><i class="fa fa-rupee" style="font-size:14px;"></i></sup><?php echo $list['price']?>
		<p>Free Delivery by Fringoman</p>
		
			</h3>
			

		</div>
	
	<?php }?>
	</div>
 
	</div>
<?php } else { 
						echo "<h3 style='color:#fff;font-size:2em;background-color:;height:253px;float:left;width:100%;text-align:center;'>" .'Oops! Data not Found' . "</h3>";
					} ?>
</body>  

<script>
function sort_product_drop(cat_id,site_path){
	var sort_product_id=jQuery('#sort_product_id').val();
	window.location.href=site_path+"categories.php?id="+cat_id+"&sort="+sort_product_id;
}
</script>
<!-- End Product Grid -->
        <!-- End Banner Area -->
<?php require('footer.php')?>        

