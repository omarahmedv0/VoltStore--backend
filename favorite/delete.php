<?php
include "../connect.php";


$userId = filterRequest('user_id');
$productId = filterRequest('product_id');


$stmt = $con->prepare("SELECT  * FROM favorite WHERE fav_userid = $userId AND fav_productid = $productId");
$stmt->execute();         
$count = $stmt->rowCount();
if ($count > 0) {
   $data= deleteData("favorite", "fav_userid = $userId AND fav_productid = $productId");

} else {
    printFailure('Product already deleted');
}
