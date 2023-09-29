
<?php
include "../connect.php";
$productid = filterRequest('productid');

$data = getAllData('product_size', "product_id =$productid ", null, false);

if ($data[0]['size1'] == "" && $data[0]['size2'] == "") {
    $edited = array(
        $data[0]['size3'],
    );
} else if ($data[0]['size1'] == "" && $data[0]['size3'] == "") {
    $edited = array(
        $data[0]['size2'],
    );
} else if ($data[0]['size2'] == "" && $data[0]['size3'] == "") {
    $edited = array(
        $data[0]['size1'],

    );
} else if ($data[0]['size1'] == "") {
    $edited = array(
        $data[0]['size2'],
        $data[0]['size3'],

    );
} else if ($data[0]['size2'] == "") {
    $edited = array(
        $data[0]['size1'],
        $data[0]['size3'],

    );
} else if ($data[0]['size3'] == "") {
    $edited = array(
        $data[0]['size1'],
        $data[0]['size2'],

    );
} else {
    $edited = array(
        $data[0]['size1'],
        $data[0]['size2'],
        $data[0]['size3'],

    );
}

$result = array(
    'status' => 'success',
    'message' => 'none',
    'productid' => $data[0]['product_id'],
    'product_siz_id' => $data[0]['product_size_id'],
    'data' => $edited
);
echo  json_encode($result);
