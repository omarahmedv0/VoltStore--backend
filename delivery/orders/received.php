<?php
include "../../connect.php";

$orderid = filterRequest('orderid');
$userid = filterRequest('userid');

$data = array('status' => '4',);
updateData('orders', $data, "order_id =$orderid AND status = 3", false);

sendandInsertNotifications($userid, "Order NO #$orderid", 'Your order has been received',"طلب رقم #$orderid","لقد تم استلام طلبك. تهانينا!", 'approved.png', "user$userid", 'none', 'en',);

sendGCM("Order NO #$orderid", 'The order has been received', 'admin', 'none', 'none');
printSuccess();