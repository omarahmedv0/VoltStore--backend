<?php
include "../connect.php";
$productid = filterRequest('productid');
$data = array();

$stmt1 = $con->prepare("SELECT *  FROM products_rating  WHERE rate_productid = $productid GROUP BY  products_rating.rate_userid");
$stmt2 = $con->prepare("SELECT SUM(products_rating.rate_star)as sum_stars ,COUNT(products_rating.user_id) as count_review FROM products_rating  WHERE rate_productid = $productid");
$stmt1->execute();
$ratingData = $stmt1->fetchAll(PDO::FETCH_ASSOC);
$stmt2->execute();
$starsandCountReviews = $stmt2->fetchAll(PDO::FETCH_ASSOC);
if ($ratingData == null) {
    $data['status'] = 'success';
    $data['message']   = 'none';
    $data['avrg_stars'] = 0;
    $data['count_reviews']   = '0';
    $data['data'] = [];
    echo  json_encode($data);
} else {
    $data['status'] = 'success';
    $data['message']   = 'none';
    $data['avrg_stars'] = round( $starsandCountReviews[0]['sum_stars'] / $starsandCountReviews[0]['count_review']);
    $data['count_reviews']   =  $starsandCountReviews[0]['count_review'];
    $data['data'] = $ratingData ?? [];
    echo  json_encode($data);
}
