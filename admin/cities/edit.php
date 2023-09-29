<?php
include "../../connect.php";
$cityAR = filterRequest('cityar');
$cityEN = filterRequest('cityen');
$id = filterRequest('id');

$data = array(
    'city_name_ar' => $cityAR,
    'city_name_en' => $cityEN,
    'city_id' => $id
);
updateData('cities', $data,"city_id = $id");
