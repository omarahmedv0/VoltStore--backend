<?php 
include "../connect.php";
$userId = filterRequest('userid');

$data = getAllData('notifications',"notifications_userid =$userId ORDER BY `notifications`.`notifications_datetime` DESC",null,false);

printSuccess('successfully',$data??[]);
