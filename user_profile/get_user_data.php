<?php 
include "../connect.php";
$userid = filterRequest('userid');
getAllData('users',"user_id = $userid")
?>