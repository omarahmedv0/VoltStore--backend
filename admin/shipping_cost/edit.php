<?php 
include "../../connect.php";

$id = filterRequest('id');
$cost = filterRequest('name');
$cityID = filterRequest('cityid');

$data = array(
    'shipping_cost'=>$cost,
    'id'=>$id,
    'city_id'=>$cityID,
);
updateData('shipping_cost',$data,"id = $id");
