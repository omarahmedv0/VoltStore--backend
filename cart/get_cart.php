<?php
include '../connect.php';
$userId = filterRequest('user_id');



$cartdata = getAllData(
  " SELECT mycart.* , (mycart.product_newprice*countitems) as totalprice
  FROM mycart 
  WHERE mycart.cart_userid = ?",
  null,
  array($userId),
  false,
  'none',
  true
);



$stmt = $con->prepare("SELECT  sum(mycart.countitems) as countitems,sum((product_newprice *countitems)) as subCartprice FROM `mycart` 
WHERE mycart.cart_userid = $userId");
$stmt->execute();
$totalCartCountPrice = $stmt->fetch(PDO::FETCH_ASSOC);

$data = array(
  'cart_products' => $cartdata,
  'cart_data' => $totalCartCountPrice['countitems']==null ? array('countitems' => '0', 'subCartprice' => '0'):$totalCartCountPrice ,
);

printSuccess('successfully', $data);
