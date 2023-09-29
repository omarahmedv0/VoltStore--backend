<?php 
include "../../../connect.php";

$id = filterRequest('id');
$name = filterRequest('name');
$email = filterRequest('email');
$phone = filterRequest('phone');
$password = filterRequest('password');
$data = array(
    'admin_name'=>$name,
    'admin_email'=>$email,
    'admin_password'=>$password,
    'admin_phone'=>$phone
);
updateData('admin',$data,"admin_id = $id");
