<?php 
include "../../connect.php";


$id = filterRequest('id');

deleteData('coupons',"coupon_id = $id");
