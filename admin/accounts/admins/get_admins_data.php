<?php 
include "../../../connect.php";

$data= getAllData('admin',null,null , false);
printSuccess('none',$data??[]);
?>