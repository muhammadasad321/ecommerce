<?php
session_start();
$con=mysqli_connect("localhost","u894028973_fringoman","Fringoman@123","u894028973_fringoman");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
define('SITE_PATH','/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

define('FEATURE_PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/featureproductimages/');
define('FEATURE_PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/featureproductimages/');
?>