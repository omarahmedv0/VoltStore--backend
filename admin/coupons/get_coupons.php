<?php 
include "../../connect.php";

$data= getAllData('coupons',null,null , false);
printSuccess('none',$data??[]);
?>