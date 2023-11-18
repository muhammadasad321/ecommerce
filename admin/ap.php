<?php
require('top.inc.php');


$id=$_GET['id'];

$upd="UPDATE ratting SET isapproved='1' WHERE id='$id'";
$con->query($upd);



?>
<script>
window.location.href='ratting.php';
</script>