<?php 
include "../../connect.php";

$data= getAllData('delivery',null,null , false);

$stmt = $con->prepare("SELECT  delivery_id  FROM delivery ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
printSuccess('none',$data??[]);
?>