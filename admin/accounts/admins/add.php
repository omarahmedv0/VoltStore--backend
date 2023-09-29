<?php 
include "../../../connect.php";
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
insertData('admin',$data);
