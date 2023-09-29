<?php

include "../connect.php";

$username = filterRequest("username");
$password = filterRequest("password");
$email = filterRequest("email");
$phone = filterRequest("phone");

$stmt = $con->prepare("SELECT * FROM users WHERE user_email = ? OR user_phone = ? ");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();

if ($count > 0) {
   echo json_encode(array("status" => "failure", "message" => "PHONE OR EMAIL was used"));
} else {
   $data = array(
      "user_name" => $username,
      "user_email" => $email,
      "user_phone" => $phone,
      "user_password" => $password,
      "user_image" => 'default.png',
   );
   $count = insertData('users', $data, false);
   if ($count > 0) {

      $data = getData('users', 'user_email= ? AND user_password = ?', array($email, $password));
      printSuccess('signup success', $data);
   } else {
      printFailure();
   }
}
