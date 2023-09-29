<?php 
include "../../connect.php";
$name = filterRequest('name');
$count = filterRequest('count');
$discount = filterRequest('discount');
$expireDate = filterRequest('date');
$data = array(
    'coupon_count'=>$count,
    'coupon_name'=>$name,
    'coupon_discount'=>$discount,
    'coupon_expiredata'=>$expireDate
);
insertData('coupons',$data);
