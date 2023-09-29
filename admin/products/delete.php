<?php 
include "../../connect.php";
$id = filterRequest('id');
$imageName =filterRequest('imageName');
deleteFile('../../upload/products/',$imageName);
deleteData('products',"product_id = $id");
