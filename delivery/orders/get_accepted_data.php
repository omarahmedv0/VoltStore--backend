<?php 
include "../../connect.php";
$deliveryid = filterRequest('deliveryid');

$data= getAllData('ordersview',"order_deliveryid =$deliveryid AND status = 3",null , false);
printSuccess('none',$data??[]);
?>