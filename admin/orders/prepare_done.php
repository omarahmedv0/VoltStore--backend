<?php
include "../../connect.php";

$orderid = filterRequest('orderid');
$userid = filterRequest('userid');

$data = array('status' => '2',);
$count = updateData('orders', $data, "order_id =$orderid AND status = 1", false);

    sendandInsertNotifications($userid, "Order NO #$orderid", 'Your order ready fo delivery',"طلب رقم #$orderid","طلبك جاهز للتسليم", 'approved.png', "user$userid", 'none', 'en',);

printSuccess();