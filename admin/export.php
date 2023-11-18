<?php
require('connection.inc.php');
$sql="select sum(total_price),shop_id,shop,added_on from `order` where order_status='5' and shop_id and date(added_on) = CURDATE() group by total_price asc";
$res=mysqli_query($con,$sql);
$html='<table><tr><td>ID</td><td>Shop Name</td><td>Today Earning</td><td>Date of Earning</td>';
while($row=mysqli_fetch_assoc($res)){
    $html.='<tr><td>'.$row['shop_id'].'</td><td>'.$row['shop'].'</td><td>'.$row['sum(total_price)'].'</td><td>'.$row['added_on'].'</td>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=Vendor-Earning-Report.xls');
echo $html;
    ?>

