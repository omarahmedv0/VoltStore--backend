<?php 
include "../connect.php";
$userId = filterRequest('userid');

$data= getAllData('ordersview',"order_userid =$userId AND status = 4",null , false);
printSuccess('none',$data??[]);
?>