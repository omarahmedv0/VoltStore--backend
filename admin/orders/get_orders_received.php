<?php 
include "../../connect.php";

$data= getAllData('ordersview',"status = 4",null , false);
printSuccess('none',$data??[]);
?>