<?php
include "../../connect.php";
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
$category1 = filterRequest('cat1');
$category2 = filterRequest('cat2');

$imagename = imageUpload('../../upload/products/', 'file');

$productData = array(
    'product_name_ar' => $nameAR,
    'product_name_en' => $nameEN,
    'product_desc_ar' => $descAR,
    'product_desc_en' => $descEN,
    'product_image' => $imagename,
    'product_count' => $count,
    'product_active' => 1,
    'product_oldprice' => $price,
    'product_descount' => $discount,
);
 insertData('products', $productData, false);


$stmt = $con->prepare('SELECT MAX(product_id) FROM `products`');
$stmt->execute();
$maxId = $stmt->fetchColumn();

$productColorData = array(
    'product_id' => $maxId,
    'color1' => $color1,
    'color2' => $color2,
    'color3' => $color3,

);
insertData('product_color', $productColorData, false);

$productSizeData = array(
    'product_id' => $maxId,
    'size1' => $size1,
    'size2' => $size2,
    'size3' => $size3,

);
 insertData('product_size', $productSizeData, false);

$cat1data = array(
    'id_cat' => 1,
    'id_product' => $maxId
);
insertData('products_categories', $cat1data, false);
if ($category1 != '' && $category2 != '') {
    insertData('products_categories', array("id_cat" => $category1, 'id_product' => $maxId,), false);
    insertData('products_categories', array("id_cat" => $category2, 'id_product' => $maxId,), false);
} else if ($category1 == '') {
    insertData('products_categories', array("id_cat" => $category2, 'id_product' => $maxId,), false);
} else {
    insertData('products_categories', array("id_cat" => $category1, 'id_product' => $maxId,), false);
}
    printSuccess();