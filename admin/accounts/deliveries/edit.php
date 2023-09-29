<?php 
include "../../../connect.php";

$id = filterRequest('id');
$name = filterRequest('name');
$email = filterRequest('email');
$phone = filterRequest('phone');
$password = filterRequest('password');
$data = array(
    'delivery_name'=>$name,
    'delivery_email'=>$email,
    'delivery_password'=>$password,
    'delivery_phone'=>$phone
);
updateData('delivery',$data,"delivery_id = $id");
