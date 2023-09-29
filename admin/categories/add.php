<?php
include "../../connect.php";
$nameAR = filterRequest('nameAr');
$nameEN = filterRequest('nameEN');

$imagename = imageUpload('../../upload/categories/','file');
$data = array(
    'category_name_ar'=>$nameAR,
    'image'=>$imagename,
    'category_name_en'=>$nameEN
);
insertData('categories',$data);
