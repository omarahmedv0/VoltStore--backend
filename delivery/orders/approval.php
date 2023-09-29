<?php
include "../../connect.php";

$orderid = filterRequest('orderid');
$userid = filterRequest('userid');

$data = array('status' => '3',);
updateData('orders', $data, "order_id =$orderid AND status = 2", false);

sendandInsertNotifications($userid, "Order NO #$orderid",'Your order on the way',"طلب رقم #$orderid","طلبك علي الطريق", 'approved.png', "user$userid", 'none', 'en',);

sendGCM("Order NO #$orderid", 'The order has been approved by delivery', 'admin', 'none', 'none');
printSuccess();