
<?php
include "../connect.php";

$userid = filterRequest('userid');
$stmt = $con->prepare("SELECT  * FROM `addressview` WHERE address_userid   = $userid");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess('get address data success', $data);
} else {
    printSuccess('get address data success', $data);
}


