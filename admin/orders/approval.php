<?php
include "../../connect.php";

$orderid = filterRequest('orderid');
$userid = filterRequest('userid');
$deliveryid = filterRequest('deliveryid');

$data = array(
    'status' => '1',
    'order_deliveryid' => $deliveryid,
);
$count = updateData('orders', $data, "order_id =$orderid AND status = 0", false);

sendandInsertNotifications($userid, "Order NO #$orderid", 'Your order has been approved', "طلب رقم #$orderid", "لقد تم الموافقة علي طلبك", 'approved.png', "user$userid", 'none', 'en',);
printSuccess();
