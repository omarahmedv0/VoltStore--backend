<?php
include "../../connect.php";

$stmt = $con->prepare("SELECT shipping_cost.*, cities.city_name_en , cities.city_name_ar FROM `shipping_cost` 
INNER JOIN cities
ON shipping_cost.city_id = cities.city_id");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
printSuccess('none',$data??[]);
