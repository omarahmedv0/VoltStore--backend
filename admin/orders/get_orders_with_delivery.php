<?php 
include "../../connect.php";

$data= getAllData('ordersview',"status = 2 OR status = 3",null , false);
printSuccess('none',$data??[]);
?>