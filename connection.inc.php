<?php
session_start();
$con=mysqli_connect("localhost","u894028973_fringoman","Fringoman@123","u894028973_fringoman");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
define('SITE_PATH','/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
//product images save here
define('FEATURE_PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/featureproductimages/');
define('FEATURE_PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/featureproductimages/');

//PAYMENT COMEPLETE
define('INSTAMOJO_REDIRECT',SITE_PATH.'payment_complete.php');
//payment validation keys
define('INSTAMOJO_KEY','test_0a803f8d7c9397da7037936e395');
define('INSTAMOJO_TOKEN','test_5a1ecae50d68047eb28a9b8a2be');

define('SMTP_EMAIL','support@fringoman.in');
define('SMTP_PASSWORD','Fringoman123');

?>