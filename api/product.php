<?php
require_once('../classes/ProductService.php');

$productService = new ProductService();
$id = $_GET['id'];
$productService->getProduct($id);
?>