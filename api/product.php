<?php
require_once("../controllers/ProductController.php");

$productController = new ProductController();
header("Content-Type: application/json");
$jsonData = json_encode(array("error" => "Error"));
$id = $_GET['id'];
if ($id >= 0)
    $jsonData = $productController->detail($id);
else
    echo ("Enter id equal or bigger than 0.");
echo $jsonData;