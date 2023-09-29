<?php
include "../connect.php";

$text = filterRequest('text');
$data = getAllData(
    "SELECT products.* , (product_oldprice-(product_descount*product_oldprice / 100)) as product_newprice 
    FROM `products`
    WHERE products.product_name_en 
    LIKE '%$text%' 
    OR products.product_name_ar LIKE '%$text %'",
    null,
    NULL,
    false,
    '',
    true,
);

printSuccess('successfully', $data);
