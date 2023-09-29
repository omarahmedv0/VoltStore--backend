<?php
include "../../connect.php";

$id = filterRequest('id');
$nameAR = filterRequest('nameAR');
$nameEN = filterRequest('nameEN');
$descAR = filterRequest('descAR');
$descEN = filterRequest('descEN');
$count = filterRequest('count');
$price = filterRequest('price');
$discount = filterRequest('discount');
$color1 = filterRequest('color1');
$color2 = filterRequest('color2');
$color3 = filterRequest('color3');
$size1 = filterRequest('size1');
$size2 = filterRequest('size2');
$size3 = filterRequest('size3');
$oldimage = filterRequest('oldimage');

$imagename = imageUpload('../../upload/products/', 'file');

if ($imagename == "empty") {
    $productData = array(
        'product_name_ar' => $nameAR,
        'product_name_en' => $nameEN,
        'product_desc_ar' => $descAR,
        'product_desc_en' => $descEN,
        'product_count' => $count,
        'product_oldprice' => $price,
        'product_descount' => $discount,
    );
} else {
    deleteFile('../../upload/products/', $oldimage);
    $productData = array(
        'product_name_ar' => $nameAR,
        'product_name_en' => $nameEN,
        'product_desc_ar' => $descAR,
        'product_desc_en' => $descEN,
        'product_image' => $imagename,
        'product_count' => $count,
        'product_oldprice' => $price,
        'product_descount' => $discount,
    );
}
$count1 = updateData('products', $productData, "product_id = $id",false);



$productColorData = array(
    'color1' => $color1,
    'color2' => $color2,
    'color3' => $color3,

);
$count2 = updateData('product_color', $productColorData,"product_id = $id", false);

$productSizeData = array(
    'size1' => $size1,
    'size2' => $size2,
    'size3' => $size3,
);
$count3 = updateData('product_size', $productSizeData,"product_id = $id", false);


    printSuccess();
