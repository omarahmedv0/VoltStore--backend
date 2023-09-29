<?php
include "../connect.php";
$userid = filterRequest('userid');
$productid = filterRequest('productid');
$star = filterRequest('star');
$comment = filterRequest('comment');
$data = array(
    'rate_userid' => $userid,
    'rate_productid' => $productid,
    'rate_comment' => $comment,
    'rate_star' => $star
);

    insertData('rating', $data,);

