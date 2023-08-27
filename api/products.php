<?php

require_once("../controllers/ProductController.php");

$productController = new ProductController();
header("Content-Type: application/json");

$jsonData = json_encode(array("error" => "Error"));
$startingId = $_GET['starting'];
$numberOfProducts = $_GET["length"];
if ($startingId >= 0 && $numberOfProducts > 0) {
    for ($i = $startingId; $i < $startingId + $numberOfProducts; $i++) {
        $product = $productController->detail($i);
        $products[] = $product;
    }
    $jsonData = json_encode(array("products" => $products));
} else
    $jsonData = json_encode(array("error" => "Enter id equal or bigger than 0 or enter length bigger than 0."));

echo $jsonData;