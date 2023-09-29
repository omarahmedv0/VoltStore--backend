<?php
include "../connect.php";

$userId = filterRequest('user_id');
$city = filterRequest('cityid');
$name = filterRequest('addressname');
$street = filterRequest('street');
$phoneNumber = filterRequest('phoneNumber');
$addetionalDetails = filterRequest('addetionalDetails');
$lat = filterRequest('lat');
$long = filterRequest('long');

$data = array(
    "address_userid" => $userId,
    "address_long" => $long,
    "address_lat" => $lat,
    'address_name' => $name,
    "city_id" => $city,
    "address_street" => $street,
    "address_phone_number" => $phoneNumber,
    "additional_details" => $addetionalDetails,
);

insertData('address', $data);
