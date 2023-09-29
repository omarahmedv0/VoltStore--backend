<?php 
include "../connect.php";
$userId = filterRequest('userid');

getAllData('ordersview',"order_userid =$userId");
?>