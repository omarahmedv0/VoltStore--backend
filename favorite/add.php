<?php

include "../connect.php";
$userId = filterRequest('user_id');
$productId = filterRequest('product_id');
$data = array(
    "fav_userid" => $userId,
    "fav_productid" => $productId,
);
$stmt = $con->prepare("SELECT  * FROM favorite WHERE fav_userid = $userId AND fav_productid = $productId");
$stmt->execute();
$count = $stmt->rowCount();
if ($count == 0) {
    insertData('favorite', $data);
} else {
    printFailure('Product already added');
}
?>

