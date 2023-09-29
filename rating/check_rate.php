<?php
include "../connect.php";

$userid = filterRequest('userid');
$productid = filterRequest('productid');

$stmt = $con->prepare("SELECT * FROM rating WHERE rate_userid = '$userid' AND rate_productid = '$productid'");
$stmt->execute();
$count = $stmt->rowCount();

if ($count > 0) {
    printSuccess(true);
} else {
    printSuccess(false);
}
