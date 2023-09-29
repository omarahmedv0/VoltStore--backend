<?php 
include "../../connect.php";
$deliveryid = filterRequest('deliveryid');

$data= getAllData('ordersview',"order_deliveryid =$deliveryid AND status = 4",null , false);
printSuccess('none',$data??[]);
?>