<?php 
include "../../connect.php";
$cID = filterRequest('id');
$imageName =filterRequest('imageName');
deleteFile('../../upload/categories/',$imageName);
deleteData('categories',"category_id = $cID")
?>