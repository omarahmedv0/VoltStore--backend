<?php
include "../connect.php";

$name  = filterRequest('username');
$pass = filterRequest('password');
$phone = filterRequest('phone');
$email = filterRequest('email');
$userid = filterRequest('userid');
$oldimage = filterRequest('oldimage');

$imagename = imageUpload("../upload/userprofile/", "file");
if ($imagename == "empty") {
    $data = array(
        'user_phone' => $phone,
        "user_id" => $userid,
        "user_name" => $name,
        "user_password" => $pass,
        "user_email" => $email,

    );
} else {
    if ($oldimage == 'default.png') {
        $data = array(
            'user_phone' => $phone,
            "user_id" => $userid,
            "user_name" => $name,
            "user_password" => $pass,
            "user_email" => $email,
            'user_image' => $imagename,

        );
    } else {
        deleteFile("../upload/userprofile", $oldimage);
        $data = array(
            'user_phone' => $phone,
            "user_id" => $userid,
            "user_name" => $name,
            "user_password" => $pass,
            "user_email" => $email,
            'user_image' => $imagename,

        );
    }
}
updateData('users', $data, "user_id = $userid",false);
getAllData('users',"user_id = $userid");

