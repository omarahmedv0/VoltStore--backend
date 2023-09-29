<?php
include "../connect.php";
$orderid = filterRequest('orderid');
updateData('orders', array('status' => '5'), "order_id =$orderid AND status = 0");
