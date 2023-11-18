<?php

include("top.php");
if(isset($_POST['savert'])){

	$name=$_POST['name'];
	$email=$_POST['email'];
	$ratting=$_POST['rating'];
	$rv=$_POST['rv'];
	$pid=$_POST['pid'];

	$ins="INSERT INTO ratting SET name='$name',email='$email',ratting='$ratting',review='$rv',pid='$pid'";
	$con->query($ins);

	?>
	<script >
		alert("Your review under modaration");
		window.location='product.php?id=<?php echo $pid ?>';
	</script>

	<?php

}
?>