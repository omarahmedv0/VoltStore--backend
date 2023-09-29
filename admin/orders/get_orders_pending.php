<?php 
include "../../connect.php";

$data= getAllData('ordersview',"status = 0",null , false);
printSuccess('none',$data??[]);
?>