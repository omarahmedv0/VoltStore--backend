<?php 
include "../connect.php";


$city_id  = filterRequest('city_id');

$stmt = $con->prepare('SELECT shipping_cost.shipping_cost FROM `shipping_cost`  WHERE `city_id`= ?');
$stmt->execute(array($city_id));
$data = $stmt->fetch(PDO::FETCH_ASSOC);

printSuccess('',$data);