<?php 
include "../../connect.php";
$cityAR = filterRequest('cityar');
$cityEN = filterRequest('cityen');

$data = array(
    'city_name_ar'=>$cityAR,
    'city_name_en'=>$cityEN,
   
);
insertData('cities',$data);
