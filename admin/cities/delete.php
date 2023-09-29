<?php 
include "../../connect.php";


$id = filterRequest('id');

deleteData('cities',"city_id = $id");
