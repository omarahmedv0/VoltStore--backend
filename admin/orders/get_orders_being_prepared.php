<?php 
include "../../connect.php";

$data= getAllData('ordersview',"status = 1",null , false);
printSuccess('none',$data??[]);
?>