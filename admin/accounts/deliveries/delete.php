<?php 
include "../../../connect.php";


$id = filterRequest('id');

deleteData('delivery',"delivery_id = $id");
