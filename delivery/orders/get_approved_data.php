<?php 
include "../../connect.php";
$deliveryid = filterRequest('deliveryid');

$stmt = $con->prepare("SELECT * FROM ordersview WHERE `order_deliveryid` =? AND `status` = 2");
$stmt->execute(array($deliveryid));
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
printSuccess('none',$data??[]);
?>