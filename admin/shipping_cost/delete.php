<?php 
include "../../connect.php";


$id = filterRequest('id');

deleteData('shipping_cost',"id = $id");
