<?php 
include "../../../connect.php";


$id = filterRequest('id');

deleteData('admin',"admin_id = $id");
