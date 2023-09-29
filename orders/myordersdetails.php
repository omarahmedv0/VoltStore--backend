<?php
include "../connect.php";
$orderId = filterRequest('orderId');
$userId = filterRequest('userid');

$stmt = $con->prepare("SELECT  * FROM myordersdetails WHERE   order_id = $orderId AND order_userid =$userId ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
$allData = array();
if ($count > 0) {
    $allData['status'] = 'success';
    $allData['message'] = 'success';
    $allData['order_details'] = array(
        'order_id' => $data[0]['order_id'],
        'order_subprice' => $data[0]['order_subprice'],
        'order_totalprice' => $data[0]['order_totalprice'],
        'order_status' => $data[0]['status'],
        'order_paymentmethod' => $data[0]['order_paymentmethod'],
        'order_datetime' => $data[0]['order_datetime'],
        'order_deliveryprice' => $data[0]['order_deliveryprice'],
        'order_discount' => $data[0]['order_discount'],
    );
    $allData['address_details'] = array(
        'address_name' => $data[0]['address_name'],
        'city_id' => $data[0]['city_id'],
        'address_street' => $data[0]['address_street'],
        'additional_details' => $data[0]['additional_details'],
        'address_phone_number' => $data[0]['address_phone_number'],
        'address_no' => $data[0]['address_no'],

    );
    $allData['products_details'] = $data;
    echo json_encode($allData);
}
