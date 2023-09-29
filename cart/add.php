<?php
include "../connect.php";

$userId = filterRequest('user_id');
$productId = filterRequest('product_id');
$qty = filterRequest('product_quantity');
$color = filterRequest('product_color');
$size = filterRequest('product_size');

$data = array(
    "cart_userid" => $userId,
    "cart_productid" => $productId,
    "product_quantity" => $qty,
    "product_size" => $size,
    "product_color" => $color,
);
insertData('cart', $data);
