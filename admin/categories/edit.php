<?php
include "../../connect.php";

$nameAR  = filterRequest('nameAR');
$nameEN = filterRequest('nameEN');
$cID = filterRequest('id');
$oldimage = filterRequest('oldimage');

$imagename = imageUpload("../../upload/categories/", "file");
if ($imagename == "empty") {
    $data = array(
        'category_name_ar' => $nameAR,
        'category_name_en' => $nameEN
    );
} else {
    deleteFile('../../upload/categories/', $oldimage);
    $data = array(
        'category_name_ar' => $nameAR,
        'image' => $imagename,
        'category_name_en' => $nameEN
    );
}
updateData('categories', $data, "category_id  = $cID", true);
