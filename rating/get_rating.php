<?php
include "../connect.php";

$stmt = $con->prepare("SELECT * FROM `rating`");
$stmt->execute();
$count = $stmt->rowCount();
$data= $stmt->fetchAll(PDO::FETCH_ASSOC);

valid($count,'success','failere',$data);