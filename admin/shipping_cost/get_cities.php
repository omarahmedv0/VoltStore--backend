<?php
include "../../connect.php";

$stmt = $con->prepare("SELECT cities.* FROM cities WHERE cities.city_id NOT IN (SELECT shipping_cost.city_id FROM `shipping_cost`)");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
printSuccess('none',$data??[]);


