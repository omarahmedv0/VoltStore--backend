<?php
include "../connect.php";
$userid = filterRequest('userid');
$productid = filterRequest('productid');
$star = filterRequest('star');
$comment = filterRequest('comment');
$data = array(
    'rate_comment' => $comment,
    'rate_star' => $star
);
updateData('rating',$data,"rate_userid = $userid AND rate_productid = $productid");

