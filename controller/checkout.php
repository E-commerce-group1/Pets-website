<?php
require_once("../model/database.php");
$database = new Database();

// echo $_POST['user_id'];
$user_id = $_POST['user_id'];
$result = $database->getUserCartItems((int)$user_id);
//print_r(json_encode($result));
$productId = $result[0]['product_id'];

$products = $database->getById((int)$productId, 'product');


print_r(json_encode($products));
