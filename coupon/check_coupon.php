<?php
include "../connect.php";

$coupon = filterRequest("coupon_name");
$datenow = date('Y-m-d H:i:s');

$stmt = $con->prepare("SELECT * FROM coupons WHERE coupon_name = '$coupon' AND coupon_expiredata > '$datenow' AND coupon_count > 0");
$stmt->execute();
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
valid($count, 'coupon is correct','coupon is not valid', $data);


