<?php
include "../connect.php";

$addressId = filterRequest('address_id');
$userId = filterRequest('user_id');
$deliveryPrice = filterRequest('delivery_price');
$subPrice = filterRequest('sub_price');
$discount =  filterRequest('discount');
$totalPrice = $subPrice + $deliveryPrice;
$couponID = filterRequest('couponid');
$paymentMethod = filterRequest('payment_method');
$datenow = date('Y-m-d H:i:s');

$stmt = $con->prepare("SELECT * FROM coupons WHERE coupon_id = '$couponID' AND coupon_expiredata > '$datenow' AND coupon_count > 0");
$stmt->execute();
$couponCount = $stmt->rowCount();
if ($couponCount > 0) {
    $totalPrice = $totalPrice - $discount;
    $stmt = $con->prepare("UPDATE  `coupons` SET `coupon_count` = `coupon_count` -1 WHERE coupon_id = $couponID ");
    $stmt->execute();
}


$orderData = array(
    "order_addressid" => $addressId,
    "order_userid" => $userId,
    'order_couponid' => $couponID,
    'order_paymentmethod' => $paymentMethod,
    'order_totalprice' => $totalPrice,
    'order_deliveryprice' => $deliveryPrice,
    'order_subprice' => $subPrice,
    'order_discount' => $discount,
);

$count =  insertData('orders', $orderData, false);
if ($count > 0) {
    $stmt = $con->prepare('SELECT MAX(order_id) FROM `orders` WHERE order_userid =?');
    $stmt->execute(array($userId));
    $maxId = $stmt->fetchColumn();
    
    $data = array(
        'cart_orders' => $maxId
    );
    updateData('cart', $data, "cart_userid  = $userId AND cart_orders = 0");
}
