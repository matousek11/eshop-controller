<?php
require_once("../controllers/ProductController.php");

$productController = new ProductController();
header("Content-Type: application/json");

$jsonData = json_encode(array("error" => "Error"));
$id = $_GET['id'];
if ($id >= 0)
    $jsonData = json_encode($productController->detail($id));
else
    $jsonData = json_encode(array("error" => "Enter id equal or bigger than 0."));
echo $jsonData;