<?php
include "../connect.php";

$userid = filterRequest('user_id');
$stmt = $con->prepare("SELECT  myfavorites.* , (product_oldprice-(product_descount*product_oldprice / 100)) as product_newprice FROM myfavorites WHERE user_id = $userid");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess('get favorite data success', $data);
} else {
    printSuccess('get favorite data success', $data);
}
