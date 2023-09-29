<?php
include "../connect.php";

$address_no  = filterRequest('address_no');
$name = filterRequest('addressname');
$city = filterRequest('cityid');
$street = filterRequest('street');
$phoneNumber = filterRequest('phoneNumber');
$addetionalDetails = filterRequest('addetionalDetails');

$data = array(

    'address_name' => $name,
    "city_id" => $city,
    "address_street" => $street,
    "address_phone_number" => $phoneNumber,
    "additional_details" => $addetionalDetails,

);
updateData('address', $data, "address_no = $address_no");
