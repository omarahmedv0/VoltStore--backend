<?php
include "../connect.php";
$productid = filterRequest('productid');

$data = getAllData('product_color', "product_id =$productid ", null, false);


if ($data[0]['color1'] == "" && $data[0]['color2'] == "") {
    $edited = array(
        $data[0]['color3'],
    );
} else if ($data[0]['color1'] == "" && $data[0]['color3'] == "") {
    $edited = array(
        $data[0]['color2'],
    );
} else if ($data[0]['color2'] == "" && $data[0]['color3'] == "") {
    $edited = array(
        $data[0]['color1'],
    );
} else if ($data[0]['color1'] == "") {
    $edited = array(
        $data[0]['color2'],
        $data[0]['color3'],

    );
} else if ($data[0]['color2'] == "") {
    $edited = array(
        $data[0]['color1'],
        $data[0]['color3'],

    );
} else if ($data[0]['color3'] == "") {
    $edited = array(
        $data[0]['color1'],
        $data[0]['color2'],

    );
} else {
    $edited = array(
        $data[0]['color1'],
        $data[0]['color2'],
        $data[0]['color3'],

    );
}

$result = array(
    'status' => 'success',
    'message' => 'none',
    'productid' => $data[0]['product_id'],
    'product_color_id' => $data[0]['product_color_id'],
    'data' => $edited
);
echo  json_encode($result);
