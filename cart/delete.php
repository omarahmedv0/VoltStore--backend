<?php
include "../connect.php";

$userId = filterRequest('user_id');
$productId = filterRequest('product_id');
$color = filterRequest('product_color');
$size = filterRequest('product_size');

$stmt = $con->prepare("DELETE FROM `cart`  WHERE product_size =? AND product_color=? AND cart_userid = ? AND cart_productid = ? AND cart_orders = 0");
$stmt->execute(array($size,$color,$userId,$productId));

printSuccess('NONE');