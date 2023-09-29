<?php
include "../../connect.php";

$orderid = filterRequest('orderid');
$userid = filterRequest('userid');

$data = array('status' => '5',);
$count = updateData('orders', $data, "order_id =$orderid AND status = 0", false);

    sendandInsertNotifications($userid, "Order NO #$orderid", 'Your order has been cancel',"طلب رقم #$orderid"," لقد تم الغاء طلبك", 'approved.png', "user$userid", 'none', 'en',);
    printSuccess();
