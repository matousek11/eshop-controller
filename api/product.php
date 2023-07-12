<?php
require_once('../classes/ProductService.php');

$productService = new ProductService();
$id = $_GET['id'];
if ($id >= 0)
    $productService->getProduct($id);
else
    echo ("Enter id equal or bigger than 0.");
?>