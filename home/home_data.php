<?php
include "../connect.php";

$allData = array();
$userid = filterRequest('userid');

$categoriesData = getAllData('categories', null, null, false);
$banersData = getAllData('banners', null, null, false);

$popularProducts = getAllData(
    'SELECT products.* , 1 as is_fav , (product_oldprice-(product_descount*product_oldprice / 100)) as product_newprice
FROM `favorite`
INNER JOIN products
ON products.product_id = fav_productid
and fav_userid = ?
INNER JOIN products_categories
ON products_categories.id_cat = 3
AND products_categories.id_product = fav_productid
UNION ALL
SELECT products.*, 0 as is_fav , (product_oldprice-(product_descount*product_oldprice / 100)) as product_newprice FROM products_categories
INNER JOIN products
ON products_categories.id_product =  products.product_id
and products_categories.id_cat = 3
WHERE product_id NOT IN (SELECT products.product_id FROM `favorite`
INNER JOIN products ON products.product_id = fav_productid and fav_userid = ? 
INNER JOIN products_categories ON products_categories.id_cat = 3
 AND products_categories.id_product = fav_productid 
 AND fav_userid = ?);',
    null,
    array($userid, $userid, $userid),
    false,
    'none',
    true
);

if ($categoriesData > 0 && $popularProducts > 0) {
    $allData['status'] = 'success';
    $allData['categories'] = $categoriesData;
    $allData['banners'] = $banersData;

    $allData['popular'] = $popularProducts;
    echo json_encode($allData);
} else {
    $allData['status'] = 'failere';
    echo json_encode($allData);
}
