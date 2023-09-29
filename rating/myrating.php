<?php
include "../connect.php";
$userid = filterRequest('userid');

$data = getAllData('myrating',"rate_userid = '$userid'",null,false);

printSuccess('none',$data ??[]);