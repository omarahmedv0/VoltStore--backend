<?php 
include "../../connect.php";
$cityID = filterRequest('cityid');
$cost = filterRequest('cost');

$data = array(
    'shipping_cost'=>$cost,
    'city_id'=>$cityID,
   
);
insertData('shipping_cost',$data);
