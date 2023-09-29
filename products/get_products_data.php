<?php
include "../connect.php";

$allData = array();
$categoryid = filterRequest('category_id');
$userid = filterRequest('userid');

$Products = getAllData(
    'SELECT products.* , 1 as is_fav ,(product_oldprice-(product_descount*product_oldprice / 100)) as product_newprice
FROM `favorite`
INNER JOIN products
ON products.product_id = fav_productid
and fav_userid =?
INNER JOIN products_categories
ON products_categories.id_cat =?
AND products_categories.id_product = fav_productid

UNION ALL
SELECT products.*, 0 as is_fav ,(product_oldprice-(product_descount*product_oldprice / 100)) as product_newprice 
FROM products_categories
INNER JOIN products
ON products_categories.id_product =  products.product_id
and products_categories.id_cat =?
WHERE product_id NOT IN (SELECT products.product_id FROM `favorite`
INNER JOIN products ON products.product_id = fav_productid and fav_userid =? 
INNER JOIN products_categories ON products_categories.id_cat =?
 AND products_categories.id_product = fav_productid 
 AND fav_userid =?);',
    null,
    array($userid, $categoryid, $categoryid, $userid, $categoryid, $userid,),
    false,
    'none',
    true
);


if ($Products > 0) {
    $allData['status'] = 'success';
} else {
    $allData['status'] = 'failere';
}
$allData['products'] = $Products;

echo json_encode($allData);
