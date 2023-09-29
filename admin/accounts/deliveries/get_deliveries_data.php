<?php 
include "../../../connect.php";

$data= getAllData('delivery',null,null , false);
printSuccess('none',$data??[]);
?>