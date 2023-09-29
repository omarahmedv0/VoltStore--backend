
<?php
include "../connect.php";

$stmt = $con->prepare("SELECT  * FROM cities ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    printSuccess('get address data success', $data);
} else {
    printFailure();
}
