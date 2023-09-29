<?php

include "../../connect.php";

$password = filterRequest("password");
$email = filterRequest("email");
$stmt = $con->prepare("SELECT * FROM `admin` WHERE admin_email = ? AND  admin_password = ?");
$stmt->execute(array($email, $password));
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
valid($count, 'Login Success', 'Incorrect E-mail or password', $data);
